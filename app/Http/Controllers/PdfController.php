<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employe;

class PdfController extends Controller
{
    public function generatePDF($id)
    {
        $employe = Employe::find($id);


        $pdf = PDF::loadView('pdf.Employe', compact('employe'));

        return $pdf->download('Employe.pdf');
    }
}