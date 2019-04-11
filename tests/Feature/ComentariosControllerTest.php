<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\blogpost;

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

    public function teste_if_comentarios_are_being_deleted()
    {
        $table='comments';
        $comment = factory(\App\Comment::class)->create();

        $user = \App\User::find($comment->user->id);




        $this->assertDatabaseHas($table, [
            'blog_id' => $comment->blogpost->id,
            'user_id' => $user->id,
            'comment' => $comment->comment
        ]);

        $this->actingAs($user)->get(route('delete_comment', [
            'comment_id'=>$comment->id
        ]));

        $this->assertDatabaseMissing($table,[
            'blog_id' => $comment->blogpost->id,
            'user_id' => $user->id,
            'comment' => $comment->comment
        ]);



    }
}
