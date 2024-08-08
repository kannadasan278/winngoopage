@extends('user.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')
@push('styles')
<style>
    .required {
        color: red;
        margin-left: 5px;
    }
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error {
        font-weight: 300;
        color: red;
    }
    .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            margin-right: 10px;
            color: #000;
            z-index: 2;
            display: block;
        }
         .invalid-feedback {
            display: none; /* Keep invalid feedback hidden by default */
            color: red;
            margin-top: 5px; /* Updated margin-top for invalid feedback */
        }
</style>
@endpush
@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid hide">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Change Password</h4>
                        </div>
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
                            <h4 class="card-title">Change Password</h4>
                            <form id="changePasswordForm" novalidate="novalidate">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="current_password" class="col-form-label text-md-right">Current Password</label>
                                    <input id="current_password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password" class="col-form-label text-md-right">New Password</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="new_confirm_password" class="col-form-label text-md-right">New Confirm Password</label>
                                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="new-password">
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
       {{--  $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "current_password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "current_password");
                }
            });
             $(".toggle-newpass").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "new_password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "new_password");
                }
            });
             $(".toggle-newconpass").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "new_confirm_password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "new_confirm_password");
                }
            });  --}}
  $(document).ready(function () {
    $("#changePasswordForm").validate({
        rules: {
            current_password: {
                required: true,
                minlength: 8
            },
            new_password: {
                required: true,
                minlength: 8
            },
            new_confirm_password: {
                required: true,
                minlength: 8,
                equalTo: "#new_password"
            }
        },
        messages: {
            current_password: {
                required: "Please enter your current password",
                minlength: "Your password must be at least 8 characters long"
            },
            new_password: {
                required: "Please enter a new password",
                minlength: "Your password must be at least 8 characters long"
            },
            new_confirm_password: {
                required: "Please confirm your new password",
                minlength: "Your password must be at least 8 characters long",
                equalTo: "New passwords do not match"
            }
        },
        submitHandler: function (form) {
            $.ajax({
                    url: "{{ route('change.password') }}",
                type: 'POST',
                data: $(form).serialize(),
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Optionally, redirect or perform another action
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while changing the password. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
});
</script>
@endpush
