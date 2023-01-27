<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => User::ROL_ADMIN]);
        Role::create(['name' => User::ROL_JEFE_ACADEMICO]);
        Role::create(['name' => User::ROL_CORDINADOR_CARRERA]);
        Role::create(['name' => User::ROL_DOCENTE]);

        $user = User::find(1);
        $user->assignRole(User::ROL_ADMIN);
    }
}
