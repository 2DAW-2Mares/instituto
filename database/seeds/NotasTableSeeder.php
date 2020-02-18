<?php

use Illuminate\Database\Seeder;

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('notas')->truncate();
            $notas = factory(\App\Nota::class, 100)->create();
        }
    }
}
