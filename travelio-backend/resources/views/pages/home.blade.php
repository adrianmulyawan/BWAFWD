@extends('layouts.app')

@section('title', 'Travelio')

@section('content')
    <!-- membuat header website -->
    <header class="text-center">
        <h1>
            Explore the Beautiful World 
            <br>
            As Easy One Click
        </h1>

        <p class="mt-3">
            You Will See Beautiful
            <br>
            Moment You Never See Before
        </p>

        <a href="#popular" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
    </header>

    <!-- membuat content website -->
    <main>
        <div class="container">
            <!-- membuat statistik -->
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20K</h2>
                    <p>Members</p>
                </div>

                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                
                <div class="col-3 col-md-2 stats-detail">
                    <h2>3K</h2>
                    <p>Hotels</p>
                </div>

                <div class="col-3 col-md-2 stats-detail">
                    <h2>69</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>

        <!-- membuat wisata popular -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Popular Destination</h2>
                        <p>
                            Something that you never try
                            <br>
                            before in this world
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- menampilkan gambar wisata popular -->
        <section class="section-popular-content" id="popular-content">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    {{-- Menampilkan content di database --}}
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column" 
                            {{-- cek dulu ada gambar background dari wisatanya tidak --}}
                            style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                                <div class="travel-country">{{ $item->location }}</div>
                                <div class="travel-location">{{ $item->title }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- membuat networks -->
        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <!-- Teks Networks -->
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>
                            Companies are trusted us
                            <br>
                            more than just a trip
                        </p>
                    </div>

                    <!-- Image Networks -->
                    <div class="col-md-8 text-center">
                        <img src="/frontend/images/Networks Partner.png" alt="our networks" class="img-partner">
                    </div>
                </div>
            </div>
        </section>

        <!-- membuat testimonial -->
        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>
                            Moments Were Giving Them
                            <br>
                            the Best Experiance
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- membuat testimonial user -->
        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <!-- isi testi user -->
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="/frontend/images//testi-1.png" alt="Testi 1" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Adrian Mulyawan</h3>
                                <p class="testimonial">
                                    “Terimakasih Travelio Travel. Sangat menyenangkan berpergian bersama kalian” 
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Bukit Jamur
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="/frontend/images/testi-2.png" alt="Testi 1" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Mandalika Ayusti N</h3>
                                <p class="testimonial">
                                    “Terimakasih Travelio Travel. Sangat menyenangkan berpergian bersama kalian” 
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Hutan Pinus Mangunan
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="/frontend/images/testi-1.png" alt="Testi 1" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Wawan</h3>
                                <p class="testimonial">
                                    “Terimakasih Travelio Travel. Sangat menyenangkan berpergian bersama kalian” 
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Lawang Sewu
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Need help & get started -->
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                            I Need Help
                        </a>

                        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection