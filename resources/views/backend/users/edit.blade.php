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
                            <h4 class="mb-0 font-size-18">Edit Member Information</h4>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-danger waves-effect waves-light float-right" style="margin-left: 1485px;">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Profile</h4>
                                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" id="profileForm" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="mobile_number">Mobile Number<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" value="{{ $user->mobile_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="gender">Gender<span class="required">*</span></label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="">--Select Gender--</option>
                                                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="birth_month">Birth Month<span class="required">*</span></label>
                                                <select class="form-control" name="birth_month" id="birth_month">
                                                    <option value="">--Select Birth Month--</option>
                                                    <option value="january" {{ old('birth_month', $user->birth_month) == 'january' ? 'selected' : '' }}>January</option>
                                                    <option value="february" {{ old('birth_month', $user->birth_month) == 'february' ? 'selected' : '' }}>February</option>
                                                    <option value="march" {{ old('birth_month', $user->birth_month) == 'march' ? 'selected' : '' }}>March</option>
                                                    <option value="april" {{ old('birth_month', $user->birth_month) == 'april' ? 'selected' : '' }}>April</option>
                                                    <option value="may" {{ old('birth_month', $user->birth_month) == 'may' ? 'selected' : '' }}>May</option>
                                                    <option value="june" {{ old('birth_month', $user->birth_month) == 'june' ? 'selected' : '' }}>June</option>
                                                    <option value="july" {{ old('birth_month', $user->birth_month) == 'july' ? 'selected' : '' }}>July</option>
                                                    <option value="august" {{ old('birth_month', $user->birth_month) == 'august' ? 'selected' : '' }}>August</option>
                                                    <option value="september" {{ old('birth_month', $user->birth_month) == 'september' ? 'selected' : '' }}>September</option>
                                                    <option value="october" {{ old('birth_month', $user->birth_month) == 'october' ? 'selected' : '' }}>October</option>
                                                    <option value="november" {{ old('birth_month', $user->birth_month) == 'november' ? 'selected' : '' }}>November</option>
                                                    <option value="december" {{ old('birth_month', $user->birth_month) == 'december' ? 'selected' : '' }}>December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="photo">Profile Photo</label>
                                                <input type="file" class="form-control" name="photo" id="photo">
                                                @if($user->photo)
                                                    <div class="mt-2">
                                                            <img src="{{ asset($user->photo) }}" alt="Profile Image" style="width: 100px; height: auto; margin-top: 10px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_1">Address Line 1<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Enter Address Line 1" value="{{ $user->address_line_1 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_2">Address Line 2</label>
                                                <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Enter Address Line 2" value="{{ $user->address_line_2 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="address_line_3">Address Line 3</label>
                                                <input type="text" class="form-control" name="address_line_3" id="address_line_3" placeholder="Enter Address Line 3" value="{{ $user->address_line_3 }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="city">City<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="{{ $user->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="postcode">Post Code<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Enter Post Code" value="{{ $user->postcode }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="country">Country<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" value="{{ $user->country }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Member</button>
                                </form>
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
        initAutocomplete();
        // Initialize form validation on the profileForm form
        $('#profileForm').validate({
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true
                },
                mobile_number: 'required',
                gender: 'required',
                birth_month: 'required',
                address_line_1: 'required',
                city: 'required',
                postcode: 'required',
                country: 'required'
            },
            messages: {
                name: 'Please enter your name',
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address'
                },
                mobile_number: 'Please enter your mobile number',
                gender: 'Please select your gender',
                birth_month: 'Please select your birth month',
                address_line_1: 'Please enter address line 1',
                city: 'Please enter your city',
                postcode: 'Please enter your postcode',
                country: 'Please enter your country'
            },
            submitHandler: function(form) {
                // Serialize the form data
                var formData = new FormData(form);

                // Submit form data via Ajax
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // On success, show success message with SweetAlert
                        Swal.fire('Success!', 'Member updated successfully.', 'success');
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
</script>
@endpush
