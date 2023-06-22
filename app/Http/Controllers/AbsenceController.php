<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absences = Absence::all();

    return view('absence.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stagiaires = Stagiaire::all();
        return view('absence.create', compact('stagiaires'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request['justification']);
      
          
              
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'stagiaire_id' => 'required|exists:stagiaire,id',
        'type_absence' => 'required',
        'date_absence' => 'required|date',
        'justification' => 'required',
    ]);

    // $justificationBoolean = $validatedData['justification']==="oui" ? 1 : 0;
    // Enregistrer les données de l'absence dans la base de données
    $absence = new Absence();
    $absence->stagiaire_id = $validatedData['stagiaire_id'];
    $absence->type_absence = $validatedData['type_absence'];
    $absence->date_absence = $validatedData['date_absence'];
    $absence->justification = $validatedData['justification'] == 'oui' ? 1 : 0;
    $absence->save();

    // Rediriger l'utilisateur vers la page de liste des absences avec un message de succès
    return redirect()->route('absence.index')->with('success', 'L\'absence a été enregistrée avec succès.');
}

              
               
                // $absence->date_absence = $request->input('date_absence');
                // $absence->type_absence = $request->input('type_absence');
                // $absence->justification = $request->input('justification');
                // $absence->stagiaire_id = $request->input('stagiaire_id');
              
                // $absence->save();
            
                // Rediriger vers la liste des absences
              
            

    

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
    public function edit(string $absence_id)
    {
        $absence = Absence::find($absence_id);
        $stagiaires = Stagiaire::all();
        return view('absence.edit', compact('absence', 'stagiaires'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $absence_id)
    {
      
            $request->validate([
                'stagiaire_id' => 'required',
                'type_absence' => 'required',
                'date_absence' => 'required',
                'justification' => 'required'
            ]);
    
            $absence = Absence::find($absence_id);
            $absence->stagiaire_id = $request->input('stagiaire_id');
            $absence->type_absence = $request->input('type_absence');
            $absence->date_absence = $request->input('date_absence');
            $absence->justification = $request->input('justification');
            $absence->save();
    
            return redirect()->route('absence.index')
                ->with('success','Absence modifiée avec succès.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Absence::findOrFail($id)->delete();
        return redirect('/absence/index')->with('success','votre absence a été supprimé.');
       
    
    }
}