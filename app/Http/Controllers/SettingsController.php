<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;


class SettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('settings.index', compact('user'));
    }
    public function create()

    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $request)

    {

        $user = auth()->user();

        return view('settings.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request)
     {
         $user = auth()->user();
     
         $request->validate([
             'name' => 'required|string',
             'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
             'password' => 'required|confirmed',
         ]);
     
         User::find($user->id)->update([
             'nom' => $request->input('name'),
             'email' => $request->input('email'),
             'password' => Hash::make($request->input('password'))
         ]);
     
         return redirect()->back()->with('success', 'Les informations de administrateur ont été mises à jour avec succès.');
     }
     


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $request)
    {
    }
}
