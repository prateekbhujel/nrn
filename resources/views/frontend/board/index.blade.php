@extends('layouts.frontend.main')

@section('main-content')
<div class="hero-placeholder" style="height: 300px;">
        <div class="container">
            <h1 class="display-4">Board Members</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Board Members</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Executive Board Section -->
    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5">Executive Board</h2>
            <div class="row">
                <!-- Chairman -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-img-placeholder" style="height: 400px;">
                            Chairman Profile Photo
                        </div>
                        <div class="card-body">
                            <h3>Mr. Rajesh Kumar Sharma</h3>
                            <p class="text-muted">Chairman</p>
                            <p>With over 25 years of experience in community development, Mr. Sharma has been leading
                                NRB Organization since its inception. His vision and leadership have been instrumental
                                in shaping the organization's growth and impact.</p>
                            <div class="mt-3">
                                <strong>Areas of Expertise:</strong>
                                <p>Strategic Planning, Community Development, International Relations</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vice Chairman -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-img-placeholder" style="height: 400px;">
                            Vice Chairman Profile Photo
                        </div>
                        <div class="card-body">
                            <h3>Dr. Sita Devi Poudel</h3>
                            <p class="text-muted">Vice Chairman</p>
                            <p>Dr. Poudel brings extensive academic and field experience in social development. Her
                                research work has significantly contributed to our community engagement strategies.</p>
                            <div class="mt-3">
                                <strong>Areas of Expertise:</strong>
                                <p>Social Research, Education Policy, Gender Equality</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Board Members Grid -->
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img-placeholder" style="height: 300px;">
                            Board Member Profile Photo
                        </div>
                        <div class="card-body">
                            <h3>Mr. Binod Thapa</h3>
                            <p class="text-muted">Treasurer</p>
                            <p>Financial management expert with 15 years of experience in non-profit sector.</p>
                        </div>
                    </div>
                </div>

                <!-- Add more board members with similar structure -->
            </div>
        </div>
    </section>

    <!-- Advisory Board Section -->
    <section class="section bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Advisory Board</h2>
            <div class="row">
                <!-- Advisory Board Members -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img-placeholder" style="height: 300px;">
                            Advisor Profile Photo
                        </div>
                        <div class="card-body">
                            <h3>Prof. Dr. Krishna Prasad</h3>
                            <p class="text-muted">Senior Advisor</p>
                            <p>Distinguished professor with expertise in sustainable development.</p>
                        </div>
                    </div>
                </div>
                <!-- Add more advisory board members -->
            </div>
        </div>
    </section>

@endsection
