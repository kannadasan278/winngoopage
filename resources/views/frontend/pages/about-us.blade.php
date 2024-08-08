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
<main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href='{{ route('home') }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> About us
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        @if($about->about_intro_1)
                        <section class="row align-items-center mb-50">
                            <div class="col-lg-12">
                               <p class="mb-25">{!! $about->about_intro_1 !!}</p>
                            </div>
                        </section>
                        @endif
                        @if($about->about_intro_2)
                         <section class="row align-items-center mb-50">
                            <div class="col-lg-12">
                               <p class="mb-25">{!! $about->about_intro_2 !!}</p>
                            </div>
                        </section>
                        @endif
                        @if($about->about_online_use)
                          <section class="row align-items-center mb-50">
                            <div class="col-lg-12">
                               <p class="mb-25">{!! $about->about_online_use !!}</p>
                            </div>
                        </section>
                        @endif
                        @if($about->offline_loyalty_card_us)
                          <section class="row align-items-center mb-50">
                            <div class="col-lg-12">
                              <p class="mb-25"> {!! $about->offline_loyalty_card_us !!}</p>
                            </div>
                        </section>
                        @endif
                        @if($about->about_us_charity)
                         <section class="row align-items-center mb-50">
                            <div class="col-lg-12">
                              <p class="mb-25"> {!! $about->about_us_charity !!}</p>
                            </div>
                        </section>
                        @endif
        </div>
    </main>


@endsection
