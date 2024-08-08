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

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf

        <label for="name">İsim:</label>
        <input type="text" id="name" name="name" required>

        <label for="brand">Marka:</label>
        <select id="brand" name="brand_id" required>
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <label for="model">Model:</label>
        <select id="model" name="model_id" required>
            @foreach ($models as $model)
                <option value="{{ $model->model_id }}">{{ $model->name }}</option>
            @endforeach
        </select>

        <label for="type">Tür:</label>
        <select id="type" name="type_id" required>
            @foreach ($types as $type)
                <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
            @endforeach
        </select>

        <label for="sub_type">Alt Tür:</label>
        <select id="sub_type" name="sub_type_id" required>
            @foreach ($subTypes as $sub_type)
                <option value="{{ $sub_type->sub_type_id }}">{{ $sub_type->sub_type_name }}</option>
            @endforeach
        </select>

        <button type="submit">Kaydet</button>
    </form>
</body>
</html>
