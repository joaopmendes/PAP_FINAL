<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $req){
        $req->validate([
                'blog_id'=>'required',
                'comment'=>'required'
        ]);

        $comment = new \App\Comment();
        $comment->blog_id = $req->blog_id;
        $comment->user_id = \Auth::user()->id;
        $comment->comment = $req->comment;
        $comment->save();

        return redirect()->route('blog.show', ['blog'=>$req->blog_id]);


    }
}
