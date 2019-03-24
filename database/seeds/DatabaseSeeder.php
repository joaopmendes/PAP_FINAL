<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Carbon;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@clinicadeser.eu';
        $user->password = bcrypt('testeadmin');
        $user->admin = 'true';
        $user->save();

        factory(App\Comment::class, 50)->create();



    }
}
