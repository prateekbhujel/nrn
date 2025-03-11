@extends('admin.layouts.master')
@section('title', ' Manage Photo Slider')

@section('content')
<div class="section-header">
    <div class="section-header-back">
    </div>
    <h1> Photo Slider List</h1>
</div>
<div class="container">
  <div class="card">
    <div class="card-header">
        <h4>Manage Photo Slider</h4>
        <div class="card-header-action">
        <a href="{{ route('admin.photoslider.create') }}" class="btn btn-success">
        <i class="fas fa-plus me-2"></i> Create New Photo Slider
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