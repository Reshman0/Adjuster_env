<!-- resources/views/types/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add New Type</title>
</head>
<body>
    <h1>Add New Type</h1>
    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <label for="type_name">Type Name:</label>
        <input type="text" id="type_name" name="type_name" required>
        <label for="type_description">Type Description:</label>
        <input type="text" id="type_description" name="type_description">
        <button type="submit">Add Type</button>
    </form>
    <button><a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a></button>
</body>
</html>
