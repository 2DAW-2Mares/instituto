<?php

use Illuminate\Database\Seeder;

class FaltaProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('faltasprofesores')->truncate();
            $faltas = factory(App\Faltaprofesor::class, 10)->create();
        }
    }
}
