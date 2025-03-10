@props([
    'action',
    'method' => 'POST',
    'fields' => [],
    'model' => null,
    'footer' => null,
    'submitText' => null,
    'cancelText' => 'Cancel',
    'showCancel' => true,
    'buttonPosition' => 'right',
    'maxFileSize' => 5120, // in KB (5MB)
    'allowedFileTypes' => ['image/jpeg', 'image/png', 'image/gif'],
    'maxFiles' => 10,
    'showFilePreview' => true,
])

@php
    // Check if any field is a file input.
    $hasFile = collect($fields)->contains(fn($field) => $field['type'] === 'file');
    $defaultSubmitText = strtoupper($method) === 'POST' ? 'Create' : 'Update';
    $buttonAlignment = match ($buttonPosition) {
        'left' => 'text-start',
        'center' => 'text-center',
        default => 'text-end',
    };
@endphp

<form action="{{ $action }}" method="POST" {{ $hasFile ? 'enctype=multipart/form-data' : '' }}
    class="enhanced-form">
    @csrf
    @if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    @foreach ($fields as $field)
        <div class="form-group">
            <label class="form-label" for="{{ $field['name'] }}">
                {{ $field['label'] ?? ucwords(str_replace('_', ' ', $field['name'])) }}
                @if (!empty($field['required']))
                    <span class="text-danger">*</span>
                @endif
            </label>

            @php
                // Retrieve value from old input, model or default.
                $value = old($field['name'], $model[$field['name']] ?? ($field['default'] ?? ''));
                $required = !empty($field['required']) ? 'required' : '';
                $class = $field['class'] ?? '';
                $multiple = isset($field['multiple']) && $field['multiple'] ? 'multiple' : '';
                // Append [] if multiple
                $name = $multiple ? $field['name'] . '[]' : $field['name'];

                // Set date/time default values if not provided
                if (in_array($field['type'], ['date', 'datetime-local', 'time'])) {
                    $value =
                        $value ?:
                        match ($field['type']) {
                            'date' => date('Y-m-d'),
                            'datetime-local' => date('Y-m-d\TH:i'),
                            'time' => date('H:i'),
                            default => $value,
                        };
                }
            @endphp

            @if ($field['type'] === 'text')
                <input type="text" name="{{ $name }}" id="{{ $field['name'] }}" value="{{ $value }}"
                    class="form-control {{ $class }}" placeholder="{{ $field['placeholder'] ?? '' }}"
                    {{ $required }}>
            @elseif ($field['type'] === 'textarea')
                <textarea name="{{ $name }}" id="{{ $field['name'] }}" class="form-control {{ $class }}"
                    rows="{{ $field['rows'] ?? 5 }}" placeholder="{{ $field['placeholder'] ?? '' }}" {{ $required }}>{{ $value }}</textarea>
            @elseif (in_array($field['type'], ['date', 'datetime-local', 'time']))
                <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                    value="{{ $value }}" class="form-control {{ $class }}" {{ $required }}>
            @elseif ($field['type'] === 'select')
                <select name="{{ $name }}" id="{{ $field['name'] }}" class="form-control {{ $class }}" {{ $required }} {{ $multiple }}>
                     @foreach ($field['options'] as $optionValue => $optionLabel)
                        <option value="{{ $optionValue }}" {{ $value == $optionValue ? 'selected' : '' }}>
                            {{ $optionLabel }}
                        </option>
                    @endforeach
                </select>
            @elseif ($field['type'] === 'file')
                @php
                    // Generate a unique ID for each file field instance.
                    $uniqueId = $field['name'] . '-' . uniqid();
                @endphp


                <div class="file-upload-wrapper" data-max-files="{{ $maxFiles }}"
                    data-max-size="{{ $maxFileSize }}" id="{{ $uniqueId }}"
                    @if ($model) data-model-id="{{ $model->id }}"
                        data-model-class="{{ get_class($model) }}"
                        data-field-name="{{ $field['name'] }}" @endif>
                    <div class="custom-file">
                        <input type="file" name="{{ $name }}" id="{{ $uniqueId }}-input"
                            class="custom-file-input smart-file-input {{ $class }}"
                            data-preview="{{ $uniqueId }}-preview" {{ $multiple }} {{ $required }}
                            accept="{{ implode(',', $field['accept'] ?? $allowedFileTypes) }}">
                        <label class="custom-file-label" for="{{ $uniqueId }}-input">
                            Choose {{ $multiple ? 'files' : 'file' }}
                        </label>
                    </div>

                    @if ($showFilePreview)
                        <div class="file-preview-zone mt-3">
                            <div id="{{ $uniqueId }}-preview" class="preview-container d-flex flex-wrap gap-2">
                            </div>

                            {{-- Show existing files when editing --}}
                            @if ($model && isset($model[$field['name']]))
                                <div class="existing-files mt-2 d-flex flex-wrap gap-2">
                                    @if (is_array($model[$field['name']]))
                                        @foreach ($model[$field['name']] as $file)
                                            <div class="file-wrapper" data-file="{{ $file }}">
                                                <div class="file-preview">
                                                    @if (Str::contains($file, ['jpg', 'jpeg', 'png', 'gif']))
                                                        <a href="{{ asset('storage/' . $file) }}" class="glightbox">
                                                            <img src="{{ asset('storage/' . $file) }}" alt="preview">
                                                        </a>
                                                    @else
                                                        <i class="fas fa-file fa-2x"></i>
                                                    @endif
                                                    <button type="button" class="remove-file" title="Remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="file-name">{{ basename($file) }}</div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="file-wrapper" data-file="{{ $model[$field['name']] }}">
                                            <div class="file-preview">
                                                @if (Str::contains($model[$field['name']], ['jpg', 'jpeg', 'png', 'gif']))
                                                    <a href="{{ asset('storage/' . $model[$field['name']]) }}"
                                                        class="glightbox">
                                                        <img src="{{ asset('storage/' . $model[$field['name']]) }}"
                                                            alt="preview">
                                                    </a>
                                                @else
                                                    <i class="fas fa-file fa-2x"></i>
                                                @endif
                                                <button type="button" class="remove-file" title="Remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            <div class="file-name">{{ basename($model[$field['name']]) }}</div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @endif

            @error($field['name'])
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror

            @if (!empty($field['help']))
                <small class="form-text text-muted">{{ $field['help'] }}</small>
            @endif
        </div>
    @endforeach

    <div class="{{ $buttonAlignment }} mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> {{ $submitText ?? $defaultSubmitText }}
        </button>
        @if ($showCancel)
            {{-- <button type="button" class="btn btn-light ml-2" onclick="window.history.back();">
                <i class="fas fa-times"></i> {{ $cancelText }}
            </button>         --}}
        @endif
    </div>

    {{ $footer ?? '' }}
