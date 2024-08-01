<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alt Türler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-add {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-add:hover {
            background-color: #0056b3;
        }
        .actions a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alt Türler</h1>
        <a href="{{ url('sub_types/create') }}" class="btn-add">Alt Tür Ekle</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Üst Tür</th>
                    <th>Alt Tür Adı</th>
                    <th>Açıklama</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sub_types as $sub_type)
                    <tr>
                        <td>{{ $sub_type->sub_type_id }}</td>
                        <td>{{ $sub_type->upperType->type_name }}</td>
                        <td>{{ $sub_type->sub_type_name }}</td>
                        <td>{{ $sub_type->sub_type_description }}</td>
                        <td class="actions">
                            <a href="{{ url('sub_types/' . $sub_type->sub_type_id . '/edit') }}">Düzenle</a>
                            <form action="{{ url('sub_types/' . $sub_type->sub_type_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none;border:none;color:#007bff;cursor:pointer;padding:0;">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a>
    </div>
    
</body>
</html>
