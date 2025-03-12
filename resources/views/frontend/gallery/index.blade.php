@extends('layouts.frontend.main')
@section('main-content')
    <section class="section">
        <div class="container">
            <div class="row g-4">
                @foreach ($galleries as $gallery)
                    <div class="col-md-4">
                        <div class="gallery-item">
                            <a href="{{ route('gallery.innerGallery' , $gallery->slug) }}" class="text-decoration-none" >
                                <img src="{{ asset('storage/' . $gallery->thumbnail) }}" class="img-fluid" alt="{{ $gallery->thumbnail }}" />
                            </a>
                            <h4 class="mt-2">{{ $gallery->title }}</h4>
                            <p>{{ $gallery->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
