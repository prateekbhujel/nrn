<a href="{{ route('admin.board-members.edit', $board->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

    <a href="{{ route('admin.board-members.destroy', $board->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.board-members.destroy', $board->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>

