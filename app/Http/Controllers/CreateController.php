<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\create;
use Illuminate\Http\Request;
use App\Http\Requests\StorecreateRequest;
use App\Http\Requests\UpdatecreateRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;
class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        
       $createdData = $req->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:4'
        ],
    [
        'email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.'
    ]);

       User::create($createdData);  

       return back()->with('success', 'creating success!, creating more users!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecreateRequest $request)
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
    public function edit(create $create)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecreateRequest $request, create $create)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        
    }
}
