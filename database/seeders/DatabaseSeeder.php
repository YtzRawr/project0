<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Usuario']);

        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.cl',
            'password' => 'password',
            'role' => 'Administrador'
        ]);
        $user = User::find(1);

        $user->assignRole($role1);

        \App\Models\User::factory()->create([
            'name' => 'Matias pizarro',
            'email' => 'matias@gmail.cl',
            'password' => 'password',
            'role' => 'Usuario'

        ]);
        $user = User::find(2);

        $user->assignRole($role2);

        \App\Models\User::factory(200)->create();


        \App\Models\Articulo::factory(200)->create();

        \App\Models\Articulo::factory()->create([
            'cantidad' => '20',
            'descripcion' => 'Zapatillas nike',
            'precio' => '120000',
            'codigo' => '9900',
        ]);
    }
}
