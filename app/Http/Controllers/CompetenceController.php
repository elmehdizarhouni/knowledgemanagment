<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function create(Employe $employe)
    {
        return view('competences.create', compact('employe'));
    }

    public function store(Request $request, Employe $employe)
    {
        // Validation des données et création de la compétence
        
        $employe->competences()->create([
            'nom competence' => $request->input('nom_competence'),
            'type' => $request->input('type'),
        ]);
        
        return redirect()->route('Employe.show', $employe)->with('success', 'La compétence a été créée avec succès.');
    }

    public function edit(Employe $employe, Competence $competence)
    {
        return view('competences.edit', compact('employe', 'competence'));
    }

    public function update(Request $request, Employe $employe, Competence $competence)
    {
        // Validation des données et mise à jour de la compétence
        
        $competence->update([
            'nom competence' => $request->input('nom_competence'),
            'type' => $request->input('type'),
        ]);
        
        return redirect()->route('Employe.show', $employe)->with('success', 'La compétence a été mise à jour avec succès.');
    }

    public function destroy(Employe $employe, Competence $competence)
    {
        $competence->delete();
        
        return redirect()->route('Employe.show', $employe)->with('success', 'La compétence a été supprimée avec succès.');
    }
}

