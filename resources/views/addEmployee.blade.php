<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="surname" placeholder="Surname">
    <input type="text" name="sicil" placeholder="Sicil">
    <input type="text" name="organization_unit" placeholder="Organization Unit">
    <input type="text" name="phone_num" placeholder="Phone Number">
    <input type="text" name="e_mail" placeholder="Email">
    <input type="text" name="duty" placeholder="Duty">
    <button type="submit">Add Employee</button>
</form>
