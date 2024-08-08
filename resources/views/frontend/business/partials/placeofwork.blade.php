      <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{ count($merchants) }}</strong> items for you!</p>
                        </div>

                    </div>
                    <div class="row product-grid">
                        @foreach ($merchants as $merchant)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href='{{ route('frontend.businessshow', encrypt($merchant->id)) }}'>
                                            <img class="default-img" src="{{ asset($merchant->image)}}" alt="" />
                                            <img class="hover-img" src="{{ asset($merchant->image)}}" alt="" />
                                        </a>
                                    </div>

                                    @foreach ($merchant->taglines as $tag)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">
                                                    {{ $tag->tagline }}
                                                </span>
                                                </div>
                                                @endforeach
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href='#'>{{ $merchant->businessType->type }}</a>
                                    </div>
                                    <h2 style="font-size: 14px;"><a href='{{ route('frontend.businessshow', encrypt($merchant->id)) }}'>{{ $merchant->business_name }}</a></h2>
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
                                        <span class="font-small text-muted" style="text-transform: capitalize;"><span class="openNow">
                                          <strong style="{{ $merchant->status == 'open' ? 'color: green' : 'color: red' }}">
                                                {{ ucfirst($merchant->status) }}
                                            </strong> -
                                            <span>
                                                {{ $merchant->statusMessage }}
                                            </span>
                                        </span></span>
                                    </div>
                                    <div>
                                    <span class="text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#" style="text-transform:capitalize;"> {{ $merchant->city }}, {{ $merchant->country }}</a></span>
                                </div>
                                    <div class="product-card-bottom">

                                        <div class="add-cart">
                                        <a class="add" href="{{ route('frontend.businessshow', encrypt($merchant->id)) }}">More</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--end product card-->
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                                {{ $merchants->links() }}
                        </nav>
                    </div>
