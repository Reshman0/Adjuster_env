<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubType;
use App\Models\Type;

class SubTypeController extends Controller
{
    
    public function index()
{
    // Tüm alt türleri veritabanından çek
    $sub_types = SubType::all();

    // Görünüm dosyasına veriyi ilet
    return view('sub_types.index', compact('sub_types'));
}


    public function create()
    {
        $types = Type::all();
        return view('sub_types.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'upper_type_id' => 'required|exists:type,type_id',
            'sub_type_name' => 'required',
            'sub_type_description' => 'nullable',
        ]);

        SubType::create($request->all());

        return redirect()->route('sub_types.index')->with('success', 'SubType created successfully.');
    }

    public function edit($id)
{
    // Verilen ID ile alt türü bul
    $sub_type = SubType::findOrFail($id);

    // Üst türlerin listesini al (üst türler dropdown için kullanılabilir)
    $types = Type::all();

    // Verileri view'e aktar
    return view('sub_types.edit', compact('sub_type', 'types'));
}

    // SubTypeController.php

public function update(Request $request, $id)
{
    $request->validate([
        'upper_type_id' => 'required|integer',
        'sub_type_name' => 'required|string|max:255',
        'sub_type_description' => 'required|string',
    ]);

    // Belirtilen ID'ye sahip alt türü bulun ve güncelleyin
    $sub_type = SubType::findOrFail($id);
    $sub_type->update([
        'upper_type_id' => $request->upper_type_id,
        'sub_type_name' => $request->sub_type_name,
        'sub_type_description' => $request->sub_type_description,
    ]);

    // Güncelleme başarılı olduğunda kullanıcıyı geri yönlendirin
    return redirect()->route('sub_types.index')->with('success', 'Alt Tür başarıyla güncellendi.');
}


    public function destroy($id)
    {
        $subType = SubType::findOrFail($id);
        $subType->delete();

        return redirect()->route('sub_types.index')->with('success', 'SubType deleted successfully.');
    }
}
