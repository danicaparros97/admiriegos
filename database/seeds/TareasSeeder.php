<?php

use Illuminate\Database\Seeder;
use App\Tarea;
use Faker\Factory as Faker;


class TareasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0; $i<20; $i++) {
            Tarea::create([
                'descripcion' => $faker->text($maxNbChars = 50),
                'fecha_inicio' => $faker->dateTimeInInterval($startDate = '- 5 days', $interval = '+ 5 days', $timezone = null),
                'fecha_fin' => $faker->dateTimeInInterval($startDate = '- 5 days', $interval = '+ 5 days', $timezone = null),
                'estado' => 'activa',
            ]);
        }
    }
}