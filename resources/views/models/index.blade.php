
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model Listesi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        a {
            text-decoration: none;
            color: #007bff;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        .success-message {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Model Listesi</h1>
    <a href="{{ route('models.create') }}">Yeni Model Ekle</a>
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marka</th>
                <th>Model Adı</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
                <tr>
                    <td>{{ $model->model_id }}</td>
                    <td>{{ $model->brand ? $model->brand->name : 'N/A' }}</td>
                    <td>{{ $model->name }}</td>
                    <td>
                        <a href="{{ route('models.edit', $model->model_id) }}">Düzenle</a>
                        <form action="{{ route('models.destroy', $model->model_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
