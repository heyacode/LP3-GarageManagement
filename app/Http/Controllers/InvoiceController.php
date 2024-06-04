<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;

use App\Models\Vehicle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoice', compact('invoices'));
    }
    public function addInvoice(Request $request)
    {
        $request->validate([
            'repairId' => 'required|string|max:255',
            'additionalCharges' => 'required|numeric',
            'totalAmount' => 'required|numeric',

        ]);

        $invoice = new Invoice;
        $invoice->repairId = $request->repairId;
        $invoice->additionalCharges = $request->additionalCharges;
        $invoice->totalAmount = $request->totalAmount;


        $invoice->save();
        return redirect()->route('admin.invoice')->with('success', 'invoice created successfully.');
    }
    public function updateInvoice(Request $request)
    {
        $request->validate([
            'repairId' => 'required',
            'additionalCharges' => 'required',
            'totalAmount' => 'required',

        ]);

        $invoice = Invoice::findOrFail($request->input('id'));
        $invoice->update([
            'repairId' => $request->repairId,
            'additionalCharges' => $request->additionalCharges,
            'totalAmount' => $request->totalAmount,
        ]);
        $invoice->save();
        return redirect()->route('admin.invoice')->with('success', 'invoice mis à jour avec succès.');
    }
    public function deleteInvoice(Request $request)
    {
        $invoiceId = $request->input('invoiceId');
        Invoice::destroy($invoiceId);
        return redirect()->route('admin.invoice')->with('success', 'invoice supprimé avec succès.');
    }


    public function showInvoice($id)
    {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return response()->json(['error' => 'invoice not found'], 404);
        }
        return response()->json([
            'html' => view('admin.invoice', compact('invoice'))->render()
        ]);
    }
}

