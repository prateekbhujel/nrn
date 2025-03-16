<a href="javascript:void(0);" 
   class="btn btn-sm btn-info view-item" 
   data-id="{{ $contact->id }}">
    <i class="fas fa-eye"></i>
</a>

<a href="{{ route('admin.contact.destroy', $contact->id) }}" id="delete" class="btn btn-sm btn-danger delete-item" data-url="{{ route('admin.contact.destroy', $contact->id) }}">
    <i class="fas fa-trash"></i>
</a>
