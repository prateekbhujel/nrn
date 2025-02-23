<a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i> Edit
</a>

    <a href="{{ route('admin.events.destroy', $event->id) }}" class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.events.destroy', $event->id) }}">
        <i class="fas fa-trash"></i> Delete
    </a>
</form>
