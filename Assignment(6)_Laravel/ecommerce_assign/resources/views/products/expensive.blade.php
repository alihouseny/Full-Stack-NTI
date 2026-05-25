<!DOCTYPE html>
<html>
<head><title>Expensive Products</title></head>
<body>
    <h1>Products Over $100</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->desc }}</td>
            <td>${{ $product->price }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>