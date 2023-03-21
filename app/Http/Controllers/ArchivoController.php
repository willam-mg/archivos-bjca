<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Pagina;
use App\Models\Seccion;
use App\Models\TipoDocumento;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $model->descripcion  = $request->descripcion;
        $model->fecha_inicio  = $request->fecha_inicio;
        $model->fecha_finalizacion  = $request->fecha_finalizacion;
        $datos = Archivo::when($request->fondo, function ($query) use ($request) {
                $query->where("fondo", 'like', '%'.$request->fondo.'%');
            })
            ->when($request->seccion_id, function ($query) use ($request) {
                $query->where("seccion_id", 'like', '%'.$request->seccion_id.'%');
            })
            ->when($request->serie, function ($query) use ($request) {
                $query->where("serie", 'like', '%'.$request->serie.'%');
            })
            ->when($request->autor, function ($query) use ($request) {
                $query->where("autor", 'like', '%'.$request->autor.'%');
            })
            ->when($request->descripcion, function ($query) use ($request) {
                $query->where("descripcion", 'like', '%'.$request->descripcion.'%');
            })
            ->when($request->fecha_inicio, function ($query) use ($request) {
                $query->where("fecha_inicio", 'like', '%'.$request->fecha_inicio.'%');
            })
            ->when($request->fecha_finalizacion, function ($query) use ($request) {
                $query->where("fecha_finalizacion", 'like', '%'.$request->fecha_finalizacion.'%');
            })
            ->when($request->folio, function ($query) use ($request) {
                $query->where("folio", 'like', '%'.$request->folio.'%');
            })
            ->when($request->volumen, function ($query) use ($request) {
                $query->where("volumen", 'like', '%'.$request->volumen.'%');
            })
            ->when($request->ubicacion, function ($query) use ($request) {
                $query->where("ubicacion", 'like', '%'.$request->ubicacion.'%');
            })
            ->when($request->user_id, function ($query) use ($request) {
                $query->where("user_id", 'like', '%'.$request->user_id.'%');
            })
            ->when($request->fecha_hora, function ($query) use ($request) {
                $query->where("fecha_hora", 'like', '%'.$request->fecha_hora.'%');
            })
            ->when($request->tipo_documento_id, function ($query) use ($request) {
                $query->where("tipo_documento_id", 'like', '%'.$request->tipo_documento_id.'%');
            })->whereIn('user_id', $idUsers);

        $datos = Archivo::paginate(15);
        $secciones = Seccion::all();
        $tipoDocumentos = TipoDocumento::all();

        return view('archivo/index', [
            'datos'=>$datos,
            'model'=>$model,
            'secciones'=> $secciones,
            'tipoDocumentos'=> $tipoDocumentos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secciones = Seccion::all();
        $tipoDocumentos = TipoDocumento::all();

        return view('archivo/create', [
            'secciones'=>$secciones,
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
            'fondo' => 'required',
            'seccion_id' => 'required',
            'serie' => 'required',
            'autor' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_finalizacion' => 'required',
            'folio' => 'required',
            'volumen' => 'required',
            'ubicacion' => 'required',
            'tipo_documento_id' => 'required',
        ]);
        try {
            DB::beginTransaction();
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

            DB::commit();
            return redirect()
            ->route('archivos.index')
            ->with('success','Registro satisfactorio');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new \Exception($th->getMessage());
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
        $secciones = Seccion::all();
        $tipoDocumentos = TipoDocumento::all();

        return view('archivo/edit', [
            'model'=>$model,
            'secciones'=>$secciones,
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
            'fondo' => 'required',
            'seccion_id' => 'required',
            'serie' => 'required',
            'autor' => 'required',
            'descripcion' => 'required;max:200',
            'fecha_inicio' => 'required',
            'fecha_finalizacion' => 'required',
            'folio' => 'required',
            'volumen' => 'required',
            'ubicacion' => 'required',
            'user_id' => 'required',
            'fecha_hora' => 'required',
            'tipo_documento_id' => 'required',

        ]);
        try {
            $archivo = Archivo::find($id);
            $archivo->fondo = $dataValidated['fondo'];
            $archivo->seccion_id = $dataValidated['seccion_id'];
            $archivo->serie = $dataValidated['serie'];
            $archivo->autor = $dataValidated['autor'];
            $archivo->descripcion = $dataValidated['descripcion'];
            $archivo->fecha_inicio = $dataValidated['fecha_inicio'];
            $archivo->fecha_finalizacion = $dataValidated['fecha_finalizacion'];
            $archivo->folio = $dataValidated['folio'];
            $archivo->volumen = $dataValidated['volumen'];
            $archivo->ubicacion = $dataValidated['ubicacion'];
            $archivo->user_id = $dataValidated['user_id'];
            $archivo->fecha_hora = $dataValidated['fecha_hora'];
            $archivo->tipo_documento_id = $dataValidated['tipo_documento_id'];
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
