{{-- Create Packet Travel --}}
@if (session()->has('createSuccess'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success">
                    {{ session()->get('createSuccess') }}
                </div>
            </div>
        </div>
    </div>
@endif
@if (session()->has('createFailed'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-warning">
                    {{ session()->get('createFailed') }}
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Edit Packet Travel --}}
@if (session()->has('editSuccess'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success">
                    {{ session()->get('editSuccess') }}
                </div>
            </div>
        </div>
    </div>
@endif
@if (session()->has('editFailed'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-warning">
                    {{ session()->get('editFailed') }}
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Delete Packet Travel --}}
@if (session()->has('deleteSuccess'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success">
                    {{ session()->get('deleteSuccess') }}
                </div>
            </div>
        </div>
    </div>
@endif
@if (session()->has('deleteFailed'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-warning">
                    {{ session()->get('deleteFailed') }}
                </div>
            </div>
        </div>
    </div>
@endif
