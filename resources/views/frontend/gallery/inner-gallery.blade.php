@extends('layouts.frontend.main')
@section('main-content')
<section class="section">
    <div class="container">
        @foreach($galleries as $gallery)
            <h4 class="mt-2 text-center">{{ $gallery->title }}</h4>
            <div class="row g-4">
                @foreach($gallery->banner as $banner)
                    <div class="col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('storage/'. $banner) }}" class="glightbox" data-gallery="gallery">
                                <img src="{{ asset('storage/' . $banner) }}" class="img-fluid" alt="{{ $gallery->title }}" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>

<!-- Include necessary JS/CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

@endsection
