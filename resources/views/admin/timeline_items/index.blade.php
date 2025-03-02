@extends('admin.layouts.master')

@section('title', 'Manage Timeline Items')

@section('content')
<div class="section-header">
    <div class="section-header-back">
    </div>
    <h1>Timeline Items List</h1>
</div>
<div class="container">
  <div class="card">
    <div class="card-header">
        <h4>Manage Timeline Items</h4>
        <div class="card-header-action">
          <a href="{{ route('admin.timeline-items.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-2"></i> Create New Timeline Item
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
