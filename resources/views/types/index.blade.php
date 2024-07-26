<!-- resources/views/types/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Types</title>
</head>
<body>
    <h1>Types</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->type_id }}</td>
                    <td>{{ $type->type_name }}</td>
                    <td>{{ $type->type_description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button><a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a></button>
</body>
</html>
