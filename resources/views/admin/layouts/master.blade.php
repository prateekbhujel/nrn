<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'NRN') &mdash; {{ config('app.name') }}</title>
  @stack('styles')
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

  <!-- Toastr and SweetAlert2 CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">
  <!-- Note: The SweetAlert2 JS file should not be loaded as a CSS file -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
          <div class="bullet"></div> Developed By 
          <a target="_blank" href="https://pratikbhujel.com.np/">Pratik Bhujel</a>
        </div>
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
    document.addEventListener("wheel", function(e) {}, { passive: true });
  </script>

  <!-- Toastr and SweetAlert2 JS -->
  <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/sweetalert2.min.js') }}"></script>

  <!-- Template JS -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- Summernote and Select2 -->
  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

  <!-- GLightbox JS -->
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
  <script>
    $(document).ready(function(){
        $('.summernote').summernote({ height: 200 });
        $('.select2').select2();
    });
    const lightbox = GLightbox({ selector: '.glightbox' });
  </script>
<script>
  $(document).on('click', '.delete-btn', function (e) {
      e.preventDefault();
      let url = $(this).data('url');

      Swal.fire({
          title: "Are you sure?",
          text: "This action cannot be undone!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes, delete it!"
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: url,
                  type: 'DELETE',
                  data: {
                      _token: '{{ csrf_token() }}'
                  },
                  success: function (response) {
                      Swal.fire("Deleted!", response.message, "success");
                      location.reload();
                  },
                  error: function () {
                      Swal.fire("Error!", "Something went wrong.", "error");
                  }
              });
          }
      });
  });
</script>

  @stack('scripts')
</body>
</html>
