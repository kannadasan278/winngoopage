@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<style>
    .form-check-label {
        text-transform: capitalize;
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
                            <h4 class="mb-0 font-size-18">Create Banner</h4>
                            <a href="{{ route('admin.banners.index') }}"
                                class="btn btn-danger waves-effect waves-light float-right" style="float: right;margin-top: 10px;margin-left: 1400px;">Back List Banners</a>
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
                            <h4 class="card-title">Create New Banner</h4>
                            <form id="bannerForm" action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title">Title<span class="required">*</span></label>
                                            <input type="text" name="title" id="title" class="form-control" value="Home" placeholder="Enter title" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image">Image: <span class="required">*</span></label>
                                            <input type="file" name="image" id="image" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6"></div>
                                </div>
                                <br>
                                <button type="submit" id="bannerBtn" class="btn btn-primary">Save</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    // jQuery validation
    $('#bannerForm').validate({
        rules: {
            title: {
                required: true,
            },
            image: {
                required: true,
                extension: "jpg|jpeg|png|gif|svg",
                filesize: 2048000, // 2 MB
            },
            description: {
                required: false,
            }
        },
        messages: {
            title: {
                required: "Please enter the title",
            },
            image: {
                required: "Please select an image",
                extension: "Please select a valid image file (jpg, jpeg, png, gif, svg)",
                filesize: "File size must be less than 2 MB",
            }
        },
        submitHandler: function(form) {
            var formData = new FormData(form);

            // Submit form data using AJAX
            $.ajax({
                url: "{{ route('admin.banners.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Banner created successfully!',
                    }).then(() => {
                        // Redirect to the banners index page or perform other actions
                        window.location.href = "{{ route('admin.banners.index') }}";
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to create banner: ' + error,
                    });
                }
            });
        }
    });

    $.validator.addMethod("filesize", function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param);
    });
});
</script>
@endpush
