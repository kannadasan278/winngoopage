@extends('backend.layouts.master')
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

                         @if (Auth::guard('admin')->user()->can('categories.create'))
                <a class="btn btn-primary text-white" href="{{ route('admin.categories.create') }}"  style="float: right;margin-top: 10px;margin-right: 10px;">Create New Category</a>

                        @endif
                    </p>
                <div class="card-body">

  <h4 class="header-title float-left">Category List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Category ICON</th>
                                                    <th>Category Name</th>
                                                    <th>Category Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $item)
                                                <tr role="row" class="odd">
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item->category_icon }}</td>
                                                    <td class="sorting_1" style="text-transform: capitalize">{{ $item->category_name_en }}</td>
                                                    <td>
                                                        <img src="{{ asset('upload/categories/' . $item->category_image) }}" alt="" style="width: 70px; height:40px;">
                                                    </td>

                                                     <td>
                                                    @if (Auth::guard('admin')->user()->can('categories.edit'))
                                                        <a class="btn btn-success waves-effect waves-light btn-sm edi" href="{{ route('admin.categories.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('categories.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.categories.destroy', $item->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.categories.destroy', $item->id) }}" method="POST" style="display: none;">
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

     </script>
@endpush

