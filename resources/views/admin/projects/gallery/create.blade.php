@extends('admin.layouts.master')

@section('title', 'Add Gallery Image')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Manage Project Gallery</h1>
</div>

<div class="card">
    <div class="card-header">
        <h4>Add Gallery Image</h4>
    </div>
    <div class="card-body">
        @php
            $fields = [
                [
                    'name' => 'image',
                    'label' => 'Gallery Image',
                    'type' => 'file',
                    'required' => true,
                ],
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'placeholder' => 'Enter image title',
                ],
                [
                    'name' => 'description',
                    'label' => 'Description',
                    'type' => 'textarea',
                ],
            ];
        @endphp

        <x-cms-form 
            action="{{ route('admin.projects.gallery.store', $project->id) }}" 
            :fields="$fields"
            submitText="Add Image"
            buttonPosition="right"
        />
    </div>
</div>
@endsection