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
                                <a href="{{ route('merchantdashboard') }}" class="waves-effect">
                                    <i class="mdi mdi-home"></i>Dashboard</span>

                                </a>
                            </li>


                            <li>
                                <a href="{{ route('merchant.merchantinfo') }}" class="waves-effect">
                                    <i class="mdi mdi-av-timer"></i>
                                    <span>Merchant Information</span>
                                </a>
                            </li>
                            @php
                            $parent_id = Auth::guard('merchant')->user()->merchant_parent_id;
                            @endphp
                            @if(Auth::guard('merchant')->user()->business_type_id == 2 && $parent_id == NULL || Auth::guard('merchant')->user()->business_type_id == 3 && $parent_id == NULL)
                            <li>
                                <a href="{{ route('merchant.franchise') }}" class="waves-effect">
                                    <i class="mdi mdi-slack"></i>
                                    <span>Franchise</span>
                                </a>
                            </li>
                            @endif
                                    <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-language-css3"></i>
                                    <span>Spoken Language</span>
                                </a>
                            </li>
                              <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-ski-cross-country"></i>
                                    <span>Country</span>
                                </a>
                            </li>

                              <li>
                                <a href="{{ route('merchant.taglines.index') }}" class="waves-effect">
                                    <i class="mdi mdi-charity"></i>
                                    <span>Tag line </span>
                                </a>
                            </li>
                             <li>
                                <a href="{{ route('merchant.transaction') }}" class="waves-effect">
                                    <i class="mdi mdi-factory"></i>
                                    <span>Transaction details</span>
                                </a>
                            </li>
                              <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-bitcoin"></i>
                                    <span>Refer a business</span>
                                </a>
                            </li>


                                <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-point-of-sale"></i>
                                    <span>Point System </span>
                                </a>
                            </li>




                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
