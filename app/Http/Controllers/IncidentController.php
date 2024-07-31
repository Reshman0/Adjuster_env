<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;

class IncidentController extends Controller
{
    // Olayların listesini gösteren metod
    public function index()
    {
        $incidents = Incident::all();
        return view('incidents.index', compact('incidents'));
    }

    // Yeni olay ekleme formunu gösteren metod
    public function create()
    {
        return view('incidents.create');
    }

    // Yeni bir olayı kaydeden metod
    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|integer',
            'incident_date' => 'required|date',
            'incident_status' => 'required|integer',
            'incident_description' => 'required|string'
        ]);

        Incident::create($request->all());

        return redirect()->route('incidents.index')
                         ->with('success', 'Olay başarıyla eklendi.');
    }

    // Detay sayfasını gösteren metod
    public function show($id)
    {
        $incident = Incident::find($id);
        return view('incidents.show', compact('incident'));
    }
}
