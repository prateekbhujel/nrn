@extends('admin.layouts.master')

@section('title', 'Photo Slider')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('admin.photoslider.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Manage Slider</h1>
</div>

<div class='card'>
    <div class="card-header">
        <h4>Photo Slider</h4>
    </div>
    <div class="card-body">
        @php
        $fields = [
            [
                'name' => 'main_title',
                'label' => 'Main Title',
                'type' => 'text',
                'required' => 'true',
                'placeholder' => 'enter main title',
            ],
            [
                'name' => 'main_title',
                'label' => 'Main Title',
                'type' => 'text',
                'placeholder' => 'enter sub title',
                'required' => false
            ],
            [
                'name' => 'category',
                'label' => 'Category',
                'type' => 'select', // Add this key
    'options' => [
        ''=> 'no Category',
        'about'   => 'about', 
        'board'   => 'board',
        'contact' => 'contact',
        'gallery' => 'gallery',
        'history' => 'history'
                ],
                'required' => false, // Added missing comma here
                'placeholder' => 'enter sub title',
            ],
            [
                'name' => 'main_image',
                'label' => 'Main Image',
                'type' => 'file',
                'required' => true
            ],
        ];
        @endphp

        <x-cms-form action="{{ route('admin.photoslider.store') }}" :fields="$fields" submitText="Create News" buttonPosition="right" />
    </div>
</div>
@endsection
