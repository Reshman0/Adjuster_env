<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
class DB_Operations extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        Employee::create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('employees', compact('employees'));
    }
}
