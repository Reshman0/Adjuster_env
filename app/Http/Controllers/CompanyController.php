<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'phone_num' => 'required|numeric',
            'e_mail' => 'required|email',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->adress = $request->adress;
        $company->phone_num = $request->phone_num;
        $company->e_mail = $request->e_mail;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company added successfully!');
    }
}
