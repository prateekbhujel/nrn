@extends('admin.layouts.master')

@section('title', db_trans('events.create_event'))

@section('content')
<div class="section-header">
  <div class="section-header-back">
    <a href="{{ route('admin.events.index') }}" class="btn btn-icon">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
  <h1>{{ db_trans('events.manage_event') }}</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>{{ db_trans('events.create_event') }}</h4>
  </div>
  <div class="card-body">
    @php
    $fields = [
        [
            'name' => 'banner',
            'label' => db_trans('form.banner_images'),
            'type' => 'file',
            'required' => true,
        ],
        [
            'name' => 'title',
            'label' => db_trans('form.title'),
            'type' => 'text',
            'required' => true,
            'placeholder' => db_trans('form.enter_title'),
        ],
        [
            'name' => 'event_date',
            'label' => db_trans('form.event_date'),
            'type' => 'date',
            'required' => true,
        ],
        [
            'name' => 'location',
            'label' => db_trans('form.location'),
            'type' => 'text',
            'placeholder' => db_trans('form.enter_event_location'),
        ],
        [
            'name' => 'description',
            'label' => db_trans('form.description'),
            'class' => 'summernote',
            'type' => 'textarea',
            'required' => true,
        ],
    ];
    @endphp

    <x-cms-form 
        action="{{ route('admin.events.store') }}" 
        :fields="$fields"
        submitText="{{ db_trans('form.create_event') }}"
        buttonPosition="right"
    />
  </div>
</div>
@endsection
