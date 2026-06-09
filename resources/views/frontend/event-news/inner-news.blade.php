@extends('layouts.frontend.main')

@section('title', $news->title ?? 'News')

@section('main-content')
<section class="page-hero page-hero--large {{ $news->banner ? 'page-hero--with-image' : '' }}">
    @if($news->banner)
        <img src="{{ asset('storage/' . $news->banner) }}" alt="{{ $news->title }}">
    @endif
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">News</p>
            <h1 class="page-title">{{ $news->title }}</h1>
            @if(!empty($news->publish_date))
                <p>{{ \Carbon\Carbon::parse($news->publish_date)->format('F d, Y') }}</p>
            @endif
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <article class="detail-article">
            <p class="section-kicker">Published update</p>
            <h2 class="section-title mb-4">News Details</h2>
            @if($news->banner)
                <img src="{{ asset('storage/' . $news->banner) }}" class="detail-image mb-4" alt="{{ $news->title }}">
            @endif
            <div>{!! $news->description !!}</div>
        </article>
    </div>
</section>
@endsection
