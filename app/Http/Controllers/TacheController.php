<?php

namespace App\Http\Controllers;
use App\Models\Tache;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$taches = Tache::join('stagiaires', 'stagiaires.id', '=', 'taches.stagiaire_id')
        ->select('taches.*', 'stagiaires.nom', 'stagiaires.prenom')
        ->where('stagiaires.id', $id)
        ->get();*/

        $taches = Tache::all();
        return view('tache.index', compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $stagiaires = Stagiaire::all();
        return view('tache.create', compact('stagiaires'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
              ]);
    
        $stagiaire = Stagiaire::findOrFail($request->stagiaire_id);
     
        $stagiaire->taches()->create([

            'nom_tache' => $request->nom_tache,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,

        ]);
        return redirect('/tache/index')->with('success','votre tâche a été créer avec succès.');
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
    public function edit(string $tache)

    {
        
        
        $stagiaires = Stagiaire::all();
        $tache= Tache::findOrFail($tache);
        return view('tache.edit', compact('stagiaires','tache'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $tache_id)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
              ]);

       $tache = Stagiaire::findOrFail($request->stagiaire_id)->taches()->where('id',$tache_id)->first();
     
        

            $tache->nom_tache = $request->nom_tache;
            $tache->description = $request->description;
            $tache->date_debut = $request->date_debut;
            $tache->date_fin = $request->date_fin;
            $tache->update();

        
        return redirect('/tache/index')->with('success','votre tâche a été modifier.');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $tache_id)
    {
        Tache::findOrFail($tache_id)->delete();
        return redirect('/tache/index')->with('message','votre tâche a été supprimer.');
       
    
    }
}