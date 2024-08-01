<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alt Tür Ekle</title>
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
        .form-group select,
        .form-group textarea {
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
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .form-group .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alt Tür Ekle</h1>
        <form action="{{ url('sub_types') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="upper_type_id">Tür Seçin</label>
                <select id="upper_type_id" name="upper_type_id" required>
                    @foreach($types as $type)
                        <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sub_type_name">Alt Tür Adı</label>
                <input type="text" id="sub_type_name" name="sub_type_name" required>
            </div>
            <div class="form-group">
                <label for="sub_type_description">Açıklama</label>
                <textarea id="sub_type_description" name="sub_type_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <a href="{{ url('sub_types') }}" class="btn-back">Geri Dön</a>
                <input type="submit" value="Ekle">
            </div>
        </form>
    </div>
</body>
</html>
