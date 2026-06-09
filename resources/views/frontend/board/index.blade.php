@extends('layouts.frontend.main')

@section('title', 'Board Members')

@section('main-content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Leadership</p>
            <h1 class="page-title">Board Members</h1>
            <p>Executive and advisory board members serving the association.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Board Members</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">Executive Board</p>
                <h2 class="section-title">Association leadership</h2>
            </div>
            <p class="section-copy">Current executive board profiles and areas of responsibility.</p>
        </div>

        <div class="person-grid person-grid--two">
            @forelse($executive as $member)
                <article class="person-card">
                    @if($member->image_path)
                        <img class="person-card__photo" src="{{ asset('storage/'.$member->image_path) }}" alt="{{ $member->name }}">
                    @else
                        <div class="person-card__photo"></div>
                    @endif
                    <div class="person-card__body">
                        <h3 class="person-card__name">{{ $member->name }}</h3>
                        <p class="person-card__role">{{ $member->position }}</p>
                        <p>{!! $member->description !!}</p>
                        @if($member->areas_of_expertise)
                            <div class="expertise-box">
                                <strong>Areas of expertise</strong>
                                <p class="mb-0">{{ $member->areas_of_expertise }}</p>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="empty-state">Executive board members will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">Advisory Board</p>
                <h2 class="section-title">Advisors and community guidance</h2>
            </div>
            <p class="section-copy">Advisory members supporting governance, programs, and outreach.</p>
        </div>

        <div class="person-grid">
            @forelse($advisory as $advisor)
                <article class="person-card">
                    @if($advisor->image_path)
                        <img class="person-card__photo" src="{{ asset('storage/'.$advisor->image_path) }}" alt="{{ $advisor->name }}">
                    @else
                        <div class="person-card__photo"></div>
                    @endif
                    <div class="person-card__body">
                        <h3 class="person-card__name">{{ $advisor->name }}</h3>
                        <p class="person-card__role">{{ $advisor->position }}</p>
                        <p>{!! $advisor->description !!}</p>
                        @if($advisor->areas_of_expertise)
                            <div class="expertise-box">
                                <strong>Areas of expertise</strong>
                                <p class="mb-0">{{ $advisor->areas_of_expertise }}</p>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="empty-state">Advisory board members will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
