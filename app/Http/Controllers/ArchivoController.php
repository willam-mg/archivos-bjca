<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Pagina;
use App\Models\Departamento;
use App\Models\TipoDocumento;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rol = Auth::user()->getRoleNames()->firstOrFail();
        $roles_names = User::ROL_DOCENTE;
        if ($rol == User::ROL_ADMIN) {
            $roles_names = [User::ROL_ADMIN, User::ROL_JEFE_ACADEMICO, User::ROL_CORDINADOR_CARRERA, User::ROL_DOCENTE];
        }
        if ($rol == User::ROL_JEFE_ACADEMICO) {
            $roles_names = [User::ROL_JEFE_ACADEMICO, User::ROL_CORDINADOR_CARRERA, User::ROL_DOCENTE];
        }
        if ($rol == User::ROL_CORDINADOR_CARRERA) {
            $roles_names = [User::ROL_CORDINADOR_CARRERA, User::ROL_DOCENTE];
        }
        // return $rol;
        $idUsers = User::role($roles_names)->pluck('id');
        $model = new Archivo();
        $model->titulo  = $request->titulo;
        $model->descripcion  = $request->descripcion;
        $model->fecha_documento  = $request->fecha_documento;
        $model->resolucion_ministerial  = $request->resolucion_ministerial;
        $datos = Archivo::where('titulo', 'like', '%'.$model->titulo.'%')
            // ->where('descripcion', 'like', '%'.$model->descripcion.'%')
            ->where('fecha_documento', 'like', '%'.$model->fecha_documento.'%')
            ->where('resolucion_ministerial', 'like', '%'.$model->resolucion_ministerial.'%')
            ->whereIn('user_id', $idUsers)
            ->paginate(15);

        return view('archivo/index', [
            'datos'=>$datos,
            'model'=>$model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $tipoDocumentos = TipoDocumento::all();

        return view('archivo/create', [
            'departamentos'=>$departamentos,
            'tipoDocumentos'=>$tipoDocumentos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'titulo' => 'required',
            'fecha_documento' => 'date',
            'resolucion_ministerial' => 'max:45',
            'cife' => 'max:45',
            'fecha_emision' => 'date',
            'ano' => 'numeric',
            'departamento_id' => 'required',
            'tipo_documento_id' => 'required',
            'descripcion' => 'max:200',
        ]);
        try {
            $archivo = new Archivo();
            $dataValidated['fecha_hora'] = date('Y-m-d H:i:s');
            $dataValidated['user_id'] = Auth::id();
            $archivo = Archivo::create($dataValidated);

            $pagina = new Pagina();
            $pagina->archivo_id = $archivo->id;
            $pagina->fecha_hora = date('Y-m-d H:i:s');
            $pagina->numero = 1;
            $pagina->save();

            if ($request->has('imagen') && $request->imagen !== null){
                $file = $request->file('imagen');
                $filename = 'archivo_'.$pagina->id.date('ymdHis').'.pdf';
                $file->move(
                  public_path().'/uploads/', $filename
                );
                $pagina->imagen = $filename;
                $pagina->save();
            }
            

            return redirect()
            ->route('archivos.index')
            ->with('success','Registro satisfactorio');
        } catch (\Throwable $th) {
            throw new \Exception($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Archivo::find($id);
        return view('archivo/view', [
            'model'=>$model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Archivo::find($id);
        $departamentos = Departamento::all();
        $tipoDocumentos = TipoDocumento::all();

        return view('archivo/edit', [
            'model'=>$model,
            'departamentos'=>$departamentos,
            'tipoDocumentos'=>$tipoDocumentos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataValidated = $request->validate([
            'titulo' => 'required',
            'fecha_documento' => 'date',
            'resolucion_ministerial' => 'max:45',
            'cife' => 'max:45',
            'fecha_emision' => 'date',
            'ano' => 'numeric',
            'departamento_id' => 'required',
            'tipo_documento_id' => 'required',
            'descripcion' => 'max:200',

        ]);
        try {
            $archivo = Archivo::find($id);
            $archivo->titulo = $dataValidated['titulo'];
            $archivo->fecha_documento = $dataValidated['fecha_documento'];
            $archivo->resolucion_ministerial = $dataValidated['resolucion_ministerial'];
            $archivo->cife = $dataValidated['cife'];
            $archivo->fecha_emision = $dataValidated['fecha_emision'];
            $archivo->ano = $dataValidated['ano'];
            $archivo->departamento_id = $dataValidated['departamento_id'];
            $archivo->tipo_documento_id = $dataValidated['tipo_documento_id'];
            $archivo->descripcion = $dataValidated['descripcion'];
            $archivo->save();

            return redirect()
            ->route('archivos.index')
            ->with('success','Registro satisfactorio');
        } catch (\Throwable $th) {
            throw new \Exception($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Archivo::find($id);
        $model->delete();
        
        return redirect()
            ->route('archivos.index')
            ->with('success','Registro eliminado');
    }

    public function pagina($id) {
        $model = Pagina::find($id);
        return view('archivo.pagina', [
            'model'=>$model
        ]);
    }
}
