<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = TipoDocumento::paginate(10);
        return view('tipo-documento.index', [
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
        return view('tipo-documento.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
        
        $model = new TipoDocumento();
        $model->create($request->all());
      
        return redirect()
            ->route('tipo-documento.index')
            ->with('success','Registro satisfactorio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = TipoDocumento::find($id);
        return view('tipo-documento/view', [
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
        $model = TipoDocumento::find($id);
        return view('tipo-documento.edit', [
            'model'=>$model
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
        $model = TipoDocumento::find($id);
        $request->validate([
            'nombre' => 'required',
        ]);
      
        $model->update($request->all());
      
        return redirect()
            ->route('tipo-documento.index')
            ->with('success','Registro satisfactorio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = TipoDocumento::find($id);
        $model->delete();
        
        return redirect()
            ->route('tipo-documento.index')
            ->with('success','Registro eliminado');
    }
}
