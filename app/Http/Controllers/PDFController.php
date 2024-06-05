<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Invoice;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadPDF(Invoice $invoice)
    {
        $pdf = PDF::loadView('factures.pdf', compact('facture'));
        return $pdf->download('facture_'.$invoice->id.'.pdf');
    }
}
