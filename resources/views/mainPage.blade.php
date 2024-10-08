<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varlık Yönetimi</title>
    <link rel="stylesheet" href="\css\mainpage_styles.css">


</head>
<body>
<div class="menu">
    <h2>Menü</h2>
    <ul class="menu-list">

        <li><a href="#sozlesmeler">Varlık Yönetimi</a></li>

    </ul>
</div>
<div class="container">
    <div id="personeller" class="card">
        <h2>Personeller</h2>
        <button><a href="{{ route('employees') }}" class="btn btn-primary">Personel Listesi</a></button>
        <button ><a href="{{ route('addEmployee') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
    <div id="organizasyonlar" class="card">
        <h2>Organizasyonlar</h2>
        <button><a href="{{ route('organizations.index') }}" class="btn btn-primary">Organizasyon Listesi</a></button>
        <button><a href="{{ route('createOrganization') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
    <div id="sirketler" class="card">
        <h2>Şirketler</h2>
        <button><a href="{{ route('companies.index') }}" class="btn btn-primary">Şirketler Listesi</a></button>
        <button><a href="{{ route('companies.create') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
    <div id="sozlesmeler" class="card">
        <h2>Sözleşmeler</h2>
        <button><a href="{{ route('contracts.index') }}" class="btn btn-primary">Sözleşmeler Listesi</a></button>
        <button><a href="{{ route('contracts.create') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
    <div id="envanter-turleri" class="card">
        <h2>Envanter Türleri</h2>
        <button><a href="{{ route('types.index') }}" class="btn btn-primary">Envanter Türleri Listesi</a></button>
        <button><a href="{{ route('types.create') }}" class="btn btn-primary">+ Ekle</a></button></button>
    </div>
    <div id="markalar" class="card">
        <h2>Markalar</h2>
        <button><a href="{{ route('brands.index') }}" class="btn btn-primary">Markalar Listesi</a></button>
        <button><a href="{{ route('brands.create') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
    <div id="olaylar" class="card">
        <h2>Olaylar</h2>
        <button><a href="{{ route('incidents.index') }}" class="btn btn-primary">Olaylar Listesi</a></button>
        <button><a href="{{ route('incidents.create') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
    <div id="alt-turler" class="card">
        <h2>Alt Türler</h2>
        <button><a href="{{ route('sub_types.index') }}" class="btn btn-primary">Alt Türler Listesi</a></button>
        <button><a href="{{ route('sub_types.create') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
    <div id="modeller" class="card">
        <h2>Modeller</h2>
        <button><a href="{{ route('models.index') }}" class="btn btn-primary">Modeller Listesi</a></button>
        <button><a href="{{ route('models.create') }}" class="btn btn-primary">+ Ekle</a></button>
    </div>
</div>
</body>
</html>