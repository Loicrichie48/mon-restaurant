<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
class TableController extends Controller
{
    //

    public function tableau_table()
    {
        $tables = Table::all();
        return view('table.table', compact('tables'));
    }
    public function ajouter_table(Request $request)
    {
        $request->validate([
            'Reservation' => 'required',
            'numero_table' => 'required',
            'nombre_place' => 'required',
            'statut' => 'required',
            
        ]);

        //Extensification de l'objet etudiant
        $table = new Table();
        //uplodage
        
            $table->reservation = $request->reservation;
            $table->numero_table= $request->numero_table;
            $table->nombre_place = $request->nombre_place;
            $table->statut= $request->statut;
           
            
            //    $service->photo = $request->photo;
            
            $table->save();

            return redirect('/table');
        
    }
    public function update_table($id)
    {
        $tables  = Table::find($id);
        return view('table.update', compact('tables'));
    }
    public function modifier_table_traitement(Request $request)
    {
        $request->validate([
            'reservation' => 'required',
            'numero_table' => 'required',          
            'nombre_place' => 'required',
            'statut' => 'required',
           
        ]);

        //Extensification de l'objet etudiant
        $table =  Table::find($request->id);
        //uplodage
       
            $table->reservation = $request->reservation;
            $table->numero_table = $request->numero_table;
            $table->nombre_place = $request->nombre_place;
            $table->statut = $request->statut;
            
           
            $table->update();
            return redirect('/table');
        
    }

    public function delete_table($id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect('/table');
    }
}
