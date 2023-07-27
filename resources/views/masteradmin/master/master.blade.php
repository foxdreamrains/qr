@extends('layouts.appmasteradmin')
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
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: black;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center;">
      <img width="80" src="">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background: black;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-2 d-flex">
        <div class="info">

          <a href="#" class="d-block" style="text-decoration: none; color: white;"><h5 style="font-family: 'Truculenta', sans-serif;"><b>{{date('l, d - m - Y') }}</b></h5> </a>
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
          <li class="nav-header">Seting</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Master
              </p>
            </a>
          </li>

          </ul>

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">LIVE SITE</li>
            <li class="nav-item">
              <a href="https://viciendlessduty.com/" target="_blank" class="nav-link">
                <i class="nav-icon fab fa-avianex"></i>
                <p>
                  master 2024
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
              <li class="breadcrumb-item active">Master</li>
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
            <h1>Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Product</li>
              <li class="breadcrumb-item active">Master</li>
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
                        <a href="{{ route('cmsmasterAdd') }}" >
                            <button type="button" class="btn btn-success" style="border-radius: 2px 10px 0px 15px; background: white; color: black; font-weight: bolder;border: solid 4px seagreen;">+ Add Master</button>
                        </a>


                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Judul Master</th>
                                            <th>Description</th>
                                            <th>Select</th>
                                            <th>Multiple Select</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        @foreach($master as $m)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                <img width="150" class="img-thumbnail"
                                                    src="{{ asset('img/Master/'. $m->image) }}"><br />
                                                <span style="font-size: 0.8rem; color: #62200a">{{ $m->image }}</span>
                                            </td>
                                            <td>{{ $m->judul_master }}</td>
                                            <td>{!! $m->description !!}</td>
                                            <td>{{ $m->mselect }}</td>
                                            <td>
                                                @foreach (explode(',', $m->mselectmultiple) as $msm)
                                                {{ $msm }}
                                                @endforeach
                                            </td>
                                            <td>
                                            <td> <a href="{{ route('cmsmasterEdit', $m->id_master) }}" type="button" class="btn btn-info btn-sm">Edit</a> | <a
                                                    href="{{ route('cmsmasterDelete', $m->id_master) }}" type="button" class="btn btn-danger btn-sm">Delete</a></td>

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
