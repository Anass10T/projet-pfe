<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use PDF;

class StagiaireController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaire.index', ['stagiaires' => $stagiaires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $stagiaire = Stagiaire::where('user_id', $user->id)->first();
    
        if ($stagiaire) {
            return redirect()->route('stagiaire.profile', ['id' => $stagiaire->id]);
        }
    
        return view('stagiaire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   
     public function store(Request $request)
{
    $request->validate([
        'photo' => 'file|mimes:jpg,jpeg,png|required',
        'cv' => 'file|mimes:pdf,jpeg,png|required',
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'cin' => 'required||unique:stagiaire,cin',
        'email' => 'required|email|unique:stagiaire,email',
        'sexe' => 'required',
        'telephone' => 'required',
        'etablissement' => 'required|string',
        'filiere' => 'required|string',
        'encadrant' => 'required|string',
        'niveau_etude' => 'required|in:Bac+1,Bac+2,Bac+3,Bac+4,Bac+5 et plus',
        'diplome_prepare' => 'required|string',
        'motivation' => 'required|string',
        'adresse'  => 'required|string'    ]);

    $stagiaire = new Stagiaire();

    $stagiaire->nom = $request->input('nom');
    $stagiaire->prenom = $request->input('prenom');
    $stagiaire->user_id = Auth::user()->id;
    $stagiaire->cin = $request->input('cin');
    $stagiaire->email = $request->input('email');
    $stagiaire->sexe = $request->input('sexe');
    $stagiaire->adresse = $request->input('adresse');
    $stagiaire->encadrant = $request->input('encadrant');
    $stagiaire->telephone = $request->input('telephone');
    $stagiaire->etablissement = $request->input('etablissement');
    $stagiaire->filiere = $request->input('filiere');
    $stagiaire->cv = $request->input('cv');
    $stagiaire->niveau_etude = $request->input('niveau_etude');
    $stagiaire->diplome_prepare = $request->input('diplome_prepare');
    $stagiaire->motivation = $request->input('motivation');

    if ($request->hasFile('cv')) {
        $file = $request->file('cv');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/cv/', $filename);
        $stagiaire->cv = $filename;
    } else {
        return redirect()->back()->with('error', 'Veuillez télécharger votre CV');
    }

    
    
    if($request->hasfile('photo'))
    {
        $file = $request->file('photo');
        $extenstion = $file->guessExtension();
        $filename = time().'.'.$extenstion;
        $file->move('uploads/stagiaires/', $filename);
        $stagiaire->photo = $filename;
    }

    $stagiaire->save();

    return redirect()->route('stagiaire.profile', ['id' => $stagiaire->id]);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        
        if ($stagiaire->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        
        return view('stagiaire.profile', ['stagiaire' => $stagiaire]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stagiaire = Stagiaire::find($id);
        return view('stagiaire.edit', compact('stagiaire'));

    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
    
        $stagiaire->nom = $request->input('nom');
        $stagiaire->prenom = $request->input('prenom');
        $stagiaire->cin = $request->input('cin');
        $stagiaire->email = $request->input('email');
        $stagiaire->adresse = $request->input('adresse');
        $stagiaire->encadrant = $request->input('encadrant');
        $stagiaire->telephone = $request->input('telephone');
        $stagiaire->sexe = $request->input('sexe');
        $stagiaire->etablissement = $request->input('etablissement');
        $stagiaire->filiere = $request->input('filiere');
        $stagiaire->niveau_etude = $request->input('niveau_etude');
        $stagiaire->diplome_prepare = $request->input('diplome_prepare');
        $stagiaire->motivation = $request->input('motivation');
    
        $stagiaire->save();
    
         return redirect()->route('stagiaire.profile', ['id' => $stagiaire->id])->with('success', 'Les informations du stagiaire ont été mises à jour avec succès.');
    
    
        
    
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $stagiaire = Stagiaire::findOrFail($id);
    $stagiaire->forceDelete();

    return redirect()->back();
}


    
    

    public function pdf($id){
        $stagiaire = Stagiaire::findOrFail($id);
        view()->share('stagiaire', $stagiaire);
        //  $pdf = PDF::loadView('pdf',$stagiaire);
         $pdf = PDF::loadView('stagiaire.pdf', array('pdf' => $stagiaire));
        return $pdf->download($stagiaire->nom . '_' . $stagiaire->prenom . '.pdf');
}

public function modify(Request $request,string $id){
    $stagiaire = Stagiaire::findOrFail($id);
    
    $stagiaire->nom = $request->input('nom');
    $stagiaire->prenom = $request->input('prenom');
    $stagiaire->cin = $request->input('cin');
    $stagiaire->email = $request->input('email');
    $stagiaire->adresse = $request->input('adresse');
    $stagiaire->encadrant = $request->input('encadrant');
    $stagiaire->telephone = $request->input('telephone');
    $stagiaire->sexe = $request->input('sexe');
    $stagiaire->etablissement = $request->input('etablissement');
    $stagiaire->filiere = $request->input('filiere');
    $stagiaire->niveau_etude = $request->input('niveau_etude');
    $stagiaire->diplome_prepare = $request->input('diplome_prepare');
    $stagiaire->motivation = $request->input('motivation');
    $stagiaire->statut = $request->input('statut');


    $stagiaire->save();

     return redirect()->route('stagiaire.index',['id' => $stagiaire->id])->with('success', 'Les informations du stagiaire ont été mises à jour avec succès.');
}

public function change(string $id)
{
    $stagiaire = Stagiaire::find($id);
    return view('stagiaire.change', compact('stagiaire'));

}

public function archives()
{
    $archives = Stagiaire::onlyTrashed()->get();
    return view('stagiaire.archives', ['archives' => $archives]);
}

public function archive($id)
{
    $stagiaire = Stagiaire::find($id);
    $stagiaire->delete();

    return redirect()->route('stagiaire.index');
}

public function restore($id)
{
    $stagiaire = Stagiaire::withTrashed()->find($id);
    $stagiaire->restore();

    return redirect()->route('stagiaire.archives');
}
}