@extends('admin.layouts.master')

@section('title', 'Edit Event')

@section('content')
<div class="section-header">
  <div class="section-header-back">
    <a href="{{ route('admin.events.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
  </div>
  <h1>Manage Event</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>Edit Event</h4>
  </div>
  <div class="card-body">
    @php
    $fields = [
        [
            'name' => 'banner',
            'label' => 'Banner Image',
            'type' => 'file',
            'required' => true,
        ],
        [
            'name' => 'title',
            'label' => 'Event Title',
            'type' => 'text',
            'placeholder' => 'Enter event title',
            'required' => true,
        ],
        [
            'name' => 'event_date',
            'label' => 'Event Date',
            'type' => 'date',
            'placeholder' => 'YYYY-MM-DD',
        ],
        [
            'name' => 'location',
            'label' => 'Location',
            'type' => 'text',
            'placeholder' => 'Enter event location',
        ],
        [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'placeholder' => 'Enter event description',
            'required' => true,
        ],
    ];
  @endphp

    <x-cms-form action="{{ route('admin.events.update', $event->id) }}" method="PATCH" :fields="$fields" :model="$event" />
  </div>
</div>
@endsection
