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
                        @if (Auth::guard('admin')->user()->can('role.create'))
                            <a class="btn btn-primary text-white" href="{{ route('admin.roles.create') }}"  style="float: right;margin-top: 10px;margin-right: 10px;">Create New Role</a>
                        @endif
                    </p>
                <div class="card-body">

                    <h4 class="header-title float-left">Roles List</h4>

                    <div class="clearfix"></div>
            <table id="dataTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="60%">Permissions</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($roles as $role)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $perm)
                                            <span class="badge bg-primary">
                                                {{ $perm->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('staff.edit'))
                                            <a class="btn btn-success waves-effect waves-light btn-sm edit" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        @endif

                                        @if (Auth::guard('admin')->user()->can('staff.edit'))
                                            <a class="btn btn-danger waves-effect waves-light btn-sm delete" href="{{ route('admin.roles.destroy', $role->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
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


     </script>
@endpush

