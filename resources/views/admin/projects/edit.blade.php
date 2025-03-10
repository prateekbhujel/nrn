@extends('admin.layouts.master')

@section('title', 'Edit Project')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Manage Project</h1>
</div>

<div class="card">
    <div class="card-header">
        <h4>Edit Project</h4>
    </div>
    <div class="card-body">
        @php
            $fields = [
                [
                    'name' => 'main_image',
                    'label' => 'Main Image',
                    'type' => 'file',
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
            action="{{ route('admin.projects.update', $project->id) }}" 
            method="PUT"
            :fields="$fields"
            :model="$project"
            submitText="Update Project"
            buttonPosition="right"
        />

        <hr>
        <h5>Gallery Images</h5>
        <a href="{{ route('admin.projects.gallery.create', $project->id) }}" class="btn btn-success mb-3">
            <i class="fas fa-plus me-2"></i> Add Gallery Image
        </a>
        <div class="row">
            @foreach($project->galleryImages as $image)
                <div class="col-md-3 position-relative">
                    <!-- Delete Button -->
                    <button class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-item" 
                        data-url="{{ route('admin.projects.gallery.destroy', $image->id) }}">
                        <i class="fas fa-times"></i>
                    </button>
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid mb-2" alt="{{ $image->title }}">
                    <p>{{ $image->title ?? 'No Title' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
