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

                         @if (Auth::guard('admin')->user()->can('coupon.create'))
                <a class="btn btn-primary text-white" href="{{ route('admin.coupons.create') }}"  style="float: right;margin-top: 10px;margin-right: 10px;">Create Coupon</a>

                        @endif
                    </p>
                <div class="card-body">

  <h4 class="header-title float-left">Coupon List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                              <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Discount Type</th>
                                            <th>Discount Value</th>
                                            <th>Start Date</th>
                                            <th>Expiry Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                                     @foreach ($coupons as $coupon)
                                                    <tr>
                                                   <td>{{ $coupon->id }}</td>
                                                    <td>{{ $coupon->code }}</td>
                                                    <td>
                                                        @if($coupon->coupon_type == 'fixed')
                                                        <span class="badge bg-warning text-dark">Fixed</span>
                                                        @else
                                                        <span class="badge bg-info text-dark">Percentage</span>
                                                        @endif
                                                    </td>
                                                    <td><span>&#163;</span>{{ $coupon->discount }}</td>
                                                    <td>{{ $coupon->start_date }}</td>
                                                    <td>{{ $coupon->expiry_date }}</td>
                                                    <td>

                                                           @if (Auth::guard('admin')->user()->can('coupon.show'))
                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.coupons.show', $coupon->id) }}"><i class="fa fa-eye"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('coupon.edit'))
                                                        <a class="btn btn-success waves-effect waves-light btn-sm edi" href="{{ route('admin.coupons.edit', $coupon->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('coupon.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.coupons.destroy', $coupon->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $coupon->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $coupon->id }}" action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" style="display: none;">
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

