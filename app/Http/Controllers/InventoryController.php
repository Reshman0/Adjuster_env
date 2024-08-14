<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Brand;
use App\Models\ModelM;
use App\Models\Contract;
use App\Models\Organization;
use App\Models\Type;
use App\Models\SubType;
use App\Models\Employee;
use App\Models\Company;
use Carbon\Carbon;

class InventoryController extends Controller
{
    public function index()
{
    // İlişkili tablolardan veri çekerken eager loading kullanmak
    $inventories = Inventory::with(['producer', 'vendor', 'brand', 'model', 'type', 'sub_type'])->get();

    // Verileri view'a göndermek
    return view('inventory.index', compact('inventories'));
}

    // public function index()
    // {
    //     $inventories = Inventory::all();
    //     return view('inventory.index', compact('inventories'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'serial_num' => 'required|int',
            'name' => 'required|string|max:255',
            // 'attribute' => 'nullable|integer', // 'attribute' integer olarak ayarlanmış
            // 'producer' => 'nullable|integer', // 'producer' integer olarak ayarlanmış
            // 'vendor' => 'required|integer', // 'vendor' integer olarak ayarlanmış
            // 'brand' => 'required|integer', // 'brand' integer olarak ayarlanmış
            // 'model' => 'required|integer', // 'model' integer olarak ayarlanmış
            // 'purchase_date' => 'required|date',
            // 'contract_id' => 'nullable|integer', // 'contract_id' integer olarak ayarlanmış
            // 'warranty_end_date' => 'nullable|date',
            // 'maintenance_start_date' => 'nullable|date',
            // 'maintenance_end_date' => 'nullable|date',
            // 'maintenance_contract_id' => 'nullable|integer', // 'maintenance_contract_id' integer olarak ayarlanmış 
            // 'accounting_registration_date' => 'nullable|date',
            // 'product_owner_id' => 'nullable|integer',
            // 'product_organization_id' => 'nullable|integer',
            // 'status' => 'required|integer', // 'status' integer olarak ayarlanmış
            // 'critical_degree' => 'nullable|integer',
            // 'type' => 'required|integer', // 'type' integer olarak ayarlanmış
            // 'sub_type' => 'required|integer', // 'sub_type' integer olarak ayarlanmış
        ]);
        
        //dd($request->all()); // Form gönderildi mi?
        //dd($request -> input('brand_id'));
        //dd($request -> input('producer'));
        //fix the date format
        $purchase_date = Carbon::createFromFormat('Y-m-d', $request->input('purchase_date'));
        //dd($request->all());
        $inventory = Inventory::create([
            'serial_num' => $request->input('serial_num'),
            'name' => $request->input('name'),
            'attribute' => $request->input('attribute'),
            'producer' => $request->input('producer'),
            'vendor' => $request->input('vendor'),
            'brand' => $request->input('brand_id'), // 'brand_id' yerine 'brand' olarak düzeltilmiş
            'model' => $request->input('model_id'), // 'model_id' yerine 'model' olarak düzeltilmiş
            'purchase_date' => $purchase_date,
            'contract_id' => $request->input('contract_id'),
            'warranty_end_date' => $request->input('warranty_end_date'),
            'maintenance_start_date' => $request->input('maintenance_start_date'),
            'maintenance_end_date' => $request->input('maintenance_end_date'),
            'maintenance_contract_id' => $request->input('maintenance_contract_id'),
            'accounting_registration_date' => $request->input('accounting_registration_date'),
            'product_owner_id' => $request->input('product_owner_id'),
            'product_organization_id' => $request->input('product_organization_id'),
            'status' => $request->input('status'),
            'critical_degree' => $request->input('critical_degree'),
            'type' => $request->input('type_id'), // 'type_id' yerine 'type' olarak düzeltilmiş
            'sub_type' => $request->input('sub_type_id'), // 'sub_type_id' yerine 'sub_type' olarak düzeltilmiş

        ]);
        
    }
    public function create()
    {
        $brands = Brand::all();
        $models = ModelM::all();
        $companies = Company::all();
        $contracts = Contract::all();
        $owners = Employee::all();
        $organizations = Organization::all();
        $types = Type::all();
        $sub_types = SubType::all();
        return view('inventory.create', compact('brands', 'models', 'companies','contracts', 'owners', 'organizations', 'types', 'sub_types'));
    }

    
    

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        $brands = Brand::all();
        $models = ModelM::all();
        $companies = Company::all();
        $contracts = Contract::all();
        $maintenance_contracts = Contract::all();
        $owners = Employee::all();
        $organizations = Organization::all();
        $types = Type::all();
        $sub_types = SubType::all();

        return view('inventory.edit', compact('inventory', 'brands', 'models', 'contracts', 'maintenance_contracts', 'owners', 'organizations', 'types', 'sub_types'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'serial_num' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'attribute' => 'nullable|string|max:255',
        'producer' => 'required|integer',  // Üretici artık bir integer olarak geliyor.
        'vendor' => 'required|integer',  // Tedarikçi artık integer tipinde.
        'brand_id' => 'required|integer',
        'model_id' => 'required|integer',
        'purchase_date' => 'required|date',
        'contract_id' => 'nullable|integer',
        'warranty_end_date' => 'nullable|date',
        'maintenance_start_date' => 'nullable|date',
        'maintenance_end_date' => 'nullable|date',
        'accounting_registration_date' => 'nullable|date',
        'product_owner_id' => 'nullable|integer',
        'product_organization_id' => 'nullable|integer',
        'status' => 'required|integer',
        'critical_degree' => 'nullable|integer',
        'type_id' => 'required|integer',
        'sub_type_id' => 'required|integer',
    ]);

    $inventory = Inventory::findOrFail($id);
    $inventory->update([
        'serial_num' => $request->input('serial_num'),
        'name' => $request->input('name'),
        'attribute' => $request->input('attribute'),
        'producer' => $request->input('producer'),
        'vendor' => $request->input('vendor'),
        'brand' => $request->input('brand_id'),
        'model' => $request->input('model_id'),
        'purchase_date' => $request->input('purchase_date'),
        'contract_id' => $request->input('contract_id'),
        'warranty_end_date' => $request->input('warranty_end_date'),
        'maintenance_start_date' => $request->input('maintenance_start_date'),
        'maintenance_end_date' => $request->input('maintenance_end_date'),
        'accounting_registration_date' => $request->input('accounting_registration_date'),
        'product_owner_id' => $request->input('product_owner_id'),
        'product_organization_id' => $request->input('product_organization_id'),
        'status' => $request->input('status'),
        'critical_degree' => $request->input('critical_degree'),
        'type_id' => $request->input('type_id'),
        'sub_type_id' => $request->input('sub_type_id'),
    ]);

    return redirect()->route('inventory.index')->with('success', 'Inventory başarıyla güncellendi.');
}


    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Inventory başarıyla silindi.');
    }
}
