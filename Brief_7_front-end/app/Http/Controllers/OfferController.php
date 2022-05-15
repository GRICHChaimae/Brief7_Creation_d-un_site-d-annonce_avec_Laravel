<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OfferController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    { 
        $offers = Offer::get();

        return view('offre',[            
            'offre' => 'offre',
            'offers' => $offers,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'required',
            'sexe' => 'required',
        ]);

        $newImageName = time() . '-' . $request->titre . '.' . $request->image->extension();
        
        $request->image->move(public_path('images'),$newImageName);

        $request->user()->offers()->create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $newImageName,
            'sexe' => $request->sexe,
        ]);

        return back();

    }
}
