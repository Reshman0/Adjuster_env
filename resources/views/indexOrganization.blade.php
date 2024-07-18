<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizasyonlar</title>
    <link rel="stylesheet" href="\css\mainpage_styles.css">
</head>
<body>
    <h1>Organizasyonlar Listesi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ad</th>
                <th>Adres</th>
                <th>Telefon</th>
                <th>E-posta</th>
                <th>Üst Organizasyon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organizations as $organization)
                <tr>
                    <td>{{ $organization->organization_id }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->adress }}</td>
                    <td>{{ $organization->phone_num }}</td>
                    <td>{{ $organization->e_mail }}</td>
                    <td>{{ $organization->upper_organization }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('createOrganization') }}" class="btn btn-primary">Organizasyon Ekle</a>
    <br>
    <button><a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a></button>

</body>
</html>
