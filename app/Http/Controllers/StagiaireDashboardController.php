<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StagiaireDashboardController extends Controller
{
    public function index()
{
    $stagiaire = Auth::user();
    
   
    if (!$stagiaire->nom || !$stagiaire->prenom || !$stagiaire->telephone) {
        return redirect()->route('stagiaire.create');
    }
    
    return view('stagiaire.profile', ['stagiaire' => $stagiaire]);
}
}
