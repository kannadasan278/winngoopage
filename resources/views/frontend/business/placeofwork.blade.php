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
p {
    font-size: 1rem;
    font-weight: 500;
    line-height: 24px;
    margin-bottom: 5px;
    color: #bfa4a4;
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

</style>
@endpush
@section('main-content')

 <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <h1 class="mb-15">Place of Workship</h1>
                            <div class="breadcrumb">
                                <a href='{{ route('home') }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> place of workship <span></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                         @if($merchants->isEmpty())
                                <p style="text-align: center;">No place of workship found for this.</p>
                            @else
                        @include('frontend.business.partials.placeofwork')

                        @endif
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
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
                        <!--Tags-->
                            <div class="sidebar-widget widget-tags mb-50 pb-20">
                                <h5 class="section-title style-1 mb-30">Popular Tags</h5>
                                <ul class="tags-list">
                                    <li class="hover-up">
                                        <a href='#'><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href='#'><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href='#'><i class="fi-rs-cross mr-10"></i>Smoothie</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href='#'><i class="fi-rs-cross mr-10"></i>Fruit</a>
                                    </li>
                                    <li class="hover-up mr-0">
                                        <a href='#'><i class="fi-rs-cross mr-10"></i>Salad</a>
                                    </li>
                                    <li class="hover-up mr-0">
                                        <a href='#'><i class="fi-rs-cross mr-10"></i>Appetizer</a>
                                    </li>
                                </ul>
                            </div>

                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url: "{{ route('business.fetchData') }}?page=" + page,
                success: function(data) {
                    $('#merchant-data').html(data);
                }
            });
        }
    });
</script>
@endpush
