@extends('admin.layouts.master')

@section('title', 'Manage Translations')

@section('content')
  <h1>Translations</h1>
  @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <table class="table">
      <thead>
          <tr>
              <th>Key</th>
              <th>Locale</th>
              <th>Value</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach($translations as $translation)
              <tr>
                  <td>{{ $translation->translation_key }}</td>
                  <td>{{ $translation->locale }}</td>
                  <td>
                      <form action="{{ route('admin.trans.update', $translation->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <input type="text" name="value" value="{{ $translation->value }}" class="form-control">
                          <button type="submit" class="btn btn-primary btn-sm mt-1">Update</button>
                      </form>
                  </td>
                  <td><!-- Add delete button if needed --></td>
              </tr>
          @endforeach
      </tbody>
  </table>
@endsection
