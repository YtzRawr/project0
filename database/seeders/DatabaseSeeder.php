<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use GuzzleHttp\Promise\Create;
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
        // \App\Models\State::factory(10)->create();
        // \App\Models\City::factory(10)->create();
        // \App\Models\Country::factory(10)->create();

        $countries = Country::factory()->count(4)->create();
        foreach($countries as $country){
            $states = State::factory()->count(4)
            ->create(['country_id'=>$country->id]);

            foreach($states as $state){
                $cities = City::factory()->count(4)
                ->create(['state_id'=>$state->id]);
            }
        }

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
