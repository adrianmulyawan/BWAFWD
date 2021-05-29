@extends('layouts.admin')

@section('title', 'Travelio Admin - Edit Travel')

@section('dashboardContent')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Transaction: {{ $item->name }}</h1>
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
                <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="transaction_status">
                            Status Transaction 
                        </label>
                        <select name="transaction_status" id="transaction_status" required class="form-control">
                            <option value="{{ $item->transaction_status }}" selected disabled>
                                Status ({{ $item->transaction_status }})
                            </option>
                            <option value="IN_CART">In Cart</option>
                            <option value="PENDING">Pending</option>
                            <option value="SUCCESS">Success</option>
                            <option value="CANCEL">Cancel</option>
                            <option value="FAILED">Failed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Update Transaction
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection