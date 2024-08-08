@extends('backend.layouts.master')
@section('title','Winngoo Page || DASHBOARD')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
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
                            <h4 class="mb-0 font-size-18">Staff Edit</h4>
                        </div>
                        <div class="state-information d-none d-sm-block">
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
                            <h4 class="card-title">Edit Staff</h4>

                            <form id="staffEditForm">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name">Staff Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $admin->name }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Staff Email <span class="required">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $admin->email }}" required>
                                        </div>

                                        <div>
                                            <label for="roles">Assign Roles <span class="required">*</span></label>
                                            <select name="roles[]" id="roles" class="form-control select2" multiple required>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-4 mt-lg-0 mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                                        </div>

                                        <div>
                                            <label for="username">Staff Username <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required value="{{ $admin->username }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update Staff</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content-wrapper -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();

        // jQuery Validation
        $('#staffEditForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                'roles[]': {
                    required: true
                },
                
                username: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                name: {
                    required: "Please enter the staff name",
                    minlength: "The staff name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter the staff email",
                    email: "Please enter a valid email address"
                },
                'roles[]': {
                    required: "Please assign at least one role"
                },
                password: {
                    minlength: "The password must be at least 6 characters long"
                },
                password_confirmation: {
                    equalTo: "The password confirmation does not match"
                },
                username: {
                    required: "Please enter a username",
                    minlength: "The username must be at least 3 characters long"
                }
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                $.ajax({
                    url: "{{ route('admin.admins.update', $admin->id) }}",
                    method: "PUT",
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Staff updated successfully!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            window.location.reload();
                        });
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            var errors = response.responseJSON.errors;
                            var errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += value[0] + '<br>';
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                html: errorMessages,
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'There was an error updating the staff!',
                            });
                        }
                    }
                });
                return false; // Prevent default form submission
            }
        });
    });
</script>
@endpush
