@extends('frontend.layouts.master')
@push('styles')
<style>

.sidebar-widget {
    background: #fff; /* Background color */
    padding: 15px; /* Padding */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Shadow effect */
}

.scroller {
    max-height: 300px; /* Maximum height before scroll is needed */
    overflow-y: auto; /* Enable vertical scrolling */
    padding-right: 10px; /* Space for scrollbar */
}

.scroller::-webkit-scrollbar {
    width: 8px; /* Width of the scrollbar */
}

.scroller::-webkit-scrollbar-track {
    background: #f1f1f1; /* Track color */
}

.scroller::-webkit-scrollbar-thumb {
    background: #888; /* Thumb color */
    border-radius: 4px; /* Rounded corners for thumb */
}

.scroller::-webkit-scrollbar-thumb:hover {
    background: #555; /* Thumb color on hover */
}

/* For Firefox */
.scroller {
    scrollbar-width: thin; /* Scrollbar width */
    scrollbar-color: #888 #f1f1f1; /* Thumb and track color */
}

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
#filterbar {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 15px;
  width: 100%;
}
.filter-box {
  padding: 10px
}
.filter-box-label {
  color: #11698e;
  font-size: 0.9rem;
  font-weight: 800
}
.filter-box-label .btn {
  background-color: #fff;
  padding: 0;
  font-size: 0.8rem
}
.filter-box-label .btn:focus {
    border: unset;
    box-shadow: unset;
}
.filter-inner-box .smooth-scroller {
  max-height: 250px;
  overflow-y: scroll
}

/* custom check box CSS */
.custom-tick {
  display: block;
  position: relative;
  padding-left: 23px;
  cursor: pointer;
  font-size: 0.9rem;
  margin: 0
}
.custom-tick input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0
}
.custom-check {
  position: absolute;
  top: 1px;
  left: 0;
  height: 18px;
  width: 18px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 3px
}
.custom-tick:hover input~.custom-check {
  background-color: #f3f3f3
}
.custom-tick input:checked~.custom-check {
  background-color: #ffffff
}
.custom-check:after {
  content: "";
  position: absolute;
  display: none
}
.custom-tick input:checked~.custom-check:after {
  display: block;
  transform: rotate(45deg) scale(1)
}
.custom-tick .custom-check:after {
  left: 6px;
  top: 2px;
  width: 5px;
  height: 10px;
  border: solid rgb(0, 0, 0);
  border-width: 0 3px 3px 0;
  transform: rotate(45deg) scale(2)
}

/* Be a Merchant Banner CSS */
.be_a_marchant{
  margin-top: 20px;
  position: relative;
}
.be_a_marchant > img{
  width: 100%;
}
.be_a_marchant_text{
  position: absolute;
  left: 0;
  top: 0;
  padding: 35px 15px;
  width: 100%;
}
.be_a_marchant_text h2{
  color: #ffffff;
  font-size: 43px;
  font-weight: normal;
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
  line-height: 50px;
}
.be_a_marchant_text h2 span{
  font-weight: bolder;
}
.be_a_marchant_text a.click_here{
  font-size: 15px;
  font-weight: normal;
  background: #002347;
  padding: 16px 43px;
  color: #fff;
  display: inline-block;
  margin-top: 30px;
}
.be_a_marchant_text a.click_here:hover{
  text-decoration: none;
}
</style>
@endpush
@section('main-content')

 <main class="main">
        <div class="page-header mt-30 mb-50">

        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                         @if($merchants->isEmpty())
                                <p style="text-align: center;">No business found for this.</p>
                            @else
                        @include('frontend.business.partials.showsub')

                        @endif
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                      <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <h5 class="section-title style-1 mb-30">Fill by sub-category</h5>
                        <div class="list-group scroller">
                        <div class="list-group-item mb-10 mt-10">
                        <div id="filterbar" class="collapse show" aria-expanded="true" style="">
                                   <form method="GET" id="categoryFilterForm" action="{{ route('filter.results') }}">
                                    <div class="filter-box">
                                        <div class="filter-box-label text-uppercase d-flex align-items-center">
                                            Sub Categories
                                        </div>
                                        <div id="filter-inner-box-1" class="filter-inner-box collapse show mt-2 mr-1">
                                            <div class="smooth-scroller" data-scrollbar="true" tabindex="-1" style="overflow: hidden; outline: none;">
                                                <div class="scroll-content">
                                                    <!-- Dynamic Content for Sub Categories -->
                                                    @if($subCategories->isEmpty())
                                                    <p style="text-align: center;">No subcategory for this.</p>
                                                    @else
                                                    @foreach($subCategories as $subCategory)
                                                        <div class="my-1">
                                                            <label class="custom-tick" style="text-transform: capitalize">
                                                                {{ $subCategory->subcategory_name_en }}
                                                                <input type="checkbox" class="sub-category-checkbox" name="sub_category_id[]" value="{{ $subCategory->id }}">
                                                                <span class="custom-check"></span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                    </div>

        </div>
                        </div>
                             <a class='btn btn-sm btn-default' id="btn_apply"><i class="fi-rs-filter mr-5"></i> Filter</a>
                        </form>

                    </div>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
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
<script>
$(document).ready(function() {
         // Initialize form validation
        $("#categoryFilterForm").validate({
            rules: {
                'sub_category_id[]': {
                    required: true,
                    minlength: 1 // Ensure at least one checkbox is selected
                }
            },
            messages: {
                'sub_category_id[]': {
                    required: "Please select at least one sub-category."
                }
            },
            submitHandler: function(form) {
                // Handle form submission
                form.submit(); // Or use AJAX to submit the form
            }
        });
    $('#btn_apply').click(function(e) {

        e.preventDefault();

        var form = $('#categoryFilterForm');
        var url = form.attr('action') || window.location.href;
        var data = form.serialize();

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function(response) {

            window.location.href = response.redirect;
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr);
            }
        });
    });
});

</script>
@endpush
