<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <strong>{{session()->get('message')}}</strong>
                    </div>
                @endif
                <div class="card px-5 mt-3 shadow">
                    <h4 class="text-dark pt-4 text-center mb-4">Register Event</h4>
                    <form action="{{route('registerqr.post')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama Lengkap:</label>
                            <input type="text" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" name="nama">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Nomor KTP:</label>
                            <input type="text" value="{{old('no_ktp')}}" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp"
                                onkeypress="return onlyNumberKey(event)"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <div class="error text-danger"></div>
                            @error('no_ktp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Email Aktif:</label>
                            <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Kota:</label>
                                    <input type="text" value="{{old('kota')}}" class="form-control @error('kota') is-invalid @enderror" name="kota">
                                    @error('kota')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Kode Pos:</label>
                                    <input type="number" value="{{old('kode_pos')}}" maxlength="4" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos">
                                    @error('kode_pos')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>No Handphone:</label>
                            <input type="number" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Alamat:</label>
                            <input type="text" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror" name="alamat">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Cabang Studio Yoga:</label>
                            <select class="form-select @error('cabangs_id') is-invalid @enderror" name="cabangs_id" id="cabangs_id" style="margin-bottom: 10px;">
                                <option value="" selected>Pilih Cabang Studio Yoga</option>
                                @foreach ($cabang as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kota}}</option>
                                @endforeach
                            </select>
                            @error('cabangs_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Yoga Class:</label>
                            <select class="form-select @error('studios_id') is-invalid @enderror" name="studios_id" id="studios_id" style="margin-bottom: 10px;">
                            </select>
                            @error('studios_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                 <div class="col-md-1">
                                    <input type="checkbox" name="" id="" required>
                                </div>
                                <div class="col-md-10">
                                    <label for="">Saya menyetujui untuk mengirim promosi dari Email maupun SMS</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success col-md-3 mt-4 mb-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#cabangs_id').change(function(e) {
            let cabangs_id = $(this).val();
            $.ajax({
                url: '/cekStudios',
                type: 'POST',
                data: {
                    cabangs_id: cabangs_id
                },
                success: function(res) {
                    let html = '';
                    $.each(res.data, function(key, val) {
                        console.log(val);
                        if (val.ticket_count < 25) {
                            html += `<option value="${val.id_studio}">${val.tgl} - ${val.jam_mulai} - ${val.jam_selesai}</option>`;
                        } else {
                            html += `<option disabled value="${val.id_studio}">${val.tgl} - ${val.jam_mulai} - ${val.jam_selesai} |  <span class="text-danger">Full Booked</span></option>`;
                        }
                    });
                    $('#studios_id').html(html)
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

        $('#no_ktp').on('keyup', function() {
            let no_ktp = $(this).val();

            if (no_ktp == '') {
                $('#no_ktp').removeClass('is-invalid');
                $('#no_ktp').removeClass('is-valid');
                $('.error').html('');
            } else {
                $.ajax({
                    url: '/cekNoKtp',
                    type: 'POST',
                    data: {
                        no_ktp: no_ktp
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.code == 400) {
                            $('#no_ktp').addClass('is-invalid');
                            $('.error').html('Nik Has Alredy Been Taken.');
                        } else if(res.code == 200) {
                            $('#no_ktp').removeClass('is-invalid');
                            $('#no_ktp').addClass('is-valid');
                            $('.error').html('');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        });
    });

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
</body>

</html>
