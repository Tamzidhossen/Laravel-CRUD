<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Create</title>
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/css/bootstrap.css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10 my-3 d-flex justify-content-end">
                <a href="{{ route('product') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row  d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Create Products</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input value="{{ old('name') }}" type="text" class="@error('name') is-invalid @enderror form-control" name="name" placeholder="Name">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand Name</label>
                                <input value="{{ old('brand_name') }}" type="text" class="@error('brand_name') is-invalid @enderror form-control" name="brand_name" placeholder="Brand Name">
                                @error('brand_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input value="{{ old('price') }}" type="number" class="@error('price') is-invalid @enderror form-control" name="price" placeholder="Price">
                                @error('price')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="desp" class="form-control" cols="30" rows="5" placeholder="About Description">{{ old('desp') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap') }}/js/bootstrap.js"></script>
</body>
</html>