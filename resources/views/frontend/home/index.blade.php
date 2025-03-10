@extends('layouts.frontend.main')

@section('main-content')
    <!-- Hero Section with Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://placehold.co/1200x600?text=Slide+1" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4">Welcome to NRB Organization</h1>
                    <p class="lead">Empowering Communities, Building Future</p>
                    <a href="about.html" class="btn btn-light btn-lg mt-3">Learn More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://placehold.co/1200x600?text=Slide+2" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4">Our Vision</h1>
                    <p class="lead">Inspiring change and progress for a better tomorrow</p>
                    <a href="about.html" class="btn btn-light btn-lg mt-3">Learn More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://placehold.co/1200x600?text=Slide+3" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4">Join Our Journey</h1>
                    <p class="lead">Be a part of our transformative initiatives</p>
                    <a href="contact.html" class="btn btn-light btn-lg mt-3">Get in Touch</a>
                </div>
            </div>
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
                <!-- Project Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://placehold.co/400x300?text=Project+Image" class="card-img-top"
                            alt="Project Image">
                        <div class="card-body">
                            <h3><a href="project-detail.html" class="text-decoration-none">Community Development</a>
                            </h3>
                            <p>Supporting local initiatives for sustainable growth</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://placehold.co/400x300?text=Project+Image" class="card-img-top"
                            alt="Project Image">
                        <div class="card-body">
                            <h3><a href="project-detail.html" class="text-decoration-none">Education Program</a></h3>
                            <p>Providing quality education to underprivileged children</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://placehold.co/400x300?text=Project+Image" class="card-img-top"
                            alt="Project Image">
                        <div class="card-body">
                            <h3><a href="project-detail.html" class="text-decoration-none">Healthcare Initiative</a>
                            </h3>
                            <p>Improving access to healthcare in rural areas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="section bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Latest News</h2>
            <div class="row">
                <!-- News Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://placehold.co/400x250?text=News+Image" class="card-img-top" alt="News Image">
                        <div class="card-body">
                            <h3><a href="news-detail.html" class="text-decoration-none">Recent Achievement</a></h3>
                            <p class="text-muted">February 20, 2025</p>
                            <p>Brief description of the news item...</p>
                        </div>
                    </div>
                </div>
                <!-- More News Cards... -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://placehold.co/400x250?text=News+Image" class="card-img-top" alt="News Image">
                        <div class="card-body">
                            <h3><a href="news-detail.html" class="text-decoration-none">Innovation in Action</a></h3>
                            <p class="text-muted">February 18, 2025</p>
                            <p>Brief description of the news item...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://placehold.co/400x250?text=News+Image" class="card-img-top" alt="News Image">
                        <div class="card-body">
                            <h3><a href="news-detail.html" class="text-decoration-none">Milestone Reached</a></h3>
                            <p class="text-muted">February 15, 2025</p>
                            <p>Brief description of the news item...</p>
                        </div>
                    </div>
                </div>
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