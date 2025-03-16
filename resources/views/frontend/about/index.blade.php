@extends('layouts.frontend.main')

@section('main-content')

    <!-- Page Hero -->
    <div class="hero-placeholder" style="height: 300px;">
        <div class="container">
            <h1 class="display-4">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- Our Mission -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2>{{ $mission->title }}</h2>
                            <p>{{ $mission->description }}</p>
                            @if($mission->items->count())
                            <ul>
                                @foreach($mission->items as $item)
                                    <li>{{ $item->content }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Our Vision -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2>{{ $vision->title }}</h2>
                            <p>{{ $vision->description }}</p>
                            @if($vision->items->count())
                            <ul>
                                @foreach($vision->items as $item)
                                    <li>{{ $item->content }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="section bg-light">
        <div class="container">
            <h2 class="text-center mb-5">{{ $coreValues->title }}</h2>
            <div class="row">
                @foreach($coreValues->items as $item)
                <div class="col-md-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="value-icon mb-3">{{ $item->icon }}</div>
                            <h3>{{ $item->item_title }}</h3>
                            <p>{{ $item->content }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Overview Section -->
    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5">{{ $team->title }}</h2>
            <div class="row">
                @foreach($team->items as $item)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $item->item_title }}</h3>
                            <p>{{ $item->content }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
