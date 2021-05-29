@extends('layouts.admin')

@section('title', 'Travelio Admin - Add Travel Gallery')

@section('dashboardContent')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Travel Gallery</h1>
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
                {{-- Tambahkan (enctype="multipart/form-data") --}}
                {{-- Untuk upload gambar --}}
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="travel_packages_id">
                            Paket Travel
                        </label>

                        <select name="travel_packages_id" id="travel_packages_id" required class="form-control">
                            <option selected disabled>
                                Pilih Paket Travel
                            </option>
                            {{-- Perulangan untuk memilih di paket travel apa yang akan diisikan/input image --}}
                            @foreach ($travel_packages as $travel_package)
                                <option value="{{ $travel_package->id }}">
                                    {{ $travel_package->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">
                            Image
                        </label>

                        <input type="file" name="image" id="image" class="form-control" placeholder="Image">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Save Data
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection