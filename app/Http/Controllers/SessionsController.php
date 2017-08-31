<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    
     public function create()
    {
        return view('sessions.create');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->home();
        
    }
    
    public function store()
    {
        //authenticate user
        
        if (! auth()->attempt(request(['email', 'password'])))
        { 
            return back()->withErrors([
                'message' => 'Please Check Your Credentials and Try Again'
            ]);
        }
        
           
        //if not redirect again back
        
        //if so sign in
        
        //redirect to the homepage
        
        return redirect()->home();
    }
    
}
