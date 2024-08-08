@extends('backend.layouts.master')
@section('title', 'Winngoo Page || DASHBOARD')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .note-editable {
            height: 495.234px !important;
        }
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
                            <h4 class="mb-0 font-size-18">Edit Merchant Terms & Conditions</h4>
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
                                <form id="merchanttermForm" action="{{ route('admin.merchantterm.update', $merchantterm->id) }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="mb-3">
                                        <textarea id="summernote" name="content">{!! $merchantterm->content !!}</textarea>
                                    </div>
                                    <button type="button" id="updatemerchanttermBtn" class="btn btn-primary">Update Merchant Terms & Conditions</button>
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
            $('#summernote').summernote({
                placeholder: 'Enter news',
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
            $('#updatemerchanttermBtn').click(function(e) {
                e.preventDefault();

                // Prepare form data
                var formData = new FormData($('#merchanttermForm')[0]);

                // Submit form data using AJAX
                $.ajax({
                    url: $('#merchanttermForm').attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Merchant Terms & Conditions updated successfully!',
                            }).then(() => {
                                // Redirect to the news index page or perform other actions
                                window.location.href = "{{ route('admin.merchantterm.index') }}";
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to update Merchant Terms & Conditions',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to update Merchant Terms & Conditions: ' + error,
                        });
                    }
                });
            });
        });
    </script>
@endpush
