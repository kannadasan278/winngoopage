 <footer class="main">
        <section class="newsletter mb-15 wow animate__animated animate__fadeIn" >
            <div class="container" style="background-image: url('{{ asset('frontend/imgs/banner/banner-9.jpg')}}')">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative newsletter-inner">
                            <div class="newsletter-content">
                                <h2 class="mb-20" style="color: white;">
                                    Get your daily needs from our business <br />
                                </h2>
                                <p class="mb-45">Start Your Daily with <span class="text-brand" style="color:white !important;">Winngoo pages</span></p>
                                <form id="subscription-form" method="POST" class="form-subcriber d-flex">
                                    @csrf
                                    <input type="email" name="email" required placeholder="Your emaill address">

                                    <button class="btn" type="submit">NewsLetter</button>

                                </form>
                                <div id="response-message"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__ animate__fadeInUp animated" data-wow-delay="0">
                            <div class="logo mb-30">
                                <a class="mb-15" href="{{ route('home') }}"><img src="{{ asset('frontend/imgs/theme/logo.svg')}}" alt="logo"></a>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{ asset('frontend/imgs/theme/icons/icon-location.svg')}}" alt=""><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                <li><img src="{{ asset('frontend/imgs/theme/icons/icon-contact.svg')}}" alt=""><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                                <li><img src="{{ asset('frontend/imgs/theme/icons/icon-email-2.svg')}}" alt=""><strong>Email:</strong><span>sale@winngoo.com</span></li>
                                <li><img src="{{ asset('frontend/imgs/theme/icons/icon-clock.svg')}}" alt=""><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col wow animate__ animate__fadeInUp animated" data-wow-delay=".1s>
                       <h4 class=" widget-title">Company</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('aboutpage') }}">About Us</a></li>
                            <li><a href="{{ route('frontend.business') }}">Business</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="{{ route('contactpage') }}">Contact Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{ route('contactpage') }}">Enquiry</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__ animate__fadeInUp animated" data-wow-delay=".2s">
                        <h4 class="widget-title">Account</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('login.form') }}">Sign In</a></li>
                            <li><a href="{{ route('merchant.loginform') }}">Merchant Member</a></li>
                            <li><a href="{{ route('login.form') }}">Customer</a></li>
                            <li><a href="{{ route('frontend.allcategory') }}">Category</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Maps</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__ animate__fadeInUp animated" data-wow-delay=".3s">
                        <h4 class="widget-title">Corporate</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('merchant.loginform') }}">Become a Merchant</a></li>
                            <li><a href="{{ route('frontend.business') }}">Business</a></li>
                            <li><a href="{{ route('frontend.wholesalers') }}">Wholesellers</a></li>
                            <li><a href="{{ route('frontend.charity') }}">Charity</a></li>
                            <li><a href="{{ route('frontend.placeofwork') }}">Place of Worship</a></li>
                            <li><a href="#">Promotions</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__ animate__fadeInUp animated" data-wow-delay=".4s">
                        <h4 class="widget-title">Popular</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            @foreach ($categoriesrandom as $catran)
                            <li><a href="{{ route('business.show', encrypt($catran->id)) }}">{{ $catran->category_name_en }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-link-widget widget-install-app col wow animate__ animate__fadeInUp animated" data-wow-delay=".5s">
                        <h4 class="widget-title">Install App</h4>
                        <p class="">From App Store or Google Play</p>
                        <div class="download-app">
                            <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{ asset('frontend/imgs/theme/app-store.jpg')}}" alt=""></a>
                            <a href="#" class="hover-up mb-sm-2"><img src="{{ asset('frontend/imgs/theme/google-play.jpg')}}" alt=""></a>
                        </div>
                        <p class="mb-20">Secured Payment Gateways</p>
                        <img class="" src="{{ asset('frontend/imgs/theme/payment-method.png')}}" alt="">
                    </div>
                </div>
        </div>
    </section>

        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2024, <strong class="text-brand">Winngoo</strong><br />All rights reserved</p>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6 style="color: #253d4e;">Follow Us</h6>
                        <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{ asset('frontend/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/imgs/theme/logo.svg')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset('frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/slick.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/waypoints.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/wow.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/counterup.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/images-loaded.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/isotope.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/js/main5103.js?v=6.0')}}"></script>
    <script src="{{ asset('frontend/js/shop5103.js?v=6.0')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd_DUY_rdLbA5J_jtOTgIFpmKqEAqpcYU&libraries=places"></script>

  @stack('scripts')

  <script>
    setTimeout(function(){
      $('.alert').slideUp();
    },4000);
  </script>
