@props([
    'action',
    'method' => 'POST',
    'fields' => [],
    'model' => null,
    'footer' => null,
    'submitText' => null,
    'cancelText' => 'Cancel',
    'showCancel' => true,
    'buttonPosition' => 'right'
])

@php
    $hasFile = collect($fields)->contains(fn($field) => $field['type'] === 'file');
    $defaultSubmitText = strtoupper($method) === 'POST' ? 'Create' : 'Update';
    $buttonAlignment = match($buttonPosition) {
        'left' => 'text-start',
        'center' => 'text-center',
        default => 'text-end'
    };
@endphp

<form action="{{ $action }}" method="POST" {{ $hasFile ? 'enctype=multipart/form-data' : '' }}>
    @csrf
    @if(in_array(strtoupper($method), ['PUT','PATCH','DELETE']))
        @method($method)
    @endif

    @foreach ($fields as $field)
        <div class="form-group">
            <label class="form-label" for="{{ $field['name'] }}">
                {{ $field['label'] ?? ucwords(str_replace('_', ' ', $field['name'])) }}
                @if(!empty($field['required']))
                    <span class="text-danger">*</span>
                @endif
            </label>

            @php
                $value = old($field['name'], $model[$field['name']] ?? $field['default'] ?? '');
                $required = !empty($field['required']) ? 'required' : '';
                $class = $field['class'] ?? '';
                $multiple = isset($field['multiple']) && $field['multiple'] ? 'multiple' : '';
                $name = $multiple ? $field['name'] . '[]' : $field['name'];
                
                if (in_array($field['type'], ['date', 'datetime-local', 'time'])) {
                    $value = $value ?: match($field['type']) {
                        'date' => date('Y-m-d'),
                        'datetime-local' => date('Y-m-d\TH:i'),
                        'time' => date('H:i'),
                        default => $value
                    };
                }
            @endphp

            @if ($field['type'] === 'text')
                <input type="text" name="{{ $name }}" id="{{ $field['name'] }}" 
                       value="{{ $value }}" class="form-control {{ $class }}" 
                       placeholder="{{ $field['placeholder'] ?? '' }}" {{ $required }}>
                       
            @elseif ($field['type'] === 'textarea')
                <textarea name="{{ $name }}" id="{{ $field['name'] }}" 
                          class="form-control summernote {{ $class }}" 
                          rows="{{ $field['rows'] ?? 5 }}" 
                          placeholder="{{ $field['placeholder'] ?? '' }}" 
                          {{ $required }}>{{ $value }}</textarea>
                          
            @elseif (in_array($field['type'], ['date', 'datetime-local', 'time']))
                <input type="{{ $field['type'] }}" 
                       name="{{ $field['name'] }}" 
                       id="{{ $field['name'] }}"
                       value="{{ $value }}"
                       class="form-control {{ $class }}"
                       {{ $required }}>
                       
            @elseif ($field['type'] === 'file')
                <div class="custom-file">
                    <input type="file" name="{{ $name }}" id="{{ $field['name'] }}" 
                           class="custom-file-input image-input {{ $class }}" 
                           data-preview="{{ $field['name'] }}-preview"
                           {{ $multiple }} {{ $required }}
                           accept="image/*">
                    <label class="custom-file-label" for="{{ $field['name'] }}">
                        Choose {{ $multiple ? 'files' : 'file' }}
                    </label>
                </div>
                <div id="{{ $field['name'] }}-preview" class="preview-container mt-2 d-flex flex-wrap gap-2"></div>
                @if($model && isset($model[$field['name']]))
                    <div class="existing-images mt-2 d-flex flex-wrap gap-2">
                        @if(is_array($model[$field['name']]))
                            @foreach($model[$field['name']] as $image)
                                <div class="existing-image-wrapper">
                                    <a href="{{ asset('storage/' . $image) }}" class="glightbox">
                                        <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail" alt="preview">
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm remove-image" 
                                            data-image="{{ 'storage/' . $image }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="existing-image-wrapper">
                                <a href="{{ asset($model[$field['name']]) }}" class="glightbox">
                                    <img src="{{ asset($model[$field['name']]) }}" class="img-thumbnail" alt="preview">
                                </a>
                                <button type="button" class="btn btn-danger btn-sm remove-image" 
                                        data-image="{{ $model[$field['name']] }}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                @endif
            @endif

            @error($field['name'])
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    @endforeach

    <div class="{{ $buttonAlignment }} mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> {{ $submitText ?? $defaultSubmitText }}
        </button>
        @if($showCancel)
            <a href="javascript:history.back()" class="btn btn-light ml-2">
                <i class="fas fa-times"></i> {{ $cancelText }}
            </a>
        @endif
    </div>

    {{ $footer ?? '' }}
