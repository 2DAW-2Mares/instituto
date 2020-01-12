<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('users')->truncate();
            DB::table('centros')->truncate();
            DB::table('tutorizados')->truncate();
            // Create 3 App\User instances...
            $users = factory(App\User::class, 3)->create()
                ->each(function ($user) {
                $user->centros()->save(factory(App\Centro::class)->make());
            });

            $users = factory(App\User::class, 97)->create()
                ->each(function ($user) {
                $user->tutorado()->save(factory(App\Tutorizado::class)->make());
            });

            $users = factory(App\User::class, 200)->create()
                ->each(function ($user) {
                $user->tutor()->save(factory(App\Tutorizado::class)->make());
            });
        }
    }
}
