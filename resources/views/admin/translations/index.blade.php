@extends('admin.layouts.master')

@section('title', 'Manage Translations')

@section('content')
<div class="section-header">
    <h1>Static Translation</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="container">
            <h1 class="mb-4">Manage Translations</h1>
        
            <!-- Scan Translations Button -->
            <div class="mb-3">
                <form action="{{ route('admin.trans.scan') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-sync-alt"></i> Scan for New Translations
                    </button>
                </form>
            </div>
        
            <!-- Translations Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Key</th>
                            <th>Language</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($translations as $translation)
                            <tr>
                                <td>{{ $translation->translation_key }}</td>
                                <td>{{ ucfirst($translation->language->name) }}</td>
                                <td>
                                    <form action="{{ route('admin.trans.update', $translation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <input type="text" name="value" value="{{ $translation->value }}" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection