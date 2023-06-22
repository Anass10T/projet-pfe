<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the appropriate dashboard based on user role.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        if (Auth::user()->role === 1) {
            return view('admin-dashboard');
        } elseif (Auth::user()->role === 2) {
            return view('stagiaire-dashboard');
        }
    }
}
