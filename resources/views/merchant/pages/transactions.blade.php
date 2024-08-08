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

                <div class="card-body">

  <h4 class="header-title float-left">Transactions List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
        <thead>
            <tr>
                <th>ID</th>
                <th>Merchant Name</th>
                <th>Merchant Email</th>
                <th>Stripe Charge ID</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->merchant->first_name }}</td> <!-- Assuming merchant has a 'name' field -->
                <td>{{ $transaction->merchant->email }}</td>
                <td>{{ $transaction->stripe_charge_id }}</td>
                <td><span>&#163;</span>{{ $transaction->amount }}</td>
                <td>{{ $transaction->currency }}</td>
                <td>
                    @if($transaction->status == 'succeeded')
                    <span class="badge bg-success">Paid</span>
                    @else
                    <span class="badge bg-danger">Failed</span>
                    @endif
                </td>
                <td>{{ $transaction->created_at }}</td>
                <td>Invoice</td>
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

