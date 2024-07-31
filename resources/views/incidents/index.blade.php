<!-- resources/views/incidents/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olaylar</title>
</head>
<body>
    <h1>Olaylar Listesi</h1>
    <a href="{{ route('incidents.create') }}">Yeni Olay Ekle</a>
    <ul>
        @foreach($incidents as $incident)
            <li>
                <a href="{{ route('incidents.show', $incident->id) }}">
                    {{ $incident->incident_description }}
                </a>
                <span>{{ $incident->incident_date }}</span>
            </li>
        @endforeach
    </ul>
</body>
</html>
