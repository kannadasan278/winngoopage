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
                  <p class="float-right mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float: right;margin-top: 10px;margin-right: 10px;"><i class="fa fa-plus"></i>Create New Tagline</button>

                    </p>
                <div class="card-body">
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
  <h4 class="header-title float-left">Taglines List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Tagline</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($taglines as $tag)
                                                 <tr role="row" class="odd">
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $tag->tagline }}</td>
                                                    <td>@if($tag->status == 'inactive')
                                                        <span class="badge bg-danger">InActive</span>
                                                        @else
                                                        <span class="badge bg-success">Active</span>
                                                        @endif
                                                    </td>

                                                     <td>
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('merchant.taglines.destroy', $tag->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tag->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $tag->id }}" action="{{ route('merchant.taglines.destroy', $tag->id) }}" method="POST" style="display: none;">
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

                                        <form id="profile-photo-form" action="{{ route('merchant.taglines.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="merchant_id" value="{{ Auth::guard('merchant')->user()->id }}">
                                            <div class="form-group mb-3">
                                                <label for="photo">Create New Tagline</label>
                                                <input type="type" name="tagline" id="tagline" placeholder="Enter tagline" class="form-control @error('tagline') is-invalid @enderror">
                                                @error('tagline')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Tagline</button>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                    <!-- Container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
 $('#profile-photo-form').validate({

                rules: {
                    tagline: {
                        required: true,
                    }
                },
                messages: {
                    image: {
                        required: "Please enter tagline.",
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
     </script>
@endpush

