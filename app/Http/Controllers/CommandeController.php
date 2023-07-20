<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
class CommandeController extends Controller
{
    //
    public function tableau_commande()
    {
        $commande = commande::all();
        return view('commande.commande', compact('commande'));
    }
    public function ajouter_commande(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'plat' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'plat_commande' => 'required',
            'quantite' => 'required',
            
        ]);

        //Extensification de l'objet etudiant
        $commande = new commande();
        //uplodage
        
            $commande->client = $request->client;
            $commande->plat = $request->plat;
            $commande->nom= $request->nom;
            $commande->prenom= $request->prenom;
            $commande->email = $request->email;
            $commande->plat_commande= $request->plat_commande;
            $commande->quantite= $request->quantite;
           
            
            //    $service->photo = $request->photo;
            
            $commande->save();

            return redirect('/commande ');
        
    }
    public function update_commande($id)
    {
        $commandes  = Commande::find($id);
        return view('commande.update', compact('commandes'));
    }
    public function modifier_commande_traitement(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'plat' => 'required',          
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'plat_commande' => 'required',
            'quantite' => 'required',
           
        ]);

        //Extensification de l'objet etudiant
        $commande =  Commande::find($request->id);
        //uplodage
       
            $commande->client = $request->client;
            $commande->plat = $request->plat;
            $commande->nom = $request->nom;
            $commande->prenom = $request->prenom;
            $commande->email = $request->email;
            $commande->plat_commande = $request->plat_commande;
            $commande->quantite = $request->quantite;
            
           
            $commande->update();
            return redirect('/commande');
        
    }

    public function delete_commande($id)
    {
        $commande = Commande::find($id);
        $commande->delete();
        return redirect('/commande');
    }
}
