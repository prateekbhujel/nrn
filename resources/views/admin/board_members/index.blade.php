@extends('admin.layouts.master')

@section('title', 'Manage Board Members')

@section('content')
<div class="section-header">
    <div class="section-header-back">
    </div>
    <h1>Board Members List</h1>
</div>
<div class="container">
  <div class="card">
    <div class="card-header">
        <h4>Manage Board Members</h4>
        <div class="card-header-action">
          <a href="{{ route('admin.board-members.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-2"></i> Create New Board Member
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
