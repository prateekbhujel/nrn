@extends('admin.layouts.master')

@section('title', 'Create Board Member')

@section('content')
<div class="section-header">
  <div class="section-header-back">
    <a href="{{ route('admin.board-members.index') }}" class="btn btn-icon">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
  <h1>Manage Board Member</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>Create Board Member</h4>
  </div>
  <div class="card-body">
    @php
    $fields = [
        [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'required' => true,
            'placeholder' => 'Enter name',
        ],
        [
            'name' => 'position',
            'label' => 'Position',
            'type' => 'text',
            'required' => true,
            'placeholder' => 'Enter position',
        ],
        [
            'name' => 'type',
            'label' => 'Type',
            'type' => 'text',
            'required' => true,
            'placeholder' => 'Enter type',
        ],
        [
            'name' => 'image_path',
            'label' => 'Profile Image',
            'type' => 'file',
            'required' => false,
        ],
        [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'class' => 'summernote',
            'required' => false,
            'placeholder' => 'Enter description',
        ],
        [
            'name' => 'areas_of_expertise',
            'label' => 'Areas of Expertise',
            'type' => 'textarea',
            'required' => false,
            'placeholder' => 'Enter areas of expertise',
        ],
    ];
    @endphp

    <x-cms-form 
        action="{{ route('admin.board-members.store') }}" 
        :fields="$fields"
        submitText="Create"
        buttonPosition="right"
    />
  </div>
</div>
@endsection
