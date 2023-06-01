<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Competence;
use App\Models\Evaluateur;

class EvaluationController extends Controller
{

public function create()
{
    // Afficher le formulaire de création d'une nouvelle évaluation
    return view('evaluation.create');
}

public function store(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'id_employe' => 'required|exists:employes,id',
        'id_poste' => 'required|exists:postes,id',
        'id_competence' => 'required|exists:competences,id',
        'date_evaluation' => 'required|date',
        'note' => 'required|integer',
        'commentaire' => 'required|string',
        'id_evaluateur' => 'required|exists:evaluateurs,id',
    ]);

    // Créer une nouvelle évaluation avec les données validées
    $evaluation = Evaluation::create($validatedData);

    // Rediriger vers la page de détails de l'évaluation créée
    return redirect()->route('evaluations.show', $evaluation);
}


public function show(Evaluation $evaluation)
{
    // Afficher les détails de l'évaluation
    return view('evaluation.show', compact('evaluation'));
}


public function edit(Evaluation $evaluation)
{
    // Afficher le formulaire de modification de l'évaluation
    return view('evaluation.edit', compact('evaluation'));
}

public function update(Request $request, Evaluation $evaluation)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'id_employe' => 'required|exists:employes,id',
        'id_poste' => 'required|exists:postes,id',
        'id_competence' => 'required|exists:competences,id',
        'date_evaluation' => 'required|date',
        'note' => 'required|integer',
        'commentaire' => 'required|string',
        'id_evaluateur' => 'required|exists:evaluateurs,id',
    ]);

    // Mettre à jour l'évaluation avec les données validées
    $evaluation->update($validatedData);

    // Rediriger vers la page de détails de l'évaluation modifiée
    return redirect()->route('evaluations.show', $evaluation);
}
public function destroy(Evaluation $evaluation)
{
    // Supprimer l'évaluation
    $evaluation->delete();

    // Rediriger vers la liste des évaluations
    return redirect()->route('evaluations.index');
}

}
*/
