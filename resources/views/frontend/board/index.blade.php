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
            @foreach($executive as $member)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-img-placeholder" style="height: 400px; background-image: url('{{ asset($member->image_path) }}'); background-size: cover; background-position: center;">
                            <!-- Image Placeholder -->
                        </div>
                        <div class="card-body">
                            <h3>{{ $member->name }}</h3>
                            <p class="text-muted">{{ $member->position }}</p>
                            <p>{!! $member->description !!}</p>
                            @if($member->areas_of_expertise)
                                <div class="mt-3">
                                    <strong>Areas of Expertise:</strong>
                                    <p>{{ $member->areas_of_expertise }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Advisory Board Section -->
<section class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Advisory Board</h2>
        <div class="row">
            @foreach($advisory as $advisor)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img-placeholder" style="height: 300px; background-image: url('{{ asset($advisor->image_path) }}'); background-size: cover; background-position: center;">
                            <!-- Image Placeholder -->
                        </div>
                        <div class="card-body">
                            <h3>{{ $advisor->name }}</h3>
                            <p class="text-muted">{{ $advisor->position }}</p>
                            <p>{!! $advisor->description !!}</p>
                        </div>
                        @if($advisor->areas_of_expertise)
                                <div class="mt-3">
                                    <strong>Areas of Expertise:</strong>
                                    <p>{{ $advisor->areas_of_expertise }}</p>
                                </div>
                            @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
