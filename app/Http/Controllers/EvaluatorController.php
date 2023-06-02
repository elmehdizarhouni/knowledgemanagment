<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Evaluateur;
use App\Models\Poste;
use App\Models\Formation;
use App\Models\Competence;
use App\Models\User;
class EvaluatorController extends Controller
{
    protected $employes;
    public function index()
    {
        $evaluateur = Evaluateur::all();

        return view('Evaluateur.index', compact('evaluateur'));
    }

    public function create()
    {$postes = Poste::all();
            
        return view('Employe.create', compact('postes'));
    }
    public function show($id)
{
    $employe = Employe::findOrFail($id);
    return view('Employe.show', compact('employe'));
}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'date_embauche' => 'required',
            'id_poste' => 'required',

        ]);
        $employe = new Employe;
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->adresse = $request->adresse;
        $employe->email = $request->email;
        $employe->telephone = $request->telephone;
        $employe->date_embauche = $request->date_embauche;
        $employe->id_poste = $request->id_poste;
        $employe->save();

        return redirect()->route('Employe.index')->with('success', 'employé a été créé avec succès.');
    }

    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        $postes = Poste::all();


        return view('Employe.edit', compact('employe','postes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'date_embauche' => 'required',
            'id_poste' => 'required',
        ]);

        $employe = Employe::findOrFail($id);
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->adresse = $request->adresse;
        $employe->email = $request->email;
        $employe->telephone = $request->telephone;
        $employe->date_embauche = $request->date_embauche;
        $employe->id_poste = $request->id_poste;
        $employe->save();

        return redirect()->route('Employe.index')->with('success', 'employé a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return redirect()->route('Employe.index')->with('success', 'employé a été supprimé avec succès.');
    }


public function dashboard()
{
    $employees = Employe::all();
    return view('evaluator.dashboard', compact('employees'));
}

}
