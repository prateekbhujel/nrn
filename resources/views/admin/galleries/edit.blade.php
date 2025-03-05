@extends('admin.layouts.master')

@section('title', 'Edit Galleries')

@section('content')
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Manage Galleries</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Edit Gallery</h4>
        </div>
        <div class="card-body">
            @php
                $fields = [
                    [
                        'name' => 'banner',
                        'label' => 'Image',
                        'type' => 'file',
                        'multiple' => true,
                    ],
                    [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'placeholder' => 'Enter title',
                    ],
                    [
                        'name' => 'date',
                        'label' => 'When did this take Place ?',
                        'type' => 'date',
                    ],
                    [
                        'name' => 'location',
                        'label' => 'Location',
                        'type' => 'text',
                        'placeholder' => 'Enter where did this Image captured ?',
                    ],
                    [
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
                    ],
                ];
            @endphp

            <x-cms-form action="{{ route('admin.gallery.update', $gallery->id) }}" method="PATCH" :fields="$fields"
                :model="$gallery" />
        </div>
    </div>
@endsection
