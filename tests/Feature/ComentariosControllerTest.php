<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComentariosControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_comentarios_are_being_created()
    {
        $table='comments';
        $comment_test = 'test comment';
        $blog = factory(\App\Blogpost::class)->create();
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)->post(route('comment_post'), [
            'comment'=>$comment_test,
            'blog_id'=>$blog->id
        ]);
        $this->assertDatabaseHas($table, [
            'blog_id'=>$blog->id,
            'user_id'=>$user->id,
            'comment'=>$comment_test
        ]);





    }
}
