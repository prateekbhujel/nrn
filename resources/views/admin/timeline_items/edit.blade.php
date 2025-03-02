@extends('admin.layouts.master')

@section('title', 'Edit Timeline Item')

@section('content')
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.timeline-items.index') }}" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1>Manage Timeline Item</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Edit Timeline Item</h4>
        </div>
        <div class="card-body">
            @php
                $fields = [
                    [
                        'name' => 'year',
                        'label' => 'Year',
                        'type' => 'number',
                        'required' => true,
                        'placeholder' => 'Enter year',
                    ],
                    [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => true,
                        'placeholder' => 'Enter title',
                    ],
                    [
                        'name' => 'image_path',
                        'label' => 'Image',
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
                ];
            @endphp

            <x-cms-form action="{{ route('admin.timeline-items.update', $timeline_item->id) }}"
                method="PATCH" :model="$timeline_item" :fields="$fields" submitText="Create Timeline Item"
                buttonPosition="right" />
        </div>
    </div>
@endsection
