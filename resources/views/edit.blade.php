<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload an Image</h2>
        <form action="{{ route('update.image', $id)}}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="row g-2 align-items-center">
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" >
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Update Image</button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('bootstrap') }}/js/bootstrap.js"></script>
</body>
</html>