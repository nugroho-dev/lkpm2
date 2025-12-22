<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfDashboardDownload extends Controller
{
    public function viewpdf()
    {
        //get all users
        //$users = $this->user->get();
        // load view for pdf 
        //return view('dashboard.laporan.laporan');
        $pdf = Pdf::loadView('dashboard.laporan.laporan');
        // stream pdf on browser
        return $pdf->download('invoice.pdf');
    }
}
