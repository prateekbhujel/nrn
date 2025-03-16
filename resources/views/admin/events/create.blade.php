@extends('admin.layouts.master')

@section('title', 'Create Event')

@section('content')
<div class="section-header">
  <div class="section-header-back">
    <a href="{{ route('admin.events.index') }}" class="btn btn-icon">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
  <h1>Manage Event</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>Create Event</h4>
  </div>
  <div class="card-body">
    @php
    $fields = [
        [
            'name' => 'banner',
            'label' => 'Banner Images',
            'type' => 'file',
            'required' => true,
        ],
        [
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'required' => true,
            'placeholder' => 'Enter Title',
        ],
        [
            'name' => 'event_date',
            'label' => 'Event Date',
            'type' => 'date',
            'required' => true,
        ],
        [
            'name' => 'location',
            'label' => 'Location',
            'type' => 'text',
            'placeholder' => 'Enter Event Location',
        ],
        [
            'name' => 'description',
            'label' => 'Description',
            'class' => 'summernote',
            'type' => 'textarea',
            'required' => true,
        ],
    ];
    @endphp

    <x-cms-form 
        action="{{ route('admin.events.store') }}" 
        :fields="$fields"
        submitText="Create Event"
        buttonPosition="right"
    />
  </div>
</div>
@endsection
