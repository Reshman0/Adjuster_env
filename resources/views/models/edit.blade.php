<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model Düzenle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Model Düzenle</h1>
    <form action="{{ route('models.update', $model->model_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="brand_id">Marka:</label>
        <select name="brand_id" id="brand_id" required>
            @foreach($brands as $brand)
                <option value="{{ $brand->brand_id }}" {{ $brand->brand_id == $model->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="name">Model Adı:</label>
        <input type="text" name="name" id="name" value="{{ $model->name }}" required>
        <br>
        <button type="submit">Güncelle</button>
    </form>
    <a href="{{ route('models.index') }}">Geri Dön</a>
</body>
</html>
