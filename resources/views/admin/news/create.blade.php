@extends('admin.layouts.master')

@section('title', 'Create News')

@section('content')
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.news.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Manage News</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Create News</h4>
        </div>
        <div class="card-body">
            @php
                $fields = [
                    [
                        'name' => 'banner',
                        'label' => 'News Banner',
                        'type' => 'file',
                        'required' => true,
                    ],
                    [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => true,
                        'placeholder' => 'Title of the News',
                    ],
                    [
                        'name' => 'publish_date',
                        'label' => 'When To Publish This News ?',
                        'type' => 'date',
                        'required' => true,
                    ],
                    [
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
                        'class' => 'summernote',
                        'required' => true,
                    ],
                ];
            @endphp

            <x-cms-form action="{{ route('admin.news.store') }}" :fields="$fields" submitText="Create News"
                buttonPosition="right" />
        </div>
    </div>
@endsection
