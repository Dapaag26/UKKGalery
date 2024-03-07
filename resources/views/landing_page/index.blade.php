@extends('landing_page.master')

@section('title', 'Home')
@section('content')



    <body>
        <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{ route('landing') }}" rel="nofollow">Home</a>
                    </div>
                </div>
            </div>
            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop-product-fillter">
                                <div class="totall-product">
                                    @php
                                        $totalItems = App\Models\Photo::count(); // Ambil jumlah data dari tabel foto
                                    @endphp
                                    <p>We found <strong class="text-brand">{{ $totalItems }}</strong> items for you!</p>
                                </div>

                            </div>
                            <div class="row product-grid-3">
                                @foreach ($data as $i)
                                    <div class="col-lg-3 col-md-4">
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('landing.show', $i->id) }}">
                                                        <img class="default-img"
                                                            src="{{ asset('storage/images/' . $i->photo) }}"
                                                            alt="">
                                                        <img class="hover-img"
                                                            src="{{ asset('storage/images/' . $i->photo) }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">{{ $i->nama }}</a>
                                                </div>
                                                <h2>
                                                    {{-- str_word_count($i->keterangan, 1) mengonversi teks keterangan menjadi array kata-kata.
                                                        array_slice(..., 0, 10) mengambil 10 kata pertama dari array tersebut.
                                                        implode(' ', ...) menggabungkan kembali array kata-kata menjadi sebuah string yang dipisahkan oleh spasi.
                                                        @if (str_word_count($i->keterangan) > 10) ... @endif menampilkan tanda elipsis (...) jika jumlah kata lebih dari 10. --}}
                                                    <a href="{{ route('landing.show', $i->id) }}">
                                                        {{ implode(' ', array_slice(str_word_count($i->keterangan, 1), 0, 5)) }}
                                                        @if (str_word_count($i->keterangan) > 5)
                                                            ...
                                                        @endif
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>


    @endsection
