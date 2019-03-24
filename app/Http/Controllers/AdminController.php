<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index(){
        $users = \App\User::all();
        $blogposts = \App\Blogpost::all();
        $comments = \App\Comment::all();
        return view('admin.index', compact('users', 'blogposts', 'comments'));
    }
}
