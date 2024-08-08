@extends('backend.layouts.master')
@section('title', 'Create FAQ || DASHBOARD')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

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
                            <h4 class="mb-0 font-size-18">Create FAQ</h4>
                            <a href="{{ route('admin.faqs.index') }}"
                                class="btn btn-danger waves-effect waves-light float-right" style="float: right;margin-top: 10px;margin-left: 1400px;">Back to FAQ List</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create New FAQ</h4>
                            <form id="faqForm" action="{{ route('admin.faqs.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="question">Question<span class="required">*</span></label>
                                    <input type="text" name="question" id="question" class="form-control" placeholder="Enter question" required>
                                </div>
                                <div class="mb-3">
                                    <label for="faqcat">FAQ Category<span class="required">*</span></label>
                                    <select class="form-control select2" name="faq_category" id="faq_category" required tabindex="-1" aria-hidden="true">
                                    <option value="-1" disabled selected>Select Category</option>
                                    <option value="winngoo">Winngoo</option>
                                    <option value="Winngoo Members">Winngoo Members</option>
                                    <option value="Winngoo Card">Winngoo Card</option>
                                    <option value="Discounts">Discounts</option>
                                    <option value="Winngoo Merchants">Winngoo Merchants</option>
                                    <option value="Pop-up Faqs">Pop-up Faqs</option>
                                </select>

                                </div>

                                <div class="mb-3">
                                    <label for="answer">Answer<span class="required">*</span></label>
                                        <textarea id="summernote" name="answer" id="answer"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content-wrapper -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
      $('#summernote').summernote({
                placeholder: 'Enter answer',
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
    // jQuery validation
    $('#faqForm').validate({
        rules: {
            question: {
                required: true,
            },
             faq_category: {
                required: true,
            },
            answer: {
                required: true,
            }
        },
        messages: {
            question: {
                required: "Please enter the question",
            },
             faq_category: {
                required: "Please enter the FAQ Category",
            },
            answer: {
                required: "Please enter the answer",
            }
        },
        submitHandler: function(form) {
            var formData = $(form).serialize();

            // Submit form data using AJAX
            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'FAQ created successfully!',
                    }).then(() => {
                        // Redirect to the FAQs index page or perform other actions
                        window.location.href = "{{ route('admin.faqs.index') }}";
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to create FAQ: ' + error,
                    });
                }
            });
        }
    });
});
</script>
@endpush
