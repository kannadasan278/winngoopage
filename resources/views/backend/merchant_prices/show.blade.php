@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')

@push('styles')
<style>
    #icon-preview {
        margin-top: 10px;
        font-size: 100px; /* Adjust as needed */
    }

    .form-check-label {
        text-transform: capitalize;
    }

    .select2 {
        border-color: #ced4da !important;
    }

    .required {
        color: red;
        margin-left: 5px;
    }

    .error {
        color: red;
    }
</style>
@endpush

@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Merchant Price Details</h4>
                            <a href="{{ route('admin.merchant-prices.index') }}"
                                class="btn btn-danger waves-effect waves-light float-right" style="float: right;margin-top: 10px;margin-left: 1400px;">Back List Merchant Price</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Merchant Price Details</h4>
      <p><strong>Type:</strong> {{ $merchantPrice->type }}</p>
        <p><strong>Range:</strong> {{ $merchantPrice->range }}</p>
        <p><strong>Price:</strong> {{ $merchantPrice->price }}</p>
        <p><strong>VAT:</strong> {{ $merchantPrice->vat }}</p>
        <p><strong>Total Price:</strong> {{ $merchantPrice->total_price }}</p>
        <a href="{{ route('merchant-prices.index') }}" class="btn btn-primary">Back to List</a>
    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content-wrapper -->
        </div>
    </div>
</div>
@endsection
