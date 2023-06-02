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
use Barryvdh\DomPDF\Facade\Pdf;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employe_count = Employe::count();
        $post_count = Poste::count();
        $evaluateur_count = Evaluateur::count();
    
        return view('home', compact('employe_count', 'post_count', 'evaluateur_count'));
    }
    
}
