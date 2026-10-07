<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9fafb;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        h1 {
            margin-top: 0;
            color: #1f2937;
        }
        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .btn-submit {
            background-color: #2563eb;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
        }
        .btn-submit:hover {
            background-color: #1d4ed8;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 15px;
            color: #4b5563;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="back-link" href="{{route('product.index')}}">&larr; Back to Product List</a>
        <h1>Edit Product</h1>

        <div>
            @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <form method="post" action="{{route('product.update', ['product' => $product])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" value="{{old('name', $product->name)}}" />
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="qty" placeholder="qty" value="{{old('qty', $product->qty)}}" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" placeholder="price" value="{{old('price', $product->price)}}" />
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description" value="{{old('description', $product->description)}}" />
            </div>
            <div>
                <input type="submit" class="btn-submit" value="Update" />
            </div>
        </form>
    </div>
</body>
</html>