</form>

@push('styles')
    <style>
        /* Enhanced form component styles */
        .file-upload-wrapper {
            position: relative;
        }

        .preview-container,
        .existing-files {
            gap: 1rem;
        }

        .file-wrapper {
            position: relative;
            width: 150px;
            margin: 0.5rem;
            text-align: center;
        }

        .file-preview {
            position: relative;
            width: 150px;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
        }

        .file-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .file-preview .remove-file {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #dc3545;
            color: #dc3545;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 0;
            font-size: 12px;
        }

        .file-preview .remove-file:hover {
            background: #dc3545;
            color: white;
        }

        .file-name {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #6c757d;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        /* File upload progress */
        .upload-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #e9ecef;
            border-radius: 0 0 4px 4px;
            overflow: hidden;
        }

        .upload-progress-bar {
            height: 100%;
            background: #007bff;
            transition: width 0.2s ease;
        }

        /* Drag and drop zone */
        .drag-drop-zone {
            border: 2px dashed #dee2e6;
            border-radius: 4px;
            background: #f8f9fa;
            padding: 2rem;
            text-align: center;
            transition: all 0.2s ease;
        }

        .drag-drop-zone.dragover {
            border-color: #007bff;
            background: #e3f2fd;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize GLightbox for any image previews
            const lightbox = GLightbox({
                selector: '.glightbox'
            });

            // Initialize file input handling for each smart file input
            $('.smart-file-input').each(function() {
                const $input = $(this);
                const $wrapper = $input.closest('.file-upload-wrapper');
                const previewId = $input.data('preview');
                const $previewContainer = $('#' + previewId);
                const maxFiles = parseInt($wrapper.data('max-files'));
                const maxSize = parseInt($wrapper.data('max-size'));
                const isMultiple = $input.prop('multiple');

                // Create a FileList tracker using DataTransfer
                let currentFiles = new DataTransfer();

                // Add any pre-selected files (if applicable)
                if ($input[0].files.length > 0) {
                    Array.from($input[0].files).forEach(file => {
                        currentFiles.items.add(file);
                    });
                }

                $input.on('change', function() {
                    // For single file inputs, reset the current files and preview container.
                    if (!isMultiple) {
                        currentFiles = new DataTransfer();
                        $previewContainer.empty();
                    }

                    const newFiles = Array.from(this.files);
                    let validFiles = [];
                    // For multiple files, calculate available slots; for single, allow only one file.
                    const availableSlots = isMultiple ? (maxFiles - currentFiles.files.length) : 1;

                    newFiles.forEach(file => {
                        if (validFiles.length >= availableSlots) {
                            toastr.warning(`Maximum ${maxFiles} files allowed`);
                            return;
                        }
                        if (file.size > maxSize * 1024) {
                            toastr.error(
                                `${file.name} exceeds maximum size of ${maxSize}KB`);
                            return;
                        }
                        validFiles.push(file);
                    });

                    validFiles.forEach(file => {
                        currentFiles.items.add(file);
                        previewFile(file, $previewContainer);
                    });

                    // Update the actual file input's FileList.
                    $input[0].files = currentFiles.files;
                    updateFileLabel($input, currentFiles.files);
                    updateRequiredState($input, currentFiles.files.length);
                });


                // Handle removal of files (both new and existing)
                $(document).on('click', '.remove-file', function() {
                    const $fileWrapper = $(this).closest('.file-wrapper');
                    const fileName = $fileWrapper.find('.file-name').text();
                    const isExisting = $fileWrapper.data('file');

                    if (isExisting) {
                        // For existing files, use AJAX deletion via our generic route.
                        const $uploadWrapper = $fileWrapper.closest('.file-upload-wrapper');
                        const modelId = $uploadWrapper.data('model-id');
                        const modelClass = $uploadWrapper.data('model-class');
                        const fieldName = $uploadWrapper.data('field-name') || 'banner';
                        const filePath = $fileWrapper.data('file');

                        $.ajax({
                            url: '{{ route('ajax.file-delete') }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                model_id: modelId,
                                model_class: modelClass,
                                field: fieldName,
                                file: filePath
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    $fileWrapper.fadeOut(300, function() {
                                        $(this).remove();
                                    });
                                } else {
                                    toastr.error(response.message);
                                }
                            },
                            error: function() {
                                toastr.error('Failed to delete image.');
                            }
                        });
                    } else {
                        // For new files, simply remove from the file input tracker.
                        let newFiles = new DataTransfer();
                        Array.from(currentFiles.files)
                            .filter(file => file.name !== fileName)
                            .forEach(file => newFiles.items.add(file));
                        currentFiles = newFiles;
                        $input[0].files = currentFiles.files;
                        $fileWrapper.fadeOut(300, function() {
                            $(this).remove();
                            updateFileLabel($input, currentFiles.files);
                            updateRequiredState($input, currentFiles.files.length);
                        });
                    }
                });

                // Update file input label based on file count
                function updateFileLabel($input, files) {
                    const $label = $input.next('.custom-file-label');
                    if (files.length === 0) {
                        $label.html('Choose file(s)');
                    } else if (files.length === 1) {
                        $label.html(files[0].name);
                    } else {
                        $label.html(`${files.length} files selected`);
                    }
                }

                // Adjust required attribute based on file count
                function updateRequiredState($input, fileCount) {
                    if ($input.prop('required')) {
                        if (fileCount > 0) {
                            $input.removeAttr('required');
                        } else {
                            $input.prop('required', true);
                        }
                    }
                }

                // Preview a file in the preview container
                function previewFile(file, $container) {
                    const reader = new FileReader();
                    const $wrapper = $('<div>').addClass('file-wrapper').hide();
                    const $preview = $('<div>').addClass('file-preview');
                    const $name = $('<div>').addClass('file-name').text(file.name);
                    const $removeBtn = $('<button>')
                        .attr('type', 'button')
                        .addClass('remove-file')
                        .attr('title', 'Remove')
                        .html('<i class="fas fa-times"></i>');

                    reader.onload = function(e) {
                        if (file.type.startsWith('image/')) {
                            const $link = $('<a>')
                                .attr('href', e.target.result)
                                .addClass('glightbox')
                                .append($('<img>').attr('src', e.target.result));
                            $preview.append($link);
                        } else {
                            $preview.append($('<i>').addClass('fas fa-file fa-2x'));
                        }
                        $preview.append($removeBtn);
                        $wrapper.append($preview, $name);
                        $container.append($wrapper);
                        $wrapper.fadeIn(300);
                        lightbox.reload();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
