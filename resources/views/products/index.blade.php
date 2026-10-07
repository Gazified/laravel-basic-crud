<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9fafb;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h1 {
            margin: 0;
            color: #1f2937;
        }
        .btn-create {
            display: inline-block;
            background-color: #10b981;
            color: white;
            padding: 10px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
        }
        .btn-create:hover {
            background-color: #059669;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #e5e7eb;
            padding: 12px 14px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
            color: #374151;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f9fafb;
        }
        .btn-edit {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }
        .btn-edit:hover {
            text-decoration: underline;
        }
        .btn-delete {
            background-color: #ef4444;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }
        .btn-delete:hover {
            background-color: #dc2626;
        }
        .empty-state {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h1>Product List</h1>
            <a href="{{route('product.create')}}" class="btn-create">+ Create a Product</a>
        </div>

        <div>
            @if(session()->has('success'))
                <div class="alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->qty}}</td>
                        <td>₱{{number_format($product->price, 2)}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <a href="{{route('product.edit', ['product' => $product])}}" class="btn-edit">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('product.destroy', ['product' => $product])}}" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn-delete" />
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-state">No products found. Click "Create a Product" to add one!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
