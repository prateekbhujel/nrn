<a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

    <a href="{{ route('admin.about.destroy', $about->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.about.destroy', $about->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>
