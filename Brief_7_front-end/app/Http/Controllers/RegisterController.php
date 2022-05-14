<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('sign_up',[
            'sign_up' => 'sign_up'
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'mot_de_passe' => 'required|confirmed',
        ]);

        User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            // 'mot_de_passe' => Hash::make($request->mot_de_passe),
            'mot_de_passe' => $request->mot_de_passe,
        ]);

        return redirect()->route('offer');

    }
}
