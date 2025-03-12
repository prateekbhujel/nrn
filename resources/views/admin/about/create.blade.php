@extends('admin.layouts.master')

@section('content')
<div class="container my-5">
    <h1>Create About Section</h1>
    <form action="{{ route('admin.about.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="section_name" class="form-label">Section Name</label>
            <input type="text" class="form-control" name="section_name" id="section_name" value="{{ old('section_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <hr>
        <h3>Bullet Items</h3>
        <div id="items-container">
            <!-- Dynamic bullet items will be added here -->
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-item-btn">Add Item</button>
        <br>
        <button type="submit" class="btn btn-primary">Save Section</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let itemIndex = 0;
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
</script>
@endpush
