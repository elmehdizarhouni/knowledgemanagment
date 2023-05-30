<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Formation;
use App\Models\Competence;


class EmployeController extends Controller
{
    protected $employes;

    public function __construct()
    {
        $this->employes = Employe::all();
    }
    public function index()
    {
        $employes = Employe::all();

        return view('Employe.index', compact('employes'));
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
    public function createFormation(Employe $employe)
{
    return view('formations.create', compact('employe'));
}

public function storeFormation(Request $request, Employe $employe)
{
    $formation = new Formation([
        'nom_formation' => $request->input('nom_formation'),
        'description_formation' => $request->input('description_formation'),
    ]);
    
    $employe->formations()->save($formation);
    
    return redirect()->route('Employe.show', $employe)
                    ->with('success', 'La formation a été créée avec succès.');
}

public function editFormation(Employe $employe, Formation $formation)
{
    return view('formations.edit', compact('employe', 'formation'));
}

public function updateFormation(Request $request, Employe $employe, Formation $formation)
{
    $formation->update([
        'nom_formation' => $request->input('nom_formation'),
        'description_formation' => $request->input('description_formation'),
    ]);
    
    return redirect()->route('Employe.show', $employe->id)
    ->with('success', 'La formation a été mise à jour avec succès.');
}

public function destroyFormation(Employe $employe, Formation $formation)
{
    $formation->delete();
    return redirect()->route('Employe.show', $employe->id)
                    ->with('success', 'La formation a été supprimée avec succès.');
}

public function createCompetence(Employe $employe)
{
    return view('competences.create', compact('employe'));
}

public function storeCompetence(Request $request, Employe $employe)
{
    $competence = new Competence([
        'nom_competence' => $request->input('nom_competence'),
        'type' => $request->input('type'),
    ]);
    
    $employe->competences()->save($competence);
    
    return redirect()->route('Employe.show', $employe->id)
    ->with('success', 'La compétence a été créée avec succès.');
}

public function editCompetence(Employe $employe, Competence $competence)
{
    return view('competences.edit', compact('employe', 'competence'));
}

public function updateCompetence(Request $request, Employe $employe, Competence $competence)
{
    $competence->update([
        'nom_competence' => $request->input('nom_competence'),
        'type' => $request->input('type'),
    ]);
    
    return redirect()->route('Employe.show', $employe->id)
                    ->with('success', 'La compétence a été mise à jour avec succès.');
}

public function destroyCompetence(Employe $employe, Competence $competence)
{
    $competence->delete();
    
    return redirect()->route('Employe.show', $employe->id)
                    ->with('success', 'La compétence a été supprimée avec succès.');
}
}
