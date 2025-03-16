@extends('admin.layouts.master')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('title', 'Contact Us')

@section('content')
<div class="modal fade" id="modal"  data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- Content goes here --}}
            </div>
        </div>
    </div>
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

<script>
          $(document).ready(function() {


$(document).off('click', '.view');
$(document).on('click', '.view', function() {
                var id = $(this).data('id');
                var url = "{{ route('admin.contact.view') }}";
                var data = {
                    id: id
                };
                $.post(url, data, function(response) {
                    $('#modal .modal-content').html(response);
                    $('#modal').modal('show');
                });
            });
          })
</script>


@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
