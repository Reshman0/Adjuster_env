<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees List</title>
</head>
<body>
    <h1>Employees List</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Sicil</th>
                <th>Organization Unit</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Duty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->surname }}</td>
                    <td>{{ $employee->sicil }}</td>
                    <td>{{ $employee->organization ? $employee->organization->name : 'N/A' }}</td>
                    <td>{{ $employee->phone_num }}</td>
                    <td>{{ $employee->e_mail }}</td>
                    <td>{{ $employee->duty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
