<!-- resources/views/contracts/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contracts</title>
    <link rel="stylesheet" href="{{ asset('css/mainpage_styles.css') }}">
</head>
<body>
    <h1>Contract List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vendor</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Document</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
                <tr>
                    <td>{{ $contract->contract_id }}</td>
                    <td>{{ $contract->vendor ? $contract->vendor->name : 'N/A' }}</td> <!-- Vendor ismi burada gösteriliyor -->
                    <td>{{ $contract->start_date->format('Y-m-d') }}</td>
                    <td>{{ $contract->end_date ? $contract->end_date->format('Y-m-d') : 'N/A' }}</td>
                    <td><a href="{{ asset('storage/' . $contract->contract_doc) }}" target="_blank">View Document</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('contracts.create') }}" class="btn btn-primary">Add Contract</a>
    <br>
    <button><a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a></button>
</body>
</html>