<script>

        $(document).ready(function() {
            $('#subscription-form').validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '{{ route('subscribe') }}',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            $('#response-message').html('<p style="color: green;">' + response.success + '</p>');
                            $('#subscription-form')[0].reset();
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += '<p style="color: red;">' + value[0] + '</p>';
                            });
                            $('#response-message').html(errorMessages);
                        }
                    });
                }
            });
        });

    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/categories')
            .then(response => response.json())
            .then(data => renderCategories(data));
    });

    function renderCategories(categories) {
        const categoriesDropdown = document.getElementById('categories-dropdown');
        let html = '<div class="d-flex categori-dropdown-inner"><ul>';

        categories.forEach((category, index) => {
            const categoryHtml = `
                <li>
                    <a href="/category/${category.category_slug_en}"><i class="' + ${category.category_icon} + '"></i>${category.category_name_en}</a>
                </li>
            `;
            html += categoryHtml;

            if ((index + 1) % 5 === 0) {
                html += '</ul><ul class="end">';
            }
        });

        html += '</ul></div>';
        categoriesDropdown.innerHTML = html;
    }

    //show more\
        document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/morecategory')
            .then(response => response.json())
            .then(data => renderCategoriesmore(data));
    });

    function renderCategoriesmore(morecategory) {
        const categoriesDropdown = document.getElementById('categoriesmore-dropdown');
        let html = '<div class="d-flex categori-dropdown-inner"><ul>';

        morecategory.forEach((category, index) => {
            const categoryHtml = `
                <li>
                    <a href="/category/${category.category_slug_en}"><i class="' + ${category.category_icon} + '"></i>${category.category_name_en}</a>
                </li>
            `;
            html += categoryHtml;

            if ((index + 1) % 5 === 0) {
                html += '</ul><ul class="end">';
            }
        });

        html += '</ul></div>';
        categoriesDropdown.innerHTML = html;
    }

document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/maincategory')
        .then(response => response.json())
        .then(data => renderCategoriesmain(data));
});

function renderCategoriesmain(maincategory) {
    $('#main_cat_1').text(maincategory[0].category.category_name_en);
    const categoriesDropdown = document.getElementById('main_cat_list');
    let html = '<ul>';

    maincategory.forEach(subcategory => {
        // Adding the main category name (if needed)
        // html += `<li>${subcategory.category.category_name_en}</li>`;

        // Render subcategories
        const categoryHtml = `
            <li>
                <a href="/subcategory/${subcategory.subcategory_slug_en}">${subcategory.subcategory_name_en}</a>
            </li>
        `;
        html += categoryHtml;
    });

    html += '</ul>';
    categoriesDropdown.innerHTML = html;
}
 //main category

 document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/maincategorytwo')
        .then(response => response.json())
        .then(data => renderCategoriesmain2(data));
});

function renderCategoriesmain2(maincategory) {
    $('#main_cat_2').text(maincategory[0].category.category_name_en);
    const categoriesDropdown = document.getElementById('main_cat_list2');
    let html = '<ul>';

    maincategory.forEach(subcategory => {
        // Adding the main category name (if needed)
        // html += `<li>${subcategory.category.category_name_en}</li>`;

        // Render subcategories
        const categoryHtml = `
            <li>
                <a href="/subcategory/${subcategory.subcategory_slug_en}">${subcategory.subcategory_name_en}</a>
            </li>
        `;
        html += categoryHtml;
    });

    html += '</ul>';
    categoriesDropdown.innerHTML = html;
}


 //main category
document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/maincategorythree')
        .then(response => response.json())
        .then(data => renderCategoriesmain3(data));
});

function renderCategoriesmain3(maincategory) {
    $('#main_cat_3').text(maincategory[0].category.category_name_en);
    const categoriesDropdown = document.getElementById('main_cat_list3');
    let html = '<ul>';

    maincategory.forEach(subcategory => {
        // Adding the main category name (if needed)
        // html += `<li>${subcategory.category.category_name_en}</li>`;

        // Render subcategories
        const categoryHtml = `
            <li>
                <a href="/subcategory/${subcategory.subcategory_slug_en}">${subcategory.subcategory_name_en}</a>
            </li>
        `;
        html += categoryHtml;
    });

    html += '</ul>';
    categoriesDropdown.innerHTML = html;
}
  let autocomplete;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('address_line'),
            { types: ['geocode'] }
        );

        autocomplete.setFields(['address_component']);

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        const place = autocomplete.getPlace();
        const addressComponents = place.address_components;

        const componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        let address = {};

        addressComponents.forEach(component => {
            const addressType = component.types[0];
            if (componentForm[addressType]) {
                address[addressType] = component[componentForm[addressType]];
            }
        });

        $('#address_line').val(`${address.street_number || ''} ${address.route || ''} ${address.locality || ''} ${address.administrative_area_level_1 || ''} ${address.country || ''} ${address.postal_code || ''}`);
        $('#city').val(address.locality || '');
        $('#postcode').val(address.postal_code || '');
        $('#country').val(address.country || '');
    }



$(document).ready(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        initAutocomplete();


});

</script>
<script>
$(document).ready(function() {
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
document.getElementById('search-button').addEventListener('click', function(event) {
      // Initialize form validation
    var business_type_id = $("#business_type_id").val();
    var address_line = $("#address_line").val();
    var city = $("#city").val();
    var postcode = $("#postcode").val();
    var country = $("#country").val();
    var business_name = $("#business_name").val();
      if(business_type_id == '' && address_line == '' && city == '' && postcode == '' && country == '' && business_name == ''){
        alert('Please fill any one');
        return false;
      }
    event.preventDefault(); // Prevent the default form submission

    var form = document.getElementById('search-form');
    var formData = new FormData(form);

    fetch('{{ route('search') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': formData.get('_token') // Add CSRF token to headers
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.redirect) {
            window.location.href = data.redirect; // Redirect to the new page with search results
        } else {
            // Handle the response data if needed
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});


});
</script>
