<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test',
            // 'username' =>'Test',

        ]);



        \App\Models\Articulo::factory(30)->create();

        \App\Models\Articulo::factory()->create([
            'cantidad' => '20',
            'descripcion' => 'Zapatillas nike',
            'precio' => '120000',
            'codigo' => '9900',
        ]);
    }
}
