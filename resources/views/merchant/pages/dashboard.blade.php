@extends('merchant.layouts.master')
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
                                        <h4 class="mb-0 font-size-18">Hi dhasan welcome to Merchant Dashboard!</h4>

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
                                                <h5 class="text-uppercase verti-label font-size-16  text-white-50">Merchants
                                                </h5>
                                                <div class="text-white">
                                                    <h5 class="text-uppercase font-size-16  text-white-50">Pending Merchants</h5>
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
                                                <h5 class="text-uppercase verti-label font-size-16  text-white-50">Merchants
                                                </h5>
                                                <div class="text-white">
                                                    <h5 class="text-uppercase text-white-50">Rejected Merchants</h5>
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
                                                <h5 class="text-uppercase verti-label font-size-16  text-white-50">Merchants
                                                </h5>
                                                <div class="text-white">
                                                    <h5 class="text-uppercase font-size-16  text-white-50">Total Merchants
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


                        </div></div></div></div>
@endsection