</form>

@push('styles')
<style>
.preview-container, .existing-images {
    gap: 1rem;
}

.preview-container img, .existing-images img {
    max-width: 150px;
    height: auto;
    border-radius: 4px;
}

.existing-image-wrapper {
    position: relative;
    display: inline-block;
    margin: 0.5rem;
}

.existing-image-wrapper img {
    display: block;
    max-width: 150px;
    height: auto;
}

.existing-image-wrapper .remove-image {
    position: absolute;
    top: -10px;
    right: -10px;
    padding: 0.25rem 0.5rem;
    border-radius: 50%;
    font-size: 12px;
    line-height: 1;
    z-index: 1;
}

.custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    margin-bottom: 0;
}

.custom-file-input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: calc(2.25rem + 2px);
    margin: 0;
    opacity: 0;
}

.custom-file-label {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}

.custom-file-label::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: 1px solid #ced4da;
    border-radius: 0 0.25rem 0.25rem 0;
}

.form-group {
    margin-bottom: 1.5rem;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize lightbox for existing images
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
    
    // Custom file input label
    $('.custom-file-input').on('change', function() {
        let fileName = '';
        if (this.files && this.files.length > 1) {
            fileName = `${this.files.length} files selected`;
        } else {
            fileName = this.files[0]?.name || '';
        }
        $(this).next('.custom-file-label').html(fileName || 'Choose file(s)');
    });

    // Image preview with lightbox
    $('.image-input').on('change', function(event) {
        const $input = $(this);
        const $previewContainer = $('#' + $input.data('preview'));
        $previewContainer.empty();
        
        const files = event.target.files;
        $.each(files, function(index, file) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const $wrapper = $('<div>').addClass('existing-image-wrapper');
                    const $link = $('<a>')
                        .attr('href', e.target.result)
                        .addClass('glightbox')
                        .append(
                            $('<img>')
                                .attr('src', e.target.result)
                                .addClass('img-thumbnail')
                        );
                    const $removeBtn = $('<button>')
                        .addClass('btn btn-danger btn-sm remove-preview')
                        .html('<i class="fas fa-times"></i>');
                    
                    $wrapper.append($link, $removeBtn);
                    $previewContainer.append($wrapper);
                    
                    // Refresh lightbox
                    lightbox.reload();
                };
                reader.readAsDataURL(file);
            } else {
                toastr.error('Please select only image files');
            }
        });
    });

    // Remove preview image
    $(document).on('click', '.remove-preview', function() {
        const $wrapper = $(this).closest('.existing-image-wrapper');
        const $previewContainer = $wrapper.parent();
        const $fileInput = $('[data-preview="' + $previewContainer.attr('id') + '"]');
        
        $wrapper.remove();
        
        if ($previewContainer.children().length === 0) {
            $fileInput.val('');
            $fileInput.next('.custom-file-label').html('Choose file(s)');
        }
    });

    // Remove existing image with confirmation
    $('.remove-image').on('click', function() {
        const $btn = $(this);
        const image = $btn.data('image');
        const $wrapper = $btn.closest('.existing-image-wrapper');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "This image will be removed when you save the form",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Add hidden input to track removed images
                $('form').append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'removed_images[]')
                        .val(image)
                );
                
                $wrapper.remove();
                toastr.success('Image marked for deletion');
            }
        });
    });
});
</script>
@endpush