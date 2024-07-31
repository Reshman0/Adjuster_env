<!-- resources/views/incidents/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Olay Ekle</title>
</head>
<body>
    <h1>Yeni Olay Ekle</h1>
    <form action="{{ route('incidents.store') }}" method="POST">
        @csrf
        <div>
            <label for="asset_id">Varlık ID:</label>
            <input type="number" name="asset_id" id="asset_id" required>
        </div>
        <div>
            <label for="incident_date">Olay Tarihi:</label>
            <input type="date" name="incident_date" id="incident_date" required>
        </div>
        <div>
            <label for="incident_status">Olay Durumu:</label>
            <input type="number" name="incident_status" id="incident_status" required>
        </div>
        <div>
            <label for="incident_description">Açıklama:</label>
            <textarea name="incident_description" id="incident_description" required></textarea>
        </div>
        <div>
            <button type="submit">Ekle</button>
        </div>
    </form>
</body>
</html>
