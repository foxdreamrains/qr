<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo/pristine.png') }}" />
    <title>Create QR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .stdjakarta {
            background: grey;
        }

        option:hover {
            background: red;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img width="80" src="{{ asset('images/logo/pristine.png') }}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
            <a class="nav-link" href="{{ route('showqr') }}">QR Show</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="javascript:void(0)">Add</a>
        </li>
    </ul>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6" style="margin-bottom: 200px; margin-top: 50px;">
                <div class="card px-5 mt-3 shadow">
                    @if (session()->has('success'))

                    @if(is_array(session('success')))
                    @foreach (session('success') as $message)
                    <h3>{{ $message }}</h3>
                    @endforeach
                    @else
                    <h3>{{ session('success') }}</h3>
                    @endif

                    @endif
                    <h4 class="text-dark pt-4 text-center mb-4">Register Event</h4>
                    <form action="{{ route('registerqr_store') }}" method="post">
                        @csrf
                        <label>Nama Lengkap:</label>
                        <input type="text" class="form-control mb-3" name="nama" requiret>
                        <label>Nomor KTP:</label>
                        <input type="text" class="form-control mb-3" name="no_ktp" id="no_ktp"
                            onkeypress="return onlyNumberKey(event)"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        <label>Email:</label>
                        <input type="text" class="form-control mb-3" name="email" requiret>
                        <label>Kota:</label>
                        <input type="text" class="form-control mb-3" name="kota" requiret>
                        <label>Kode Pos:</label>
                        <input type="text" class="form-control mb-3" name="kode_pos" requiret>
                        <label>Alamat:</label>
                        <input type="text" class="form-control mb-3" name="alamat" requiret>
                        <label>No. Handphone:</label>
                        <input type="text" class="form-control mb-3" name="no_hp" requiret>
                        <label>Tanggal Yoga Class:</label>
                        <label id="testtanggal"></label>
                        <input type="date" class="form-control mb-3" name="event_date" id="event_date" requiret>

                        <label>Cabang Studio Yoga:</label>
                        <select class="form-select" aria-label="Cabang Studio" name="studio" style="margin-bottom: 10px;">
                            <option value="" selected>Pilih Cabang Studio Yoga</option>
                            <option value="Cabang-Jakarta-15-00" id="stdJakarta">Nama Studio, Jakarta - 15:00</option>
                            <option value="Cabang-Bogor-15-00" id="stdBogor">Nama Studio, Bogor - 15:00</option>
                            <option value="Cabang-Depok-12-00">Nama Studio, Depok - 12:00 </option>
                            <option value="Cabang-Bekasi-12-00">Nama Studio, Bekasi - 12-00</option>
                            <option value="Cabang-Tangerang-09:00">Nama Studio, Tangerang - 09:00</option>
                        </select>
                        <button type="submit" class="btn btn-success col-md-3 mt-4 mb-4">Submit</button>
                    </form>

                    <input type="hidden" id="ticketsCabangJakarta" value="{{ $ticketsCabangJakarta }}">
                    <input type="hidden" id="get_eventdate" value="">
                    <input type="hidden" id="set_eventdate" value="{{ $set_eventdate }}">
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $('#no_ktp').keyup(function() {
        var foo = $(this).val().split("-").join(""); // remove hyphens
        if (foo.length > 0) {
            foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
        }
        $(this).val(foo);
    });

    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return true;
        return true;
    }
</script>
<script>
    const event_date = document.getElementById('event_date');

    event_date.addEventListener('input', function() {
    const selectedDate = event_date.value;
    document.getElementById("get_eventdate").value = selectedDate
    var get_event_date = $("#get_eventdate").val();
    var set_event_date = $("#set_eventdate").val();
    var ticketjkt = $("#ticketsCabangJakarta").val();

    // if(get_event_date == set_event_date){
    if(selectedDate == set_event_date){
        if(ticketjkt < 20)
        {
            $("#stdJakarta").prop('disabled', 'disabled');
            $("#stdJakarta").css("background-color","lightgrey");
            $("#stdJakarta").html("Nama Studio, Jakarta - 15:00 | Full Booked");

        }
    }

    });
</script>
</body>

</html>
