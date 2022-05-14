<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        
        auth()->logout();

        return view('log_in',[ 
            'log_in' => 'log_in'
         ]);
    }
}
