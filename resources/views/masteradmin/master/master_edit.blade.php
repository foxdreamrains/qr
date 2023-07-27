@extends('layouts.appmasteradmin')
@section('title', 'Edit')
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    .note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable{
        padding-bottom: 60px;
    }

    .select2-container .select2-selection--single{
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 38px !important;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 26px;
        position: absolute;
        top: 5px;
        right: 10px;
        width: 20px;
    }
</style>
@endsection
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: black;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center;">
      <img width="60" src="">
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
            <a href="{{ route('cmsmaster') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Master
              </p>
            </a>
          </li>

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">LIVE SITE</li>
            <li class="nav-item">
              <a href="#" target="_blank" class="nav-link">
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
    <!-- /.content-header -->

  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="color: black">Dashboard</a></li>
                    <li class="breadcrumb-item active" style="color: #a38b0c">Add Master</li>
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
                    <li class="breadcrumb-item"><a style="color: black">Dashboard</a></li>
                    <li class="breadcrumb-item active" style="color: #a38b0c">Add Master</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">
    @foreach($master as $m)
    <form action="{{ route('cmsmasterUpdate') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $m->id_master }}" >
      <div class="col-sm-12">
        <a href="{{ route('cmsmaster') }}" class="btn btn-warning btn-sm" style="margin-bottom: 5px; border-radius: 20px 1px 10px;">
          <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>
          back
        </a>
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <label>Image</label><br>
                    <div class="input-group">
                        <img src="{{ asset('img/Master/' . $m->image) }}" id="image" class="img-thumbnail"
                            style="width: 200px;">
                        <div class="custom-file">
                            <input type="file" name="image" accept="image/*" class="custom-file-input"
                                id="image" onchange="promoImage(event)">
                            <label class="custom-file-label" for="image">{{ old('image') ? old('image') :
                                $m->image }}</label>
                            <input type="hidden" name="images" value="{{ $m->image }}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="margin-top: 10px">
                    <div class="form-group">
                      <label>Judul Master</label>
                      <input type="text" class="form-control" placeholder="" name="judul_master" value="{{ old('judul_master') ? old('judul_master') : $m->judul_master }}" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label>Deskripsi</label>
                    <textarea id="description" name="description" rows="7">
                        {{ old('description') ? old('description') : $m->description }}
                    </textarea>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Select Your City</label>
                      <select class="form-control select2" name="mselect" style="width: 100%;">
                        <option value="Canada" {{ ($m->mselect=="Canada")? "selected" : "" }}>Canada</option>
                        <option value="Alaska" {{ ($m->mselect=="Alaska")? "selected" : "" }}>Alaska</option>
                        <option value="California" {{ ($m->mselect=="California")? "selected" : "" }}>California</option>
                        <option value="Texas" {{ ($m->mselect=="Texas")? "selected" : "" }}>Texas</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>Multiple Select</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="mselectmultiple[]">
                            @foreach (explode(',', $m->mselectmultiple) as $msm)
                                <option value="Alabama" {{ ($msm=="Alabama")? "selected" : "" }}>Alabama</option>
                                <option value="Alaska" {{ ($msm=="Alaska")? "selected" : "" }}>Alaska</option>
                                <option value="California" {{ ($msm=="California")? "selected" : "" }}>California</option>
                                <option value="Delaware" {{ ($msm=="Delaware")? "selected" : "" }}>Delaware</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label>Select Checkbox</label>
                    @foreach (explode(',', $m->mcheckbox) as $mc)
                    <div class="form-check">
                        <input name="mcheckbox[]" class="form-check-input" type="checkbox" value="" id="mcheckbox1" {{ ($mc=="Sangat Suka")? "checked" : "" }}>
                        <label class="form-check-label" for="mcheckbox1">
                          Sangat Suka
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="mcheckbox[]" class="form-check-input" type="checkbox" value="" id="mcheckbox2" {{ ($mc=="Suka")? "checked" : "" }}>
                        <label class="form-check-label" for="mcheckbox2">
                            Suka
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="mcheckbox[]" class="form-check-input" type="checkbox" value="" id="mcheckbox3" {{ ($mc=="Buruk")? "checked" : "" }}>
                        <label class="form-check-label" for="mcheckbox3">
                          Buruk
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="mcheckbox[]" class="form-check-input" type="checkbox" value="" id="mcheckbox4" {{ ($mc=="Sangat Buruk")? "checked" : "" }}>
                        <label class="form-check-label" for="mcheckbox4">
                            Sangat Buruk
                        </label>
                      </div>
                  </div>
                  @endforeach


                  <div class="col-sm-6">
                    <label>Radio Button</label>
                    <div class="form-check">
                        <input name="mradiobutton[]" value="Benar" class="form-check-input" type="radio" name="flexRadioDefault" id="mradiobutton1">
                        <label class="form-check-label" for="mradiobutton1">
                          Benar
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="mradiobutton[]" value="Salah" class="form-check-input" type="radio" name="flexRadioDefault" id="mradiobutton2">
                        <label class="form-check-label" for="mradiobutton2">
                          Salah
                        </label>
                      </div>
                  </div>




              <div class="col-sm-12" style="margin-top: 50px">

                <div class="float-right" >
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>

              </div>

            </div>
          </div>
        </div>
      </form>
      @endforeach

    <!-- ./row -->
  </section>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
@endsection


@section('script')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('#image').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    var promoImage = function(event) {
      var outputourBrands = document.getElementById('image');
      outputourBrands.src = URL.createObjectURL(event.target.files[0]);
      outputourBrands.onload = function() {
      URL.revokeObjectURL(outputourBrands.src) // free memory
    }};

    $('#description').summernote({
            height: 400
    });

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })


</script>
@endsection
