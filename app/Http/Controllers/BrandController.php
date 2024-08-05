<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Company;
class BrandController extends Controller
{
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|integer',
        ]);

        // Belirtilen ID'ye sahip markayı bulun ve güncelleyin
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->company_id = $request->company_id;
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }



public function edit($id)
{
    $brand = Brand::findOrFail($id);
    $companies = Company::all();

    return view('brands.edit', compact('brand', 'companies'));
}


    public function destroy($id)
{
    // İlgili marka kaydını bulun
    $brand = Brand::find($id);

    // Marka kaydı bulunamazsa, 404 hatası döndür
    if (!$brand) {
        return redirect()->route('brands.index')->withErrors(['Brand not found.']);
    }

    // Marka kaydını sil
    $brand->delete();

    // Silme işlemi başarılı olduğunda geri dönüş
    return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
}

    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        $companies = Company::all(); // Tüm şirketleri çek
        return view('brands.create', compact('companies'));
    }

    public function store(Request $request)
    {
        // Geçerlilik kontrolü
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,company_id',
        ]);

        // Yeni bir marka oluştur ve veritabanına kaydet
        Brand::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
        ]);

        // Başarılı ekleme sonrası yönlendirme
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }
}
