@extends('frontend.layouts.master')
@push('styles')
<style>
        .sizestar{
    font-size: 14px;
    color: orange !important;
}
.sizestargold{
    color: #6c757d !important; /* Adjust color as needed */
    font-size: 14px; /* Adjust size as needed */
}
    .fa, .fas {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    color: green;
}
    .categories-dropdown-wrap ul li a i {
    font-size: 18px;
    color: #12814e;
    font-weight: 800;
    max-width: 30px;
    margin-right: 15px;
}
.card-2 figure i {
    border-radius: 10px;
    display: inline-block;
    max-width: 80px;
    font-size: 50px;
}
[class^="icon-"], [class*=" icon-"] {
    font-family: 'icomoon';
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    color: green;
    font-size: 16px;
    font-weight: 800;
    -moz-osx-font-smoothing: grayscale;
}


input::after {
    content: "";
    height: 20px;
    width: 1px;
    background-color: #CACACA;
    position: absolute;
    transform: translateY(-50%); /* Center the line */
}
</style>
@endpush
@section('main-content')
     <section class="home-slider style-2 position-relative mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="home-slide-cover">
                            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                                @foreach ($banners as $banner)
                                <div class="single-hero-slider single-animation-wrap" style="background-image: url('{{ asset($banner->image_path) }}')">
                                    <div class="slider-content">
                                        <h1 class="display-2 mb-40">
                                        <!-- Banner Title or Other Content -->
                                        </h1>
                                        <p class="mb-65">
                                            <!-- Banner Description or Other Content -->
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="slider-arrow hero-slider-1-arrow"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-xl-block">
                        <div class="banner-img style-3 animated animated">
                            <div class="banner-text mt-50">
                                <h2 class="mb-50">
                                     <br />

                                    <span class="text-brand"><br />
                                    </span>
                                </h2>
                                <a class='btn btn-xs' href='{{ route('merchant.loginform') }}'>Get start <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3 style="color: #253d4e;">Featured Categories</h3>
                        <ul class="list-inline nav nav-tabs links">
                            @foreach ($categoriesrandom as $catran)
                            <li class="list-inline-item nav-item"><a class='nav-link' href='{{ route('business.show', encrypt($catran->id)) }}'>{{ $catran->category_name_en }}</a></li>
                            @endforeach
                      </ul>
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">
                        @php
                         $delay = 0.1; // Starting delay
                        @endphp

                        @foreach ($categories as $cat)
                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay="{{ $delay }}s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href='#'><i class="{{$cat->category_icon}}"></i></a>
                                </figure>
                                <h6><a href='{{ route('business.show', encrypt($cat->id)) }}'>{{ $cat->category_name_en }}</a></h6>
                                <span>
                                @php
                                $categoryId = $cat->id; // Example category ID
                                $count = DB::table('merchants')
                                ->where('status', 'approved')
                                ->whereJsonContains('category_id', strval($categoryId))
                                ->count();
                                @endphp
                                {{ $count }} items</span>
                            </div>
                            @php
                                $delay += 0.1; // Increment delay for each item
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--End category slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="{{ asset('frontend/imgs/banner/banner-1.png')}}" alt="" />
                            {{--  <div class="banner-text">
                                <h4>
                                    Everyday Fresh & <br />Clean with Our<br />
                                    Products
                                </h4>
                                <a class='btn btn-xs' href='#'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('frontend/imgs/banner/banner-2.png')}}" alt="" />
                            {{--  <div class="banner-text">
                                <h4>
                                    Make your Breakfast<br />
                                    Healthy and Easy
                                </h4>
                                <a class='btn btn-xs' href='#'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('frontend/imgs/banner/banner-3.png')}}" alt="" />
                            {{--  <div class="banner-text">
                                <h4>The best Organic <br />Products Online</h4>
                                <a class='btn btn-xs' href='#'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End banners-->
        <section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3 style="color: #253d4e;">Enterprise business and dealers</h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active"><a href="{{ route('frontend.business') }}">View All</a></button>
                </li>
                {{--  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false" data-category="1">Business 1</button>
                </li>  --}}
                <!-- Add more categories as needed -->
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4" id="tab-one-content">
                    @php
                         $delay_b = 0.1; // Starting delay
                    @endphp
                    @foreach ($merchants_business as $merchant)
                      <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__ animate__fadeIn animated" data-wow-delay="{{ $delay_b }}s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('frontend.businessshow', encrypt($merchant->id)) }}">
                                         <img class="default-img" src="{{ $merchant->image }}" alt="">
                                        <img class="hover-img" src="{{ $merchant->image }}" alt="">
                                    </a>
                                </div>
                                @foreach ($merchant->taglines as $tag)
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="best">
                                    {{ $tag->tagline }}
                                </span>
                                </div>
                                @endforeach
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="#">{{ $merchant->businessType->type }}</a>
                                </div>
                                <h2><a href="{{ route('frontend.businessshow', encrypt($merchant->id)) }}">{{ $merchant->business_name }}</a></h2>
                                 @php
                                        $maxRating = 5; // Assuming 5-star rating
                                        $fullStars = floor($merchant->averageRating);
                                        $halfStars = ($merchant->averageRating - $fullStars) >= 0.5 ? 1 : 0;
                                        $emptyStars = $maxRating - ($fullStars + $halfStars);
                                    @endphp
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating">
                                                @for ($i = 0; $i < $fullStars; $i++)
                                                <span class="fa fa-star sizestar"></span>
                                                @endfor
                                                @if ($halfStars)
                                                    <span class="fas fa-star-half-alt sizestar"></span>
                                                @endif
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <span class="fa fa-star sizestargold"></span>
                                                @endfor
                                            </div>
                                        </div>

                                        <span class="font-small ml-5 text-muted">Rating ({{ number_format($merchant->averageRating, 1) }})</span>
                                    </div>
                                <div>
                                    <span class="text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#" style="text-transform:capitalize;"> {{ $merchant->city }}, {{ $merchant->country }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <i class="fa fa-phone" aria-hidden="true"></i><span> {{ $merchant->phone_number }}</span>
                                    </div>
                                  <div class="add-cart">
                                <a class="add" href="{{ route('frontend.businessshow', encrypt($merchant->id)) }}">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     @php
                    $delay_b += 0.1; // Increment delay for each item
                    @endphp
                    @endforeach

                </div>
            </div>
            {{--  <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4" id="tab-two-content">
                    <!-- Dynamic content goes here -->
                </div>
            </div>  --}}
            <!-- Add more tab content as needed -->
        </div>
    </div>
</section>

        <!--Products Tabs-->
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="{{ asset('frontend/imgs/banner/banner-16.jpg')}}" alt="" />
                            {{--  <div class="banner-text">
                                <h6 class="mb-10 mt-30">Everyday Fresh with<br />Our Products</h6>
                                <p>Go to business</p>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                            <img src="{{ asset('frontend/imgs/banner/banner-17.jpg')}}" alt="" />
                            <div class="banner-text">
                                <h6 class="mb-10 mt-30" style="color: white;">100% guaranteed all<br />Fresh items</h6>
                                <p style="color: white;">Go to business</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                            <img src="{{ asset('frontend/imgs/banner/banner-18.jpg')}}" alt="" />
                            <div class="banner-text">
                                <h6 class="mb-10 mt-30" style="color: white;">Special grocery sale<br />off this month</h6>
                                <p style="color: white;">Go to business</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
                            <img src="{{ asset('frontend/imgs/banner/banner-19.jpg')}}" alt="" />
                            {{--  <div class="banner-text">
                                <h6 class="mb-10 mt-30">
                                    Enjoy 15% OFF for all<br />
                                    vegetable and fruit
                                </h6>
                                <p>Go to business</p>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 banners-->
        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class="" style="color: #253d4e;">Our Wholesellers</h3>
                    <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                        <li class="nav-item" role="presentation">
                             <button class="nav-link active"><a href="{{ route('frontend.wholesalers') }}">View More</a></button>
                        </li>

                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100" style="color: white;"></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                    @foreach ($merchants as $merchant)

                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('frontend.businessshow', encrypt($merchant->id)) }}">
                                                    <img class="default-img" src="{{ asset($merchant->image) }}" alt="{{ $merchant->business_name }}" />
                                                    <img class="hover-img" src="{{ asset($merchant->image) }}" alt="{{ $merchant->business_name }}" />
                                                </a>
                                            </div>
                                              @foreach ($merchant->taglines as $tag)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">
                                                    {{ $tag->tagline }}
                                                </span>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="#">{{ $merchant->businessType->type ?? 'N/A' }}</a>
                                                </div>
                                                <h2><a href="{{ route('frontend.businessshow', encrypt($merchant->id)) }}">{{ $merchant->business_name ?? 'No Name' }}</a></h2>
                                                <div class="product-price mt-10">
                                                    <span> {{ $merchant->city ?? 'City not available' }}, {{ $merchant->country ?? 'Country not available' }}</span>
                                                </div>
                                                <div class="sold mt-15 mb-15">
                                                      @php
                                        $maxRating = 5; // Assuming 5-star rating
                                        $fullStars = floor($merchant->averageRating);
                                        $halfStars = ($merchant->averageRating - $fullStars) >= 0.5 ? 1 : 0;
                                        $emptyStars = $maxRating - ($fullStars + $halfStars);
                                    @endphp
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating">
                                                @for ($i = 0; $i < $fullStars; $i++)
                                                <span class="fa fa-star sizestar"></span>
                                                @endfor
                                                @if ($halfStars)
                                                    <span class="fas fa-star-half-alt sizestar"></span>
                                                @endif
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <span class="fa fa-star sizestargold"></span>
                                                @endfor
                                            </div>
                                        </div>

                                        <span class="font-small ml-5 text-muted">Rating ({{ number_format($merchant->averageRating, 1) }})</span>
                                    </div>
                                                </div>
                                                <a class="btn w-100 hover-up" href="{{ route('frontend.businessshow', encrypt($merchant->id)) }}">Click here</a>
                                            </div>
                                        </div>
                                    @endforeach



                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>


        <!--End 4 columns-->
@endsection
@push('scripts')


@endpush
