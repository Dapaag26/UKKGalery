@extends('dashboard.partials.master')

@section('title', "Tambah User")

@section('content')
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('user') }}" type="button" class="btn btn-warning mb-2">Kembali</a>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <label for="" >Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama">
                    <label for="" >Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
                    <label for="" >Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir">
                    <label for="" >Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <label for="" >Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  @endsection

