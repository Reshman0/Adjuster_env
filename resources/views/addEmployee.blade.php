<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Ekle</title>
    <link rel="stylesheet" href="\css\mainpage_styles.css">
</head>
<body>
    <h1>Personel Ekle</h1>
    <form action="{{ route('storeEmployee') }}" method="POST">
        @csrf
        <label for="name">Ad:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="surname">Soyad:</label>
        <input type="text" id="surname" name="surname" required><br>

        <label for="sicil">Sicil:</label>
<input type="number" id="sicil" name="sicil" required><br>

<label for="organization_unit">Organizasyon Birimi:</label>
<select id="organization_unit" name="organization_unit" required>
    @foreach($organizations as $organization)
        <option value="{{ $organization->organization_id }}">{{ $organization->name }}</option>
    @endforeach
</select><br>


        <label for="phone_num">Telefon Numarası:</label>
        <input type="text" id="phone_num" name="phone_num" required><br>

        <label for="e_mail">E-posta:</label>
        <input type="email" id="e_mail" name="e_mail" required><br>

        <label for="duty">Görev:</label>
        <input type="text" id="duty" name="duty" required><br>

        <button type="submit">Kaydet</button>
    </form>
    <button><a href="{{ route('employees') }}" class="btn btn-primary">Personelleri Gör</a></button>
    <button><a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a></button>
</body>
</html>
