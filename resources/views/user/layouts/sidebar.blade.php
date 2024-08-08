  <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    <div class="user-details">
                        <div class="d-flex">
                            <div class="me-2">
                                <img src="{{asset('merchant/images/users/avatar-4.jpg')}}" alt="" class="avatar-md rounded-circle">
                            </div>
                            <div class="user-info w-100">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Donald Johnson
                                        <i class="mdi mdi-chevron-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-account-circle text-muted me-2"></i>
                                                Profile<div class="ripple-wrapper me-2"></div>
                                            </a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-cog text-muted me-2"></i>
                                                Settings</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock-open-outline text-muted me-2"></i>
                                                Lock screen</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power text-muted me-2"></i>
                                                Logout</a></li>
                                    </ul>
                                </div>

                                <p class="text-white-50 m-0">Administrator</p>
                            </div>
                        </div>
                    </div>


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{route('user')}}" class="waves-effect">
                                    <i class="mdi mdi-home"></i>
                                    <span>Dashboard</span>

                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user-profile') }}" class="waves-effect">
                                    <i class="mdi mdi-book-information-variant"></i>
                                    <span>Personal Information</span>
                                </a>
                            </li>

                                <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-wallet-membership"></i>
                                    <span>Membership details </span>
                                </a>
                            </li>

                              <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-point-of-sale"></i>
                                    <span>Favourte</span>
                                </a>
                            </li>

                               <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-fridge-alert-outline"></i>
                                    <span>Refer a friend</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-email-newsletter"></i>
                                    <span>Newsletter</span>
                                </a>
                            </li>

                             <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-email-multiple-outline"></i>
                                    <span>News</span>
                                </a>
                            </li>




                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
