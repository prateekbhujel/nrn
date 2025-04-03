@extends('admin.layouts.master')

@section('title', 'Edit Board Member')

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
    <h4>Edit Board Member</h4>
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
            'type' => 'select',
            'required' => true,
            'options' => [
                'executive' => 'Executive', 
                'advisory' => 'Advisory'
            ],
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
            'placeholder' => 'Enter areas of expertise',
        ],
    ];
    @endphp

    <x-cms-form 
        action="{{ route('admin.board-members.update', $board->id) }}" method="PATCH"
        :fields="$fields"
        :model="$board"
        submitText="Create"
        buttonPosition="right"
    />
  </div>
</div>
@endsection
