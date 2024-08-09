<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Inventory Ekle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Yeni Inventory Ekle</h1>

    <form action="{{ isset($inventory) ? route('inventory.update', $inventory->inventory_id) : route('inventory.store') }}" method="POST">
    @csrf
    @if(isset($inventory))
        @method('PUT')
    @endif

    <label for="serial_num">Seri Numarası:</label>
    <input type="text" name="serial_num" id="serial_num" value="{{ old('serial_num', $inventory->serial_num ?? '') }}" required><br>

    <label for="name">İsim:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $inventory->name ?? '') }}" required><br>

    <label for="attribute">Özellik:</label>
    <input type="text" name="attribute" id="attribute" value="{{ old('attribute', $inventory->attribute ?? '') }}"><br>

    <label for="vendor">Üretici:</label>
    <select name="vendor" id="vendor" required>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ old('vendor', $inventory->vendor ?? '') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
        <!-- <option value="1">21313</option> -->
    </select><br>

    <label for="supplier">Tedarikçi:</label>
    <select name="supplier" id="supplier" required>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ old('supplier', $inventory->supplier ?? '') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
    </select><br>

    <label for="brand_id">Marka:</label>
    <select name="brand_id" id="brand_id" required>
        @foreach($brands as $brand)
            <option value="{{ $brand->brand_id }}" {{ old('brand_id', $inventory->brand_id ?? '') == $brand->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
        @endforeach
    </select><br>

    <label for="model_id">Model:</label>
    <select name="model_id" id="model_id" required>
        @foreach($models as $model)
            <option value="{{ $model->model_id }}" {{ old('model_id', $inventory->model_id ?? '') == $model->model_id ? 'selected' : '' }}>{{ $model->name }}</option>
        @endforeach
    </select><br>

    <label for="purchase_date">Satın Alma Tarihi:</label>
    <input type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $inventory->purchase_date ?? '') }}" required><br>

    <label for="contract_id">Sözleşme:</label>
    <select name="contract_id" id="contract_id">
        @foreach($contracts as $contract)
            <option value="{{ $contract->contract_id }}" {{ old('contract_id', $inventory->contract_id ?? '') == $contract->contract_id ? 'selected' : '' }}>{{ $contract->contract_vendor }}</option>
        @endforeach
    </select><br>

    <label for="warranty_end_date">Garanti Bitiş Tarihi:</label>
    <input type="date" name="warranty_end_date" id="warranty_end_date" value="{{ old('warranty_end_date', $inventory->warranty_end_date ?? '') }}"><br>

    <label for="maintenance_start_date">Bakım Başlangıç Tarihi:</label>
    <input type="date" name="maintenance_start_date" id="maintenance_start_date" value="{{ old('maintenance_start_date', $inventory->maintenance_start_date ?? '') }}"><br>

    <label for="maintenance_end_date">Bakım Bitiş Tarihi:</label>
    <input type="date" name="maintenance_end_date" id="maintenance_end_date" value="{{ old('maintenance_end_date', $inventory->maintenance_end_date ?? '') }}"><br>

    <label for="accounting_registration_date">Muhasebe Kayıt Tarihi:</label>
    <input type="date" name="accounting_registration_date" id="accounting_registration_date" value="{{ old('accounting_registration_date', $inventory->accounting_registration_date ?? '') }}"><br>

    <label for="product_owner_id">Ürün Sahibi:</label>
    <select name="product_owner_id" id="product_owner_id">
        @foreach($owners as $owner)
            <option value="{{ $owner->id }}" {{ old('product_owner_id', $inventory->product_owner_id ?? '') == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
        @endforeach
    </select><br>

    <label for="product_organization_id">Ürün Organizasyon:</label>
    <select name="product_organization_id" id="product_organization_id">
        @foreach($organizations as $organization)
            <option value="{{ $organization->id }}" {{ old('product_organization_id', $inventory->product_organization_id ?? '') == $organization->id ? 'selected' : '' }}>{{ $organization->name }}</option>
        @endforeach
    </select><br>

    <label for="status">Durum:</label>
    <select name="status" id="status" required>
        <option value="0" {{ old('status', $inventory->status ?? '') == '0' ? 'selected' : '' }}>depoda</option>
        <option value="1" {{ old('status', $inventory->status ?? '') == '1' ? 'selected' : '' }}>kullanımda</option>
        <option value="2" {{ old('status', $inventory->status ?? '') == '2' ? 'selected' : '' }}>bekelemede</option>
    </select><br>

    <label for="type_id">Tür:</label>
    <select name="type_id" id="type_id" required>
        @foreach($types as $type)
            <option value="{{ $type->type_id }}" {{ old('type_id', $inventory->type_id ?? '') == $type->type_id ? 'selected' : '' }}>{{ $type->type_name }}</option>
        @endforeach
    </select><br>

    <label for="sub_type_id">Alt Tür:</label>
    <select name="sub_type_id" id="sub_type_id" required>
        @foreach($sub_types as $sub_type)
            <option value="{{ $sub_type->sub_type_id }}" {{ old('sub_type_id', $inventory->sub_type_id ?? '') == $sub_type->sub_type_id ? 'selected' : '' }}>{{ $sub_type->sub_type_name }}</option>
        @endforeach
    </select><br>

    <button type="submit">{{ isset($inventory) ? 'Güncelle' : 'Oluştur' }}</button>
</form>

</body>
</html>
