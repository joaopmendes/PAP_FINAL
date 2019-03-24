<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogpost;
use Illuminate\Database\QueryException;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin',
                         ['except' => ['index', 'search_post', 'search_get', 'show']]);
    }
    public function index()
    {
        $blogPosts = Blogpost::orderBy('id', 'desc')
                    ->paginate(10);
        return view('blog.index')->with('blogPosts', $blogPosts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Only Admin
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'bail|required|max:255',
            'message'=>'required',
            'published_at'=>'nullable|date',
            'updated_at'=>'nullable|date',
        ]);


        $post = new BLogpost;
        $post->title = $request->title;
        $post->message = $request->message;


        try {
            $post->save();
        } catch (QueryException $th) {
            return view('blog.create', ['message'=> 'O Campo Titulo já está em uso.']);
        }



        return redirect('blog');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blogpost::findOrFail($id);
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blogpost::findOrFail($id);
        return view('blog.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'bail|required|max:255',
            'message'=>'required'
        ]);
        $post = Blogpost::findOrFail($id);
        $post->title = $request->title;
        $post->message = $request->message;

        try {
            $post->save();
        } catch (QueryException $th) {
            return view('blog.edit', ['message'=> 'O Campo Titulo já está em uso.'])->with('post', $post);;
        }

        return redirect('blog');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blogpost::findOrFail($id)->delete();
        return redirect(route('blog.index'));

    }
    public function search_get($search_string)
    {
       $blogPosts = Blogpost::where('title','LIKE','%'. $search_string .'%')
                            ->orWhere('message','LIKE','%'. $search_string .'%')
                            ->orderBy('id', 'desc')
                            ->paginate(10);
       return view('blog.index')->with('blogPosts', $blogPosts);
    }
    public function search_post(Request $request){

        $search_string = $request->search_string;
        return redirect()->route('search_get', $search_string);
    }
}
