@extends('layouts.appticketsadmin')
@section('title', 'Buat Cabang Baru')
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
                    <h1 class="m-0">Buat Cabang baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Buat Cabang baru</li>
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
                    <h1>Buat Cabang baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Buat Cabang baru</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('cabang.index')}}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{route('cabang.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Cabang</label>
                            <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" name="nama_kota">
                            @error('nama_kota')
                              <span class="invalid-feedback">
                                {{$message}}
                              </span>
                            @enderror
                        </div>

                        <div class="btn-send">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary" style="float: right">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#cabang-table').DataTable();
    });
</script>
@endsection
