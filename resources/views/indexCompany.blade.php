<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şirketler</title>
</head>
<body>
    <h1>Şirketler Listesi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ad</th>
                <th>Adres</th>
                <th>Telefon</th>
                <th>E-posta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->company_id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->adress }}</td>
                    <td>{{ $company->phone_num }}</td>
                    <td>{{ $company->e_mail }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('companies.create') }}" class="btn btn-primary">Şirket Ekle</a>
    <br>
    <button><a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a></button>
</body>
</html>
