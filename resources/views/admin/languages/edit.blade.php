@extends('admin.layouts.master')

@section('title', db_trans('languages.edit_language'))

@section('content')
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.languages.index') }}" class="btn btn-icon">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1>{{ db_trans('languages.manage_language') }}</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>{{ db_trans('languages.edit_language') }}</h4>
        </div>
        <div class="card-body">
            @php
                $fields = [
                    [
                        'name' => 'name',
                        'label' => db_trans('form.name'),
                        'type' => 'text',
                        'required' => true,
                        'placeholder' => db_trans('form.enter_name'),
                    ],
                    [
                        'name' => 'locale',
                        'label' => db_trans('form.locale'),
                        'type' => 'text',
                        'required' => true,
                        'placeholder' => db_trans('form.enter_locale'),
                    ],
                    [
                        'name' => 'icon',
                        'label' => db_trans('form.icon_class'),
                        'type' => 'text',
                        'placeholder' => db_trans('form.enter_icon_class'),
                    ],
                ];
            @endphp

            <x-cms-form action="{{ route('admin.languages.update', $language->id) }}" method="PATCH" :fields="$fields"
                :model="$language" submitText="{{ db_trans('form.update_language') }}" buttonPosition="right" />
        </div>
    </div>
@endsection
