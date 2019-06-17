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
            "nombre" => "Daniel",
            "apellidos" => "Caparros Caparros",
            "dni" => "45605182T",
            "telefono" => "654698652",
            "rol" => "administrador",
            "sector_id" => 1,
            "tarea_id" => 1,
            "email" => "administrador@admiriegos.com",
            "password" => Hash::make("admin1234")
        ]);
    }
}
