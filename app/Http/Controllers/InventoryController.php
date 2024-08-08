<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Brand;
use App\Models\ModelM; // 'Model' yerine 'ModelM' kullandığınız varsayımıyla
use App\Models\Type;
use App\Models\SubType;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::with(['brand', 'model', 'type', 'subType'])->get();
        return view('inventory.index', compact('inventory'));
    }

    public function create()
    {
        $brands = Brand::all();
        $models = ModelM::all(); // 'ModelM' olarak kullanıyoruz
        $types = Type::all();
        $subTypes = SubType::all();
        
        return view('inventory.create', compact('brands', 'models', 'types', 'subTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_num' => 'required|integer',
            'name' => 'required|string|max:255',
            'brand' => 'required|integer|exists:brands,brand_id',
            'model' => 'required|integer|exists:models,model_id',
            'type' => 'required|integer|exists:types,type_id',
            'sub_type' => 'required|integer|exists:sub_types,sub_type_id',
        ]);

        Inventory::create([
            'serial_num' => $request->serial_num,
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'type' => $request->type,
            'sub_type' => $request->sub_type,
            // Diğer alanlar da burada eklenebilir
        ]);

        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        $brands = Brand::all();
        $models = ModelM::all();
        $types = Type::all();
        $subTypes = SubType::all();
        
        return view('inventory.edit', compact('inventory', 'brands', 'models', 'types', 'subTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_num' => 'required|integer',
            'name' => 'required|string|max:255',
            'brand' => 'required|integer|exists:brands,brand_id',
            'model' => 'required|integer|exists:models,model_id',
            'type' => 'required|integer|exists:types,type_id',
            'sub_type' => 'required|integer|exists:sub_types,sub_type_id',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->serial_num = $request->serial_num;
        $inventory->name = $request->name;
        $inventory->brand = $request->brand;
        $inventory->model = $request->model;
        $inventory->type = $request->type;
        $inventory->sub_type = $request->sub_type;
        // Diğer alanlar da burada güncellenebilir
        $inventory->save();

        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }
}
