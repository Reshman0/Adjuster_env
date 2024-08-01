<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
            'type_description' => 'required',
        ]);

        Type::create($request->all());
        

        return redirect()->route('types.index')->with('success', 'Type created successfully.');
    }
}
