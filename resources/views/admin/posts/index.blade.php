@extends('admin.layouts.master')

@section('title', 'Posts')

@section('content')
<div class="section-header">
    <h1>Posts</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Posts</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Posts List</h4>
            <div class="card-header-action">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add New Post</a>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table(['class' => 'table table-striped table-hover']) }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
