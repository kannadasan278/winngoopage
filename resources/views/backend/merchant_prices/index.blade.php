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

                         @if (Auth::guard('admin')->user()->can('merchantfees.create'))
                <a class="btn btn-primary text-white" href="{{ route('admin.merchant-prices.create') }}"  style="float: right;margin-top: 10px;margin-right: 10px;">Create New Price</a>

                        @endif
                    </p>
                <div class="card-body">

  <h4 class="header-title float-left">Merchant Price List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Range</th>
                                                <th>Price</th>
                                                <th>VAT</th>
                                                <th>Total Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                   @foreach ($merchantPrices as $price)
                                                    <tr>
                                                        <td>{{ $price->id }}</td>
                                                        <td>{{ $price->type }}</td>
                                                        <td>{{ $price->range }}</td>
                                                        <td><span>&#163;</span>{{ $price->price }}</td>
                                                        <td><span>&#163;</span>{{ $price->vat }}</td>
                                                        <td><span>&#163;</span>{{ $price->total_price }}</td>

                                                     <td>

                                                           @if (Auth::guard('admin')->user()->can('merchantfees.show'))
                                                        <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.merchant-prices.show', $price->id) }}"><i class="fa fa-eye"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('merchantfees.edit'))
                                                        <a class="btn btn-success waves-effect waves-light btn-sm edi" href="{{ route('admin.merchant-prices.edit', $price->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->user()->can('merchantfees.delete'))
                                                    <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.merchant-prices.destroy', $price->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $price->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $price->id }}" action="{{ route('admin.merchant-prices.destroy', $price->id) }}" method="POST" style="display: none;">
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

