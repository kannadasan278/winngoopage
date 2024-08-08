   <header class="header-area header-style-1 header-style-5 header-height-2">
        <div class="mobile-promotion">
            <span>Technology to boost your business productivity.</span>
        </div>
           <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><a href="{{ route('aboutpage') }}">About Us</a></li>
                                <li><a href='#'>My Account</a></li>
                                <li><a href='{{ route('newspage') }}'>News</a></li>
                                <li><a href="{{ route('contactpage') }}">Enquiry</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>100% secure payment methods your business preferences.</li>
                                    <li>Unlock Discounts tailored for our business customers.</li>
                                    <li>Technology to boost your business productivity</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.form') }}">Join Us Free</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href='{{ route('home') }}'><img src="{{ asset('frontend/imgs/theme/logo.svg')}}" alt="logo" /></a>
                    </div>

                    <div class="header-right">
                        <div class="search-style-2">
                       <form id="search-form" method="POST">
                            @csrf
                            <select class="select-active" name="business_type_id" id="business_type_id">
                                <option value="">Business Type</option>
                                @foreach ($merchanttype as $mer_type)
                                 @if ($mer_type->type !== 'Francise/Multi Business')
                                    <option value="{{ $mer_type->id }}">{{ $mer_type->type }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="text" id="address_line" name="address_line" placeholder="Search for address" />
                            <input type="text" id="city" name="city" placeholder="Search for city" />
                            <input type="text" id="postcode" name="postcode" placeholder="Search postcode" />
                            <input type="text" id="country" name="country" placeholder="Search for country" />
                            <input type="text" id="business_name" name="business_name" placeholder="Search for business..." />
                            <input type="button" id="search-button" style="background-image:url('{{ asset('frontend/imgs/theme/icons/search.png')}}')">
                        </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">


                                <div class="header-action-icon-2">
                                    <a href='#'>
                                        <img class="svgInject" alt="Nest" src="{{ asset('frontend/imgs/theme/icons/icon-user.svg')}}" />
                                    </a>
                                    <a href='#'>
                                        @if(Auth::user())
                                        <span class="lable ml-0" style="color: #0f7e95;">Welcome {{ Auth::user()->name }}</span>
                                        @elseif(Auth::guard('merchant')->user())
                                        <span class="lable ml-0" style="color: #0f7e95;">Welcome {{ Auth::guard('merchant')->user()->first_name }}</span>
                                        @else
                                        <span class="lable ml-0">Account</span>
                                        @endif
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                 @if(Auth::user())
                                                <a href='{{ route('user') }}'><i class="fi fi-rs-sign-out mr-10"></i> Dashboard</a>
                                                @elseif(Auth::guard('merchant')->user())
                                                <a href='{{ route('merchantdashboard') }}'><i class="fi fi-rs-sign-out mr-10"></i> Dashboard</a>
                                                @endif
                                            </li>
                                            @if(!Auth::guard('merchant')->user() && !Auth::user())
                                            <li>
                                            <a href='{{ route('login.form') }}'><i class="fi fi-rs-user mr-10"></i>Customer Account</a>
                                            </li>

                                            @endif
                                            @if(!Auth::user() && !Auth::guard('merchant')->user())
                                            <li>
                                                <a href='{{ route('merchant.loginform') }}'><i class="fi fi-rs-user mr-10"></i>Merchant Account</a>
                                            </li>
                                            @endif

                                            @if(Auth::user())
                                            <li>
                                                <a href='{{ route('user-profile') }}'><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>

                                            @elseif(Auth::guard('merchant')->user())
                                            <li>
                                            <a href='{{ route('merchant.merchantprofile') }}'><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            @endif
                                            @if(Auth::user())
                                             <li>
                                                <a href='{{ route('merchant.loginform') }}'><i class="fi fi-rs-user mr-10"></i>Merchant Account</a>
                                            </li>
                                             <li>
                                                <a href='{{ route('customerperform.logout') }}'><i class="fi fi-rs-sign-out mr-10"></i>Sign Out</a>
                                            </li>
                                            @elseif(Auth::guard('merchant')->user())
                                             <li>
                                            <a href='{{ route('login.form') }}'><i class="fi fi-rs-user mr-10"></i>Customer Account</a>
                                            </li>
                                            <a href='{{ route('merchantperform.logout') }}'><i class="fi fi-rs-sign-out mr-10"></i>Sign Out</a>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href='#'><img src="{{ asset('frontend/imgs/theme/logo.svg')}}" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span> <span class="et">Trending</span> Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul id="categories-dropdown">

                                    </ul>

                                </div>
                                <div class="more_slide_open" style="display: none">
                                    <div class="d-flex categori-dropdown-inner">
                                        <ul id="categoriesmore-dropdown">

                                        </ul>
                                    </div>
                                </div>
                                <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                     <li class='active'>
                                        <a href='{{ route('home') }}'>Home</a>
                                    </li>
                                      <li class="position-static">
                                        <a href="#">Categories <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#" id="main_cat_1"></a>
                                                <span id="main_cat_list">

                                                </span>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#" id="main_cat_2"></a>
                                                <span id="main_cat_list2">

                                                </span>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#" id="main_cat_3"></a>
                                             <span id="main_cat_list3">

                                                </span>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-34">
                                                <div class="menu-banner-wrap">
                                                    <a href='{{ route('frontend.business') }}'><img src="{{ asset('frontend/imgs/banner/banner-menu.png')}}" alt="winngoo" /></a>
                                                    <div class="menu-banner-content">
                                                        {{--  <h4 style="color: white">Hot deals</h4>
                                                        <h3 style="color: white">
                                                            Don't miss<br />
                                                            Trending
                                                        </h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price" style="color: white">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href='{{ route('merchant.loginform') }}'>Get Start</a>
                                                        </div>  --}}
                                                    </div>

                                                </div>

                                            </li>
                                                <div class="menu-banner-btn all">
                                                <a class="btn btn-xs" href="{{ route('frontend.allcategory') }}">View All <i class="fi-rs-arrow-small-right"></i></a>
                                                </div>
                                        </ul>

                                    </li>

                                      <li>
                                        <a href='{{ route('frontend.business') }}'>Business</a>
                                    </li>
                                      <li>
                                        <a href='{{ route('frontend.wholesalers') }}'>Wholesellers</a>
                                    </li>
                                      <li>
                                        <a href='{{ route('frontend.charity') }}'>Charity</a>
                                    </li>
                                    <li>
                                        <a href='{{ route('frontend.placeofwork') }}'>Place of Worship</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    {{--  <div class="hotline d-none d-lg-flex">
                        <img src="{{ asset('frontend/imgs/theme/icons/icon-headphone-white.svg')}}" alt="hotline" />
                        <p>1900 - 888<span>24/7 Support Center</span></p>
                    </div>  --}}
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">

                            <div class="header-action-icon-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href='index.html'><img src="{{ asset('frontend/imgs/theme/logo.svg')}}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class='active'>
                                        <a href='{{ route('home') }}'>Home</a>
                                    </li>
                                      <li>
                                        <a href='{{ route('frontend.allcategory') }}'>Categories</a>
                                    </li>
                                      <li>
                                        <a href='{{ route('frontend.business') }}'>Business</a>
                                    </li>
                                      <li>
                                        <a href='{{ route('frontend.wholesalers') }}'>Wholesellers</a>
                                    </li>
                                      <li>
                                        <a href='{{ route('frontend.charity') }}'>Charity</a>
                                    </li>
                                    <li>
                                        <a href='{{ route('frontend.placeofwork') }}'>Place of Worship</a>
                                    </li>

                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href='#'><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href='{{ route('merchant.loginform') }}'><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                </div>
                <div class="site-copyright">&copy; 2024, <strong class="text-brand">Winngoo</strong><br />All rights reserved</div>
            </div>
        </div>
    </div>
