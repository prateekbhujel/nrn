<a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

<a href="{{ route('admin.news.destroy', $news->id) }}" id="delete" class="btn btn-sm btn-danger delete-item"
    data-url="{{ route('admin.news.destroy', $news->id) }}">
    <i class="fas fa-trash"></i>
</a>
