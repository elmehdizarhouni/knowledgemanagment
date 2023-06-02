<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Competence;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function create(Employe $employe, Competence $competence)
    {
        // Votre logique pour vérifier l'autorisation d'accès

        return view('Evaluations.create', compact('employe', 'competence'));
    }

    public function store(Request $request, Employe $employe, Competence $competence)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'note' => 'required',
            'commentaire' => 'required',
        ]);

        // Créer une nouvelle évaluation
        $evaluation = new Evaluation;
        $evaluation->note = $request->note;
        $evaluation->commentaire = $request->commentaire;
        $evaluation->id_employe = $employe->id;
        $evaluation->competence_id = $competence->id;
        // Assurez-vous d'ajuster l'ID de l'évaluateur en fonction de votre logique d'authentification
        $evaluation->evaluateur_id = Auth::user()->id;
        $evaluation->save();

        // Rediriger vers la page de détails de l'employé avec un message de succès
        return redirect()->route('Employe.show', $employe)->with('success', 'Évaluation ajoutée avec succès.');
    }

    public function edit(Employe $employe, Competence $competence, Evaluation $evaluation)
    {
        // Votre logique pour vérifier l'autorisation d'accès

        return view('Evaluations.edit', compact('employe', 'competence', 'evaluation'));
    }

    public function update(Request $request, Employe $employe, Competence $competence, Evaluation $evaluation)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'note' => 'required',
            'commentaire' => 'required',
            
        ]);

        // Mettre à jour les informations de l'évaluation
        $evaluation->note = $request->note;
        $evaluation->commentaire = $request->commentaire;
        $evaluation->save();

        // Rediriger vers la page de détails de l'employé avec un message de succès
        return redirect()->route('Employe.show', $employe)->with('success', 'Évaluation mise à jour avec succès.');
    }

    public function destroy(Employe $employe, Competence $competence, Evaluation $evaluation)
    {
        // Votre logique pour vérifier l'autorisation d'accès

        // Supprimer l'évaluation
        $evaluation->delete();

        // Rediriger vers la page de détails de l'employé avec un message de succès
        return redirect()->route('Employe.show', $employe)->with('success', 'Évaluation supprimée avec succès.');
    }
}
