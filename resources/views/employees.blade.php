@extends('layouts.app')

@section('content')
    <h1>Personel Listesi</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Adı</th>
                <th>Pozisyon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name ?? 'Belirtilmemiş' }}</td>
                    <td>{{ $employee->position }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
