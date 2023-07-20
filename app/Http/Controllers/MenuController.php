<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;



class MenuController extends Controller
{
    //pour la gestion des menu

    public function tableau_menu()
    {
        $menus = Menu::all();
        return view('menu.menu', compact('menus'));
    }
    public function ajouter_menu(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'nom' => 'required',
            'image' => 'required',
            'description' => 'required',

        ]);

        //Extensification de l'objet etudiant
        $menu = new Menu();
        $menu->user= $request->user;
        $menu->nom = $request->nom;
        // $plat->prix= $request->prix;
        //uplodage
        if (!empty($request->file('image'))) {
            $url = $request->file('image')->store('uploads/images/menu', 'public');
            $image = url('storage/' . $url);
            $menu['image'] = $image;
        
            
            // $plat->nom= $request->nom;
            // $plat->image = $request->image;
            // $plat->prix= $request->prix;
            
            $menu->description = $request->description;
            
            //    $service->photo = $request->photo;
            
            $menu->save();

            return redirect('/menu');
        }
    }
    public function update_menu($id)
    {
        $menus  = Menu::find($id);
        return view('menu.update', compact('menus'));
    }
    public function modifier_menu_traitement(Request $request)
    {
        $request->validate([
           
            'user' => 'required',          
            'image' => 'required',
            'nom' => 'required',
            'description' => 'required',
           
        ]);

        //Extensification de l'objet etudiant
        $menu =  menu::find($request->id);
        //uplodage
       
            
            $menu->user = $request->user;
            $menu->nom = $request->nom;
            $menu->image = $request->image;
            $menu->decription = $request->decription;
           
            $menu->update();
            return redirect('/menu');
        
    }

    public function delete_menu($id)
    {
        $menu = menu::find($id);
        $menu->delete();
        return redirect('menu');
    }
}


