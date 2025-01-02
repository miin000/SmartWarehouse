<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>

    </style>
</head>
<body>
    <div class="Content"> 
        <h1>Product List</h1>
        <!-- Nút Thêm sản phẩm -->
        <a href="{{ route('products.create') }}" style="margin-bottom: 20px; display: inline-block;">
            <button>Add Product</button>
        </a>

        <!-- Hiển thị danh sách sản phẩm -->
        <table border="1" width="100%" style="text-align: left;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Purchase Price</th>
                    <th>Sale Price</th>
                    <th>Quantity</th>
                    <th>Expiration Date</th>
                    <th>Import Date</th>
                    <th>Supplier</th>
                    <th>Actions</th> <!-- Cột cho các nút Sửa/Xóa -->
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->purchase_price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->expiration_date }}</td>
                        <td>{{ $product->import_date }}</td>
                        <td>{{ $product->supplier }}</td>
                        <td>
                            <!-- Nút Sửa -->
                            <a href="{{ route('products.edit', $product->id) }}">
                                <button>Edit</button>
                            </a>

                            <!-- Nút Xóa -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
