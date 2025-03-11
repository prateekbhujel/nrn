<a href="{{ route('admin.achievements.edit', $achivement->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
    
</a>

    <a href="{{ route('admin.achievements.destroy', $achivement->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.achievements.destroy', $achivement->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>
