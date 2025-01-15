@extends('admin.layouts.master')

@section('title', isset($post) ? 'Edit Post' : 'Create Post')

@section('content')
<div class="section-header">
    <h1>{{ isset($post) ? 'Edit Post' : 'Create Post' }}</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></div>
        <div class="breadcrumb-item">{{ isset($post) ? 'Edit Post' : 'Create Post' }}</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>{{ isset($post) ? 'Edit Post' : 'Create Post' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}" method="POST">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="5" class="form-control">{{ old('content', $post->content ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($post) ? 'Update Post' : 'Create Post' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
