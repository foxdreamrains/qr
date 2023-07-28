@extends('layouts.appticketsadmin')
@section('title', '')
@section('css')
<style>
  .info{
    margin-top: 10px;
  }
</style>
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
            <h1 class="m-0">Master</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Product</li>
              <li class="breadcrumb-item active">Form Register</li>
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
            <h1>Form Register</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Product</li>
              <li class="breadcrumb-item active">Form Register</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>tickets_code</th>
                                            <th>nama</th>
                                            <th>no_ktp</th>
                                            <th>email</th>
                                            <th>kode_pos</th>
                                            <th>alamat</th>
                                            <th>no_hp</th>
                                            <th>studio</th>
                                            <th>Waktu</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        @foreach($tickets as $t)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{!! DNS2D::getBarcodeHTML($t->tickets_code,'QRCODE')  !!}</td>
                                            <td>{{ $t->nama }}</td>
                                            <td>{{ $t->no_ktp }}</td>
                                            <td>{{ $t->email }}</td>
                                            <td>{{ $t->kode_pos }}</td>
                                            <td>{{ $t->alamat }}</td>
                                            <td>{{ $t->no_hp }}</td>
                                            <td>{{ $t->studio->nama_studio }}</td>
                                            <td>{{ \Carbon\Carbon::parse($t->studio->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($t->studio->jam_selesai)->format('H:i') }}</td>
                                            <td> <a href="{{ route('cmsFormRegisterDelete', $t->id_tickets) }}" type="button" class="btn btn-danger btn-sm">Delete</a></td>

                                        </tr>
                                        <?php $no++; ?>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>


                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>

            <!-- /.content -->
        </div>
    </section>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    @endsection
