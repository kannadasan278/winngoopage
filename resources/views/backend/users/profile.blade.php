@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')
@push('styles')
<style>

     .required {
        color: red;
        margin-left: 5px;
    }
</style>
@endpush
@section('main-content')

<div class="main-content">

    <div class="page-content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Personal Information</h4>
                        <a href="{{ URL::previous() }}" class="btn btn-danger waves-effect waves-light float-right" style="margin-left: 1485px;">Go Back</a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Personal Details</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Member ID</th>
                                                <td style="text-transform: capitalize"><span class="badge bg-success">{{$user->member_id}}</span></td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Name</th>
                                                <td style="text-transform: capitalize">{{$user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Email</th>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Gender</th>
                                                <td style="text-transform: capitalize">{{$user->gender}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Birth Month</th>
                                                <td style="text-transform: capitalize"><span class="badge rounded-pill bg-danger">{{$user->birth_month}}</span></td>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Phone Number</th>
                                                <td>{{$user->mobile_number}}</td>
                                            </tr>
                                              <tr>
                                                <th class="text-nowrap" scope="row">Expires At</th>
                                                <td><span class="badge rounded-pill bg-info">{{$user->expires_at}}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Address Details</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Address 1</th>
                                                <td>{{$user->address_line_1}}</td>
                                            </tr>
                                            @if($user->address_line_2)
                                            <tr>
                                                <th class="text-nowrap" scope="row">Address 2</th>
                                                <td>{{$user->address_line_2}}</td>
                                            </tr>
                                            @endif
                                             @if($user->address_line_3)
                                            <tr>
                                                <th class="text-nowrap" scope="row">Address 3</th>
                                                <td>{{$user->address_line_3}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th class="text-nowrap" scope="row">City</th>
                                                <td>{{$user->city}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Post Code</th>
                                                <td>{{$user->postcode}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Country</th>
                                                <td><span class="badge bg-primary">{{$user->country}}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
