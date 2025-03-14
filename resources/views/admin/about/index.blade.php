@extends('admin.layouts.master')

@section('title', 'Manage Events')

@section('content')
<div class="section-header">
    <div class="section-header-back">
    </div>
    <h1>Events Lists</h1>

  </div>
<div class="container">
  <div class="card">
    <div class="card-header">
        <h4>Manage Events</h4>
        <div class="card-header-action">
          <a href="{{ route('admin.about.create') }}" class="btn btn-success"><i class="fas fa-plus me-2"> Create New Event</i></a>
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
