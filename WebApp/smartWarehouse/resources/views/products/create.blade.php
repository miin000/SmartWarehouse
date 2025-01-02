<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br>

        <label>Unit:</label>
        <input type="text" name="unit" required><br>

        <label>Purchase Price:</label>
        <input type="number" name="purchase_price" step="0.01" required><br>

        <label>Sale Price:</label>
        <input type="number" name="sale_price" step="0.01" required><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" required><br>

        <label>Expiration Date:</label>
        <input type="date" name="expiration_date" required><br>

        <label>Import Date:</label>
        <input type="date" name="import_date" required><br>

        <label>Supplier:</label>
        <input type="text" name="supplier"><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
