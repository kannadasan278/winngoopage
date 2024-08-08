@extends('merchant.layouts.master')
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
                            <h4 class="mb-0 font-size-18">Merchant Information</h4>
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
                 <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Company Logo</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset($merchant_profile->image) }}" class="img-fluid shadow" alt="Responsive image"><div class="card-body">
                                          <a class="btn btn-primary waves-effect waves-light" target="_blank" href="{{ $merchant_profile->website_link }}">Visit Site</a>  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i>Add Company Logo</button></div></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Merchant Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">Business Type</th>
                                <td style="text-transform: capitalize"><span class="badge bg-danger">{{$merchant_profile->businessType->type}}</span></td>
                            </tr>
                            {{--  <tr>
                                <th class="text-nowrap" scope="row">Username</th>
                                <td style="text-transform: capitalize"><span class="">{{$merchant_profile->username}}</span></td>
                            </tr>  --}}
                            <tr>
                                <th class="text-nowrap" scope="row">Name</th>
                                <td style="text-transform: capitalize">{{$merchant_profile->first_name}} {{ $merchant_profile->last_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Email</th>
                                <td>{{$merchant_profile->email}}</td>
                            </tr>

                            <tr>
                                <th class="text-nowrap" scope="row">Phone Number</th>
                                <td>{{$merchant_profile->phone_number}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Status</th>
                                <td style="text-transform: capitalize">
                                @if($merchant_profile->status == 'pending')
                                <span class="badge bg-warning">Pending
                                </span>
                                @elseif($merchant_profile->status == 'approved')
                                <span class="badge bg-success">Approved
                                </span>
                                @elseif($merchant_profile->status == 'rejected')
                                <span class="badge bg-danger">Rejected
                                </span>
                                @endif
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Address Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">Address 1</th>
                                <td>{{$merchant_profile->address_line_1}}</td>
                            </tr>
                            @if($merchant_profile->address_line_2)
                            <tr>
                                <th class="text-nowrap" scope="row">Address 2</th>
                                <td>{{$merchant_profile->address_line_2}}</td>
                            </tr>
                            @endif
                            @if($merchant_profile->address_line_3)
                            <tr>
                                <th class="text-nowrap" scope="row">Address 3</th>
                                <td>{{$merchant_profile->address_line_3}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-nowrap" scope="row">City</th>
                                <td>{{$merchant_profile->city}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Post Code</th>
                                <td>{{$merchant_profile->post_code}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Country</th>
                                <td><span class="badge bg-primary">{{$merchant_profile->country}}</span></td>
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
                <h4 class="card-title">Business Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                             <tr>
                                <th class="text-nowrap" scope="row">Business Name</th>
                                <td>{{$merchant_profile->business_name}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Trading Name</th>
                                <td>{{$merchant_profile->trading_name}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Category</th>
                                <td>
                                @foreach($merchant_profile->category_id as $CategoryId)
                                @php
                                    $category = \App\Models\Category::find($CategoryId);
                                @endphp
                                @if($category)
                                    <span class="badge bg-info">{{ $category->category_name_en }}</span>
                                @endif
                            @endforeach
                                </td>
                            </tr>
                            @if($merchant_profile->othercategory)
                            <tr>
                                <th class="text-nowrap" scope="row">Other Category</th>
                                <td>{{$merchant_profile->othercategory}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-nowrap" scope="row">Sub Category</th>
                                <td>
                                     @foreach($merchant_profile->sub_category_id as $subCategoryId)
                                @php
                                    $subcategory = \App\Models\SubCategory::find($subCategoryId);
                                @endphp
                                @if($subcategory)
                                    <span class="badge bg-info">{{ $subcategory->subcategory_name_en }}</span>
                                @endif
                           @endforeach
                            </td>
                            </tr>
                            @if($merchant_profile->othersubcategory)
                            <tr>
                                <th class="text-nowrap" scope="row">Other Subcategory</th>
                                <td>{{$merchant_profile->othersubcategory}}</td>
                            </tr>
                            @endif



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Addtional Information</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                              <tr>
                                <th class="text-nowrap" scope="row">Business Description</th>
                                <td style="text-wrap: balance;">{!! $merchant_profile->business_description !!}</td>
                            </tr>
                            @if($merchant_profile->coupon_code)
                            <tr>
                                <th class="text-nowrap" scope="row">Coupon Code</th>
                                <td>{{$merchant_profile->coupon_code}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-nowrap" scope="row">Start Date</th>
                                <td><span class="">{{$merchant_profile->created_at}}</span></td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Expire Date</th>
                                <td><span class="">{{$expiry_date}}</span></td>
                            </tr>
                             <tr>
                                <th class="text-nowrap" scope="row">Business Hours</th>
                                <td>
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Click Here</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
             </div>

            </div>
        </div>
    </div>
</div>


                                            <!--  Modal content for the above example -->
                                            <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myExtraLargeModalLabel">
                                                                Business Hours</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                       <table class="table table-responsive text-center">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">MONDAY</th>
                                                                <th scope="col">TUESDAY</th>
                                                                <th scope="col">WEDNESDAY</th>
                                                                <th scope="col">THURSDAY</th>
                                                                <th scope="col">FRIDAY</th>
                                                                <th scope="col">SATURDAY</th>
                                                                <th scope="col">SUNDAY</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Opening</th>
                                                                @foreach($merchant_profile->businessHours as $hour)
                                                                    <td>{{ $hour->opening_time }}</td>
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Closing</th>
                                                                @foreach($merchant_profile->businessHours as $hour)
                                                                    <td>{{ $hour->closing_time }}</td>
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Logo Image
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="card-body">

                                        <form id="profile-photo-form" action="{{ route('merchant.logo.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="photo">Choose a profile photo:</label>
                                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Logo</button>
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

<script>

    $('#profile-photo-form').validate({

                rules: {
                    image: {
                        required: true,
                        extension: "jpeg|jpg|png|gif",
                        filesize: 2048 * 1024 // 2 MB in bytes
                    }
                },
                messages: {
                    image: {
                        required: "Please select a logo.",
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
