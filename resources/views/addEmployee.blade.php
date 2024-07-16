@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Yeni Personel Ekleme Formu</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label for="name">Adı:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="position">Pozisyon:</label>
        <input type="text" id="position" name="position" required><br><br>
        <button type="submit">Ekle</button>
    </form>
</div>
@endsection
