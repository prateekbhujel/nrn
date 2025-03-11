@extends('layouts.frontend.main')
@section('main-content')
<div class="hero-placeholder" style="height: 300px;">
        <div class="container">
            <h1 class="display-4">Our History</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Introduction Section -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>Our Journey</h2>
                    <p class="lead">Since our establishment in 2000, NRB Organization has been dedicated to improving
                        lives and building stronger communities across Nepal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="section bg-light">
    <div class="container">
        <div class="timeline">
            @foreach($history as $item)
                <div class="timeline-item">
                    <h3>{{ $item->year }} - {{ $item->title }}</h3>
                    <div class="card-img-placeholder mb-3">
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"  height="200">
                        @else
                            Historical Image (400x300)
                        @endif
                    </div>
                    <p>{!! $item->description !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="text-center mb-5">Key Achievements</h2>
        <div class="row">
            @foreach ($achievements as $achievement)
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="display-4 mb-3">{{ $achievement->value }}</h3>
                            <p>{{ $achievement->title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection