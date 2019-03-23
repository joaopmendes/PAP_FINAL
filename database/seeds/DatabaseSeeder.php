<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@clinicadeser.eu',
            //'password' => '^c%t7pjZk=hx',
            'password' => bcrypt('testeadmin'),
            'admin' => 'true',
            'created_at'=> date("Y-m-d H:i:s"),
        ]);

        for ($i=1; $i < 50; $i++) {
            DB::table('blogposts')->insert([
                'title' => Str::random(10),
                'message' => Str::random(500),
                'created_at'=> date("Y-m-d H:i:s"),
            ]);
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'created_at'=> date("Y-m-d H:i:s"),
            ]);


            DB::table('comments')->insert([
                'blog_id' => $i,
                'user_id' => $i,
                'comment' => Str::random(10),
                'created_at'=> date("Y-m-d H:i:s"),
            ]);
        }



    }
}
