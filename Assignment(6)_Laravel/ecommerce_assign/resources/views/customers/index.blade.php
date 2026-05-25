<!DOCTYPE html>
<html>
<head><title>All Customers</title></head>
<body>
    <h1>All Customers</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->customerName }}</td>
            <td>{{ $customer->customerEmail }}</td>
            <td>{{ $customer->customerPhone }}</td>
            <td>{{ $customer->customerCity }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>