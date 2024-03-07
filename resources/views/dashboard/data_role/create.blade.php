@extends('dashboard.partials.master')

@section('title', 'Halaman Post')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="card-body">
            <a href="{{ route('role.index') }}" type="button" class="btn btn-warning mb-2">Kembali</a>
            <form action="{{ route('role.store') }}" method="post">
                @csrf
                <label for="">USER</label>
                <select name="id_user" id="petugas" class="form-control">
                    <option value="">Nama User</option>
                    @foreach ($user as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                    @endforeach
                </select>
                <label for="">AKSES</label>
                <select name="id_akses" id="akses" class="form-control">
                    <option value="">Nama Menu</option>
                    @foreach ($akses as $i)
                        <option value="{{ $i->id }}">{{ $i->hak_akses }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
