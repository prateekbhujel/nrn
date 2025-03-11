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
                            <h2>{{@$aboutus->column_1}}</h2>
                            <p>{{@$aboutus->column_1_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2>{{@$aboutus->column_2}}</h2>
                            <p>{{@$aboutus->column_2_description}}</p>
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
                            <h3>{{@$aboutus->column_3}}</h3>
                            <p>{{@$aboutus->column_3_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">💡</div>
                            <h3>{{@$aboutus->column_4}}</h3>
                            <p>{{@$aboutus->column_4_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">🌱</div>
                            <h3>{{@$aboutus->column_5}}</h3>
                            <p>{{@$aboutus->column_5_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">🤲</div>
                            <h3>{{@$aboutus->column_6}}</h3>
                            <p>{{@$aboutus->column_6_description}}</p>
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
                            <h3>{{@$aboutus->column_7}}</h3>
                            <p>{{@$aboutus->column_7_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{@$aboutus->column_8}}</h3>
                            <p>{{@$aboutus->column_8_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection