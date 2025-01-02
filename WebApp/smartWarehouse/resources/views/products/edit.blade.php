<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required><br>

        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea><br>

        <label>Unit:</label>
        <input type="text" name="unit" value="{{ $product->unit }}" required><br>

        <label>Purchase Price:</label>
        <input type="number" name="purchase_price" step="0.01" value="{{ $product->purchase_price }}" required><br>

        <label>Sale Price:</label>
        <input type="number" name="sale_price" step="0.01" value="{{ $product->sale_price }}" required><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" value="{{ $product->quantity }}" required><br>

        <label>Expiration Date:</label>
        <input type="date" name="expiration_date" value="{{ $product->expiration_date }}" required><br>

        <label>Import Date:</label>
        <input type="date" name="import_date" value="{{ $product->import_date }}" required><br>

        <label>Supplier:</label>
        <input type="text" name="supplier" value="{{ $product->supplier }}"><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>
