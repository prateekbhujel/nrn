@extends('admin.layouts.master')

@section('title', 'Image Gallery')

@section('content')
<div class="section-header">
    <div class="section-header-back">
    </div>
    <h1>Image Gallery</h1>

  </div>
<div class="container">
  <div class="card">
    <div class="card-header">
        <h4>Manage Images</h4>
        <div class="card-header-action">
          <a href="{{ route('admin.gallery.create') }}" class="btn btn-success"><i class="fas fa-plus me-2"> Add New Image</i></a>
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
