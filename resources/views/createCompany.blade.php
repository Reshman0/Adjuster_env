<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şirket Ekle</title>
</head>
<body>
    <h1>Yeni Şirket Ekle</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Ad:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="adress">Adres:</label>
            <input type="text" id="adress" name="adress" required>
        </div>
        <div>
            <label for="phone_num">Telefon:</label>
            <input type="text" id="phone_num" name="phone_num" required>
        </div>
        <div>
            <label for="e_mail">E-posta:</label>
            <input type="email" id="e_mail" name="e_mail" required>
        </div>
        <button type="submit">Şirket Ekle</button>
    </form>
    <button><a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a></button>
</body>
</html>
