<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function tableau_client()
    {
        $clients = Client::all();
        return view('client.client', compact('clients'));
    }
    public function ajouter_client(Request $request)
    {
        $request->validate([
            
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel_client' => 'required',
            'password' => 'required',
                   ]);

        //Extensification de l'objet client
        $client = new Client();
        //uplodage
      

            
            $client->nom = $request->nom;
            $client->prenom = $request->prenom;
            $client->email = $request->email;
            $client->tel_client = $request->tel_client;
            $client->password = $request->password;
        
            //    $service->photo = $request->photo;
           
            $client->save();

            return redirect('/client');
          }

    public function update_client($id)
    {
        $clients = Client::find($id);
        return view('client.update', compact('clients'));
    }
    public function modifier_client_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel_client' => 'required',
            'password' => 'required',
                  ]);

        //Extensification de l'objet client
        $client =  Client::find($request->id);
        //uplodage
        

           
            $client->nom = $request->nom;
            $client->prenom = $request->prenom;
            $client->email = $request->email;
            $client->tel_client = $request->tel_client;
            $client->password = $request->password;
                       
           
            
            //    $service->photo = $request->photo;
            $client->email = $request->email;
            $client->update();
            return redirect('/client');
            }

    public function delete_client($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/client');
    }
    
}
