@extends('admin.layouts.master')

@section('title', 'Manage Translations')

@section('content')
    <div class="section-header">
        <h1>Translations Management</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="container">
                <!-- Filters -->
                <form method="GET" action="{{ route('admin.trans.index') }}">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <form action="{{ route('admin.trans.scan') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-sync-alt"></i> Scan Translations
                                </button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="locale" onchange="this.form.submit()"
                                {{ $type === 'dynamic' && $locale === 'en' ? 'disabled' : '' }}>
                                <option value="">All Locales</option>
                                @foreach ($locales as $loc)
                                    <option value="{{ $loc }}" {{ $locale == $loc ? 'selected' : '' }}>
                                        {{ $loc }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($locales->count() === 1)
                                <small class="text-muted">Only one language available.</small>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="type" onchange="this.form.submit()">
                                <option value="all" {{ $type == 'all' ? 'selected' : '' }}>All Types</option>
                                <option value="static" {{ $type == 'static' ? 'selected' : '' }}>Static</option>
                                <option value="dynamic" {{ $type == 'dynamic' ? 'selected' : '' }}>Dynamic</option>
                            </select>
                        </div>
                    </div>
                </form>

                <!-- Tabs for Dynamic Content -->
                @if ($type === 'dynamic')
                    <ul class="nav nav-tabs mb-4">
                        @foreach ($translatableModels as $translatableModel)
                            <li class="nav-item">
                                <a class="nav-link {{ $model === $translatableModel ? 'active' : '' }}"
                                    href="{{ route('admin.trans.index', ['type' => 'dynamic', 'model' => $translatableModel, 'locale' => $locale]) }}">
                                    {{ class_basename($translatableModel) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <p>Dynamic translations are managed through their respective model interfaces.</p>
                @else
                    <!-- Translations Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Type</th>
                                    <th>Key</th>
                                    <th>Locale</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($translations as $translation)
                                    <tr>
                                        <td>{{ $translation->translatable_id === 0 ? 'Static' : 'Dynamic' }}</td>
                                        <td>{{ $translation->translation_key }}</td>
                                        <td>{{ $translation->locale }}</td>
                                        <td>
                                            @if ($translation->locale === 'en' && $translation->translatable_id !== 0)
                                                <!-- Display 'en' dynamic translations as read-only -->
                                                @if (in_array($translation->translation_key, ['description', 'content']))
                                                    <div class="form-control-plaintext">{!! $translation->value !!}</div>
                                                @else
                                                    <input type="text" value="{{ $translation->value }}"
                                                        class="form-control" readonly>
                                                @endif
                                            @else
                                                <!-- Editable fields for non-'en' locales or static translations -->
                                                <form action="{{ route('admin.trans.update', $translation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group">
                                                        @if (in_array($translation->translation_key, ['description', 'content']))
                                                            <textarea name="value" class="form-control summernote">{{ $translation->value }}</textarea>
                                                        @else
                                                            <input type="text" name="value"
                                                                value="{{ $translation->value }}" class="form-control">
                                                        @endif
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-save"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($translation->translatable_id !== 0)
                                                <small>Related to: {{ class_basename($translation->translatable_type) }}
                                                    #{{ $translation->translatable_id }}</small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $translations->links() }}
                @endif
            </div>
        </div>
    </div>

@endsection
