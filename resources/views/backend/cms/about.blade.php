@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>

    </style>
@endpush

@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Edit About Us</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="aboutForm" action="{{ route('admin.about.update', $about->id) }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="category_name_en">About Us Intro 1:<span class="required">*</span></label>
                                        <textarea id="summernote1" name="about_intro_1">{!! $about->about_intro_1 !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_name_en">About Us Intro 2:</label>
                                        <textarea id="summernote2" name="about_intro_2">{!! $about->about_intro_2 !!}</textarea>
                                    </div>

                                       <div class="mb-3">
                                        <label for="category_name_en">About Us Online Use:</label>
                                        <textarea id="summernote3" name="about_online_use">{!! $about->about_online_use !!}</textarea>
                                    </div>
                                     <div class="mb-3">
                                        <label for="category_name_en">About Us Offline Loyalty Card Use:</label>
                                        <textarea id="summernote4" name="offline_loyalty_card_us">{!! $about->offline_loyalty_card_us !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_name_en">About Us Charity:</label>
                                        <textarea id="summernote5" name="about_us_charity">{!! $about->about_us_charity !!}</textarea>
                                    </div>
                                    <button type="button" id="updateaboutBtn" class="btn btn-primary">Update About Us</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content-wrapper -->

        </div>
        <!-- Container-Fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote1,#summernote2').summernote({
                placeholder: 'Enter about',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
 $('#summernote3').summernote({
                placeholder: 'Enter about',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
 $('#summernote4').summernote({
                placeholder: 'Enter about',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
 $('#summernote5').summernote({
                placeholder: 'Enter about',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Handle form submission via AJAX
            $('#updateaboutBtn').click(function(e) {
                e.preventDefault();

                // Prepare form data
                var formData = new FormData($('#aboutForm')[0]);

                // Submit form data using AJAX
                $.ajax({
                    url: $('#aboutForm').attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'About us updated successfully!',
                            }).then(() => {
                                // Redirect to the about index page or perform other actions
                                window.location.href = "{{ route('admin.about.index') }}";
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to update about',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to update about: ' + error,
                        });
                    }
                });
            });
        });
    </script>
@endpush
