@extends('admin.layouts.master')

@section('content')
<div class="container my-5">
    <h1>About Sections</h1>
    <a href="{{ route('admin.about.create') }}" class="btn btn-primary mb-3">Create New Section</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="accordion" id="sectionsAccordion">
        @foreach($sections as $section)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $section->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $section->id }}">
                        {{ $section->title }}
                    </button>
                </h2>
                <div id="collapse{{ $section->id }}" class="accordion-collapse collapse" data-bs-parent="#sectionsAccordion">
                    <div class="accordion-body">
                        <p>{{ $section->description }}</p>
                        @if($section->items->count())
                        <ul>
                            @foreach($section->items as $item)
                                <li>
                                    @if($item->item_title)
                                        <strong>{{ $item->item_title }}:</strong>
                                    @endif
                                    {{ $item->content }}
                                    @if($item->icon)
                                        <span class="badge bg-secondary ms-2">Icon: {{ $item->icon }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        @endif
                        <a href="{{ route('admin.about.edit', $section->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.about.destroy', $section->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this section?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
