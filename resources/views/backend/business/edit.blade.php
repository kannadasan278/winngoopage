@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
                            <h4 class="mb-0 font-size-18">Merchant Profile Edit</h4>
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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Profile</h4>
                                    <form method="POST" action="{{ route('merchant.merchant-profile-update', $merchant_details->id) }}" id="profileForm" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="first_name">First Name<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{$merchant_details->first_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="last_name">Last Name<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{$merchant_details->last_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="phone_number">Phone Number<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone Number" value="{{$merchant_details->phone_number}}">
                                                </div>
                                            </div>
                                        </div>
                                               <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="address_line_1">Address Line 1<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Enter Address Line 1" value="{{$merchant_details->address_line_1}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="address_line_2">Address Line 2</label>
                                                    <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Enter Address Line 2" value="{{$merchant_details->address_line_2}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="address_line_3">Address Line 3</label>
                                                    <input type="text" class="form-control" name="address_line_3" id="address_line_3" placeholder="Enter Address Line 3" value="{{$merchant_details->address_line_3}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="city">City<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="{{$merchant_details->city}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="post_code">Post Code<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Enter Post Code" value="{{$merchant_details->post_code}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="country">Country<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" value="{{$merchant_details->country}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="business_name">Business Name<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="business_name" id="business_name" placeholder="Enter Business Name" value="{{$merchant_details->business_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="trading_name">Trading Name<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="trading_name" id="trading_name" placeholder="Enter Trading Name" value="{{$merchant_details->trading_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="category_id">Category</label>
                                                    <select class="form-control select2" name="category_id[]" id="category_id">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $merchant_details->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if($merchant_details->othercategory)
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="othercategory">Other Category</label>
                                                    <input type="text" class="form-control" name="othercategory" id="othercategory" placeholder="Enter Other Category" value="{{$merchant_details->othercategory}}">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="sub_category_id">Sub Category</label>
                                                    <select class="form-control select2" name="sub_category_id[]" id="sub_category_id">
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" {{ $merchant_details->sub_category_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @if($merchant_details->othercategory)
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="othersubcategory">Other Sub Category</label>
                                                    <input type="text" class="form-control" name="othersubcategory" id="othersubcategory" placeholder="Enter Other Sub Category" value="{{$merchant_details->othersubcategory}}">
                                                </div>
                                            </div>
                                            @endif
                                             <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="website_link">Website Link</label>
                                                    <input type="url" class="form-control" name="website_link" id="website_link" placeholder="Enter Website Link" value="{{$merchant_details->website_link}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image">Company Logo</label>
                                                    <input type="file" class="form-control" name="image" id="image">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="business_description">Business Description</label>
                                                    <textarea class="form-control" name="business_description" id="business_description" rows="4" placeholder="Enter Business Description">{!! $merchant_details->business_description !!}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('merchant.merchant-profile-update', $merchant_details->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Company Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Choose Logo</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
        // Initialize Select2
        $('.select2').select2();
      $(document).ready(function () {

         $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/admin/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="sub_category_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
          }
      });
    });
    $(document).ready(function() {
        $('#profileForm').validate({
            rules: {
                address_line_1: "required",
                city: "required",
                post_code: "required",
                country: "required",
                phone_number: {
                    required: true,
                    digits: true
                },
                business_name: "required",
                category_id: "required",


            },
            messages: {
                address_line_1: "Please enter address line 1",
                city: "Please enter city",
                post_code: "Please enter post code",
                country: "Please enter country",
                phone_number: {
                    required: "Please enter phone number",
                    digits: "Please enter a valid phone number"
                },
                business_name: "Please enter business name",
                category_id: "Please select a category",
                business_description: "Please enter business description",

            }
        });
    });

    //summernote
 $(document).ready(function() {
            $('#business_description').summernote({
                placeholder: 'Enter Business Description',
                tabsize: 2,
                height: 125,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
 });

</script>
@endpush
