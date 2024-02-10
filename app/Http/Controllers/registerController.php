<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register Page',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request) {
        
       $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:4'
        ],
    [
        'email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.'
    ]);

       User::create($validatedData);

       return redirect('/login')->with('success', 'Registration success,now please login');
    }
}
