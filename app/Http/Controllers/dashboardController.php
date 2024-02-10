<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        $users = User::orderBy('created_at', 'desc')->get();
    return view('dashboard.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(create $create)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id) 
    {
        $users = User::find($id);
        return view('.dashboard.edit',compact('users'));

        // dd($users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $createdData = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email',
            'password'=> 'nullable',    
        ],
    [
        'email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.'
    ]);

       User::whereId($id)->update($createdData);  
       return redirect()->route('dashboard.index')->with('success', 'edit success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $users = User::find($id);
        
        if($users) {
            $users->delete();
        }
        return redirect()->route('dashboard.index');

    }
}
