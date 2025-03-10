@extends('admin.layouts.master')

@section('title', 'Create Project')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Manage Project</h1>
</div>

<div class="card">
    <div class="mb-4 mr-4 ml-4 mt-4">
        <p class="text-muted">Gallery images can be added after creating the project.</p>
    </div>
    <div class="card-header">
        <h4>Create Project</h4>
    </div>
    <div class="card-body">
        @php
            $fields = [
                [
                    'name' => 'main_image',
                    'label' => 'Main Image',
                    'type' => 'file',
                    'required' => true,
                ],
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'required' => true,
                    'placeholder' => 'Enter project title',
                ],
                [
                    'name' => 'description',
                    'label' => 'Description',
                    'type' => 'textarea',
                    'required' => true,
                ],
            ];
        @endphp

        <x-cms-form 
            action="{{ route('admin.projects.store') }}" 
            :fields="$fields"
            submitText="Create Project"
            buttonPosition="right"
        />
    </div>
</div>
@endsection