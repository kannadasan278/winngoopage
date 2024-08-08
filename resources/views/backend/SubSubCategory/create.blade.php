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
                            <h4 class="mb-0 font-size-18">Create Sub-SubCategory</h4>
                            <a href="{{ route('admin.subsubcategories.index') }}"
                                class="btn btn-danger waves-effect waves-light float-right" style="float: right;margin-top: 10px;margin-left: 1400px;">Back List SubSubCategory</a>
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
                            <h4 class="card-title">Create New SubSubCategory</h4>

                            <form id="subsubcategoryForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subsubcategory_name_en">Sub-Sub Category Name<span class="required">*</span></label>
                                            <input type="text" class="form-control" id="subsubcategory_name_en" name="subsubcategory_name_en" placeholder="Enter Name" oninput="handleCreateSlug(this)">
                                            <input type="hidden" class="form-control" id="subsubcategory_slug_en" name="subsubcategory_slug_en" oninput="handleCreateSlug(this)">
                                            <span class="text-danger error-text subsubcategory_name_en_error"></span>
                                        </div>
                                         <div class="mb-3">
                                        <label for="subsubcategory_name_en">Sub Category Name<span class="required">*</span></label>
                                    <select class="form-control select2" name="subcategory_id" aria-label="Default select example">
                                    <option value="" selected="" disabled="">Select SubCategory Name</option>
                                </select>
                                    </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_name_en">Category Name<span class="required">*</span></label>
                                            <select class="form-control select2" name="category_id">
                                                <option value="">Select Category Name</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text category_id_error"></span>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<script>
    // Slug generation
    const category_name = document.getElementById("subsubcategory_name_en");
    const category_slug = document.getElementById("subsubcategory_slug_en");

    const handleCreateSlug = (elem) => {
        // replace all special characters | symbols with a space
        let title =  elem.value.replace(/[~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

        // replace space with dash/hyphen
        title = title.replace(/\s+/g, '-');
        category_slug.value = title;
    }

    $(document).ready(function () {
         $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/admin/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
          }
      });
        // Initialize Select2
        $('.select2').select2();

        // Initialize jQuery Validate plugin
        $('#subsubcategoryForm').validate({
            rules: {
                subsubcategory_name_en: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                category_id: {
                    required: true
                },
                subcategory_id: {
                    required: true
                }
            },
            messages: {
                subcategory_name_en: {
                    required: "Please enter subsubcategory name",
                    minlength: "Subcategory name must be at least 3 characters",
                    maxlength: "Subcategory name must not exceed 255 characters"
                },
                category_id: {
                    required: "Please select a category"
                },
                  subcategory_id: {
                    required: "Please select a Subategory"
                }
            },
            errorPlacement: function (error, element) {
                // Display error messages with proper styling
                error.addClass("text-danger");
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function (form) {
                var formData = new FormData(form);

                $.ajax({
                    url: '{{ route('admin.subsubcategories.store') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {
                        $(form).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'SubSubcategory created successfully!',
                            }).then(() => {
                                form.reset();
                                $('.select2').val('').trigger('change'); // Reset Select2
                            });
                        } else {
                           Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'SubSubcategory created successfully!',
                            }).then(() => {
                                form.reset();
                                $('.select2').val('').trigger('change'); // Reset Select2
                            });
                        }
                    },
                    error: function (response) {
                        $.each(response.responseJSON.errors, function (key, value) {
                            $('.' + key + '_error').text(value[0]);
                        });
                    }
                });
            }
        });
    });
</script>
@endpush
