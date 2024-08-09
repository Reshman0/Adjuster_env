<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marka Düzenle</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; }
        form { display: flex; flex-direction: column; }
        label { margin: 10px 0 5px; }
        input { padding: 10px; margin-bottom: 10px; }
        button { padding: 10px; background-color: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Marka Düzenle</h1>
        <form action="{{ route('brands.update', $brand->brand_id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Marka Adı:</label>
            <input type="text" name="name" id="name" value="{{ $brand->name }}" required>

            <label for="company_id">Şirket:</label>
            <select name="company_id" id="company_id" >
            @foreach($companies as $company)
                <option value="{{ $company->company_id }}" {{ $company->company_id == $brand->company_id ? 'selected' : '' }}>
                {{ $company->name }}
                </option>
            @endforeach
            </select>
            <br>
            <button type="submit">Güncelle</button>
        </form>
    </div>
</body>
</html>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marka Düzenle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .form-group input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #218838;
        }
        .form-group .btn-back {
            margin-right: 10px;
            background-color: #6c757d;
            color: #fff;
        }
        .form-group .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Marka Düzenle</h1>
        <form action="{{ url('brands/' . $brand->brand_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Marka Adı</label>
                <input type="text" id="name" name="name" value="{{ $brand->name }}" required>
            </div>
            <div class="form-group">
                <label for="company_id">Şirket</label>
                <select id="company_id" name="company_id" required>
                @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ $company->id == $brand->company_id ? 'selected' : '' }}>
                    {{ $company->name }}
            </option>
        @endforeach
    </select>
</div>


            <div class="form-group">
                <a href="{{ url('brands') }}" class="btn btn-back">Geri Dön</a>
                <input type="submit" value="Güncelle">
            </div>
        </form>
    </div>
</body>
</html>
-->