@extends('layouts.frontend.main')

@section('main-content')
<div class="hero-placeholder" style="height: 300px;">
        <div class="container">
            <h1 class="display-4">Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Contact Information Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="mb-4">Send Us a Message</h2>
                            <form id="contactForm" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name" required>
                                        <div class="invalid-feedback">
                                            Please provide your name.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" required>
                                    <div class="invalid-feedback">
                                        Please provide a subject.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide your message.
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Office Location</h3>
                            <p>
                                123 Main Street<br>
                                Kathmandu, Nepal
                            </p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Contact Details</h3>
                            <p>
                                <strong>Phone:</strong><br>
                                +977-1-234567<br>
                                +977-1-234568
                            </p>
                            <p>
                                <strong>Email:</strong><br>
                                info@nrb.org.np<br>
                                support@nrb.org.np
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h3>Working Hours</h3>
                            <p>
                                <strong>Sunday - Friday:</strong><br>
                                9:00 AM - 5:00 PM
                            </p>
                            <p>
                                <strong>Saturday:</strong><br>
                                Closed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="card">
                <!-- Placeholder/Dummy Image (shown) -->
                <!-- <img src="https://placehold.co/600x400?text=Map+of+Kathmandu" alt="Map of Kathmandu" style="width: 100%; height: 400px; object-fit: cover;"> -->

                <!-- 
                    To use a dynamic map with latitude and longitude instead, uncomment the following iframe and comment out the placeholder image above.
                    This embeds an OpenStreetMap iframe centered on Thamel, Kathmandu, with a marker at latitude 27.7150, longitude 85.3076.
                -->

                <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://www.openstreetmap.org/export/embed.html?bbox=85.2998,27.7000,85.3198,27.7200&layer=mapnik&marker=27.7150,85.3076"
                    style="border: 1px solid black"></iframe>

            </div>
        </div>
    </section>
@endsection
