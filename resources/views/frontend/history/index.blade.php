@extends('layouts.frontend.main')

@section('title', 'Our History')

@section('main-content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">History</p>
            <h1 class="page-title">Our History</h1>
            <p>Milestones, memories, and key achievements from the association journey.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">Timeline</p>
                <h2 class="section-title">Our Journey</h2>
            </div>
            <p class="section-copy">A chronological record of published milestones and activities.</p>
        </div>

        <div class="timeline">
            @forelse($history as $item)
                <article class="timeline-item">
                    <h3>{{ $item->year }} - {{ $item->title }}</h3>
                    @if($item->image_path)
                        <img class="detail-image mb-3" src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}">
                    @endif
                    <div>{!! $item->description !!}</div>
                </article>
            @empty
                <div class="empty-state">History items will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading section-heading--center">
            <p class="section-kicker">Achievements</p>
            <h2 class="section-title">Key Achievements</h2>
        </div>

        <div class="stat-grid">
            @forelse ($achievements as $achievement)
                <article class="stat-card">
                    <span class="stat-card__value">{{ $achievement->value }}</span>
                    <p class="stat-card__label">{{ $achievement->title }}</p>
                </article>
            @empty
                <div class="empty-state">Achievements will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
