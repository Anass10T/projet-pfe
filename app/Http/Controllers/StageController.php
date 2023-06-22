<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use PDF;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::all();
        return view('stage.index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stagiaires = Stagiaire::all();
        return view('stage.create', compact('stagiaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stagiaire_id' => 'required|exists:stagiaire,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'rapport_de_stage_deposer' => 'required',
            'attestation_obtenu' => 'required',
            'projet_deposer' => 'required',
        ]);

        $stage = new Stage();
        $stage->stagiaire_id = $validatedData['stagiaire_id'];
        $stage->date_debut = $validatedData['date_debut'];
        $stage->date_fin = $validatedData['date_fin'];
        // $stage->note_stage = $validatedData['note_stage'];
        // $stage->appreciation = $validatedData['appreciation'];
      
        $stage->rapport_de_stage_deposer = $validatedData['rapport_de_stage_deposer'] == 'oui' ? 1 : 0;
        $stage->attestation_obtenu = $validatedData['attestation_obtenu']== 'oui' ? 1 : 0;
        $stage->projet_deposer = $validatedData['projet_deposer']== 'oui' ? 1 : 0;
        $stage->save();
    
       

        return redirect('/stage/index')->with('success','votre stage a été créer.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $stage_id)
    {
       
        $stage = Stage::find($stage_id);
        $stagiaires = Stagiaire::all();
        return view('stage.edit', compact('stage', 'stagiaires'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $stage_id)
    {
        //$stage = Stagiaire::findOrFail($request->stagiaire_id)->taches()->where('id',$stage_id)->first();
     
        
        $request->validate([
            'stagiaire_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'rapport_de_stage_deposer' => 'required',
            'attestation_obtenu' => 'required',
            'projet_deposer' => 'required',
           
        ]);

        $stage = Stage::find($stage_id);
        $stage->stagiaire_id = $request->input('stagiaire_id');
        $stage->date_debut = $request->input('date_debut');
        $stage->date_fin = $request->input('date_fin');
        $stage->note_stage = $request->input('note_stage');
        $stage->appreciation = $request->input('appreciation');
        $stage->rapport_de_stage = $request->input('rapport_de_stage');
        $stage->rapport_de_stage_deposer = $request->input('rapport_de_stage_deposer');
        $stage->attestation_obtenu = $request->input('attestation_obtenu');
        $stage->projet_deposer = $request->input('projet_deposer');
        

        if ($request->hasFile('rapport_de_stage')) {
            $file = $request->file('rapport_de_stage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/rapport_de_stage/', $filename);
             $stage->rapport_de_stage=$filename;
            
        } 
        $stage->save();
        return redirect('/stage/index')->with('success','le stage a été modifié.');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $stage_id)
    {
        Stage::findOrFail($stage_id)->delete();
        return redirect('/stage/index')->with('success','votre stage a été supprimé');
    }

    public function pdf(string $stage_id){
        $stage = Stage::find($stage_id);
        view()->share('stage', $stage);
         $pdf = PDF::loadView('stage/attestation', array('pdf' => $stage))->setPaper('a4', 'landscape');;
        return $pdf->download('Attestation de stage.pdf');
}
}