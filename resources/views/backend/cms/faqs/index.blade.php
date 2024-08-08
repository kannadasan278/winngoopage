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

                         @if (Auth::guard('admin')->user()->can('cms.create'))
                <a class="btn btn-primary text-white" href="{{ route('admin.faqs.create') }}"  style="float: right;margin-top: 10px;margin-right: 10px;">Create New FAQ</a>

                        @endif
                    </p>
                <div class="card-body">

  <h4 class="header-title float-left">FAQ List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                          <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Faq Category</th>
                                        <th>Answer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                            <tbody>
                                                @foreach($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->faq_category }}</td>
                                        <td>{!! $faq->answer !!}</td>
                                                       <td>
                                                    @if (Auth::guard('admin')->user()->can('cms.edit'))
                                                        <a class="btn btn-success waves-effect waves-light btn-sm edi" href="{{ route('admin.faqs.edit', $faq->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('cms.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.faqs.destroy', $faq->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $faq->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $faq->id }}" action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display: none;">
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

