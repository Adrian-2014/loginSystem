<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function home() {
        return view('home', [
        'title' => 'home'
        ]);
    }

    public function about() {
        return view('about', [
        'title' => 'about'
        ]);
    }
}
