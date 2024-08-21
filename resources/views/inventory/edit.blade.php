<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Düzenle</title>
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
    <h1>Inventory Düzenle</h1>

    <form action="{{ route('inventory.update', $inventory->inventory_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="serial_num">Seri Numarası:</label>
        <input type="text" id="serial_num" name="serial_num" value="{{ $inventory->serial_num }}" required>

        <label for="name">İsim:</label>
        <input type="text" id="name" name="name" value="{{ $inventory->name }}" required>

        <label for="attribute">Özellik:</label>
        <input type="text" id="attribute" name="attribute" value="{{ $inventory->attribute }}">

        <label for="producer">Üretici:</label>
    <select name="producer" id="producer" required>
        @foreach($companies as $company)
            <option value="{{ $company->company_id }}" {{ old('producer', $inventory->producer ?? '') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
    </select><br>

    <label for="vendor">Tedarikçi:</label>
    <select name="vendor" id="vendor" required>
        @foreach($companies as $company)
            <option value="{{ $company->company_id }}" {{ old('vendor', $inventory->vendor ?? '') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
    </select><br>

        <label for="brand">Marka:</label>
        <select id="brand" name="brand_id" required>
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_id }}" {{ $brand->brand_id == $inventory->brand ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>

        <label for="model">Model:</label>
        <select id="model" name="model_id" required>
            @foreach ($models as $model)
                <option value="{{ $model->model_id }}" {{ $model->model_id == $inventory->model ? 'selected' : '' }}>{{ $model->name }}</option>
            @endforeach
        </select>

        <label for="type">Tür:</label>
        <select id="type" name="type_id" required>
            @foreach ($types as $type)
                <option value="{{ $type->type_id }}" {{ $type->type_id == $inventory->type ? 'selected' : '' }}>{{ $type->type_name }}</option>
            @endforeach
        </select>

        <label for="sub_type">Alt Tür:</label>
        <select id="sub_type" name="sub_type_id" required>
            @foreach ($sub_types as $sub_type)
                <option value="{{ $sub_type->sub_type_id }}" {{ $sub_type->sub_type_id == $inventory->sub_type ? 'selected' : '' }}>{{ $sub_type->sub_type_name }}</option>
            @endforeach
        </select>

        <label for="purchase_date">Satın Alma Tarihi:</label>
        <input type="date" id="purchase_date" name="purchase_date" value="{{ $inventory->purchase_date }}" required>

        <label for="contract_id">Sözleşme:</label>
    <select name="contract_id" id="contract_id">
        @foreach($contracts as $contract)
            <option value="{{ $contract->contract_id }}" {{ old('contract_id', $inventory->contract_id ?? '') == $contract->contract_id ? 'selected' : '' }}>{{ $contract->contract_vendor }}</option>
        @endforeach
    </select><br>
        <label for="warranty_end_date">Garanti Bitiş Tarihi:</label>
        <input type="date" id="warranty_end_date" name="warranty_end_date" value="{{ $inventory->warranty_end_date }}">

        <label for="maintenance_start_date">Bakım Başlangıç Tarihi:</label>
        <input type="date" id="maintenance_start_date" name="maintenance_start_date" value="{{ $inventory->maintenance_start_date }}">

        <label for="maintenance_end_date">Bakım Bitiş Tarihi:</label>
        <input type="date" id="maintenance_end_date" name="maintenance_end_date" value="{{ $inventory->maintenance_end_date }}">
        <label for="maintenance_contract_id">Bakım Sözleşmesi: </label>
    <select name="maintenance_contract_id" id="maintenance_contract_id">
        @foreach($contracts as $contract)
            <option value="{{ $contract->contract_id }}" {{ old('contract_id', $inventory->contract_id ?? '') == $contract->contract_id ? 'selected' : '' }}>{{ $contract->contract_vendor }}</option>
        @endforeach
    </select><br>
        <label for="accounting_registration_date">Muhasebe Kayıt Tarihi:</label>
        <input type="date" id="accounting_registration_date" name="accounting_registration_date" value="{{ $inventory->accounting_registration_date }}">

        <label for="product_owner_id">Ürün Sahibi:</label>
    <select name="product_owner_id" id="product_owner_id">
        @foreach($owners as $owner)
            <option value="{{ $owner->employee_id }}" {{ old('product_owner_id', $inventory->product_owner_id ?? '') == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
        @endforeach
    </select><br>
        <label for="product_organization_id">Ürün Organizasyon:</label>
    <select name="product_organization_id" id="product_organization_id">
        @foreach($organizations as $organization)
            <option value="{{ $organization->organization_id }}" {{ old('product_organization_id', $inventory->product_organization_id ?? '') == $organization->id ? 'selected' : '' }}>{{ $organization->name }}</option>
        @endforeach
    </select><br>

    <label for="status">Durum:</label>
    <select name="status" id="status" required>
        <option value="0" {{ old('status', $inventory->status ?? '') == '0' ? 'selected' : '' }}>Depoda</option>
        <option value="1" {{ old('status', $inventory->status ?? '') == '1' ? 'selected' : '' }}>Kullanımda</option>
        <option value="2" {{ old('status', $inventory->status ?? '') == '2' ? 'selected' : '' }}>Beklemede</option>
    </select><br>

    <label for="critical_degree">Kritik Derece:</label>
    <select name="critical_degree" id="critical_degree" required>
        <option value="0" {{ old('critical_degree', $inventory->critical_degree ?? '') == '0' ? 'selected' : '' }}>Normal</option>
        <option value="1" {{ old('critical_degree', $inventory->critical_degree ?? '') == '1' ? 'selected' : '' }}>Önemli</option>
        <option value="2" {{ old('critical_degree', $inventory->critical_degree ?? '') == '2' ? 'selected' : '' }}>Kritik</option>
    </select><br>
        <button type="submit">Güncelle</button>
    </form>
</body>
</html>
