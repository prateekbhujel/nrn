@extends('layouts.frontend.main')

@section('main-content')

    <!-- Page Hero -->
    <div class="hero-placeholder" style="height: 300px;">
        <div class="container">
            <h1 class="display-4">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item  text-white" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2>Our Mission</h2>
                            <p>To empower communities through sustainable development initiatives, fostering economic
                                growth, and promoting social welfare across Nepal.</p>
                            <p>We strive to create lasting positive change by:</p>
                            <ul>
                                <li>Supporting local initiatives</li>
                                <li>Providing educational opportunities</li>
                                <li>Improving healthcare access</li>
                                <li>Promoting environmental sustainability</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2>Our Vision</h2>
                            <p>To create a self-reliant, prosperous Nepal where every citizen has access to quality
                                education, healthcare, and economic opportunities.</p>
                            <p>Our long-term goals include:</p>
                            <ul>
                                <li>Reducing poverty through sustainable programs</li>
                                <li>Building resilient communities</li>
                                <li>Promoting gender equality</li>
                                <li>Preserving cultural heritage</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="section bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Core Values</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">🤝</div>
                            <h3>Integrity</h3>
                            <p>Maintaining highest ethical standards in all our operations</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">💡</div>
                            <h3>Innovation</h3>
                            <p>Finding creative solutions to community challenges</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">🌱</div>
                            <h3>Sustainability</h3>
                            <p>Creating lasting positive impact on communities</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">🤲</div>
                            <h3>Empowerment</h3>
                            <p>Building capacity for self-reliance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Overview Section -->
    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5">Our Team</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Professional Staff</h3>
                            <p>Our organization is supported by a dedicated team of professionals with expertise in
                                various fields including community development, project management, and social work.</p>
                            <ul>
                                <li>Project Managers: 15</li>
                                <li>Field Officers: 30</li>
                                <li>Administrative Staff: 10</li>
                                <li>Technical Experts: 8</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Volunteers</h3>
                            <p>We are proud to work with dedicated volunteers who contribute their time and skills to
                                support our mission. Our volunteer network includes:</p>
                            <ul>
                                <li>Community Volunteers: 200+</li>
                                <li>International Partners: 15</li>
                                <li>Technical Advisors: 20</li>
                                <li>Youth Ambassadors: 50</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection