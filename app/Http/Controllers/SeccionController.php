<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Seccion::paginate(15);

        return view('seccion/index', [
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
        return view('seccion/create');
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
        
        $model = new Seccion();
        $model->create($request->all());
      
        return redirect()
            ->route('secciones.index')
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
        $model = Seccion::find($id);
        return view('seccion/view', [
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
        $model = Seccion::find($id);
        return view('seccion/edit', [
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
        $model = Seccion::find($id);
        $request->validate([
            'nombre' => 'required',
        ]);
      
        $model->update($request->all());
      
        return redirect()
            ->route('secciones.index')
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
        $model = Seccion::find($id);
        $model->delete();
        
        return redirect()
            ->route('secciones.index')
            ->with('success','Registro eliminado');
    }
}
