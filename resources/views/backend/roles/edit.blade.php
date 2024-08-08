@extends('backend.layouts.master')
@section('title','Winngoo Page || DASHBOARD')

@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
    .form-check-input {
        background-color: #ced4da !important;
        background-image: var(--bs-form-check-bg-image);
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        border: var(--bs-border-width) solid #aeb0b3 !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    .required {
        color: red;
        margin-left: 5px;
    }
</style>
@endsection

@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Role Edit - {{ $role->name }}</h4>
                        </div>
                        <div class="state-information d-none d-sm-block"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Role</h4>
                                <br>
                                <form id="roleEditForm" action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Role Name<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="name" value="{{ $role->name }}" name="name" placeholder="Enter a Role Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="permissions">Permissions</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="checkPermissionAll">All</label>
                                        </div>
                                        <hr>
                                        @php $i = 1; @endphp
                                        @foreach ($permission_groups as $group)
                                            <div class="row">
                                                @php
                                                    $permissions = App\User::getpermissionsByGroupName($group->name);
                                                    $j = 1;
                                                @endphp
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="{{ $i }}Management">{{ $group->name }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-9 role-{{ $i }}-management-checkbox">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                        @php  $j++; @endphp
                                                    @endforeach
                                                    <br>
                                                </div>
                                            </div>
                                            @php  $i++; @endphp
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect">Update Role</button>
                                </form>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
@include('backend.roles.partials.scripts')
<script>
    $(document).ready(function() {

        // Custom validation rule for no numbers allowed
        $.validator.addMethod("noNumbers", function(value, element) {
            return this.optional(element) || /^[^0-9]+$/.test(value);
        }, "Numbers are not allowed in the role name");

        // jQuery Validation
        $('#roleEditForm').validate({
            rules: {
                name: {
                    required: true,
                    noNumbers: true
                }
            },
            messages: {
                name: {
                    required: "Please enter a role name",
                    noNumbers: "Numbers are not allowed in the role name"
                }
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                $.ajax({
                    url: form.action,
                    method: form.method,
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Role updated successfully!',
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
                                text: 'There was an error updating the role!',
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
