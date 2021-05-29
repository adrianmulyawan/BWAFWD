@extends('layouts.checkout')

@section('title', 'Checkout')

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
                                <li class="breadcrumb-item">
                                    Checkout
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ $item->travel_package->title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <!-- membuat details wisata -->
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h1>Who’s Going?</h1>

                            <p>
                                Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}
                            </p>

                            <!-- Table Data User Trip -->
                            <div class="attendee">
                                <table class="table table-borderless table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>VISA</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->transaction_details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" class="avatar rounded-circle" height="60">
                                                </td>
                                                <td class="align-middle">{{ $detail->username }}</td>
                                                <td class="align-middle">{{ $detail->nationality }}</td>
                                                <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}">
                                                        <img src="{{ url('frontend/icon/ic_cancel.png') }}" width="16" height="16">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Add Member -->
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="{{ route('checkout-create', $item->id) }}" class="form-inline" method="POST">
                                    @csrf
                                    <label class="sr-only" for="username">Name</label>
                                    <input required type="text" class="form-control mb-2 mr-sm-2" name="username" id="username" placeholder="Username">

                                    <label class="sr-only" for="nationality">Nationality</label>
                                    <input required type="text" class="form-control mb-2 mr-sm-2" name="nationality" id="nationality" 
                                    style="width: 50px"
                                    placeholder="Nationality">

                                    <label class="sr-only" for="is_visa">Visa</label>
                                    <select required class="custom-select mb-2 mr-sm-2" name="is_visa" id="is_visa">
                                        <option selected value="">Visa</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>

                                    <label class="sr-only" for="doe_passport">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input required type="text" class="form-control datepicker" name="doe_passport" id="doe_passport" placeholder="DOE Passport">
                                    </div> 

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                </form>
                                <div class="disclaimer">
                                    <h3 class="mt-2 mb-0">Note</h3>
                                    <p class="disclaimer">You are only able to invite member that has registered in Travelio</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- membuat detail harga -->
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->transaction_details->count() }} Persons
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional Visa</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ $item->additional_visa }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ $item->travel_package->price }},00 / Person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total Price</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ $item->transaction_total }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique Code)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">Rp {{ $item->transaction_total }},</span>
                                        <span class="text-orange">
                                            {{ mt_rand(0,99) }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <hr>

                            <h2>Payments Instruction</h2>
                            <p class="payment-instructions">Please complete the payment before you continue the trip</p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/icon/ic_bank.png') }}" alt="" class="bank-image" width="45" height="45">
                                    <div class="description">
                                        <h3>PT Travelio Indonesia</h3>
                                        <p>
                                            Bank Central Asia
                                            <br>
                                            0881 8829 8800
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                           

                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/icon/ic_bank.png') }}" alt="" class="bank-image" width="45" height="45">
                                    <div class="description">
                                        <h3>PT Travelio Indonesia</h3>
                                        <p>
                                            Bank Mandiri
                                            <br>
                                            8096 4000 1855
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="join-container">
                            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                                I Have Made Payment
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $item->travel_package->slug ) }}" class="text-muted">
                                Cancel Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <!-- gijgo -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.css') }}">
@endpush

@push('addons-script')
    <!-- Panggil gijgo -->
    <script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // panggil gijgo
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd', // format ikut waktu db
                uiLibrary: 'bootstrap4',
                icon: {
                    rightIcon: '<img src="{{ url('frontend/icon/ic_calendar.png') }}">'
                }
            });
        });
    </script>
@endpush