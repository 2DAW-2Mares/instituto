<?php

use Illuminate\Database\Seeder;

class FaltaalumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('faltasalumnos')->truncate();
            $faltas = factory(App\Faltaalumno::class, 20)->create();    }

}
