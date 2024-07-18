<!-- resources/views/createOrganization.blade.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizasyon Ekle</title>
</head>
<body>
    <h1>Yeni Organizasyon Ekle</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('storeOrganization') }}" method="POST">
        @csrf
        <label for="name">Organizasyon Adı:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="adress">Adres:</label>
        <input type="text" id="adress" name="adress" required>
        <br>

        <label for="phone_num">Telefon Numarası:</label>
        <input type="text" id="phone_num" name="phone_num" required>
        <br>

        <label for="e_mail">E-posta:</label>
        <input type="email" id="e_mail" name="e_mail" required>
        <br>

        <label for="upper_organization">Üst Organizasyon:</label>
        <select id="upper_organization" name="upper_organization">
            <option value="">Yok</option>
            @foreach($organizations as $organization)
                <option value="{{ $organization->organization_id }}">{{ $organization->name }}</option>
            @endforeach
        </select>
        <br>

        <button type="submit">Ekle</button>
        <a href="{{ route('organizations.index') }}" class="btn btn-primary">Organizasyon Listesine dön</a>
    </form>
</body>
</html>
