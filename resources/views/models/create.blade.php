<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Model Ekle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Yeni Model Ekle</h1>
    <form action="{{ route('models.store') }}" method="POST">
        @csrf
        <label for="brand_id">Marka:</label>
        <select name="brand_id" id="brand_id" required>
            @foreach($brands as $brand)
                <option value="{{ $brand->brand_id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="name">Model Adı:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <button type="submit">Ekle</button>
    </form>
    <a href="{{ route('models.index') }}">Geri Dön</a>
</body>
</html>
