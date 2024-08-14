<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f8f8f8;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Inventory Listesi</h1>

    <a href="{{ route('inventory.create') }}" class="button">Yeni Inventory Ekle</a>

    <table>
        <thead>
            <tr>

                <th>ID</th>
                <th>İsim</th>
                <th>Marka</th>
                <th>Model</th>
                <th>Tür</th>
                <th>Alt Tür</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($inventories as $inventory1)
            <tr>
                <td>{{ $inventory1->inventory_id }}</td>
                <td>{{ $inventory1->name }}</td>
                <td>{{ $inventory1->brand }}</td>
                <td>{{ $inventory1->model }}</td>
                <td>{{ $inventory1->type }}</td>
                <td>{{ $inventory1->sub_type }}</td>
                <td>
                    <a href="{{ route('inventory.edit', $inventory1->inventory_id) }}" class="button">Düzenle</a>
                    <form action="{{ route('inventory.destroy', $inventory1->inventory_id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                    </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
