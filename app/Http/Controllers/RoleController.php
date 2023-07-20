<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // public function tableau_reservation()
    public function tableau_role()
    {
        $roles = role::all();
        return view('role.role', compact('roles'));
    }
    public function ajouter_role(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'fonction' => 'required',
            'libelle' => 'required',
            
        ]);

        //Extensification de l'objet etudiant
        $role = new role();
        //uplodage
        
            $role->user = $request->user;
            $role->fonction= $request->fonction;
            $role->libelle = $request->libelle;
           
            
            //    $service->photo = $request->photo;
            
            $role->save();

            return redirect('/role');
        
    }
    public function update_role($id)
    {
        $roles  = Role::find($id);
        return view('role.update', compact('roles'));
    }
    public function modifier_role_traitement(Request $request)
    {
        $request->validate([
            'User' => 'required',
            'fonction' => 'required',          
            'libelle' => 'required',
            
           
        ]);

        //Extensification de l'objet etudiant
        $role =  Role::find($request->id);
        //uplodage
       
            $role->User = $request->User;
            $role->fonction = $request->fonction;
            $role->libelle = $request->libelle;
            
           
            $role->update();
            return redirect('/role');
        
    }

    public function delete_role($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/role');
    }
}
