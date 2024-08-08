
    <header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('admin')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('backend/images/logo-sm-dark.png')}}" alt="" style="background-color: #fff !important;margin-left: -23px;margin-top: -1px;">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt=""  style="margin-left:-24px;background-color: white;margin-top: -1px;">
                    </span>
                </a>

                <a href="{{route('admin')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('backend/images/logo-sm-light.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('backend/images/logo-light.png')}}" alt="" height="24">
                    </span>
                </a>
            </div>

            <!-- Menu Icon -->

            <button type="button" class="btn px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">

            {{--  <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  --}}


            <!-- App Search -->
            {{--  <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <span class="mdi mdi-magnify"></span>
                </div>
            </form>  --}}

            <!-- Notification Dropdown -->
            {{--  <div class="dropdown d-inline-block">

                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell"></i>
                       @if(count(Auth::guard('admin')->user()->unreadNotifications) >5 )<span data-count="5" class="badge bg-info rounded-pill">5+</span>
                    @else

                <span class="badge bg-info rounded-pill" data-count="{{count(Auth::guard('admin')->user()->unreadNotifications)}}">{{count(Auth::guard('admin')->user()->unreadNotifications)}}</span>
            @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <h5 class="p-3 text-dark mb-0">Notifications Center</h5>
                    <div data-simplebar style="max-height: 230px;">
                        @foreach(Auth::guard('admin')->user()->unreadNotifications as $notification)
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex mt-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                       <i class="fas {{$notification->data['fas']}} text-white"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                     <div class="small text-gray-500">{{$notification->created_at->format('F d, Y h:i A')}}</div>
                    <span class="@if($notification->unread()) font-weight-bold @else small text-gray-500 @endif">{{$notification->data['title']}}</span>

                                </div>
                            </div>
                        </a>
                          @if($loop->index+1==5)
                @php
                    break;
                @endphp
            @endif
        @endforeach


                    </div>
                    <div class="p-2 d-grid">
                        <a class="font-size-14 text-center" href="javascript:void(0)">View all</a>
                    </div>
                </div>
            </div>  --}}

            <!-- User -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('backend/images/users/avatar-4.jpg')}}"
                        alt="Header Avatar">
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-account-circle font-size-16 align-middle me-2 text-muted"></i>
                        <span>Profile</span></a>

                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i
                            class="mdi mdi-wrench font-size-16 align-middle text-muted me-2"></i>
                        <span>Settings</span></a>
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-lock-open-outline font-size-16 text-muted align-middle me-2"></i>
                        <span>Lock screen</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-primary" href="{{ route('admin.logout.submit') }}"  onclick="event.preventDefault();
                                        document.getElementById('admin-logout-form').submit();"><i
                            class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                        <span>Logout</span></a>
                           <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                </div>
            </div>



        </div>
    </div>
</header>
