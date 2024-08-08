@extends('merchant.layouts.master')
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
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Merchant Profile</h4>
                        </div>
                    </div>
                </div>

            </div>
            <div class="page-content-wrapper">
                  @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
             <div class="row">
                 <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Company Logo</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset($merchant_profile->image) }}" class="img-fluid shadow" alt="Responsive image"><div class="card-body">
                                          <a class="btn btn-primary waves-effect waves-light" target="_blank" href="{{ $merchant_profile->website_link }}">Visit Site</a>  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i>Add Company Logo</button></div></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Merchant Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">Business Type</th>
                                <td style="text-transform: capitalize"><span class="badge bg-danger">{{$merchant_profile->businessType->type}}</span></td>
                            </tr>
                            {{--  <tr>
                                <th class="text-nowrap" scope="row">Username</th>
                                <td style="text-transform: capitalize"><span class="badge bg-info">{{$merchant_profile->username}}</span></td>
                            </tr>  --}}
                            <tr>
                                <th class="text-nowrap" scope="row">Name</th>
                                <td style="text-transform: capitalize">{{$merchant_profile->first_name}} {{ $merchant_profile->last_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Email</th>
                                <td>{{$merchant_profile->email}}</td>
                            </tr>

                            <tr>
                                <th class="text-nowrap" scope="row">Phone Number</th>
                                <td>{{$merchant_profile->phone_number}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Status</th>
                                <td style="text-transform: capitalize">
                                @if($merchant_profile->status == 'pending')
                                <span class="badge bg-warning">Pending
                                </span>
                                @elseif($merchant_profile->status == 'approved')
                                <span class="badge bg-success">Approved
                                </span>
                                @elseif($merchant_profile->status == 'rejected')
                                <span class="badge bg-danger">Rejected
                                </span>
                                @endif
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Address Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">Address 1</th>
                                <td>{{$merchant_profile->address_line_1}}</td>
                            </tr>
                            @if($merchant_profile->address_line_2)
                            <tr>
                                <th class="text-nowrap" scope="row">Address 2</th>
                                <td>{{$merchant_profile->address_line_2}}</td>
                            </tr>
                            @endif
                            @if($merchant_profile->address_line_3)
                            <tr>
                                <th class="text-nowrap" scope="row">Address 3</th>
                                <td>{{$merchant_profile->address_line_3}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-nowrap" scope="row">City</th>
                                <td>{{$merchant_profile->city}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Post Code</th>
                                <td>{{$merchant_profile->post_code}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Country</th>
                                <td><span class="badge bg-primary">{{$merchant_profile->country}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Profile</h4>
                                <form method="POST" action="{{ route('merchant.merchant-profile-update', $merchant_profile->id) }}" id="profileForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_1">Address Line 1<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Enter Address Line 1" value="{{$merchant_profile->address_line_1}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_2">Address Line 2</label>
                                                <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Enter Address Line 2" value="{{$merchant_profile->address_line_2}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_3">Address Line 3</label>
                                                <input type="text" class="form-control" name="address_line_3" id="address_line_3" placeholder="Enter Address Line 3" value="{{$merchant_profile->address_line_3}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="city">City<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="{{$merchant_profile->city}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="post_code">Post Code<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Enter Post Code" value="{{$merchant_profile->post_code}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="country">Country<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" value="{{$merchant_profile->country}}">
                                            </div>
                                        </div>
                                    </div>


                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

             </div>

            </div>
        </div>
    </div>
</div>

   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Logo Image
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="card-body">

                                        <form id="profile-photo-form" action="{{ route('merchant.logo.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="photo">Choose a profile photo:</label>
                                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Logo</button>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                                                <!-- /.modal-dialog -->

                                            </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd_DUY_rdLbA5J_jtOTgIFpmKqEAqpcYU&libraries=places"></script>

<script>
    let autocomplete;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('address_line_1'),
            { types: ['geocode'] }
        );

        autocomplete.setFields(['address_component']);

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        const place = autocomplete.getPlace();
        const addressComponents = place.address_components;

        const componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        let address = {};

        addressComponents.forEach(component => {
            const addressType = component.types[0];
            if (componentForm[addressType]) {
                address[addressType] = component[componentForm[addressType]];
            }
        });

        $('#address_line_1').val(`${address.street_number || ''} ${address.route || ''} ${address.locality || ''} ${address.administrative_area_level_1 || ''} ${address.country || ''} ${address.postal_code || ''}`);
        $('#city').val(address.locality || '');
        $('#post_code').val(address.postal_code || '');
        $('#country').val(address.country || '');
    }

    $(document).ready(function() {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                initAutocomplete();

        // Initialize form validation on the profileForm form
        $('#profileForm').validate({
            rules: {
                address_line_1: 'required',
                city: 'required',
                post_code: 'required',
                country: 'required',
            },
            messages: {
                address_line_1: 'Please enter address line 1',
                city: 'Please enter your city',
                post_code: 'Please enter your postcode',
                country: 'Please enter your country',
            },
            submitHandler: function(form) {
                // Serialize the form data
                var formData = $(form).serialize();

                // Submit form data via Ajax
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: formData,
                    success: function(response) {
                        // On success, show success message with SweetAlert
                        Swal.fire('Success!', 'Profile updated successfully.', 'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        // On error, show error message with SweetAlert
                        Swal.fire('Error!', 'Failed to update profile.', 'error');
                    }
                });
            }
        });
    });

    $('#profile-photo-form').validate({

                rules: {
                    image: {
                        required: true,
                        extension: "jpeg|jpg|png|gif",
                        filesize: 2048 * 1024 // 2 MB in bytes
                    }
                },
                messages: {
                    image: {
                        required: "Please select a logo.",
                        extension: "Please upload a valid image file (jpeg, jpg, png, gif).",
                        filesize: "File size must be less than 2 MB."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param);
    });
</script>
@endpush
