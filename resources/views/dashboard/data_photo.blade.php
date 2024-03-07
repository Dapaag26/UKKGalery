@extends('dashboard.partials.master')

@section('title', 'Halaman Data Photo')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <!-- ... (sesuaikan dengan konten sebelumnya) -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row mt-4 mb-5">
                    @foreach ($data as $i)
                            <div class="col-sm-2">
                                <a href="{{ asset('storage/images/' . $i->photo) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                    <img src="{{ asset('storage/images/' . $i->photo) }}" class="img-fluid mb-2" alt="white sample" style="height: 65%; width: 100%; object-fit: cover;">
                                </a>
                                <form action="{{ route('photo.destroy', $i->id) }}"
                                    method="post" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Button trigger modal -->
                                    <button type="submit" class="btn btn-danger">
                                        Delete</button>
                                </form>
                            </div>
                    @endforeach
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
