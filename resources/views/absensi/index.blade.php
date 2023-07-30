@extends('layouts.appticketsadmin')
@section('title', 'Absensi Peserta')
@section('css')
<style>
    .info{
        margin-top: 10px;
    }
    .colored-toast.swal2-icon-success {
    background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
    background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
    background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
    background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
    background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
    color: white;
    }

    .colored-toast .swal2-close {
    color: white;
    }

    .colored-toast .swal2-html-container {
    color: white;
    }
</style>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
@endsection
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: white;">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center;">
    <img width="60" src="{{ asset('images/logo/pristine.png') }}">
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="background: white;">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 pb-2 mb-2 d-flex">
      <div class="info">

        <a href="#" class="d-block" style="text-decoration: none; color: black;"><h5 style="font-family: 'Truculenta', sans-serif;"><b>{{date('l, d - m - Y') }}</b></h5> </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header" style="color: black;">Data Peserta Yoga</li>
        <li class="nav-item">
          <a href="{{ route('cmsFormRegister') }}" class="nav-link" style="color: black;">
            <i class="nav-icon fas fa-user-friends"></i>
            <p>
              Form Register
            </p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('cmsmaster') }}" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-person-booth" style="color: black;"></i>
              <p>
                Hadir
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('cabang.index') }}" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-hotel" style="color: black;"></i>
              <p>
                Data Cabang
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('event.index') }}" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-calendar-days" style="color: black;"></i>
              <p>
                Data Event
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('absensi.index') }}" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-qrcode" style="color: black;"></i>
              <p>
                Data Absensi
              </p>
            </a>
          </li>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header" style="color: black;">LIVE SITE</li>
          <li class="nav-item">
            <a href="https://pristineberegraklebihbaik.com/" target="_blank" class="nav-link" style="color: black;">
              <p>
                pristinebergeraklebihbaik.com
              </p>
            </a>
          </li>

        </ul>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: white;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Absensi Peserta Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Absensi Peserta Event</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Absensi Peserta Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Absensi Peserta Event</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <strong>{{session()->get('message')}}</strong>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" class="btn btn-info btn-sm" id="showCamera"><i class="fas fa-qrcode"></i></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center" style="width: 100%" id="event-table">
                        <thead>
                            <th>Cabang</th>
                            <th>Studio</th>
                            <th>Nama Peserta</th>
                            <th>Jam Masuk</th>
                            <th>Action</th>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>
</section>

<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-ld">
      <div class="modal-header">
        <h5 class="modal-title" id="cameraModalLabel">Scanner Absensi QrCode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="reader" width="600px"></div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $('#event-table').DataTable({
            ordering: true,
            serverSide: true,
            ajax: '/CMS/absensi',
            columns: [
                {data: 'cabang.nama_kota'},
                {data: 'studio.nama_studio'},
                {data: 'ticket.nama'},
                {data: 'jam_masuk'},
                {data: 'action'}
            ]
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true
        })

        const html5QrCode = new Html5Qrcode("reader");

        alertify.defaults.transition = "slide";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";

        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            $.ajax({
                url: '/getTextQr',
                type: 'POST',
                data: {
                    decodedText: decodedText
                },
                dataType: 'json',
                success: function(res) {
                    $('#cameraModal').modal('hide');
                    html5QrCode.stop();
                    if (res.code == 400) {
                        Toast.fire({
                            icon: 'warning',
                            title: res.status
                        });
                    } else {
                        $.each(res, function(key, val) {
                            alertify
                                .confirm()
                                .setting({
                                    title: "<b>Data Peserta Di Temukan !</b>",
                                    labels: {
                                        ok: "Simpan Kehadiran",
                                        cancel: "Batalkan Kehadiran",
                                    },
                                    reverseButtons: true,
                                    message:"<b>Data Peserta Event</b> " +
                                            "<br>" +
                                            "Nama Peserta  : " + val.nama +
                                            "<br>" +
                                            "Email Peserta : " + val.email+
                                            "<br>" +
                                            "NIK Peserta   : " + val.no_ktp+
                                            "<br>"+
                                            "Asal Kota     : " + val.kota+
                                            "<br>" +
                                            "No Telephone  : " + val.no_hp +
                                            "<br>" +
                                            "Status Peserta  : " + val.status +

                                            "<br> <br>" +
                                            "<b>Cabang Yang Di Pilih</b> " +
                                            "<br>" +
                                            "Cabang  : " + val.cabang.nama_kota +

                                            "<br> <br>" +
                                            "<b>Studio Yang Di Pilih</b> " +
                                            "<br>" +
                                            "Studio  : " + val.studio.nama_studio +
                                            "<br>" +
                                            "Tanggal  : " + val.studio.tgl +
                                            "<br>"+
                                            "Waktu  : " + val.studio.jam_mulai + ' - ' + val.studio.jam_selesai,
                                    onok: function () {
                                        let cabangs_id = val.cabangs_id;
                                        let studios_id = val.studios_id;
                                        let tickets_id = val.id_tickets;

                                        $.ajax({
                                            url: '/saveAbsensi',
                                            type: 'POST',
                                            data: {
                                                cabangs_id: cabangs_id,
                                                studios_id: studios_id,
                                                tickets_id: tickets_id
                                            },
                                            success: function(res) {
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: res.message
                                                });
                                                setTimeout(() => {
                                                    table.draw();
                                                }, 1000);
                                            },
                                            error: function(err) {
                                                console.log(err);
                                            }
                                        });
                                    },
                                })
                                .show();
                        });
                    }
                },
                error: function(err) {
                    $('#cameraModal').modal('hide');
                    html5QrCode.stop();
                    Toast.fire({
                        icon: 'error',
                        title: 'Data Peserta Event Tidak Di Temukan.'
                    });
                }
            });
        };

        const config = { fps: 10, qrbox: { width: 250, height: 250 } };

        $('#showCamera').click(function(e) {
            e.preventDefault();
            $('#cameraModal').modal('show');
            html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback);
        });

        $('.close').click(function(e) {
            e.preventDefault();
            html5QrCode.stop();
        });

        $(document).on('click', '#reset', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let tickets_id = $(this).data('tickets');

            Swal.fire({
                title: 'Warning !',
                text: "Anda yakin ingin mereset absensi peserta ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Reset',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'absensi/reset',
                        type: 'POST',
                        data: {
                            id: id,
                            tickets_id: tickets_id,
                        },
                        success: function(res) {
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            });
                            setTimeout(() => {
                                table.draw();
                            }, 1000);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            })
        });
    });
</script>
@endsection
