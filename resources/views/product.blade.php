<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Page</title>
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10 my-3 d-flex justify-content-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Product List</h3>
                    </div>
                    <div class="card-body py-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-striped">
                                <tr>
                                    <th>SL</th>
                                    <th>P Name</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($products as $index=>$product)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ asset('uploads/product') }}/{{ $product->image }}" width="60"></td>
                                    <td>{{ $product->brand_name }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->desp }}</td>
                                    <td>{{ ($product->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap') }}/js/bootstrap.js"></script>
</body>
</html>