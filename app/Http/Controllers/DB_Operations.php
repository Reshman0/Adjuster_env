<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
use App\Models\Organization;
class DB_Operations extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('addEmployee');
    }

    public function getEmployees()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function store(Request $request)
{
    $employee = new Employee();
    $employee->name = $request->input('name');
    $employee->surname = $request->input('surname');
    $employee->sicil = $request->input('sicil');
    $employee->organization_unit = $request->input('organization_unit');
    $employee->phone_num = $request->input('phone_num');
    $employee->e_mail = $request->input('e_mail');
    $employee->duty = $request->input('duty');

    $employee->save();

    return redirect()->route('employees')->with('success', 'Employee added successfully.');
}
public function createOrganization()
{
    $organizations = Organization::all();
    return view('createOrganization', compact('organizations'));
}

public function storeOrganization(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'adress' => 'required|string|max:255',
        'phone_num' => 'required|numeric',
        'e_mail' => 'required|email',
        'upper_organization' => 'nullable|integer|exists:organization,organization_id',
    ]);

    $organization = new Organization();
    $organization->name = $request->name;
    $organization->adress = $request->adress;
    $organization->phone_num = $request->phone_num;
    $organization->e_mail = $request->e_mail;
    $organization->upper_organization = $request->upper_organization;
    $organization->save();

    return redirect()->route('createOrganization')->with('success', 'Organization added successfully!');
}
public function indexOrganization()
{
    $organizations = Organization::all();
    return view('indexOrganization', compact('organizations'));
}


   
}
