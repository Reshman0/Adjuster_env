<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Brands</h1>
        <a href="{{ url('/brands/create') }}" class="btn btn-primary mb-3">Add New Brand</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->brand_id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->company_id }}</td>
                    <td>
                        <a href="{{ url('/brands/edit/' . $brand->brand_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/brands/' . $brand->brand_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
