@extends('admin.layouts.master')

@section('title', 'Manage Projects')

@section('content')
<div class="section-header">
    <h1>Projects Lists</h1>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Manage Projects</h4>
            <div class="card-header-action">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i> Create New Project
                </a>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush