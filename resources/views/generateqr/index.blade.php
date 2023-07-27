<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index QR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('QR_G_create') }}">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('QR_G_edit') }}">Edit</a>
        </li>
      </ul>

      <div class="container">
        <div class="row justify-content-md-center">
          <h1 class="text-danger pt-4 text-center mb-4">List of Products</h1>
          <hr>
          <div class="pb-2">
            <a href="{{ route('QR_G_create') }}" class="btn btn-success">Create</a>
          </div>
          <table class="table table-striped">
            <thead>
                <tr>
                  <th>Reader</th>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Price</th>
                  <th scope="col">Barcode</th>
                  <th scope="col">Description</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $p)
                <tr>
                  <th><div id="reader" width="600px"></div></th>
                  <th>{{ $p->id_products }}</th>
                  <td>{{ $p->title }}</td>
                  <td>{{ $p->price }}</td>
                  <td>{!! DNS2D::getBarcodeHTML($p->product_code . ' ' . $p->title . ' ' . $p->price . ' ' .  $p->description , 'QRCODE') !!}</td>
                  <td>{{ $p->description }}</td>
                  <td>
                     <a href="{{ route('QR_G_delete', $p->id_products) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  //console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 60, qrbox: {width: 1000, height: 1080} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>
</html>
