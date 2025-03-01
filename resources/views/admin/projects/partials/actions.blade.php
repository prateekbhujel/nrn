<a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-edit"></i>
</a>

    <a href="{{ route('admin.projects.destroy', $project->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.projects.destroy', $project->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>
