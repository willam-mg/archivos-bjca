<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new User();
        $model->name  = $request->name;
        $model->email  = $request->email;
        $datos = User::where('name', 'like', '%'.$model->name.'%')
            ->where('email', 'like', '%'.$model->email.'%')
            ->paginate(15);

        return view('user/index', [
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
        return view('user/create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rol' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->rol);

        return redirect()
            ->route('users.index')
            ->with('success','Modificacion satisfactoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::find($id);
        return view('user/view', [
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
        $model = User::find($id);
        return view('user/edit', [
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
        $model = User::find($id);
        $lastRol = $model->rol;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'rol' => 'required',
        ]);
      
        $model->update($request->all());
        $model->removeRole($lastRol);
        $model->assignRole($request->rol);
      
        return redirect()
            ->route('users.index')
            ->with('success','Modificacion satisfactoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::find($id);
        $model->delete();
        
        return redirect()
            ->route('users.index')
            ->with('success','Registro eliminado');
    }

    public function createRoles() {
        $role1 = Role::create(['name' => User::ROL_ADMIN]);
        $role2 = Role::create(['name' => User::ROL_JEFE_ACADEMICO]);
        $role3 = Role::create(['name' => User::ROL_CORDINADOR_CARRERA]);
        $role4 = Role::create(['name' => User::ROL_DOCENTE]);
    }

    public function asignRol($id, $role) {
        $user = User::find($id);
        $user->assignRole($role);
    }
}
