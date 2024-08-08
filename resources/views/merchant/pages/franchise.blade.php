@extends('merchant.layouts.master')
@section('title','Winngoo Page || DASHBOARD')

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
                   <p class="float-right mb-2" >


                <a class="btn btn-primary text-white" href="{{ route('merchant.addfranchise') }}" style="float: right;margin-top: 10px;margin-right: 10px;">Add Franchise</a>

                    </p>
                <div class="card-body">

  <h4 class="header-title float-left">Franchise List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
                                         <table id="dataTables" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info" width="100%">
                                             <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Business Logo</th>
                                                <th>Business Name</th>
                                                <th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Email ID</th>
                                                {{--  <th>Dashboard Access</th>  --}}
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                            <tbody>
                                                    @foreach ($franchise as $business)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td><img src="{{ asset($business->image) }}" class="img-fluid shadow" alt="Responsive image" style="width: 70px; height:40px;"></td>
                                                        <td>{{ $business->business_name }}</td>
                                                        <td>  @foreach(json_decode($business->category_id) as $CategoryId)
                                                        <span class="badge bg-info">{{ \App\Models\Category::find($CategoryId)->category_name_en }}
                                                        </span>
                                                        @endforeach</td>
                                                       <td>{{ $business->first_name }} {{ $business->last_name }}</td>
                                                        <td>{{ $business->email }}</td>
                                                        {{--  <td>
                                                            @if($business->is_franchise  == 0 && $business->status == 'approved')
                                                            <button type="button" id="verify" onclick="update_dashbord_access(this)" class="btn btn-success btn-sm waves-effect waves-light" data-verify={{ $business->id }}>Active</button>
                                                            @else
                                                            <button type="button" id="verifyinactive" onclick="update_dashbord_notaccess(this)" class="btn btn-sm btn-danger waves-effect waves-light" data-verify={{ $business->id }}>InActive</button>
                                                            @endif
                                                            </td>  --}}

                                                          <td>
                                                            @if($business->status == 'approved')
                                                            <span class="badge bg-success">Approved
                                                        </span>
                                                            @else
                                                            <span class="badge bg-warning">Pending
                                                        </span>@endif
                                                    </td>

                                                    <td>

                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('merchant.franchiseshow', $business->id) }}"><i class="fa fa-eye"></i></a>

                                                        <a class="btn btn-success waves-effect waves-light btn-sm edi" href="{{ route('admin.business.edit', $business->id) }}"><i class="fas fa-pencil-alt"></i></a>

                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('merchant.delete', $business->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $business->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $business->id }}" action="{{ route('merchant.delete', $business->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTables').length) {
            $('#dataTables').DataTable({
                responsive: true
            });
        }
   function update_dashbord_access(el){
        var text = "Are you sure want to inactive this Franchise?";

        if (confirm(text) == true) {
            text = "You pressed OK!";
        } else {
            text = "You canceled!";
            return false;
        }

       // var nextappQuestion =  <?php //echo json_encode($nextappQuestion) ?>;
        let id = $("#verify").data('verify');

        $.post('{{ route('merchant.approved') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){

            if(data == 'true'){
                  Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Franchise inactive Successfully',
                });
                setTimeout(function(){
                    location.reload();
                  // location.href= '/question/'+ nextappQuestion;
                }, 3000);
        }
    });

    }

       function update_dashbord_notaccess(el){
        var text = "Are you sure want to active this Franchise?";

        if (confirm(text) == true) {
            text = "You pressed OK!";
        } else {
            text = "You canceled!";
            return false;
        }

       // var nextappQuestion =  <?php //echo json_encode($nextappQuestion) ?>;
        let id = $("#verifyinactive").data('verify');

        $.post('{{ route('merchant.updateStatusin') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){

            if(data == 'true'){
                  Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Franchise active Successfully',
                });
                setTimeout(function(){
                    location.reload();
                  // location.href= '/question/'+ nextappQuestion;
                }, 2500);
        }
    });

    }
     </script>
@endpush

