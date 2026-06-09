@extends('layouts.frontend.main')

@section('title', $project->title ?? 'Project')

@section('main-content')
<section class="page-hero page-hero--large {{ $project->main_image ? 'page-hero--with-image' : '' }}">
    @if($project->main_image)
        <img src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}">
    @endif
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Project</p>
            <h1 class="page-title">{{ $project->title }}</h1>
            @if(!empty($project->sub_motto))
                <p>{{ $project->sub_motto }}</p>
            @endif
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="detail-layout">
            <article class="detail-article">
                @if(!empty($project->project_title))
                    <p class="section-kicker">Overview</p>
                    <h2 class="section-title mb-3">{{ $project->project_title }}</h2>
                @endif

                @if(!empty($project->project_description))
                    <p class="lead-copy mb-4">{{ $project->project_description }}</p>
                @endif

                @if($project->main_image)
                    <img src="{{ asset('storage/' . $project->main_image) }}" class="detail-image mb-4" alt="{{ $project->title }}">
                @endif

                <div>{!! $project->description !!}</div>
            </article>

            <aside class="detail-aside">
                <p class="section-kicker">Project page</p>
                <h3>{{ $project->title }}</h3>
                <p class="section-copy mb-3">Use the gallery below to view more published images from this project.</p>
                <a class="button-link button-link--primary" href="{{ route('contact') }}">Ask about this project</a>
            </aside>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">Gallery</p>
                <h2 class="section-title">Project Gallery</h2>
            </div>
            <p class="section-copy">Images attached to this project by the CMS.</p>
        </div>

        <div class="gallery-grid">
            @forelse($projectImages as $image)
                <a href="{{ asset('storage/' . $image->image_path) }}" class="gallery-card glightbox" data-gallery="project-gallery">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="gallery-card__image" alt="{{ $image->title }}">
                    <div class="gallery-card__body">
                        <h4>{{ $image->title }}</h4>
                        @if(!empty($image->description))
                            <p class="mb-0">{{ $image->description }}</p>
                        @endif
                    </div>
                </a>
            @empty
                <div class="empty-state">Project gallery images will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
