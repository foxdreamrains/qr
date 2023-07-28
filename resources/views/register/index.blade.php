<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/pristine.png') }}"/>
    <title>Index QR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img width="80" src="{{ asset('images/logo/pristine.png') }}"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Syarat Pendaftaran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pendaftaran</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">QR Show</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('registerqr')}}">Add</a>
        </li>
      </ul>

      <div class="container">
        <div class="row justify-content-md-center">
          <h1 class="text-danger pt-4 text-center mb-4">List of Products</h1>
          <hr>
          <div class="pb-2">
            <a href="{{route('registerqr')}}" class="btn btn-success">Create</a>
          </div>
          <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Tickets Code</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">No KTP</th>
                  <th scope="col">Email</th>
                  <th scope="col">Kode Pos</th>
                  <th scope="col">no_hp</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Studio</th>
                  <th scope="col">Waktu</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($tickets as $t)
                    <tr>
                        <td>
                            {!! DNS2D::getBarcodeHTML($t->tickets_code , 'QRCODE') !!}
                        </td>
                        <td>{{ $t->nama }}</td>
                        <td>{{ $t->no_ktp }}</td>
                        <td>{{ $t->email }}</td>
                        <td>{{ $t->kode_pos }}</td>
                        <td>{{ $t->alamat }}</td>
                        <td>{{ $t->no_hp }}</td>
                        <td>{{ $t->studio->nama_studio }}</td>
                        <td>{{ $t->studio->jam }}</td>
                        <td>
                            <a href="{{ route('registerqr_delete', $t->id_tickets) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak Ada Data Tickets</td>
                    </tr>
                @endforelse
              </tbody>
          </table>
        </div>
      </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
    </script>
</body>
</html>
