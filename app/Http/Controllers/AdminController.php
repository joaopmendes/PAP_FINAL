<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;



class AdminController extends Controller
{
    public function index(){
        $users = \App\User::all();
        $blogposts = \App\Blogpost::all();
        $comments = \App\Comment::all();
        return view('admin.index', compact('users', 'blogposts', 'comments'));
    }


    //criar users
    public function create_user(){
        return view('admin.user_form');
    }

    //armazena o user
    public function store_user(Request $req){

        $this->validate($req, [
            'name'=>'required',
            'email'=>'required| unique:users| email',
            'password'=>'required',
            'administrador'=>'required',
            'published_at'=>'nullable|date',
            'updated_at'=>'nullable|date',
        ]
    );

        $is_admin = 'false';
        if($req->administrador == 'sim'){
            $is_admin = 'true';
        }
        try {
            factory(\App\User::class)->create([
                'name'=>$req->name,
                'email'=>$req->email,
                'password'=>bcrypt($req->password),
                'admin' => $is_admin,
            ]);
        } catch (\Throwable $th) {
            return view('admin.user_form', ['message'=> 'Error']);
        }
        return view('admin.user_form', ['message'=> 'Success']);

    }

}


