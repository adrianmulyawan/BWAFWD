@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
    <!-- membuat content utama -->
    <main>
        <!-- detail halaman/posisi halaman sekarang -->
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ $item->title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <!-- membuat details wisata -->
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>

                            <p class="country-name">
                                {{ $item->location }}
                            </p>

                            @if ($item->galleries->count())
                                <div class="gallery">
                                    <!-- gambar utama -->
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" width="500" xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                                    </div> 

                                    <!-- list gambar -->
                                    <div class="xzoom-thumb">
                                        @foreach ($item->galleries as $gallery)
                                            <a href="{{ Storage::url($gallery->image) }}">
                                                <!-- gambar kecil -->
                                                <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image) }}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <h2>About Tourist Destinations</h2>

                            <p>{!! $item->about !!}</p>

                            <div class="features row">
                                <div class="col-md-4">
                                    <div class="description">
                                        <img class="features-image" src="{{ url('/frontend/icon/ic_toketpng.png') }}" alt="icon">
                                        <div class="description">
                                            <h4>Event</h4>
                                            <p>{{ $item->featured_event }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img class="features-image" src="{{ url('/frontend/icon/ic_globe.png') }}" alt="icon">
                                        <div class="description">
                                            <h4>Language</h4>
                                            <p>{{ $item->language }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img class="features-image" src="{{ url('/frontend/icon/ic_food.png') }}" alt="icon">
                                        <div class="description">
                                            <h4>Foods</h4>
                                            <p>{{ $item->foods }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- membuat detail harga -->
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/images/member1.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member2.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member3.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member4.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member5.png') }}" class="member-image mr-1">
                            </div>
                            <hr>
                            <h2>Trip Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Date of Departure</th>
                                    {{-- Format Kalendar with Carbon --}}
                                    <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->departure_date)->format('F n, Y') }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-right">{{ $item->duration }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type of Trip</th>
                                    <td width="50%" class="text-right">{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">Rp {{ $item->price }},00 / Person</td>
                                </tr>
                            </table>
                        </div>

                        {{-- Cek Udah Login/Belum --}}
                        <div class="join-container">
                            {{-- Cek untuk yang sudah login --}}
                            @auth
                                <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                        Join Now
                                    </button>
                                </form>
                            @endauth
                            {{-- Cek Jika Belom Login/Tamu --}}
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Login or Register to Join
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

{{-- Panggil addons-style (app.blade.php) --}}
@push('prepend-style')
    <!-- xZoom -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

{{-- Panggil addons-script (app.blade.php) --}}
@push('addons-script')
    <!-- Panggil xZoom -->
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush