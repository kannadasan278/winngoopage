@extends('user.layouts.master')
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
                            <h4 class="mb-0 font-size-18">Personal Information</h4>
                        </div>
                    </div>
                </div>
                 <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i>Add Profile Picture</button>
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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Personal Details</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Member ID</th>
                                                <td style="text-transform: capitalize"><span class="badge bg-success">{{$profile->member_id}}</span></td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Name</th>
                                                <td style="text-transform: capitalize">{{$profile->name}} {{ $profile->lname  }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Email</th>
                                                <td>{{$profile->email}}</td>
                                            </tr>
                                            @if($profile->gender)
                                            <tr>
                                                <th class="text-nowrap" scope="row">Gender</th>
                                                <td style="text-transform: capitalize">{{$profile->gender}}</td>
                                            </tr>
                                            @endif

                                            @if($profile->birth_month)
                                            <tr>
                                                <th class="text-nowrap" scope="row">Birth Month</th>
                                                <td style="text-transform: capitalize"><span class="badge rounded-pill bg-danger">{{$profile->birth_month}}</span></td>
                                            <tr>
                                                @endif
                                                <th class="text-nowrap" scope="row">Phone Number</th>
                                                <td>{{$profile->mobile_number}}</td>
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
                                                <td>{{$profile->address_line_1}}</td>
                                            </tr>
                                            @if($profile->address_line_2)
                                            <tr>
                                                <th class="text-nowrap" scope="row">Address 2</th>
                                                <td>{{$profile->address_line_2}}</td>
                                            </tr>
                                            @endif
                                             @if($profile->address_line_3)
                                            <tr>
                                                <th class="text-nowrap" scope="row">Address 3</th>
                                                <td>{{$profile->address_line_3}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th class="text-nowrap" scope="row">City</th>
                                                <td>{{$profile->city}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Post Code</th>
                                                <td>{{$profile->postcode}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap" scope="row">Country</th>
                                                <td><span class="badge bg-primary">{{$profile->country}}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Profile</h4>
                                <form method="POST" action="{{ route('user-profile-update', $profile->id) }}" id="profileForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_1">Address Line 1<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Enter Address Line 1" value="{{$profile->address_line_1}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_2">Address Line 2</label>
                                                <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Enter Address Line 2" value="{{$profile->address_line_2}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_3">Address Line 3</label>
                                                <input type="text" class="form-control" name="address_line_3" id="address_line_3" placeholder="Enter Address Line 3" value="{{$profile->address_line_3}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="city">City<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="{{$profile->city}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="postcode">Post Code<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Enter Post Code" value="{{$profile->postcode}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="country">Country<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" value="{{$profile->country}}">
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="gender">Gender<span class="required">*</span></label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="">--Select Gender--</option>
                                                    <option value="male" {{ old('gender', $profile->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ old('gender', $profile->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ old('gender', $profile->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="birth_month">Birth Month<span class="required">*</span></label>
                                                <select class="form-control" name="birth_month" id="birth_month">
                                                    <option value="">--Select Birth Month--</option>
                                                    <option value="january" {{ old('birth_month', $profile->birth_month) == 'january' ? 'selected' : '' }}>January</option>
                                                    <option value="february" {{ old('birth_month', $profile->birth_month) == 'february' ? 'selected' : '' }}>February</option>
                                                    <option value="march" {{ old('birth_month', $profile->birth_month) == 'march' ? 'selected' : '' }}>March</option>
                                                    <option value="april" {{ old('birth_month', $profile->birth_month) == 'april' ? 'selected' : '' }}>April</option>
                                                    <option value="may" {{ old('birth_month', $profile->birth_month) == 'may' ? 'selected' : '' }}>May</option>
                                                    <option value="june" {{ old('birth_month', $profile->birth_month) == 'june' ? 'selected' : '' }}>June</option>
                                                    <option value="july" {{ old('birth_month', $profile->birth_month) == 'july' ? 'selected' : '' }}>July</option>
                                                    <option value="august" {{ old('birth_month', $profile->birth_month) == 'august' ? 'selected' : '' }}>August</option>
                                                    <option value="september" {{ old('birth_month', $profile->birth_month) == 'september' ? 'selected' : '' }}>September</option>
                                                    <option value="october" {{ old('birth_month', $profile->birth_month) == 'october' ? 'selected' : '' }}>October</option>
                                                    <option value="november" {{ old('birth_month', $profile->birth_month) == 'november' ? 'selected' : '' }}>November</option>
                                                    <option value="december" {{ old('birth_month', $profile->birth_month) == 'december' ? 'selected' : '' }}>December</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{--  <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="photo">Profile Photo</label>
                                                <input type="file" class="form-control" name="photo" id="photo">

                                            </div>
                                        </div>  --}}
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
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Profile Image
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                             <div class="card-body">

                                                            <form id="profile-photo-form" action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group mb-3">
                                                                    <label for="photo">Choose a profile photo:</label>
                                                                    <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                                                                    @error('photo')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update Photo</button>
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
        $('#postcode').val(address.postal_code || '');
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
                postcode: 'required',
                country: 'required',
                gender: 'required',
                birth_month: 'required',
            },
            messages: {
                address_line_1: 'Please enter address line 1',
                city: 'Please enter your city',
                postcode: 'Please enter your postcode',
                country: 'Please enter your country',
                gender: 'Please select your gender',
                birth_month: 'Please select your birth month',
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
                    profile_photo: {
                        required: true,
                        extension: "jpeg|jpg|png|gif",
                        filesize: 2048 * 1024 // 2 MB in bytes
                    }
                },
                messages: {
                    profile_photo: {
                        required: "Please select a profile photo.",
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
