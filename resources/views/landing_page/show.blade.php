@extends('landing_page.master')

@section('title', 'Detail Photo')

@section('content')

    <div class="container mt-4">

        <div>
            <a href="{{ route('landing') }}" class="btn btn-primary btn-sm mb-2"><img src="{{ asset('assets/img/arrow.png') }}"
                    style="width:25px;"> Kembali</a>
        </div>
        {{-- <div class="card" style="display: flex; flex-direction: row; align-items: center;">
            <img src="{{ asset('storage/images/' . $photo->photo) }}" class="card-img-top" alt="Photo"
                style="width: 25%; object-fit: cover;">
            <div class="card-body" style="flex: 1;">
                <h5 class="card-title">{{ $photo->nama }}</h5>
                <p class="card-text">{{ $photo->keterangan }}</p>
                <!-- Carbon mengonversi timestamp menjadi objek Carbon dan kemudian memformatnya sesuai dengan kebutuhan -->
                <p class="card-text">{{ \Carbon\Carbon::parse($photo->created_at)->format('d M Y') }}</p>

            </div>
        </div> --}}
        {{-- <div>
            <table class="table table-hover table-bordered">
                <tr>
                    <td rowspan="4"> <center><img src="{{ asset('storage/images/' . $photo->photo) }}"
                            class="card-img-top text-center" alt="Photo" style="width: 25%; object-fit: cover;"></center></td>
                </tr>
                <tr>
                    <td>
                        <h5 class="card-title">{{ $photo->nama }}</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="card-text">{{ $photo->keterangan }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="card-text">{{ \Carbon\Carbon::parse($photo->created_at)->format('d M Y') }}</p>
                    </td>
                </tr>
            </table>
        </div>
    </div> --}}
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Photo
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('storage/images/' . $photo->photo) }}" alt="product image">
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $photo->nama }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p><h3>{{$photo->keterangan}}</h3></p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-calendar mr-5"> </i> {{ \Carbon\Carbon::parse($photo->created_at)->format('d M Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
