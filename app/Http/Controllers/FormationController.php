<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function create(Employe $employe)
    {
        return view('formations.create', compact('employe'));
    }

    public function store(Request $request, Employe $employe)
    {
        // Validation des données et création de la formation
        
        $employe->formations()->create([
            'nom_formation' => $request->input('nom_formation'),
            'description_formation' => $request->input('description_formation'),
        ]);
        
        return redirect()->route('Employe.show', $employe)->with('success', 'La formation a été créée avec succès.');
    }

    public function edit(Employe $employe, Formation $formation)
    {
        return view('formations.edit', compact('employe', 'formation'));
    }

    public function update(Request $request, Employe $employe, Formation $formation)
    {
        // Validation des données et mise à jour de la formation
        
        $formation->update([
            'nom_formation' => $request->input('nom_formation'),
            'description_formation' => $request->input('description_formation'),
        ]);
        
        return redirect()->route('Employe.show', $employe)->with('success', 'La formation a été mise à jour avec succès.');
    }

    public function destroy(Employe $employe, Formation $formation)
    {
        $formation->delete();
        
        return redirect()->route('Employe.show', $employe)->with('success', 'La formation a été supprimée avec succès.');
    }
}

/*namespace App\Http\Controllers;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    
     * Display a listing of the resource.
     
    public function index()
    {
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     
    public function create()
    {
        return view('formations.create');
    }

    /**
     * Store a newly created resource in storage.
     
    public function store(Request $request)
    {
        $formation = Formation::create($request->all());
        return redirect()->route('formations.index');
    }

    
     * Display the specified resource.
     
    public function show(string $id)
    {
        return view('formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     
    public function edit(string $id)
    {
        return view('formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     
    public function update(Request $request, string $id)
{
    $formation = Formation::findOrFail($id);
    $formation->update($request->all());
    return redirect()->route('formations.index');
}

    /**
     * Remove the specified resource from storage.
     
    public function destroy(string $id)
    {
        //
    }
}*/
