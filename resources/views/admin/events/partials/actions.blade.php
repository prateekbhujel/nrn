<a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

    <a href="{{ route('admin.events.destroy', $event->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.events.destroy', $event->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>
