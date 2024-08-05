<?php

namespace App\Http\Controllers;
use App\Models\ModelM;
use App\Models\Brand;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    // Model listesi sayfası
    public function index()
    {
        $models = ModelM::with('brand')->get();
        return view('models.index', compact('models'));
    }

    // Model ekleme sayfası
    public function create()
    {
        $brands = Brand::all();
        return view('models.create', compact('brands'));
    }

    // Yeni model ekleme işlemi
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'name' => 'required|string',
        ]);

        ModelM::create($request->all());
        return redirect()->route('models.index')->with('success', 'Model başarıyla eklendi.');
    }

    // Model düzenleme sayfası
    public function edit($id)
    {
        $model = ModelM::findOrFail($id);
        $brands = Brand::all();
        return view('models.edit', compact('model', 'brands'));
    }

    // Model güncelleme işlemi
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required',
            'name' => 'required|string',
        ]);

        $model = ModelM::findOrFail($id);
        $model->update($request->all());
        return redirect()->route('models.index')->with('success', 'Model başarıyla güncellendi.');
    }

    // Model silme işlemi
    public function destroy($id)
    {
        $model = ModelM::findOrFail($id);
        $model->delete();
        return redirect()->route('models.index')->with('success', 'Model başarıyla silindi.');
    }
}
