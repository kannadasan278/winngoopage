@extends('backend.layouts.master')
@section('title','Winngoo Page || DASHBOARD')
@section('main-content')

     <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <div class="page-title">
                                        <h4 class="mb-0 font-size-18">Dashboard</h4>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Start page content-wrapper -->
                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-info mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h5 class="text-uppercase verti-label font-size-16  text-white-50">Members
                                                </h5>
                                                <div class="text-white">
                                                    <h5 class="text-uppercase font-size-16  text-white-50">Members</h5>
                                                    <h3 class="mb-3 text-white">100</h3>
                                                    <div class="">
                                                        <span class="badge bg-light text-info"> view </span> <span
                                                            class="ms-2">From previous period</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-cube-outline display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h5 class="text-uppercase verti-label font-size-16  text-white-50">Merchants
                                                </h5>
                                                <div class="text-white">
                                                    <h5 class="text-uppercase font-size-16  text-white-50">Approved Merchants</h5>
                                                    <h3 class="mb-3 text-white">10</h3>
                                                    <div class="">
                                                        <span class="badge bg-light text-danger"> view </span> <span
                                                            class="ms-2">From previous period</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-buffer display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h5 class="text-uppercase verti-label font-size-16  text-white-50">Wholesaler
                                                </h5>
                                                <div class="text-white">
                                                    <h5 class="text-uppercase text-white-50">Approved Wholesaler</h5>
                                                    <h3 class="mb-3 text-white">100</h3>
                                                    <div class="">
                                                        <span class="badge bg-light  text-primary"> view </span>
                                                        <span class="ms-2">From previous period</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-tag-text-outline display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h5 class="text-uppercase verti-label font-size-16  text-white-50">Charity
                                                </h5>
                                                <div class="text-white">
                                                    <h5 class="text-uppercase font-size-16  text-white-50">Approved Charity
                                                    </h5>
                                                    <h3 class="mb-3 text-white">1890</h3>
                                                    <div class="">
                                                        <span class="badge bg-light text-info"> view </span> <span
                                                            class="ms-2">From previous period</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-briefcase-check display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->

                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-8 border-end">
                                                    <h4 class="card-title mb-4">Members Report</h4>
                                                    <div id="morris-area-example" class="dashboard-charts morris-charts" data-colors='["--bs-light", "--bs-danger", "--bs-primary"]'>
                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-xl-4">
                                                    <h4 class="card-title mb-4">Yearly Members Report</h4>
                                                    <div class="p-3">
                                                        <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="pills-first-tab"
                                                                    data-bs-toggle="pill" href="#pills-first" role="tab"
                                                                    aria-controls="pills-first"
                                                                    aria-selected="true">2015</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="pills-second-tab"
                                                                    data-bs-toggle="pill" href="#pills-second" role="tab"
                                                                    aria-controls="pills-second"
                                                                    aria-selected="false">2016</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="pills-third-tab"
                                                                    data-bs-toggle="pill" href="#pills-third" role="tab"
                                                                    aria-controls="pills-third"
                                                                    aria-selected="false">2017</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content">
                                                            <div class="tab-pane show active" id="pills-first"
                                                                role="tabpanel" aria-labelledby="pills-first-tab">
                                                                <div class="p-3">
                                                                    <h2>$17562</h2>
                                                                    <p class="text-muted">Maecenas nec odio et ante
                                                                        tincidunt tempus. Donec vitae sapien ut libero
                                                                        venenatis faucibus Nullam quis ante.</p>
                                                                    <a href="#" class="text-primary">Read more...</a>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="pills-second" role="tabpanel"
                                                                aria-labelledby="pills-second-tab">
                                                                <div class="p-3">
                                                                    <h2>$18614</h2>
                                                                    <p class="text-muted">Maecenas nec odio et ante
                                                                        tincidunt tempus. Donec vitae sapien ut libero
                                                                        venenatis faucibus Nullam quis ante.</p>
                                                                    <a href="#" class="text-primary">Read more...</a>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="pills-third" role="tabpanel"
                                                                aria-labelledby="pills-third-tab">
                                                                <div class="p-3">
                                                                    <h2>$19752</h2>
                                                                    <p class="text-muted">Maecenas nec odio et ante
                                                                        tincidunt tempus. Donec vitae sapien ut libero
                                                                        venenatis faucibus Nullam quis ante.</p>
                                                                    <a href="#" class="text-primary">Read more...</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Members Analytics</h4>
                                            <div id="morris-donut-example" class="dashboard-charts morris-charts" data-colors='["--bs-light",  "--bs-primary", "--bs-success"]'></div>
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- end row -->


                            <!-- end row -->

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Latest Member</h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">(#) Id</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col" colspan="2">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">#15236</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-2.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Jeanette
                                                                    James
                                                                </div>
                                                            </td>
                                                            <td>14/8/2018</td>
                                                            <td>$104</td>
                                                            <td><span class="badge bg-success">Delivered</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#15237</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-3.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Christopher
                                                                    Taylor
                                                                </div>
                                                            </td>
                                                            <td>15/8/2018</td>
                                                            <td>$112</td>
                                                            <td><span class="badge bg-warning">Pending</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#15238</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-4.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Edward
                                                                    Vazquez
                                                                </div>
                                                            </td>
                                                            <td>15/8/2018</td>
                                                            <td>$116</td>
                                                            <td><span class="badge bg-success">Delivered</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#15239</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-5.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Michael
                                                                    Flannery
                                                                </div>
                                                            </td>
                                                            <td>16/8/2018</td>
                                                            <td>$109</td>
                                                            <td><span class="badge bg-primary">Cancel</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#15240</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-6.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Jamie
                                                                    Fishbourne
                                                                </div>
                                                            </td>
                                                            <td>17/8/2018</td>
                                                            <td>$120</td>
                                                            <td><span class="badge bg-success">Delivered</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End Cardbody -->
                                    </div>
                                    <!-- End card -->
                                </div>
                                <!-- End Col -->

                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Latest Merchants</h4>
                                            <div class="table-responsive order-table">
                                                <table class="table table-hover align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">(#) Id</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Date/Time</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col" colspan="2">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">#14562</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-4.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Matthew
                                                                    Drapeau
                                                                </div>
                                                            </td>
                                                            <td>17/8/2018
                                                                <p class="font-size-13 text-muted mb-0">8:26AM</p>
                                                            </td>
                                                            <td>$104</td>
                                                            <td><span class="badge bg-soft-success rounded-pill"><i
                                                                        class="mdi mdi-checkbox-blank-circle text-success"></i>
                                                                    Delivered</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#14563</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-5.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Ralph Shockey
                                                                </div>
                                                            </td>
                                                            <td>18/8/2018
                                                                <p class="font-size-13 text-muted mb-0">10:18AM</p>
                                                            </td>
                                                            <td>$112</td>
                                                            <td><span class="badge bg-soft-warning rounded-pill"><i
                                                                        class="mdi mdi-checkbox-blank-circle text-warning"></i>
                                                                    Pending</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#14564</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-6.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Alexander
                                                                    Pierson
                                                                </div>
                                                            </td>
                                                            <td>18//8/2018
                                                                <p class="font-size-13 text-muted mb-0">12:36PM</p>
                                                            </td>
                                                            <td>$116</td>
                                                            <td><span class="badge bg-soft-success rounded-pill"><i
                                                                        class="mdi mdi-checkbox-blank-circle text-success"></i>
                                                                    Delivered</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#14565</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-7.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Robert Rankin
                                                                </div>
                                                            </td>
                                                            <td>19/8/2018
                                                                <p class="font-size-13 text-muted mb-0">11:47AM</p>
                                                            </td>
                                                            <td>$109</td>
                                                            <td><span class="badge bg-soft-primary rounded-pill"><i
                                                                        class="mdi mdi-checkbox-blank-circle text-primary"></i>
                                                                    Cancel</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">#14566</th>
                                                            <td>
                                                                <div>
                                                                    <img src="{{asset('backend/images/users/avatar-8.jpg')}}" alt=""
                                                                        class="avatar-md rounded-circle me-2"> Myrna Shields
                                                                </div>
                                                            </td>
                                                            <td>20/8/2018
                                                                <p class="font-size-13 text-muted mb-0">02:52PM</p>
                                                            </td>
                                                            <td>$120</td>
                                                            <td><span class="badge bg-soft-success rounded-pill"><i
                                                                        class="mdi mdi-checkbox-blank-circle text-success"></i>
                                                                    Delivered</span></td>
                                                            <td>
                                                                <div>
                                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end page-content-wrapper-->

                    </div>
                    <!-- Container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection

