<a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

    <a href="{{ route('admin.gallery.destroy', $gallery->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.gallery.destroy', $gallery->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>
