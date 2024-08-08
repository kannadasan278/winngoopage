@extends('frontend.layouts.master')
@push('styles')
<style>
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
    font-size: 85px;
}


</style>
@endpush
@section('main-content')
<main class="main">
    <div class="page-header mt-30 mb-75">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">All Categories</h1>
                        <div class="breadcrumb">
                            <a href='{{ route('home') }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Category
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-30">
        <div class="row">
            <div class="col-12" style="text-align: end;padding: 5px 8px;font-size: 20px;">
                <div class="catAlphabetsBlock">
                    <ul class="catAlphabetsLink list-inline">
                        <li class="list-inline-item"><a href="#" data-letter="all">All</a></li>
                        @foreach(range('A', 'Z') as $letter)
                            <li class="list-inline-item"><a href="#" data-letter="{{ strtolower($letter) }}">{{ $letter }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row" id="categoriesContainer">
                      @php
                         $delay = 0.1; // Starting delay
                        @endphp
                    @foreach ($categories as $cat)
                        <div class="col-xl-2 col-lg-6 col-md-6 mb-lg-0 mb-md-2 mb-sm-2">
                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay="{{ $delay }}s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href='{{ route('business.show', encrypt($cat->id)) }}'><i class="{{$cat->category_icon}}"></i></a>
                                </figure>
                                <h6><a href='{{ route('business.show', encrypt($cat->id)) }}'>{{ $cat->category_name_en }}</a></h6>
                            </div>
                        </div>
                    @endforeach
                       @php
                        $delay += 0.1; // Increment delay for each item
                    @endphp
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alphabetsLinks = document.querySelectorAll('.catAlphabetsLink a');

        alphabetsLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const letter = this.getAttribute('data-letter');

                fetch(`/allcategory?s=${letter}`)
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newCategories = doc.querySelector('#categoriesContainer').innerHTML;
                        document.querySelector('#categoriesContainer').innerHTML = newCategories;
                    })
                    .catch(error => console.log(error));
            });
        });
    });
</script>
@endsection
