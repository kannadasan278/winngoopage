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

                <div class="card-body">

  <h4 class="header-title float-left">Newsletters List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email ID</th>
                                                <th>Created Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                   @foreach ($subscribers as $subscriber)
                                                    <tr>
                                                        <td>{{ $subscriber->id }}</td>
                                                        <td>{{ $subscriber->email }}</td>
                                                        <td>{{ $subscriber->created_at }}</td>

                                                     <td>

                                                    @if (Auth::guard('admin')->user()->can('newsletters.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.newsletters.destroy', $subscriber->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $subscriber->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $subscriber->id }}" action="{{ route('admin.newsletters.destroy', $subscriber->id) }}" method="POST" style="display: none;">
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

