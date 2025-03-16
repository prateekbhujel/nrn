<a href="javascript:void(0)" 
   class="btn btn-sm btn-primary view" 
   data-id="{{ $contact->id }}">
    <i class="fas fa-edit"></i>
</a>



    <a href="{{ route('admin.contact.destroy', $contact->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.contact.destroy', $contact->id) }}">
        <i class="fas fa-trash"></i>
    </a>
</form>

