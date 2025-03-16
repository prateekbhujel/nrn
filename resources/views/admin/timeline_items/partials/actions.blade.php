<a href="{{ route('admin.timeline-items.edit', $timeline->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

    <a href="{{ route('admin.timeline-items.destroy', $timeline->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.timeline-items.destroy', $timeline->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>
