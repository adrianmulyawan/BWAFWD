@extends('layouts.admin')

@section('title', 'Travelio Admin - Tambah Travel')

@section('dashboardContent')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Travel Package</h1>
        </div>

        {{-- Error Handling / Jika Terjadi Suatu Error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Buat Card --}}
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('travel-package.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ old('location') }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" cols="100" class="d-block w-250 form-control">
                            {{ old('about') }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="featured_event">Featured Event</label>
                        <input type="text" class="form-control" name="featured_event" id="featured_event" placeholder="Featured Event" value="{{ old('featured_event') }}">
                    </div>
                    <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text" class="form-control" name="language" id="language" placeholder="Language" value="{{ old('language') }}">
                    </div>
                    <div class="form-group">
                        <label for="foods">Foods</label>
                        <input type="text" class="form-control" name="foods" id="foods" placeholder="Foods" value="{{ old('foods') }}">
                    </div>
                    <div class="form-group">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="Departure Date" value="{{ old('departure_date') }}">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Duration" value="{{ old('duration') }}">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Type" value="{{ old('type') }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Price" value="{{ old('price') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Save Data
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection