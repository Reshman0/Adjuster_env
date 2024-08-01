<!-- resources/views/sub_types/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alt Tür Düzenle</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; }
        form { display: flex; flex-direction: column; }
        label { margin: 10px 0 5px; }
        input, select, textarea { padding: 10px; margin-bottom: 10px; }
        button { padding: 10px; background-color: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alt Tür Düzenle</h1>
        <form action="{{ url('sub_types/' . $sub_type->sub_type_id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="upper_type_id">Üst Tür:</label>
            <select name="upper_type_id" id="upper_type_id" required>
                @foreach($types as $type)
                    <option value="{{ $type->type_id }}" {{ $type->type_id == $sub_type->upper_type_id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
            <label for="sub_type_name">Alt Tür Adı:</label>
            <input type="text" name="sub_type_name" id="sub_type_name" value="{{ $sub_type->sub_type_name }}" required>

            <label for="sub_type_description">Açıklama:</label>
            <textarea name="sub_type_description" id="sub_type_description" required>{{ $sub_type->sub_type_description }}</textarea>

            <button type="submit">Güncelle</button>
        </form>
    </div>
</body>
</html>
