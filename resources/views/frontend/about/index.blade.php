@extends('layouts.frontend.main')

@section('title', 'About Us')

@section('main-content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">About the association</p>
            <h1 class="page-title">About Us</h1>
            <p>Mission, vision, values, and team information published by the association.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="feature-grid feature-grid--two">
            @if($mission)
                <article class="content-card">
                    <p class="section-kicker">Mission</p>
                    <h2>{{ $mission->title }}</h2>
                    <p>{{ $mission->description }}</p>
                    @if($mission->items->count())
                        <ul>
                            @foreach($mission->items as $item)
                                <li>{{ $item->content }}</li>
                            @endforeach
                        </ul>
                    @endif
                </article>
            @endif

            @if($vision)
                <article class="content-card">
                    <p class="section-kicker">Vision</p>
                    <h2>{{ $vision->title }}</h2>
                    <p>{{ $vision->description }}</p>
                    @if($vision->items->count())
                        <ul>
                            @foreach($vision->items as $item)
                                <li>{{ $item->content }}</li>
                            @endforeach
                        </ul>
                    @endif
                </article>
            @endif
        </div>

        @if(!$mission && !$vision)
            <div class="empty-state">Mission and vision content will appear here once published.</div>
        @endif
    </div>
</section>

@if($coreValues && $coreValues->items->count())
    <section class="section section--soft">
        <div class="container">
            <div class="section-heading section-heading--center">
                <p class="section-kicker">Values</p>
                <h2 class="section-title">{{ $coreValues->title }}</h2>
            </div>

            <div class="feature-grid">
                @foreach($coreValues->items as $item)
                    <article class="content-card">
                        @if(!empty($item->icon))
                            <div class="value-icon">{{ $item->icon }}</div>
                        @endif
                        <h3>{{ $item->item_title }}</h3>
                        <p>{{ $item->content }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

@if($team && $team->items->count())
    <section class="section">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="section-kicker">Team</p>
                    <h2 class="section-title">{{ $team->title }}</h2>
                </div>
                <p class="section-copy">Roles and responsibilities shared by the organization.</p>
            </div>

            <div class="feature-grid feature-grid--two">
                @foreach($team->items as $item)
                    <article class="content-card">
                        <h3>{{ $item->item_title }}</h3>
                        <p>{{ $item->content }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
