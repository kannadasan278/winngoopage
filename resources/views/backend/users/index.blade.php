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
                  {{--  <p class="float-right mb-2">
                         @if (Auth::guard('admin')->user()->can('members.edit'))
                            <a class="btn btn-primary text-white" href="{{ route('admin.users.create') }}"  style="float: right;margin-top: 10px;margin-right: 10px;">Create New Member</a>
                        @endif
                    </p>  --}}
                <div class="card-body">

  <h4 class="header-title float-left">Members List</h4>
                 <br>
                    <div class="clearfix"></div>
             <div class="clearfix"></div>
                    <div class="data-tables">
            <table id="dataTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Member ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Expires At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($users as $user)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td><span class="badge bg-warning text-dark">{{ $user->member_id }}</span></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                            <span class="badge bg-primary">
                                                 {{ $user->expires_at }}
                                            </span>
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('members.edit'))
                                            <a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-eye"></i></a>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('members.edit'))
                                            <a class="btn btn-success waves-effect waves-light btn-sm edit" href="{{ route('admin.users.edit', $user->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        @endif

                                        @if (Auth::guard('admin')->user()->can('members.delete'))
                                        <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.users.destroy', $user->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @endif
                                        @if (Auth::check() && Auth::user()->expires_at < Carbon::now())
                                        <div class="d-flex align-items-center justify-content-between"><a href="https://www.winngoo.co.uk/control-panel/email-verification/resend/7" class="btn btn-sm btn-outline-success mt-2">
                                        <i class="fa fa-edit"></i> Resend Link</a></div>
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

