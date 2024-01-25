<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

      $user = new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=$request->password;
      $user->save();
      return redirect('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($request->only('email','password')))
            {
                return redirect('/');
            }
        return redirect('login')->withErrors(['default'=>'Invalid User Details']);
    }

    public function logout()
    {
      Auth::logout();
      session()->flush();
      return redirect('login');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
