<a href="{{ route('admin.photoslider.edit', $photoslider->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

<a href="{{ route('admin.photoslider.destroy', $photoslider->id) }}" id="delete" class="btn btn-sm btn-danger delete-item"
    data-url="{{ route('admin.photoslider.destroy', $photoslider->id) }}">
    <i class="fas fa-trash"></i>
</a>
