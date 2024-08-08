@extends('backend.layouts.master')
@section('title','Winngoo Page || DASHBOARD')
@push('styles')
<style>
    .msi_rep{
    background: green;
    color: white;
    border: initial;
    font-size: 13px;
    }
     .msi_pen{
    background: rgb(128, 119, 0);
    color: white;
    border: initial;
    font-size: 13px;
    }
     .msi_rej{
    background: rgb(128, 0, 0);
    color: white;
    border: initial;
    font-size: 13px;
    }
    .msi_fran{
    background: rgb(0, 51, 128);
    color: white;
    border: initial;
    font-size: 13px;
    }
</style>
@endpush
@section('main-content')

     <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">



                     <div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">

            <div class="card">
                <div class="card-body">

  <h4 class="header-title float-left">Business List</h4>
  <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="text-transform: uppercase">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home"
                                                        aria-selected="true">Approved Business <span><button type="button" class="badge badge-success msi_rep">{{ $merchant_approved_count }}</button></span></a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                                        aria-selected="false">Pending Business <span><button type="button" class="badge badge-success msi_pen">{{ $merchant_pending_count }}</button></span></a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                                        aria-selected="false">Rejected Business <span><button type="button" class="badge badge-success msi_rej">{{ $merchant_rejected_count }}</button></span></a>
                                                </li>
                                                 <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="francise-tab" data-bs-toggle="tab" href="#francise" role="tab" aria-controls="francise"
                                                        aria-selected="false">Pending Francises List <span><button type="button" class="badge badge-danger msi_fran">{{ $franshise_pending_count }}</button></span></a>
                                                </li>
                                                 <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                                        aria-selected="false">Customer Reviews <span><button type="button" class="badge badge-warning msi_fran">{{ $reviews_pending_count }}</button></span></a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content p-3" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <p class="mb-0">
                                                        <div class="data-tables">
                                         <table id="dataTable" class="table table-bordered table-striped dataTable"
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
                                                    @foreach ($merchant_approved as $business)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td><img src="{{ asset($business->image) }}" class="img-fluid shadow" alt="Responsive image" style="width: 70px; height:40px;"></td>
                                                        <td>{{ $business->business_name }}</td>
                                                        <td style="text-transform: capitalize"><span class="badge bg-danger">{{$business->businessType->type}}</span></td>
                                                         <td>
                                                        @foreach($business->category_id as $CategoryId)
                                                        @php
                                                            $category = \App\Models\Category::find($CategoryId);
                                                        @endphp
                                                        @if($category)
                                                            <span class="badge bg-info">{{ $category->category_name_en }}</span>
                                                        @endif
                                                    @endforeach
                                                        </td>
                                                       <td>{{ $business->first_name }} {{ $business->last_name }}</td>
                                                        <td>{{ $business->email }}</td>
                                                        <td>
                                                            @if($business->status == 'approved')
                                                            <span class="badge bg-success">Approved</span>
                                                            @endif
                                                        </td>
                                                    <td>

                                                        @if (Auth::guard('admin')->user()->can('merchants.edit'))
                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.business.show', $business->id) }}"><i class="fa fa-eye"></i></a>
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
                                                    </p>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    <p class="mb-0">
                                                       <div class="data-tables">
                                         <table id="dataTablepending" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info" width="100%">
                                             <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Business Logo</th>
                                                <th>Business Name</th>
                                                <th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Email ID</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                            <tbody>
                                                    @foreach ($merchant_pending as $business)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td><img src="{{ asset($business->image) }}" class="img-fluid shadow" alt="Responsive image" style="width: 70px; height:40px;"></td>
                                                        <td>{{ $business->business_name }}</td>
                                                        <td>
                                                        @foreach($business->category_id as $CategoryId)
                                                        @php
                                                            $category = \App\Models\Category::find($CategoryId);
                                                        @endphp
                                                        @if($category)
                                                            <span class="badge bg-info">{{ $category->category_name_en }}</span>
                                                        @endif
                                                    @endforeach
                                                        </td>
                                                       <td>{{ $business->first_name }} {{ $business->last_name }}</td>
                                                        <td>{{ $business->email }}</td>
                                                        <td>
                                                            @if($business->status == 'pending')
                                                            <span class="badge bg-warning">Pending</span>
                                                            @endif
                                                        </td>
                                                    <td>

                                                        @if (Auth::guard('admin')->user()->can('merchants.edit'))
                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.business.show', $business->id) }}"><i class="fa fa-eye"></i></a>
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
                                                    </p>
                                                </div>
                                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                                    aria-labelledby="contact-tab">
                                                    <p class="mb-0">
                                                            <div class="data-tables">
                                         <table id="dataTablereject" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info" width="100%">
                                             <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Business Logo</th>
                                                <th>Business Name</th>
                                                <th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Email ID</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                            <tbody>
                                                    @foreach ($merchant_rejected as $business)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td><img src="{{ asset($business->image) }}" class="img-fluid shadow" alt="Responsive image" style="width: 70px; height:40px;"></td>
                                                        <td>{{ $business->business_name }}</td>
                                                       <td>
                                                        @foreach($business->category_id as $CategoryId)
                                                        @php
                                                            $category = \App\Models\Category::find($CategoryId);
                                                        @endphp
                                                        @if($category)
                                                            <span class="badge bg-info">{{ $category->category_name_en }}</span>
                                                        @endif
                                                    @endforeach
                                                        </td>
                                                       <td>{{ $business->first_name }} {{ $business->last_name }}</td>
                                                        <td>{{ $business->email }}</td>
                                                        <td>
                                                            @if($business->status == 'rejected')
                                                            <span class="badge bg-danger">Rejected</span>
                                                            @endif
                                                        </td>
                                                    <td>

                                                        @if (Auth::guard('admin')->user()->can('merchants.edit'))
                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.business.show', $business->id) }}"><i class="fa fa-eye"></i></a>
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
                                                    </p>
                                                </div>
                                                   <div class="tab-pane fade" id="francise" role="tabpanel"
                                                    aria-labelledby="francise-tab">
                                                    <p class="mb-0">
                                                            <div class="data-tables">
                                         <table id="dataTablefrancise" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info" width="100%">
                                             <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Merchant Name</th>
                                                <th>Business Logo</th>
                                                <th>Business Name</th>
                                                <th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Email ID</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                            <tbody>
                                                    @foreach ($franshise_pending as $business)
                                                    @php
                                                    $parent_name = $business->parent ? $business->parent->first_name : 'No Parent';
                                                    @endphp

                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>{{ $parent_name }}</td>
                                                        <td><img src="{{ asset($business->image) }}" class="img-fluid shadow" alt="Responsive image" style="width: 70px; height:40px;"></td>
                                                        <td>{{ $business->business_name }}</td>
                                                      <td>
                                                        @foreach($business->category_id as $CategoryId)
                                                        @php
                                                            $category = \App\Models\Category::find($CategoryId);
                                                        @endphp
                                                        @if($category)
                                                            <span class="badge bg-info">{{ $category->category_name_en }}</span>
                                                        @endif
                                                    @endforeach
                                                        </td>
                                                       <td>{{ $business->first_name }} {{ $business->last_name }}</td>
                                                        <td>{{ $business->email }}</td>
                                                        <td>
                                                            @if($business->status == 'pending')
                                                            <span class="badge bg-warning">Pending</span>
                                                            @endif
                                                        </td>
                                                    <td>

                                                        @if (Auth::guard('admin')->user()->can('merchants.edit'))
                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.business.show', $business->id) }}"><i class="fa fa-eye"></i></a>
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
                                                    </p>
                                                </div>
                                                     <div class="tab-pane fade" id="reviews" role="tabpanel"
                                                    aria-labelledby="reviews-tab">
                                                    <p class="mb-0">
                                                            <div class="data-tables">
                                         <table id="dataTablereviews" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info" width="100%">
                                             <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Business Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Comments</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                            <tbody>
                                                    @foreach ($reviews_pending as $business)

                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>{{ $business->merchant->business_name }}</td>
                                                      <td>
                                                       {{ $business->name }}
                                                        </td>
                                                        <td>{{ $business->email }}</td>
                                                        <td>{!! $business->comment !!}</td>
                                                        <td><span class="badge bg-danger">{{ $business->rating }}</span></td>
                                                        <td>
                                                            @if($business->status == 'active')
                                                                <button type="button" id="pendingverify" onclick="update_reviewpending(this)" class="btn btn-success waves-effect waves-light btn-size" data-pendingverify={{ $business->id }}> Active </button>
                                                            @elseif($business->status == 'inactive')
                                                             <button type="button" id="inactiveverify" onclick="update_reviewinactive(this)" class="btn btn-danger waves-effect waves-light btn-size" data-inactiveverify={{ $business->id }}> InActive </button>
                                                            @endif
                                                        </td>
                                                    <td>

                                                    @if (Auth::guard('admin')->user()->can('merchants.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.business.destroy', $business->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $business->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $business->id }}" action="{{ route('admin.review.delete', $business->id) }}" method="POST" style="display: none;">
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
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Cardbody -->
                                    </div>
                                    <!-- End Card -->
                                </div>
                                <!-- End Col -->
                            </div>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
                    </div>
                    <!-- Container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection
@push('scripts')

     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
          if ($('#dataTablepending').length) {
            $('#dataTablepending').DataTable({
                responsive: true
            });
        }
           if ($('#dataTablereject').length) {
            $('#dataTablereject').DataTable({
                responsive: true
            });
        }
          if ($('#dataTablefrancise').length) {
            $('#dataTablefrancise').DataTable({
                responsive: true
            });
        }
            if ($('#dataTablereviews').length) {
            $('#dataTablereviews').DataTable({
                responsive: true
            });
        }


  function update_reviewpending(el){

        let id = $("#pendingverify").data('pendingverify');

        $.post('{{ route('review.pending') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){

            if(data == 'true'){
                 Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Review moved to Inactive status!',
                });
                setTimeout(function(){
                    location.reload();
                }, 3000);
        }
        });

        }
          function update_reviewinactive(el){

        let id = $("#inactiveverify").data('inactiveverify');
        $.post('{{ route('review.active') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){

            if(data == 'true'){
                 Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Review moved to active status!',
                });
                setTimeout(function(){
                    location.reload();
                }, 3000);
        }
        });

        }
     </script>
@endpush

