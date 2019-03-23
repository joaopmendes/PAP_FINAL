<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index2');
    }
    public function terapias()
    {
        return view('terapias');
    }
    public function contactos()
    {
        return view('contactos');
    }
    public function workshops()
    {
        return view('workshops');
    }

}
