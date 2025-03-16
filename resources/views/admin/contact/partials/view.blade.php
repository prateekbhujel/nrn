<!-- resources/views/admin/contact/partials/view.blade.php -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="contactModalLabel">Contact Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p><strong>Full Name:</strong> {{ $contact->full_name }}</p>
            <p><strong>Email Address:</strong> {{ $contact->email_address }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
            <p><strong>Message:</strong> {{ $contact->message }}</p>
            <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($contact->created_at)->format('M j, Y') }}</p>
        </div>
      </div>
    </div>
  </div>
  