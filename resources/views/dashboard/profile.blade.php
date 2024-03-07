@extends('dashboard.partials.master')
@section('title', 'Data Role')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- ... (tidak diubah) ... -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (Auth::user()->profile_foto == null)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('adminlte') }}/dist/img/user4-128x128.jpg"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/photo/' . Auth::user()->profile_foto) }}"
                                            alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-center">{{ Auth::User()->name }}</h3>
                                @foreach (Auth::User()->role as $item)
                                    <p class="text-muted text-center">
                                        @if ($item->id_akses == '8')
                                            ADMIN
                                        @else
                                            PETUGAS
                                        @endif
                                    </p>
                                @endforeach
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                                    </li>
                                </ul>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                    data-target="#uploadPhoto">
                                    Update Photo
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <form action="{{ route('user.photo', Auth::user()->id) }}"
                                            enctype="multipart/form-data" method="POST">
                                            <div class="modal-content">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <input type="file" class="form-control" name="profile_foto"
                                                        id="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                Post
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                        @foreach ($photo as $i)
                                            <div class="col-sm-2">
                                                <a href="{{ asset('storage/images/' . $i->photo) }}" data-toggle="lightbox"
                                                    data-title="sample 1 - white">
                                                    <img src="{{ asset('storage/images/' . $i->photo) }}"
                                                        class="img-fluid mb-2" alt="white sample"
                                                        style="height: 65%; width: 100%; object-fit: cover;">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- ... (tidak diubah) ... -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
