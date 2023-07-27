<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create QR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('QR_G') }}">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('QR_G_create') }}">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('QR_G_edit') }}">Edit</a>
        </li>
      </ul>

      <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card px-5 mt-3 shadow">
                    <h1 class="text-primary pt-4 text-center mb-4">Create Combine</h1>
                    <form action="{{ route('QR_G_store') }}" method="post">
                    @csrf
                    <label>Title:</label>
                    <input type="text" class="form-control mb-3" name="title" required>
                    <label>Price:</label>
                    <input type="number" class="form-control mb-3" name="price" required>
                    <label>Description</label>
                    <textarea name="description" class="form-control mb-3" cols="30" rows="5" required></textarea>
                    <button type="submit" class="btn btn-success col-md-3 mt-4 mb-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
