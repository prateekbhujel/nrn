@extends('admin.layouts.master')

@section('title', 'Edit Achievement')

@section('content')
<div class="section-header">
  <div class="section-header-back">
    <a href="{{ route('admin.achievements.index') }}" class="btn btn-icon">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
  <h1>Manage Achievement</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>Edit Achievement</h4>
  </div>
  <div class="card-body">
    @php
    $fields = [
        [
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'required' => true,
            'placeholder' => 'Enter title',
        ],
        [
            'name' => 'value',
            'label' => 'Value',
            'type' => 'text',
            'required' => true,
            'placeholder' => 'Enter value',
        ],
    ];
    @endphp

    <x-cms-form 
        action="{{ route('admin.achievements.update', $achievement->id) }}"  method="PATCH"
        :fields="$fields"
        :model="$achievement"
        submitText="Create Achievement"
        buttonPosition="right"
    />
  </div>
</div>
@endsection
