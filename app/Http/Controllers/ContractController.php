<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Company;
use Carbon\Carbon;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('vendor')->get();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        $companies = Company::all(); // Tüm şirketleri alıyoruz
        //dd($companies);
        return view('contracts.create', compact('companies'));
    }

    public function store(Request $request)
{
    $request->validate([
        'contract_vendor' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
        'contract_doc' => 'required|file|mimes:pdf,doc,docx',
    ]);
    $path = $request->file('contract_doc')->store('contracts', 'public');
    
    // Tarih formatlamalarını kontrol edin ve uygun formata çevirin
    $startDate = Carbon::createFromFormat('Y-m-d', $request->get('start_date'));
    $endDate = $request->get('end_date') ? Carbon::createFromFormat('Y-m-d', $request->get('end_date')) : null;

    $contract = new Contract([
        'contract_vendor' => $request->get('contract_vendor'),
        'start_date' => $startDate,
        'end_date' => $endDate,
        'contract_doc' => $request->file('contract_doc')->store('contracts'), // Belgeyi saklamak için
    ]);

    $contract->save();

    return redirect('/contracts')->with('success', 'Contract saved!');
}

}
