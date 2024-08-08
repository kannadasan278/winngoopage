
@extends('backend.layouts.master')
@section('title','Winngoo Page || DASHBOARD')
@push('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
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
                            <h4 class="mb-0 font-size-18">Create Role</h4>
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
                            <h4 class="card-title">Create New Role</h4>

                            <form id="roleCreateForm" action="{{ route('admin.roles.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Role Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Role Name" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="permissions">Permissions</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    <hr>
                                    @php $i = 1; @endphp
                                    @foreach ($permission_groups as $group)
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                    <label class="form-check-label" for="{{ $i }}Management">{{ $group->name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                                @php
                                                    $permissions = App\User::getpermissionsByGroupName($group->name);
                                                    $j = 1;
                                                @endphp
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
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

                                <button type="submit" class="btn btn-primary waves-effect">Save Role</button>
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
            @include('backend.roles.partials.scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();

        // Check all permissions
        $('#checkPermissionAll').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        // Check/uncheck group permissions
        window.checkPermissionByGroup = function(classname, checkThis) {
            const groupIDName = $("#" + checkThis.id);
            const classCheckBox = $('.' + classname + ' input');
            if (groupIDName.is(':checked')) {
                classCheckBox.prop('checked', true);
            } else {
                classCheckBox.prop('checked', false);
            }
        };

        // Custom validation rule for no numbers allowed
        $.validator.addMethod("noNumbers", function(value, element) {
            return this.optional(element) || /^[^0-9]+$/.test(value);
        }, "Numbers are not allowed in the role name");

        // jQuery Validation
        $('#roleCreateForm').validate({
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
                            text: 'Role created successfully!',
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
                                text: 'There was an error creating the role!',
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
