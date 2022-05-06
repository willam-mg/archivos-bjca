<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Pagina;
use App\Models\Departamento;
use App\Models\TipoDocumento;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Archivo::paginate(15);
        return view('archivo/index', [
            'datos'=>$datos
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
            'departamento_id' => 'required',
            'tipo_documento_id' => 'required',
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
                $image = $request->imagen;
                $imageName = 'archivo_'.$pagina->id.date('ymdHis').'.jpg';
                $path = public_path().'/uploads/' . $imageName;
                // return $path;
                Image::make(file_get_contents($image))->save($path);   
            }
            $pagina->imagen = $imageName;
            $pagina->save();

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
        //
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
        //
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
}
