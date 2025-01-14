<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'NRN') &mdash; {{ config('app.name') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

  <!-- Toastr and SweetAlert2 CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/js/sweetalert2.min.js') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  
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

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>

  {{-- Nice Scroll --}}
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  
  <!-- Toastr and SweetAlert2 JS -->
  <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/sweetalert2.min.js') }}"></script>

  <!-- Template JS -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>

  <!-- Toastr & SweetAlert2 Notifications -->
  <script type="text/javascript">

      // Toastr Notifications
      @if(session('success'))
        toastr.success("{{ session('success') }}");
      @elseif(session('error'))
        toastr.error("{{ session('error') }}");
      @elseif(session('warning'))
        toastr.warning("{{ session('warning') }}");
      @elseif(session('info'))
        toastr.info("{{ session('info') }}");
    @endif

    // SweetAlert2 Example for Buttons 
    document.querySelectorAll('.delete-button').forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = this.getAttribute('data-link');
          }
        });
      });
    });
  </script>
  {{-- Example to use delete button 
    <!-- Delete Button (Pass the ID and Route) -->
    <a href="#" 
      class="btn btn-danger delete-button" 
      data-link="{{ route('admin.profile.destroy', $user->id) }}">
      Delete
    </a>
  --}}

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    @stack('scripts')

</body>
</html>
