<?php

namespace App\Http\Controllers;
use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    //
    public function tableau_plat()
    {
        $plats = Plat::all();
        return view('plat.plat', compact('plats'));
    }
    public function ajouter_plat(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'image' => 'required',
            'prix' => 'required',

        ]);

        //Extensification de l'objet etudiant
        $plat = new Plat();
        $plat->nom= $request->nom;
        // $plat->image = $request->image;
        $plat->prix= $request->prix;
        //uplodage
        if (!empty($request->file('image'))) {
            $url = $request->file('image')->store('uploads/images/client', 'public');
            $image = url('storage/' . $url);
            $plat['image'] = $image;
        
            
            $plat->nom= $request->nom;
            // $plat->image = $request->image;
            $plat->prix= $request->prix;
            
           
            
            //    $service->photo = $request->photo;
            
            $plat->save();

            return redirect('/plat');
        }
    }
    public function update_plat($id)
    {
        $plats  = Plat::find($id);
        return view('plat.update', compact('plats'));
    }
    public function modifier_plat_traitement(Request $request)
    {
        $request->validate([
           
            'nom' => 'required',          
            'image' => 'required',
            'prix' => 'required',
           
        ]);

        //Extensification de l'objet etudiant
        $plat =  plat::find($request->id);
        //uplodage
       
            
            $plat->nom = $request->nom;
            $plat->image = $request->image;
            $plat->prix = $request->prix;
            
           
            $plat->update();
            return redirect('/plat');
        
    }

    public function delete_plat($id)
    {
        $plat = plat::find($id);
        $plat->delete();
        return redirect('/plat');
    }
    
}

