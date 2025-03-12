@extends('layouts.frontend.main')

@section('main-content')
    <!-- Hero Section with Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($photoslider as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{asset('storage/' . $slider->main_image )}}" class="d-block w-100" alt="{{ $slider->main_title }}">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4">{{ $slider->main_title }}</h1>
                    <p class="lead">{{ $slider->sub_title }}</p>
                    <a href="{{ route($slider->category) }}" class="btn btn-light btn-lg mt-3">
                        {{-- Option 1: Simply capitalize the category name --}}
                        {{ ucwords($slider->category) }}
                        
                        {{-- Option 2: Use custom text per route, e.g.: --}}
                        {{-- 
                        @if($slider->category == 'contact')
                            Get in Touch
                        @elseif($slider->category == 'about')
                            Learn More
                        @elseif($slider->category == 'history')
                            Our History
                        @elseif($slider->category == 'gallery')
                            View Gallery
                        @elseif($slider->category == 'board')
                            Meet the Board
                        @endif 
                        --}}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


  <!-- Featured Projects -->
<section class="section">
    <div class="container">
        <h2 class="text-center mb-5">Our Projects</h2>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $project->main_image) }}" class="card-img-top" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h3>   <a href="{{ route('project.show_project', $project->slug) }}" class="text-decoration-none">
                            {{ $project->title }}
                        </a></h3>
                            <p>{!! $project->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
    <!-- Latest News -->
<section class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Latest News</h2>
        <div class="row">
            @foreach($news as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->banner) }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body">
                            <h3>
                                <a href="{{ route('news-events.show_news' , $item->slug) }}" class="text-decoration-none">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <p class="text-muted">{{ \Carbon\Carbon::parse($item->publish_date)->format('F d, Y') }}</p>
                            <p>{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


    <!-- Upcoming Events Slider -->
<section class="section">
    <div class="container">
        <h2 class="text-center mb-5">Upcoming Events</h2>
        <div id="eventsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($events as $index => $event)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $event->banner) }}" class="card-img-top" alt="{{ $event->title }}">
                                    <div class="card-body">
                                        <h3>
                                            <a href="{{ route('news-events.show_event', $event->slug) }}" class="text-decoration-none">
                                                {{ $event->title }}
                                            </a>
                                        </h3>
                                        <p class="text-muted">{{ date('F d, Y', strtotime($event->event_date)) }}</p>
                                        <p>{!! Str::limit($event->description, 100) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#eventsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>


@endsection