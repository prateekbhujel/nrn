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
                <div class="timeline-item">
                    <h3>2000 - Foundation</h3>
                    <div class="card-img-placeholder mb-3">Historical Image (400x300)</div>
                    <p>NRB Organization was established with the vision of creating sustainable development in Nepal.
                    </p>
                </div>

                <div class="timeline-item">
                    <h3>2005 - First Major Project</h3>
                    <div class="card-img-placeholder mb-3">Historical Image (400x300)</div>
                    <p>Launched our first major community development project in rural Nepal, impacting over 1000
                        families.</p>
                </div>

                <div class="timeline-item">
                    <h3>2010 - Expansion</h3>
                    <div class="card-img-placeholder mb-3">Historical Image (400x300)</div>
                    <p>Expanded operations to five additional districts and established partnerships with international
                        organizations.</p>
                </div>

                <div class="timeline-item">
                    <h3>2015 - Earthquake Response</h3>
                    <div class="card-img-placeholder mb-3">Historical Image (400x300)</div>
                    <p>Led major relief and reconstruction efforts following the devastating earthquake.</p>
                </div>

                <div class="timeline-item">
                    <h3>2020 - Digital Transformation</h3>
                    <div class="card-img-placeholder mb-3">Historical Image (400x300)</div>
                    <p>Implemented digital solutions to enhance project management and community engagement.</p>
                </div>

                <div class="timeline-item">
                    <h3>2025 - Present Day</h3>
                    <div class="card-img-placeholder mb-3">Historical Image (400x300)</div>
                    <p>Currently operating in 20 districts with over 50 active projects and 100,000+ beneficiaries.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievement Highlights -->
    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5">Key Achievements</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="display-4 mb-3">100K+</h3>
                            <p>Lives Impacted</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="display-4 mb-3">500+</h3>
                            <p>Projects Completed</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="display-4 mb-3">20</h3>
                            <p>Districts Covered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection