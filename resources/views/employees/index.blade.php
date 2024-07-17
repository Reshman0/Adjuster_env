<!-- resources/views/employees/index.blade.php -->

<h1>Employees List</h1>

<table>
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
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->surname }}</td>
                <td>{{ $employee->sicil }}</td>
                <td>{{ $employee->organization_unit }}</td>
                <td>{{ $employee->phone_num }}</td>
                <td>{{ $employee->e_mail }}</td>
                <td>{{ $employee->duty }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
