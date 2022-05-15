<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemandeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    { 
        $demandes = Demande::get();

        return view('demande',[            
            'demande' => 'demande',
            'demandes' => $demandes,
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

        $request->user()->demandes()->create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $newImageName,
            'sexe' => $request->sexe,
        ]);

        return back();

    }

    public function find_demande(Demande $demande)
    {

        $get_demande = Demande::find($demande->id);
        return view('updateDemande',['get_demande'=>$get_demande]);

    }

    public function update_demande(Request $request,Demande $demande){
        $updated_demande = Demande::find($demande->id);

            $request->validate([
                'titre' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'image' => 'required',
                'sexe' => 'required',
            ]);
            
            $newImageName = time() . '-' . $request->titre . '.' . $request->image->extension();
            $request->image->move(public_path('images'),$newImageName);

            $updated_demande->titre = $request->titre;
            $updated_demande->description=$request->description;
            $updated_demande->image=$newImageName;
            $updated_demande->sexe=$request->sexe;
            $updated_demande->prix=$request->prix;

            $updated_demande->update();

        return redirect(route('demande'));
    }

    public function delete_demande(Demande $demande)
    {
        $demande->delete();
        return back(); 
    }
}
