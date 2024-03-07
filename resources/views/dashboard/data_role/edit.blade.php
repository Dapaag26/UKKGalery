@extends('dashboard.partials.master')

@section('title', 'Data Role')

@section('content')
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
                        <li class="breadcrumb-item"><a href="#">Tambah Data</a></li>
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
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('role.index') }}" type="button" class="btn btn-warning mb-2">Kembali</a>
                    <form action="{{ route('role.update',$data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="">USER</label>
                        <select name="id_user" id="petugas" class="form-control">
                            <option value="">Nama User</option>
                            @foreach ($user as $i)
                                <option value="{{ $i->id == $data->id_user  ? $data->id_user : $i->id}}"
                                    {{ $i->id == $data->id_user  ? 'selected' : '' }} >
                                    {{ $i->id == $data->id_user  ? $i->name : $i->name  }} </option>
                            @endforeach
                        </select>
                        <label for="">AKSES</label>
                        <select name="id_akses" id="akses" class="form-control">
                            <option value="">Nama Menu</option>
                            @foreach ($akses as $i)
                                <option value="{{ $i->id == $data->id_akses  ? $data->id_akses : $i->id}}"
                                    {{ $i->id == $data->id_akses  ? 'selected' : '' }} >
                                    {{ $i->id == $data->id_akses  ? $i->hak_akses : $i->hak_akses  }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->
