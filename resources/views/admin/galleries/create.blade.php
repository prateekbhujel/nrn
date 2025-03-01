@extends('admin.layouts.master')

@section('title', 'Create Galleries')

@section('content')
<div class="section-header">
  <div class="section-header-back">
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
  </div>
  <h1>Manage Galleries</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>Create Gallery</h4>
  </div>
  <div class="card-body">
    @php
$fields = [
    [
        'name' => 'banner',
        'label' => 'Banner Images',
        'type' => 'file',
        'multiple' => true,
    ],
    [
        'name' => 'title',
        'label' => 'Image Title',
        'type' => 'text',
        'placeholder' => 'Enter title',
    ],
    [
        'name' => 'date',
        'label' => 'Image Date',
        'type' => 'date',
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
    ],
];
@endphp

<x-cms-form 
    action="{{ route('admin.gallery.store') }}" 
    :fields="$fields"
    submitText="Create Gallery"
    buttonPosition="right"
/>
  </div>
</div>
@endsection
