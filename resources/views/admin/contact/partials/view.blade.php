<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="contactModalLabel">Contact Details & Reply</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5">
                    <p><strong>Full Name:</strong><br>{{ $contact->full_name }}</p>
                    <p><strong>Email Address:</strong><br>{{ $contact->email_address }}</p>
                    <p><strong>Subject:</strong><br>{{ $contact->subject }}</p>
                    <p><strong>Message:</strong><br>{{ $contact->message }}</p>
                    <p><strong>Created At:</strong><br>{{ \Carbon\Carbon::parse($contact->created_at)->format('M j, Y') }}</p>

                    @if($contact->replied_at)
                        <div class="alert alert-success">
                            Replied on {{ $contact->replied_at->format('M j, Y g:i A') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-7">
                    <form action="{{ route('admin.contact.reply', $contact) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="reply_subject">Reply Subject</label>
                            <input type="text" name="reply_subject" id="reply_subject" class="form-control" value="{{ old('reply_subject', $contact->reply_subject ?: 'Re: ' . $contact->subject) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="reply_message">Reply Message</label>
                            <textarea name="reply_message" id="reply_message" class="form-control" rows="8" required>{{ old('reply_message', $contact->reply_message) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Send Reply
                        </button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
