<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([
            "nombre" => "Sector 01",
            "finca_id" => 1
        ]);
    }
}
