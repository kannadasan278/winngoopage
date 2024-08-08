@extends('frontend.layouts.master')
@push('styles')
<style>
          .sizestar{
    font-size: 14px;
    color: orange !important;
}
.sizestargold{
    color: #6c757d !important; /* Adjust color as needed */
    font-size: 14px !important; /* Adjust size as needed */
}
  .fa-star {
            font-size: 24px;
            color: #ccc; /* Default star color */
            cursor: pointer;
        }
        .fa-star.checked {
            color: #f39c12; /* Color of checked stars */
        }
    .fa, .fas {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    color: green;
}
.sizestar{
    font-size: 14px;
    color: orange;
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
.overviewEachRow {
    margin-top: 20px;
    font-size: 14px;
}
.overviewEachRow .businessSubHeading {
    display: block;
    font-weight: 600;
    font-size: 17px;
}
.overviewEachRow .timingsList .dayDisplay {
    display: inline-block;
    width: 80px;
}
.overviewEachRow .timingsList .timeDisplay {
    width: 125px;
    display: inline-block;
}
.overviewEachRow .timingsList .openStatus.open {
    color: #17b226;
}
.closed{
    color: red;
}

</style>
@endpush

@section('main-content')
 <!--End header-->
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href='#'> <span>
                                                @foreach($merchants->category_id as $CategoryId)
                                                    @php
                                                        $category = \App\Models\Category::find($CategoryId);
                                                    @endphp
                                                    @if($category)
                                                        {{ $category->category_name_en }}
                                                    @endif
                                                @endforeach
                                            </span></a> <span></span> {{ $merchants->business_name }}
                </div>
            </div>
        </div>

        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="product-detail accordion-detail">
                                <div class="row mb-50 mt-30">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        <div class="detail-gallery">
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset($merchants->image)}}" alt="logo image" />
                                                </figure>

                                            </div>

                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">
                                               @foreach ($merchants->taglines as $tag)
                                                <span class="stock-status out-stock"> {{ $tag->tagline }} </span>
                                                @endforeach
                                            <h2 class="title-detail" style="text-transform: capitalize;">{{ $merchants->business_name }}</h2>
                                            <div class="product-detail-rating">
                                               @php
                                                    $maxRating = 5; // Assuming 5-star rating
                                                    $fullStars = floor($averageRating);
                                                    $halfStars = ($averageRating - $fullStars) >= 0.5 ? 1 : 0;
                                                    $emptyStars = $maxRating - ($fullStars + $halfStars);
                                                @endphp

                                                <div class="product-rate-cover text-end">
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
                                                    <span class="font-small ml-5 text-muted">({{ $reviewCount }} reviews)</span>
                                                </div>
                                            </div>
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left">
                                                    <span class="current-price text-brand"><img src="{{ asset('frontend/imgs/theme/icons/telephone.png')}}" width = "50px" alt=""> {{ $merchants->phone_number }}</span>

                                                </div>
                                            </div>
                                            <div class="short-desc mb-30">
                                                <p class="font-lg"> {!! Str::limit($merchants->business_description ?? 'No description available', 200) !!}
                                                        @if(strlen($merchants->business_description) > 200)
                                                        @endif</p>
                                            </div>
                                            <div class="font-xs">
                                                <ul class="mr-50 float-start">
                                                    <li class="mb-5">Business Type: <span class="text-brand">{{ $merchants->businessType->type }}</span></li>
                                                    <li class="mb-5">Created Date:<span class="text-brand"> {{ $merchants->created_at->format('d M Y') }}</span></li>
                                                    <li>Suggest: <span class="text-brand"><a target="_blank" class="suggestEditNew suggestEdit">Suggest an edit</a></span></li>
                                                </ul>
                                                <ul class="float-start">
                                                    <li class="mb-5">Category: <a href="#"><span>
                                                @foreach($merchants->category_id as $CategoryId)
                                                    @php
                                                        $category = \App\Models\Category::find($CategoryId);
                                                    @endphp
                                                    @if($category)
                                                    <span class="badge bg-success"> {{ $category->category_name_en }}</span>

                                                    @endif
                                                @endforeach
                                            </span></a></li>
                                                    <li class="mb-5">Tags: <a href="#" rel="tag">N/A</a></li>
                                                    <li class="mb-5">Trending Name:<span class="in-stock text-brand ml-5">
                                                        @if($merchants->trading_name)
                                                        {{ $merchants->trading_name }}
                                                        @else
                                                        N/A
                                                        @endif
                                                    </span></li>
                                                </ul>
                                            </div>


                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                            </li>
                                            {{--  <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                            </li>  --}}
                                            <li class="nav-item">
                                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Merchant info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ $reviewCount }})</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
                                                   {!! $merchants->business_description !!}
                                                    <ul class="product-more-infor mt-30">
                                                        <li><span>Email</span> {{ $merchants->email }}</li>
                                                        <li><span>Website</span> <a href="{{ $merchants->website_link }}" target="_blank" style="color: rgb(12, 75, 146)">@if($merchants->website_link){{ $merchants->website_link }}@else N/A @endif</a></li>
                                                        <li><span>Phone Number</span> {{ $merchants->phone_number }}</li>
                                                        <li><span>Tags</span> N/A</li>
                                                        <li><span style="text-transform: capitalize">Our services</span> {{ $merchants->business_name }}</li>
                                                    </ul>
                                                    <hr class="wp-block-separator is-style-dots" />
                                                 <div id="MainContent_divTime" class="businessTimining overviewEachRow">
                                                    <h4 class="mt-30">Business timings</h4>
                                                    <hr class="wp-block-separator is-style-wide" />
                                                    <ul id="MainContent_ulTimings" class="leftColList bTimings">
                                                        @foreach ($merchants->businessHours as $hour)
                                                            <li>
                                                                <div class="timingsList">
                                                                    <span class="dayDisplay">{{ $hour->day_of_week }}</span>
                                                                    <span class="timeDisplay">{{ $hour->opening_time }} - {{ $hour->closing_time }}</span>
                                                                    <span class="openStatus {{ $hour->status === 'Open' ? 'open' : 'closed' }}">{{ $hour->status }}</span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                    <h4 class="mt-30">Payment methods</h4>
                                                    <hr class="wp-block-separator is-style-wide" />
                                                    <p>Cash, Credit Card, Debit Card</p>


                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="Vendor-info">
                                                <div class="vendor-logo d-flex mb-30">
                                                    <img src="{{ asset($merchants->image)}}" width="64" height="43" alt="" />
                                                    <div class="vendor-name ml-15">
                                                        <h6>
                                                            <a href='#'>{{ $merchants->business_name }}</a>
                                                        </h6>
                                                        <div class="product-rate-cover text-end">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating">
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
                                                                </div>
                                                            </div>
                                                            <span class="font-small ml-5 text-muted"> ({{ $reviewCount }} reviews)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="contact-infor mb-50">
                                                    <li><i class="fa fa-trophy" aria-hidden="true"></i> <strong>Owner Name: </strong><span style="text-transform: capitalize"> {{ $merchants->first_name }} {{ $merchants->last_name }}</span></li>
                                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Address: </strong><span>{{ $merchants->address_line_1 }}</span></li>
                                                      <li><i class="fa fa-road" aria-hidden="true"></i> <strong>City: </strong>

                                                        <span style="text-transform: capitalize">{{ $merchants->city }}</span></li>
                                                         <li><i class="fa fa-code" aria-hidden="true"></i> <strong>Postal Code: </strong>

                                                        <span>{{ $merchants->post_code }}</span></li>
                                                         <li><i class="fa fa-globe" aria-hidden="true"></i> <strong>Country: </strong>

                                                        <span>{{ $merchants->country }}</span>

                                                    </li>
                                                    <li><i class="fa fa-phone" aria-hidden="true"></i> <strong>Contact Merchant:</strong><span>{{ $merchants->phone_number }}</span></li>
                                                </ul>

                                                <p>
                                                   {!! $merchants->business_description !!}
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="Reviews">
                                                <!--Comments-->
                                                <div class="comments-area">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <h4 class="mb-30">Customer Reviews</h4>
                                                            <div class="comment-list">
                                                                @if(count($ratingcustomer) > 0)
                                                                @foreach ($ratingcustomer as $ratingcustomers)
                                                                 <div class="single-comment justify-content-between d-flex mb-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="{{ asset('frontend/imgs/blog/author-2.jpg')}}" alt="" />
                                                                            <a href="#" class="font-heading text-brand" style="text-transform: capitalize">{{ $ratingcustomers->name }}</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">{{ $ratingcustomers->created_at }} </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 100%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">{!! $ratingcustomers->comment !!}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endforeach
                                                                 @else
                                                                <p style="text-align: center;">No customer reviews for this.</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                      @php
                                                        $maxRating = 5;
                                                        $ratingPercentages = [];
                                                        if ($totalReviews > 0) {
                                                            foreach (range(1, $maxRating) as $rating) {
                                                                $ratingPercentages[$rating] = isset($ratingsCount[$rating])
                                                                    ? ($ratingsCount[$rating] / $totalReviews) * 100
                                                                    : 0;
                                                            }
                                                        } else {
                                                            foreach (range(1, $maxRating) as $rating) {
                                                                $ratingPercentages[$rating] = 0;
                                                            }
                                                        }

                                                        $colors = [
                                                                5 => '#28a745', // Green for 5 stars
                                                                4 => '#17a2b8', // Blue for 4 stars
                                                                3 => '#ffc107', // Yellow for 3 stars
                                                                2 => '#fd7e14', // Orange for 2 stars
                                                                1 => '#dc3545'  // Red for 1 star
                                                            ];
                                                    @endphp

                                                    <div class="col-lg-4">
                                                        <h4 class="mb-30">Customer reviews</h4>
                                                        <div class="d-flex mb-30">
                                                            <div class="product-rate d-inline-block mr-15">
                                                                <div class="product-rating" style="width: {{ min($averageRating * 20, 100) }}%"></div>
                                                            </div>
                                                            <h6>{{ number_format($averageRating, 1) }} out of {{ $maxRating }}</h6>
                                                        </div>
                                                        @foreach (range($maxRating, 1) as $rating)
                                                            <div class="progress mb-3">
                                                                <span>{{ $rating }} star</span>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: {{ $ratingPercentages[$rating] }}%; background-color: {{ $colors[$rating] }};"
                                                                    aria-valuenow="{{ $ratingPercentages[$rating] }}"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100">
                                                                    {{ number_format($ratingPercentages[$rating], 1) }}%
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    </div>
                                                </div>
                                              <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                            <div id="comment_success" style="color: green;font-size: large;font-weight: 700;"></div>
                                            <!-- Star rating UI -->
                                            <div class="product-rate d-inline-block mb-30" id="starRating">
                                                <span class="fa fa-star" data-value="1"></span>
                                                <span class="fa fa-star" data-value="2"></span>
                                                <span class="fa fa-star" data-value="3"></span>
                                                <span class="fa fa-star" data-value="4"></span>
                                                <span class="fa fa-star" data-value="5"></span>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        @csrf
                                                        <!-- Hidden input to store the rating -->
                                                    <input type="hidden" name="rating" id="rating" value="">
                                                    <input type="hidden" name="merchant_id" id="merchant_id" value="{{ $merchants->id }}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Category</h5>
                                <ul>
                                    @foreach ($categories as $cat)
                                    <li>
                                        <a href='{{ route('business.show', encrypt($cat->id)) }}'>{{ $cat->category_name_en }}</a><span class="count">
                                            @php
                                            $categoryId = $cat->id; // Example category ID
                                            $count = DB::table('merchants')
                                            ->where('status', 'approved')
                                            ->whereJsonContains('category_id', strval($categoryId))
                                            ->count();
                                            @endphp
                                {{ $count }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                                <img src="{{ asset('frontend/imgs/banner/banner-11.png')}}" alt="" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<!-- Include jQuery and RateYo scripts -->
 <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('#starRating .fa-star');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.getAttribute('data-value'));

                    // Update the hidden input with the selected rating
                    ratingInput.value = value;

                    // Remove checked class from all stars
                    stars.forEach(star => star.classList.remove('checked'));

                    // Add checked class to the stars up to the clicked one
                    stars.forEach(star => {
                        if (parseInt(star.getAttribute('data-value')) <= value) {
                            star.classList.add('checked');
                        }
                    });
                });
            });
        });
    </script>

<script>
$(document).ready(function() {
    // Initialize jQuery validation
    $('#commentForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            comment: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            comment: {
                required: "Please enter your comment",
                minlength: "Your comment must be at least 10 characters long"
            }

        },
        submitHandler: function(form) {
            // Prevent the default form submission
            $(form).find('button').prop('disabled', true); // Disable the submit button to prevent multiple submissions

            // Serialize form data
            var formData = $(form).serialize();

            // Send AJAX request
            $.ajax({
                url: '/reviews',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#comment_success').text(response.success);
                    // Optionally, clear the form or update the UI
                    $('#commentForm')[0].reset(); // Reset form fields
                    $('#starRating span').removeClass('fa-star').addClass('fa-star-o'); // Reset star rating UI
                    $('#rating').val(''); // Clear hidden rating input
                    setTimeout(function() {
                        $('#comment_success').text('');
                    }, 5000);
                },
                error: function(xhr) {
                    alert('An error occurred.');
                },
                complete: function() {
                    $(form).find('button').prop('disabled', false); // Re-enable the submit button
                }
            });
        }
    });
});
</script>
@endpush
