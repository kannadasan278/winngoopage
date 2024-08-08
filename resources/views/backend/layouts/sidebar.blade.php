 @php
     $usr = Auth::guard('admin')->user();
 @endphp
<!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    <div class="user-details">
                        <div class="d-flex">
                            <div class="me-2">
                                <img src="{{asset('backend/images/users/avatar-4.jpg')}}" alt="" class="avatar-md rounded-circle">
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
                            @if ($usr->can('dashboard.create') || $usr->can('dashboard.view') ||  $usr->can('dashboard.edit') ||  $usr->can('dashboard.delete'))
                            <li>
                                <a href="{{route('admin')}}" class="waves-effect">
                                    <i class="mdi mdi-home"></i>
                                    <span>Dashboard</span>

                                </a>
                            </li >
                            @endif
                               @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li class="waves-effect">
                        <a href="javascript:void(0)" aria-expanded="true" class="has-arrow waves-effect"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="sub-menu" aria-expanded="false {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('staff.create') || $usr->can('staff.view') ||  $usr->can('staff.edit') ||  $usr->can('staff.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true" class="has-arrow waves-effect"><i class="fa fa-user"></i><span>
                            Staff Members
                        </span></a>
                        <ul class="sub-menu {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                            @if ($usr->can('staff.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Members</a></li>
                            @endif

                            @if ($usr->can('staff.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Member</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                            @if ($usr->can('categories.create') || $usr->can('categories.view') ||  $usr->can('categories.edit') ||  $usr->can('categories.delete'))
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-apple-finder"></i>
                                    <span>Category Management</span>
                                </a>
                                <ul class="sub-menu {{ Route::is('admin.categories.create') || Route::is('admin.categories.index') || Route::is('admin.categories.edit') || Route::is('admin.categories.show') ? 'in' : '' }}">
                                @if ($usr->can('categories.view'))
                                <li class="{{ Route::is('admin.categories.index')  || Route::is('admin.categories.edit') ? 'active' : '' }}"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                                @endif

                              @if ($usr->can('subcategories.view'))
                                <li class="{{ Route::is('admin.subcategories.index')  || Route::is('admin.subcategories.edit') ? 'active' : '' }}"><a href="{{ route('admin.subcategories.index') }}">Sub Categories</a></li>
                                @endif
                                  @if ($usr->can('subsubcategories.view'))
                                <li class="{{ Route::is('admin.subcategories.index')  || Route::is('admin.subsubcategories.edit') ? 'active' : '' }}"><a href="{{ route('admin.subsubcategories.index') }}">Subsub Categories</a></li>
                                @endif

                                </ul>
                            </li>

                            @endif
                            @if ($usr->can('members.create') || $usr->can('members.view') ||  $usr->can('members.edit') ||  $usr->can('members.delete'))
                               <li {{ Route::is('admin.users.index') ? 'active' : '' }}>
                                <a href="{{ route('admin.users.index') }}" class="waves-effect">
                                    <i class="mdi mdi-transit-transfer"></i>
                                    <span>Members</span>
                                </a>
                            </li>
                             @endif
                            @if ($usr->can('merchants.create') || $usr->can('merchants.view') ||  $usr->can('merchants.edit') ||  $usr->can('merchants.delete') || $usr->can('merchants.show'))
                             <li>
                                <a href="{{ route('admin.business.index') }}" class="waves-effect">
                                    <i class="mdi mdi-point-of-sale"></i>
                                    <span>Business Manage</span>
                                </a>
                            </li>
                            @endif
                            @if ($usr->can('merchantfees.create') || $usr->can('merchantfees.view') ||  $usr->can('merchantfees.edit') ||  $usr->can('merchantfees.delete') || $usr->can('merchantfees.show'))
                              <li>
                                <a href="{{ route('admin.merchant-prices.index') }}" class="waves-effect">
                                    <i class="mdi mdi-bitcoin"></i>
                                    <span>Merchant fees</span>
                                </a>
                            </li>
                            @endif
                             @if ($usr->can('coupon.create') || $usr->can('coupon.view') ||  $usr->can('coupon.edit') ||  $usr->can('coupon.delete') || $usr->can('coupon.show'))
                              <li>
                                <a href="{{ route('admin.coupons.index') }}" class="waves-effect">
                                    <i class="mdi mdi-bitcoin"></i>
                                    <span>Coupon Manage</span>
                                </a>
                            </li>
                            @endif
                              <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-language-css3"></i>
                                    <span>Language</span>
                                </a>
                            </li>
                              <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-ski-cross-country"></i>
                                    <span>Country</span>
                                </a>
                            </li>
                             <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-slack"></i>
                                    <span>Dietary</span>
                                </a>
                            </li>
                                <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-point-of-sale"></i>
                                    <span>Point System </span>
                                </a>
                            </li>
                                <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-microsoft-excel"></i>
                                    <span>Reports</span>
                                </a>
                            </li>
                             @if ($usr->can('enquiries.create') || $usr->can('enquiries.view') ||  $usr->can('enquiries.edit') ||  $usr->can('enquiries.delete') || $usr->can('enquiries.show'))
                               <li>
                                <a href="{{ route('admin.enquiries.index') }}" class="waves-effect">
                                    <i class="mdi mdi-animation-outline"></i>
                                    <span>Enquiries</span>
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-email"></i>
                                    <span>Emails</span>
                                </a>
                            </li>
                            @if ($usr->can('newsletters.create') || $usr->can('newsletters.view') ||  $usr->can('newsletters.edit') ||  $usr->can('newsletters.delete') || $usr->can('newsletters.show'))
                             <li>
                                <a href="{{ route('admin.newsletters.index') }}" class="waves-effect">
                                    <i class="mdi mdi-email-newsletter"></i>
                                    <span>News Letters</span>
                                </a>
                            </li>
                            @endif
                                <li>
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-history"></i>
                                    <span>Click History</span>
                                </a>
                            </li>
                            @if ($usr->can('cms.create') || $usr->can('cms.view') ||  $usr->can('cms.edit') ||  $usr->can('cms.delete'))

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-file-document-multiple"></i>
                                    <span>Content Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.news.index') }}">News</a></li>
                                    <li><a href="{{ route('admin.privacy.index') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('admin.memberterm.index') }}">Members Terms and Conditions</a></li>
                                    <li><a href="{{ route('admin.merchantterm.index') }}">Merchant Terms and Conditions</a></li>
                                    <li><a href="{{ route('admin.banners.index') }}">Banners</a></li>
                                    <li><a href="{{ route('admin.about.index') }}">About US</a></li>
                                    <li><a href="{{ route('admin.faqs.index') }}">FAQS</a></li>

                                </ul>
                            </li>
                            @endif

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
