@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')
@push('styles')
<style>

     .required {
        color: red;
        margin-left: 5px;
    }
    .error{
           --bs-alert-color: var(--bs-danger-text-emphasis);
    --bs-alert-bg: var(--bs-danger-bg-subtle);
    --bs-alert-border-color: var(--bs-danger-border-subtle);
    --bs-alert-link-color: var(--bs-danger-text-emphasis);
    }


        @keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .blinking-text {

            animation: blink 1s infinite;
        }
        .blinking-text:hover {
    background:red;
    opacity: 1;
    -webkit-animation-name: none;
/* should be set to 100% opacity as soon as the mouse enters the box; when the mouse exits the box, the original animation should resume. */
}

</style>
@endpush
@section('main-content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Merchant Information</h4>
                        </div>
                    </div>

                </div>
                <div class="col-5">
                     <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <div class="button-items">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Reject Merchant</button>
                            @if($merchant_details->status == 'pending' || $merchant_details->status == 'rejected')
                            <button type="button" id="verify" onclick="update_approved(this)" class="btn btn-success waves-effect waves-light" data-verify={{ $merchant_details->id }}> Approve Merchant</button>
                            @endif
                            @if($merchant_details->status == 'approved')
                            <button type="button" id="pendingverify" onclick="update_pending(this)" class="btn btn-secondary waves-effect waves-light btn-size" data-pendingverify={{ $merchant_details->id }}> Pending Merchant</button>
                            @endif
                            <button class="btn btn-info waves-effect waves-light" type="submit">Edit</button>
                           @if($merchant_details->business_type_id == 2 && $merchant_details->merchant_parent_id == NULL || $merchant_details->business_type_id == 3 && $merchant_details->merchant_parent_id == NULL)
                           <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".franschse">Franchise List</button>
                           @endif
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".taglines">Taglines List</button>
                            <a href="{{ route('admin.business.index') }}"><button class="btn btn-warning waves-effect waves-light">Go Back</button></a>

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

                 <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Company Logo</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset($merchant_details->image) }}" class="img-fluid shadow" alt="Responsive image"><div class="card-body" style="text-align-last: center;">
                                          <a class="btn btn-primary waves-effect waves-light" target="_blank" href="{{ $merchant_details->website_link }}">Visit Site</a> </div></td>
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
                                <td style="text-transform: capitalize"><span class="badge bg-danger">{{$merchant_details->businessType->type}}</span></td>
                            </tr>
                            {{--  <tr>
                                <th class="text-nowrap" scope="row">Username</th>
                                <td style="text-transform: capitalize"><span class="">{{$merchant_details->username}}</span></td>
                            </tr>  --}}
                            <tr>
                                <th class="text-nowrap" scope="row">Name</th>
                                <td style="text-transform: capitalize">{{$merchant_details->first_name}} {{ $merchant_details->last_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Email</th>
                                <td>{{$merchant_details->email}}</td>
                            </tr>

                            <tr>
                                <th class="text-nowrap" scope="row">Phone Number</th>
                                <td>{{$merchant_details->phone_number}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Status</th>
                                <td style="text-transform: capitalize">
                                @if($merchant_details->status == 'pending')
                                <span class="badge bg-warning">Pending
                                </span>
                                @elseif($merchant_details->status == 'approved')
                                <span class="badge bg-success">Approved
                                </span>
                                @elseif($merchant_details->status == 'rejected')
                                <span class="badge bg-danger">Rejected
                                </span>
                                @endif
                            </td>
                            </tr>
                            @if($merchant_details->status == 'rejected')
                            <tr>
                               <th class="text-nowrap" scope="row">Rejected Comment</th>
                                <td style="text-transform: capitalize">
                                @if($merchant_details->rejected_comments == NULL)
                                <span class="badge bg-warning blinking-text">{{ $merchant_details->rejected_reason }}
                                </span>
                                @else
                                 <span class="badge bg-warning blinking-text">{{ $merchant_details->rejected_comments }}
                                </span>
                                @endif
                                </td>
                            </tr>
                            @endif
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
                                <td>{{$merchant_details->address_line_1}}</td>
                            </tr>
                            @if($merchant_details->address_line_2)
                            <tr>
                                <th class="text-nowrap" scope="row">Address 2</th>
                                <td>{{$merchant_details->address_line_2}}</td>
                            </tr>
                            @endif
                            @if($merchant_details->address_line_3)
                            <tr>
                                <th class="text-nowrap" scope="row">Address 3</th>
                                <td>{{$merchant_details->address_line_3}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-nowrap" scope="row">City</th>
                                <td>{{$merchant_details->city}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Post Code</th>
                                <td>{{$merchant_details->post_code}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Country</th>
                                <td><span class="badge bg-primary">{{$merchant_details->country}}</span></td>
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
                                <td>{{$merchant_details->business_name}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Trading Name</th>
                                <td>{{$merchant_details->trading_name}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Category</th>
                                 <td>
                                @foreach($merchant_details->category_id as $CategoryId)
                                @php
                                    $category = \App\Models\Category::find($CategoryId);
                                @endphp
                                @if($category)
                                    <span class="badge bg-info">{{ $category->category_name_en }}</span>
                                @endif
                            @endforeach
                                </td>
                            </tr>
                            @if($merchant_details->othercategory)
                            <tr>
                                <th class="text-nowrap" scope="row">Other Category</th>
                                <td>{{$merchant_details->othercategory}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-nowrap" scope="row">Sub Category</th>

                             <td>
                                     @foreach($merchant_details->sub_category_id as $subCategoryId)
                                @php
                                    $subcategory = \App\Models\SubCategory::find($subCategoryId);
                                @endphp
                                @if($subcategory)
                                    <span class="badge bg-info">{{ $subcategory->subcategory_name_en }}</span>
                                @endif
                           @endforeach
                            </td>
                            </tr>
                            @if($merchant_details->othersubcategory)
                            <tr>
                                <th class="text-nowrap" scope="row">Other Subcategory</th>
                                <td>{{$merchant_details->othersubcategory}}</td>
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
                                <td style="text-wrap: balance;">{!! $merchant_details->business_description !!}</td>
                            </tr>
                            @if($merchant_details->coupon_code)
                            <tr>
                                <th class="text-nowrap" scope="row">Coupon Code</th>
                                <td>{{$merchant_details->coupon_code}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-nowrap" scope="row">Start Date</th>
                                <td><span class="">{{$merchant_details->created_at}}</span></td>
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
                            @foreach($merchant_details->businessHours as $hour)
                                <td>{{ $hour->opening_time }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th scope="row">Closing</th>
                            @foreach($merchant_details->businessHours as $hour)
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
   <!--  Modal content for the above example -->
                                            <div class="modal fade taglines" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myExtraLargeModalLabel">
                                                                Taglines List</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                      <div class="data-tables">
                                         <table id="Taglines_details" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info" width="100%">
                                             <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Merchant Name</th>
                                                <th>Tagline</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                            <tbody>
                                                    @foreach ($taglines as $business)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>

                                                       <td>{{ $business->merchant->first_name }} {{ $business->merchant->last_name }}</td>
                                                        <td>{{ $business->tagline }}</td>
                                                        <td>
                                                            @if($business->status == 'active')
                                                            <span class="badge bg-success">Active</span>
                                                            @elseif($business->status == 'inactive')
                                                            <span class="badge bg-danger">InActive</span>
                                                            @endif
                                                        </td>
                                                    <td>

                                                    <a class="btn btn-success waves-effect waves-light btn-sm delete" href="{{ route('admin.business.taglines', $business->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $business->id }}').submit();">
                                                        Approve
                                                    </a>
                                                    <form id="delete-form-{{ $business->id }}" action="{{ route('admin.business.taglines', $business->id) }}" method="POST" style="display: none;">
                                                        @method('patch')
                                                        @csrf
                                                    </form>
                                                </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>

                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
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
                            @foreach($merchant_details->businessHours as $hour)
                                <td>{{ $hour->opening_time }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th scope="row">Closing</th>
                            @foreach($merchant_details->businessHours as $hour)
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
   <!--  Modal content for the above example -->
                                            <div class="modal fade franschse" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myExtraLargeModalLabel">
                                                                Franchises List</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                      <div class="data-tables">
                                         <table id="Franchises_details" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info" width="100%">
                                             <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Business Logo</th>
                                                <th>Business Name</th>
                                                <th>Business Type</th>
                                                <th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Email ID</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                            <tbody>
                                                    @foreach ($Franchises_details as $business)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td><img src="{{ asset($business->image) }}" class="img-fluid shadow" alt="Responsive image" style="width: 70px; height:40px;"></td>
                                                        <td>{{ $business->business_name }}</td>
                                                        <td style="text-transform: capitalize"><span class="badge bg-danger">{{$business->businessType->type}}</span></td>
                                                        <td>  @foreach(json_decode($business->category_id) as $CategoryId)
                                                        <span class="badge bg-info">{{ \App\Models\Category::find($CategoryId)->category_name_en }}
                                                        </span>
                                                        @endforeach</td>
                                                       <td>{{ $business->first_name }} {{ $business->last_name }}</td>
                                                        <td>{{ $business->email }}</td>
                                                        <td>
                                                            @if($business->status == 'approved')
                                                            <span class="badge bg-success">Active</span>
                                                            @elseif($business->status == 'pending')
                                                            <span class="badge bg-danger">InActive</span>
                                                            @endif
                                                        </td>
                                                    <td>

                                                        @if (Auth::guard('admin')->user()->can('merchants.edit'))
                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.business.show', $business->id) }}" target="_blank"><i class="fa fa-eye"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('merchants.edit'))
                                                        <a class="btn btn-success waves-effect waves-light btn-sm edi" href="{{ route('admin.business.edit', $business->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('merchants.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.business.destroy', $business->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $business->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $business->id }}" action="{{ route('admin.business.destroy', $business->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                    @endif
                                                </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>

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
                                        <h5 class="modal-title" id="staticBackdropLabel">Reject Merchant
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="card-body">

                                         <form method="POST" id="rejectCommentForm" action="{{ route('business.comments', $merchant_details->id) }}" class="formContainer">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" value="{{$merchant_details->id}}" name="id">
                                            <div class="form-group">
                                                <label for="reason">Reason<span class="text-danger">*</span></label>
                                                <select class="form-control" name="delete_reason" id="delete_reason" required>
                                                    <option value="">- Select Reason -</option>
                                                    <option value="Invalid Merchant">Invalid Merchant </option>
                                                    <option value="Invalid Business">Invalid Business</option>
                                                    <option value="Image is not correct">Image is not correct</option>
                                                    <option value="Out of category">Out of category</option>
                                                    <option value="Repeated Merchant">Repeated Merchant</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <span id="delete-reason-error"></span>
                                                </div>
                                                <div class="form-group" style="display:none;" id="delete-reason-block">
                                                    <label for="deleted_comments"><b>Comments</b></label>
                                                    <textarea id="deleted_comments" name="deleted_comments" class="form-control" placeholder="Write Delete Comment"></textarea>
                                                </div>
                                                <br />
                                                <div class="btn-wraper">
                                                    <button type="submit" id="rejectSubmit" class="btn btn-danger mr-2">Confirm Reject</button>
                                                </div>

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
      {{--  if ($('#Franchises_details').length) {
            $('#Franchises_details').DataTable({
                responsive: true
            });
        }  --}}

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

      function update_approved(el){

        let text = "Are you sure want to approve this Merchant?";
        if (confirm(text) == true) {
            text = "You pressed OK!";
        } else {
            text = "You canceled!";
            return false;
        }

       // var nextappQuestion =  <?php //echo json_encode($nextappQuestion) ?>;
        let id = $("#verify").data('verify');

        $.post('{{ route('business.approved') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){

            if(data == 'true'){
                  Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Merchant Approved Successfully',
                });
                setTimeout(function(){
                    location.reload();
                  // location.href= '/question/'+ nextappQuestion;
                }, 3000);
        }
    });

    }

     function update_pending(el){

        // var nextappQuestion =  <?php //echo json_encode($nextappQuestion) ?>;
        let id = $("#pendingverify").data('pendingverify');

        $.post('{{ route('business.pending') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){

            if(data == 'true'){
                 Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Merchant moved to Pending status!',
                });
                setTimeout(function(){
                    location.reload();
                // location.href= '/question/'+ nextappQuestion;
                }, 3000);
        }
        });

        }

        $('#rejectSubmit').click(function(){
    if($('select#delete_reason').val() === ''){
        $('#delete-reason-error').append('please select reason');
        $('#delete-reason-error').css('color','red');
        $("#delete-reason-error").fadeOut(2000);
        return false;
    }
        $('#rejectCommentForm').submit();
});
  $('select#delete_reason').on('change', function() {
        if(this.value === 'Others'){
        $("#delete-reason-block").css("display", "block");
        }else{
        $("#delete-reason-block").css("display", "none");
        }
    });
</script>
@endpush
