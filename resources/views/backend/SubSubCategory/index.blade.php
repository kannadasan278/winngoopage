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

                         @if (Auth::guard('admin')->user()->can('subsubcategories.create'))
                <a class="btn btn-primary text-white" href="{{ route('admin.subsubcategories.create') }}"  style="float: right;margin-top: 10px;margin-right: 10px;">Create New SubSubCategory</a>

                        @endif
                    </p>
                <div class="card-body">

  <h4 class="header-title float-left">All SubSubCategory List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Sub-SubCategory Name</th>
                                                    <th>SubCategory Name</th>
                                                    <th>Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                              <tbody>
                                                @foreach ($subsubCategories as $item)
                                                <tr role="row" class="odd">
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td class="sorting_1" style="text-transform: capitalize">{{ $item->subsubcategory_name_en }}</td>
                                                    <td style="text-transform: capitalize">{{ $item->subcategory->subcategory_name_en }}</td>
                                                    <td style="text-transform: capitalize">{{ $item->category->category_name_en }}</td>
                                                       <td>
                                                    @if (Auth::guard('admin')->user()->can('subsubcategories.edit'))
                                                        <a class="btn btn-success waves-effect waves-light btn-sm edi" href="{{ route('admin.subsubcategories.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('subsubcategories.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.subsubcategories.destroy', $item->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.subsubcategories.destroy', $item->id) }}" method="POST" style="display: none;">
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

