<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //

    public function tableau_user()
    {
        $users = User::all();
        return view('user.user', compact('users'));
    }
    public function ajouter_user(Request $request)
    {
        $request->validate([
            
            'name' => 'required',
           
            'email' => 'required',
            
            'password' => 'required',
                   ]);

        //Extensification de l'objet client
        $user = new User();
        //uplodage
      

           
            $user->name = $request->name;
          
            $user->email = $request->email;
           
            $user->password = $request->password;
        
            //    $service->photo = $request->photo;
           
            $user->save();

            return redirect('/user');
          }

    public function update_user($id)
    {
        $users = User::find($id);
        return view('user.update', compact('users'));
    }
    public function modifier_user_traitement(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
            'email' => 'required',
            
            'password' => 'required',
                  ]);

        //Extensification de l'objet client
        $user =  User::find($request->id);
        //uplodage
        

           
            $user->name = $request->name;
           
            $user->email = $request->email;
            
            $user->password = $request->password;
                       
           
            
           
            $user->update();
            return redirect('/user');
            }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
