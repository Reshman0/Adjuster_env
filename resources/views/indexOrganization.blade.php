<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizasyonlar</title>
    <link rel="stylesheet" href="\css\mainpage_styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .button-container {
            text-align: center;
        }

        .button-container a {
            margin: 5px;
        }
    </style>
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
                    <td>{{ $organization->upperOrganization ? $organization->upperOrganization->name : 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="button-container">
        <a href="{{ route('createOrganization') }}" class="btn btn-primary">Organizasyon Ekle</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a>
    </div>
</body>
</html>
