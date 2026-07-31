<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        //save user


        // folositor la DEBUGGING dd($todos); //public function create
        return view('home', [
            'todos' => $todos,
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }


}
