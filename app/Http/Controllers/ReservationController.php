<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function tableau_reservation()
    {
        $reservations = reservation::all();
        return view('reservation.reservation', compact('reservations'));
    }
    public function ajouter_reservation(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'date' => 'required',
            'heure' => 'required',
            'nombre_personne' => 'required',
            
        ]);

        //Extensification de l'objet etudiant
        $reservation = new reservation();
        //uplodage
        
            $reservation->client = $request->client;
            $reservation->date= $request->date;
            $reservation->heure = $request->heure;
            $reservation->nombre_personne= $request->nombre_personne;
           
            
            //    $service->photo = $request->photo;
            
            $reservation->save();

            return redirect('/reservation');
        
    }
    public function update_reservation($id)
    {
        $reservations  = Reservation::find($id);
        return view('reservation.update', compact('reservations'));
    }
    public function modifier_reservation_traitement(Request $request)
    {
        $request->validate([
            'Client' => 'required',
            'date' => 'required',          
            'heure' => 'required',
            'nombre_personne' => 'required',
           
        ]);

        //Extensification de l'objet etudiant
        $reservation =  Reservation::find($request->id);
        //uplodage
       
            $reservation->Client = $request->Client;
            $reservation->date = $request->date;
            $reservation->heure = $request->heure;
            $reservation->nombre_personne = $request->nombre_personne;
            
           
            $reservation->update();
            return redirect('/reservation');
        
    }

    public function delete_reservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect('/reservation');
    }
    
}
