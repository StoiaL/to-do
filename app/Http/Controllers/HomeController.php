<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $todos = [

            [
                'title' => 'Redesign the layout',
                'description' => 'Scrollable todo list in a card. Fixed Add button under the list. Mobile flexible layout?'
            ],

            [
                'title' => 'Interactive todos',
                'description' => 'Edit when hovering over the extended details list, possibly delete by deleting all details. CTRL + Z returns deleted todos'
            ],

            [
                'title' => 'Editable details panel',
                'description' => 'Seamless sliding edit tab with live edits'
            ],

            [
                'title' => 'Connect to Laravel',
                'description' => 'Save and delete todos to MySQL database'
            ]

        ];

        return view('home', compact('todos'));
    }
}