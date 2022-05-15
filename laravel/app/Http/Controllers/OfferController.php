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

    public function find_offer(Offer $offer)
    {

        $get_offer = Offer::find($offer->id);
        return view('updateOffer',['get_offer'=>$get_offer]);

    }

    public function update_offer(Request $request,Offer $offer){
        $updated_offer = Offer::find($offer->id);

            $request->validate([
                'titre' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'image' => 'required',
                'sexe' => 'required',
            ]);
            
            $newImageName = time() . '-' . $request->titre . '.' . $request->image->extension();
            $request->image->move(public_path('images'),$newImageName);

            $updated_offer->titre = $request->titre;
            $updated_offer->description=$request->description;
            $updated_offer->image=$newImageName;
            $updated_offer->sexe=$request->sexe;
            $updated_offer->prix=$request->prix;

            $updated_offer->update();

        return redirect(route('offer'));
    }

    public function delete_offer(Offer $offer)
    {
        $offer->delete();
        return back(); 
    }
}
