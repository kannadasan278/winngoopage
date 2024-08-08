@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                            <h4 class="mb-0 font-size-18">Create Category</h4>
                            <a href="{{ route('admin.categories.index') }}"
                                class="btn btn-danger waves-effect waves-light float-right" style="float: right;margin-top: 10px;margin-left: 1400px;">Back List Category</a>
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
                            <h4 class="card-title">Create New Category</h4>

                            <form id="categoryForm" method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_name_en">Category Name<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" id="category_name_en"
                                                name="category_name_en" placeholder="Enter Name" oninput="handleCreateSlug(this)">
                                            <input type="hidden" class="form-control" id="category_slug_en"
                                                name="category_slug_en" oninput="handleCreateSlug(this)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="category_image">Category Image<span
                                                    class="required">*</span></label>
                                            <input type="file" id="category_image" name="category_image"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_banner_image">Category Banner Image<span
                                                    class="required">*</span></label>
                                            <input type="file" id="category_banner_image" name="category_banner_image"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_icon">Category Icon<span
                                                    class="required">*</span></label>
                                            <select class="form-control select2" name="category_icon"
                                                id="category_icon" onchange="previewIcon()">
                                                <option value="">Select Icon</option>
                                                @foreach ($icons as $icon)
                                                    <option value="{{ $icon->name }}" data-class="{{ $icon->name }}">
                                                        {{ $icon->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="icon-preview"></div> <!-- This is where the icon preview will appear -->
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

        const category_name = document.getElementById("category_name_en");
        const category_slug = document.getElementById("category_slug_en");

        const handleCreateSlug = (elem) => {

            // replace all special characters | symbols with a space
            let title =  elem.value.replace(/[~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

            // replace space with dash/hyphen
            title = title.replace(/\s+/g, '-');
            category_slug.value = title;

        }
</script>
<script>


    // Function to preview selected icon
    function previewIcon() {
        var select = document.getElementById("category_icon");
        var selectedOption = select.options[select.selectedIndex];
        var iconClass = selectedOption.getAttribute("data-class");

        // Replace the content of the preview area with the selected icon preview
        document.getElementById("icon-preview").innerHTML = '<i class="' + iconClass + '"></i>';
    }



    $(document).ready(function () {


        // Initialize Select2
        $('.select2').select2();

        // Initialize jQuery Validate plugin
        $('#categoryForm').validate({
            rules: {
                category_name_en: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                category_image: {
                    required: true,
                    accept: "image/jpeg, image/png"
                },
                category_banner_image: {
                    required: true,
                    accept: "image/jpeg, image/png"
                },
                category_icon: {
                    required: true
                }
            },
            messages: {
                category_name_en: {
                    required: "Please enter category name",
                    minlength: "Category name must be at least 3 characters",
                    maxlength: "Category name must not exceed 255 characters"
                },
                category_image: {
                    required: "Please select a category image",
                    accept: "Only image files with .jpeg or .png extension are allowed"
                },
                category_banner_image: {
                    required: "Please select a category banner image",
                    accept: "Only image files with .jpeg or .png extension are allowed"
                },
                category_icon: {
                    required: "Please select a category icon"
                }
            },


            submitHandler: function (form) {
                var formData = new FormData(form);

                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: formData,

                    success: function (response) {

                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Category created successfully!',
                            }).then(() => {
                                form.reset();
                                $('#icon-preview').empty(); // Clear icon preview
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to create category',
                            });
                        }
                    },

                });
            }
        });
    });
</script>

@endpush
