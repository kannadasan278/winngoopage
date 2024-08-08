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
                    <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> Contact
                </div>
            </div>
        </div>
        <div class="page-content pt-50">

            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="mb-50">
                            <div class="row mb-60">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Office Address</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, UK<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@winngoopages.com<br />
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">India Address</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, UK<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@winngoopages.com<br />
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mb-15 text-brand">Corporate Address</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, UK<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@winngoopages.com<br />
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="contact-from-area padding-20-row-col">
                                        <h5 class="text-brand mb-10">Contact form</h5>
                                        <h2 class="mb-10">Drop Us a Line</h2>
                                        <p class="text-muted mb-30 font-sm">Your email address will not be published. Required fields are marked *</p>
                                        <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                                            @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="input-style mb-20">
                                                                <input name="name" placeholder="First Name" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="input-style mb-20">
                                                                <input name="email" placeholder="Your Email" type="email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="input-style mb-20">
                                                                <input name="telephone" placeholder="Your Phone" type="tel" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="input-style mb-20">
                                                                <input name="subject" placeholder="Subject" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="textarea-style mb-30">
                                                                <textarea name="message" placeholder="Message"></textarea>
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Send message</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <p class="form-messege"></p>

                                    </div>
                                </div>
                                <div class="col-lg-4 pl-50 d-lg-block d-none">
                                    <img class="border-radius-15 mt-50" src="{{ asset('frontend/imgs/page/contact-2.png') }}" alt="" />
                                </div>
                            </div>
                        </section>
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
    // Initialize form validation
    $('#contact-form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            telephone: {
                required: true,
            },
            subject: {
                required: true
            },
            message: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            name: {
                required: "Please enter your first name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            telephone: {
                required: "Please enter your phone number"
            },
            subject: {
                required: "Please enter the subject"
            },
            message: {
                required: "Please enter your message",
                minlength: "Your message must consist of at least 5 characters"
            }
        },
        submitHandler: function(form) {
            // Form is valid, proceed with AJAX submission
            var formData = $(form).serialize(); // Serialize form data

           $.ajax({
                url: '{{ route("contact.submit") }}', // Use Laravel route helper
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.form-messege').text(response.message).css('color', 'green');
                    $('#contact-form')[0].reset(); // Reset the form
                },
                error: function(xhr, status, error) {
                    $('.form-messege').text('An error occurred. Please try again.').css('color', 'red');
                }
            });
        }
    });
});
</script>

@endpush
