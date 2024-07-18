<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
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
   
}
