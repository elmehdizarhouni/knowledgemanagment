<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Formation;
use App\Models\Competence;
use App\Models\Evaluation;
use App\Models\Evaluateur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class EmployeController extends Controller
{
    protected $employes;
    
    public function __construct()
    {
        $this->employes = Employe::all();
        $this->middleware('auth');
    }
    public function index()
    {
        $employes = Employe::all();
        $user = Auth::user();
        return view('Employe.index', compact('employes','user'));
    }

    public function create()
    {$postes = Poste::all();
            return view('Employe.create', compact('postes'));
    }
    public function show($id)
{
    $employe = Employe::findOrFail($id);
    $user = $employe->user;
    $competenceIds = $employe->competences->pluck('id')->toArray();
$evaluation= Evaluation::whereIn('id_competence', $competenceIds)->get();
    return view('Employe.show', compact('employe','user','evaluation'));
}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => 'required|unique:employes,email',
            'telephone' => 'required',
            'date_embauche' => 'required',
            'id_poste' => 'required',]);
        $employe = new Employe;
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->adresse = $request->adresse;
        $employe->email = $request->email;
        $employe->telephone = $request->telephone;
        $employe->date_embauche = $request->date_embauche;
        $employe->id_poste = $request->id_poste;
        $employe->save();
        $password = $employe->nom.'123';
        $employe->user()->create([
            'name'=>$employe->nom. ' ' . $employe->prenom,
            'email' => $employe->email,
            'password' => bcrypt($password),
            'type' => 'Employé'
        ])->save();
       
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
public function changePassword()
{
    return view('change-password');
}
public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::User();

    if (Hash::check($request->current_password, $user->password)) {
        $user->password = Hash::make($request->password);
    
    return redirect()->route('Employe.index')->with('success', 'Password updated successfully.');}
         else {
        return redirect()->back()->withErrors(['current_password' => 'Invalid current password.']);
    }
}
public function dashboard()
{
    $user = auth()->user();
    return view('employee.dashboard', compact('user'));
}
public function createEvaluation()
{
    $employes = Employe::all();
    $postes = Poste::all();
    $competences = Competence::all();
    $evaluateurs = Evaluateur::all();
    return view('evaluations.create',compact('employes', 'postes', 'competences', 'evaluateurs'));
}

public function storeEvaluation(Request $request)
{
    
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
    return redirect()->route('Employe.show', $evaluation);
}


public function showEvaluation(Evaluation $evaluation)
{
    // Afficher les détails de l'évaluation
    return view('evaluation.show', compact('evaluation'));
}


public function editEvaluation(Evaluation $evaluation)
{
    // Afficher le formulaire de modification de l'évaluation
    return view('evaluation.edit', compact('evaluation'));
}

public function updateEvaluation(Request $request, Evaluation $evaluation)
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
    return redirect()->route('Employe.show', $evaluation);
}
public function destroyEvaluation(Evaluation $evaluation)
{
    // Supprimer l'évaluation
    $evaluation->delete();

    // Rediriger vers la liste des évaluations
    return redirect()->route('Employe.show');
}


}
