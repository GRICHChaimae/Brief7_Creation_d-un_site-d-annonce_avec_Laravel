<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('log_in',[ 
            'log_in' => 'log_in'
         ]);
    }

    public function check(Request $request)
    {
        // dd($request->mot_de_passe);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
            // dd($request->only('email','mot_de_passe'));
            
            if(!auth()->attempt($request->only('email','password'))) {
                return back()->with('status', 'Invalid login details');
        
            }else
            return redirect()->route('offer');
            // dd(auth()->attempt($request->email));
    }
}
