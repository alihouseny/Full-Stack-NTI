<!DOCTYPE html>
<html>
<head><title>All Products</title></head>
<body>
    <h1>All Products</h1>
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