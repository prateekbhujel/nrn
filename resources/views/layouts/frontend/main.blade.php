<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trim($__env->yieldContent('title', $siteSetting->organization_name ?? config('app.name', 'NRN Association'))) }}</title>
    @if(!empty($siteSetting->organization_favicon))
        <link rel="icon" href="{{ asset('storage/' . $siteSetting->organization_favicon) }}">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    @include('layouts.frontend.header')

    @yield('main-content')

    @include('layouts.frontend.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    @stack('scripts')

</body>

</html>
