<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = DB::table('stagiaires')->paginate(10);
        return view('stagiaires.index', compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stagiaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'age' => 'required|integer|between:17,30',
            'email' => 'required|email|unique:stagiaires',
            'password' => 'required|string|min:8'
        ]);

        Stagiaire::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        return view('stagiaires.show', compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $stagiaire = Stagiaire::find($id);
        return view('stagiaires.edit', compact('stagiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $stagiaire = Stagiaire::find($id);

        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'age' => 'required|integer|between:17,30',

            // Unique email validation rule is applied to all records except the current record
            // The email field is unique in the stagiaires table, except for the current record
            'email' => 'required|email|unique:stagiaires,email,' . $stagiaire->id,
            'password' => 'required|string|min:8'
        ]);

        $stagiaire->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire supprimé avec succès');
    }

    public function deleteAll()
    {
        DB::table('stagiaires')->delete();
        return redirect()->route('stagiaires.index')->with('success', 'Tous les stagiaires ont été supprimés avec succès');
    }

    public function search(Request $request)
    {
        //$stagiaires = Stagiaire::where('nom', 'like', '%' . $request->search . '%')->get();
        $stagiaires = Stagiaire::where('nom', $request->search)->get();
        return view('stagiaires.index', compact('stagiaires'));
    }
    
}
