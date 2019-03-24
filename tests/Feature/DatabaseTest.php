<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseUnitTests extends TestCase
{
    use RefreshDatabase;

    /**
     * This function creates a user and checks if it did save on the database
     *
     * @return void
      @test
    */
    public function creating_one_user()
    {
        $table = 'users';
        $user = factory(\App\User::class)->create();

        $this->assertDatabaseHas($table, [
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email
        ]);
    }

     /**
     * This function creates a user and checks if it did save on the database (ADMIN)
     *
     * @return void
      @test
    */
    public function creating_one_user_admin()
    {
        $table = 'users';
        $user = factory(\App\User::class)->create([
            'admin'=>'true'
        ]);

        $this->assertDatabaseHas($table, [
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'admin' => 'true',
        ]);


    }

     /**
     * This function creates a blogpost and checks if it did save on the database
     *
     * @return void
      @test
    */
    public function creating_one_blogpost()
    {
        $table = 'blogposts';
        $post = factory(\App\Blogpost::class)->create();
        $this->assertDatabaseHas($table, [
            'title'=>$post->title,
            'message'=>$post->message
        ]);
    }
    /**
    * This function creates a comment and checks if it did save on the database (A comment has 1 user, and 1 blogpost, so we need to create those)
    *
    * @return void
     @test
   */
   public function creating_one_comment()
   {
       $table = 'comments';
       $post = factory(\App\Comment::class)->create();



       $this->assertDatabaseHas($table, [
           'blog_id'=>$post->blog_id,
           'user_id'=>$post->user_id,
           'comment'=>$post->comment
       ]);
   }

}
