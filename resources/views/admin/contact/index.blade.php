@extends('admin.layouts.master')
@section('title', 'Contact Us')

@section('content')
<div class="section-header">
    <div class="section-header-back">
    </div>
    <h1>Contact Us</h1>
</div>
<div class="container">
  <div class="card">
    <div class="card-body">
      {{ $dataTable->table() }}
    </div>
  </div>
</div>
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

  <script>
    $(document).on('click', '.view-item', function(e) {
        e.preventDefault();
        var contactId = $(this).data('id');
        $.ajax({
            url: '{{ route("admin.contact.view") }}',
            type: 'POST',
            data: {
                id: contactId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if ($('#contactModal').length === 0) {
                    $('body').append(response.html);
                } else {
                    $('#contactModal').replaceWith(response.html);
                }
                $('#contactModal').modal('show');
            },
            error: function(xhr) {
                alert('Failed to load contact details. Please try again.');
            }
        });
    });
    </script>
    
    
@endpush
