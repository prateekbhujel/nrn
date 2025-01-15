<div class="d-flex">
    <a href="{{ route('admin.posts.edit', $row->id) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-edit"></i></a>
    <a href="#" 
      class="btn btn-danger delete-button" 
      data-link="{{ route('admin.posts.destroy', $row->id) }}">
      <i class="fas fa-trash"></i>
    </a>
</div>
