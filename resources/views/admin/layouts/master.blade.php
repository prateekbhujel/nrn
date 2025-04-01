<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Nawalpursewasamaj') &mdash; {{ config('app.name') }}</title>
    @stack('styles')
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- Toastr and SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('tostr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/sweetalert2.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap5.min.css') }}">

    <!-- Additional Plugins CSS (Select2, GLightbox) -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')

            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{ date('Y') }}
                    <span>Nawalpursewasamaj All rights reserved.</span>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts (Correct Order) -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Nice Scroll -->
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script>
        document.addEventListener("wheel", function(e) {}, {
            passive: true
        });
    </script>

    <!-- Toastr and SweetAlert2 JS -->
    <script src="{{ asset('tostr/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sweetalert2.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Summernote and Select2 -->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- GLightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <!-- Initialize Common Plugins -->
    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Initialize Select2
            $('.select2').select2({
                width: '100%',
                placeholder: 'Select an option'
            });

            // Initialize GLightbox
            const lightbox = GLightbox({
                selector: '.glightbox',
                touchNavigation: true,
                loop: true
            });

            // Initialize DataTables with common configuration
            $('.data-table').DataTable({
                responsive: true,
                processing: true,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });
    </script>

    <!-- CSRF Token Setup -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    {{-- Dynamic Delete with SweetAlert --}}
    <Script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.delete-item', function(e) {
                e.preventDefault();
                let url = $(this).data('url');
                let tableId = $(this).closest('table').attr('id');
                let row = $(this).closest('tr');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading state
                        Swal.fire({
                            title: 'Deleting...',
                            html: 'Please wait while we process your request',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        $.ajax({
                            url: url,
                            method: 'POST', // Use POST
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE' // Spoof the DELETE method
                            },
                            success: function(response) {
                                if ($.fn.DataTable.isDataTable('#' + tableId)) {
                                    $('#' + tableId).DataTable().row(row).remove()
                                    .draw();
                                } else {
                                    row.remove();
                                }

                                Swal.fire({
                                    title: "Deleted!",
                                    text: response.message ||
                                        "Item has been deleted successfully.",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                setTimeout(function() {
                                    location.reload();
                                }, 1600);
                            },
                            error: function(xhr) {
                                let errorMessage = "Something went wrong.";
                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                }

                                Swal.fire({
                                    title: "Error!",
                                    text: errorMessage,
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>

    <!-- Toastr Notifications Setup -->
    <script>
        // Configuration for toastr
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Handle Laravel validation errors
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        // Handle session messages
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    @stack('scripts')
</body>

</html>
