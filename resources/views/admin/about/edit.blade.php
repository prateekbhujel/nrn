@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Edit About Section</h1>
    <form action="{{ route('admin.about.update', $section->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="section_name" class="form-label">Section Name</label>
            <input type="text" class="form-control" name="section_name" id="section_name" value="{{ old('section_name', $section->section_name) }}" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $section->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $section->description) }}</textarea>
        </div>

        <hr>
        <h3>Bullet Items</h3>
        <div id="items-container">
            @foreach($section->items as $index => $item)
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <button type="button" class="btn-close position-absolute top-0 end-0 remove-item-btn"></button>
                        <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item->id }}">
                        <div class="mb-3">
                            <label class="form-label">Item Title (optional)</label>
                            <input type="text" name="items[{{ $index }}][item_title]" class="form-control" value="{{ old("items.$index.item_title", $item->item_title) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="items[{{ $index }}][content]" class="form-control" required>{{ old("items.$index.content", $item->content) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon (optional)</label>
                            <input type="text" name="items[{{ $index }}][icon]" class="form-control" value="{{ old("items.$index.icon", $item->icon) }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-item-btn">Add Item</button>
        <br>
        <button type="submit" class="btn btn-primary">Update Section</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let itemIndex = {{ count($section->items) }};
    const itemsContainer = document.getElementById('items-container');

    document.getElementById('add-item-btn').addEventListener('click', function() {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('card', 'mb-3');
        itemDiv.innerHTML = `
            <div class="card-body position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 remove-item-btn"></button>
                <div class="mb-3">
                    <label class="form-label">Item Title (optional)</label>
                    <input type="text" name="items[${itemIndex}][item_title]" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="items[${itemIndex}][content]" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (optional)</label>
                    <input type="text" name="items[${itemIndex}][icon]" class="form-control">
                </div>
            </div>
        `;
        itemsContainer.appendChild(itemDiv);
        itemDiv.querySelector('.remove-item-btn').addEventListener('click', function() {
            itemDiv.remove();
        });
        itemIndex++;
    });

    // Attach remove functionality for already loaded items
    document.querySelectorAll('.remove-item-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const card = btn.closest('.card');
            if(card) card.remove();
        });
    });
</script>
@endpush
