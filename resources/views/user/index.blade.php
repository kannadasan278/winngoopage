@extends('user.layouts.master')
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
                                        <h4 class="mb-0 font-size-18">Hi {{ Auth()->user()->name }} welcome to Customer Dashboard!</h4>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    </div></div></div>
@endsection

