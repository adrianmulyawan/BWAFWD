@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
    <!-- membuat content utama -->
    <main>
        <div class="section-success d-flex align-item">
            <div class="col text-center">
                <img src="{{ url('frontend/icon/ic_success_checkout.png') }}" alt="" class="success-icon">
                <h1>Yay! Success</h1>
                <p>
                    We’ve sent you email for trip
                    <br>
                    instruction please read it as well
                </p>

                <a href="{{ url('/') }}" class="btn btn-homepage mt-3 px-5">
                    Go to Homepage!
                </a>
            </div>
        </div>
    </main>
@endsection