<a href="{{ route('admin.languages.edit', $language->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

<a href="{{ route('admin.languages.destroy', $language->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.languages.destroy', $language->id) }}">
    <i class="fas fa-trash"></i>
</a>
