<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FincasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fincas')->insert([
            "nombre" => "Doña Ana",
            "localizacion" => "Almendricos"
        ]);
    }
}
