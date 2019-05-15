<?php

use Illuminate\Database\Seeder;
use App\User;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nombre" => "Juan Luis",
            "apellidos" => "García Perez",
            "dni" => "21655487E",
            "telefono" => "654987123",
            "rol" => "Encargado",
            "idSector" => 1,
            "email" => "jluis@admiriegos.com",
            "password" => Hash::make("Jl15052019")
        ]);
    }
}
