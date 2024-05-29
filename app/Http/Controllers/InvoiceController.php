<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoicelist()
    {
        // Assurez-vous de filtrer uniquement les utilisateurs ayant le rôle 'client'
        $invoices = Invoice::all();
        return view('admin.invoicelist', compact('invoices'));
    }
}
