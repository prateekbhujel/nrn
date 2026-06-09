@extends('layouts.frontend.main')

@section('title', 'Contact Us')

@section('main-content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Contact</p>
            <h1 class="page-title">Contact Us</h1>
            <p>Send a message to the association or use the published office contact details.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="contact-layout">
            <div class="form-card">
                <p class="section-kicker">Message</p>
                <h2 class="section-title mb-4">Send Us a Message</h2>
                <div id="responseMessage" aria-live="polite"></div>

                <form id="contactForm" action="{{ route('contact.save') }}" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" id="name" required>
                            <div class="invalid-feedback">Please provide your name.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email_address" class="form-control" id="email" required>
                            <div class="invalid-feedback">Please provide a valid email.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" required>
                        <div class="invalid-feedback">Please provide a subject.</div>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="6" required></textarea>
                        <div class="invalid-feedback">Please provide your message.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

            <aside class="contact-card">
                <p class="section-kicker">Office</p>
                <h2 class="section-title mb-4">Contact Details</h2>

                @if(!empty($siteSetting->organization_address))
                    <p>
                        <strong>Office Location</strong><br>
                        {{ $siteSetting->organization_address }}
                    </p>
                @endif

                @if(!empty($siteSetting->organization_number))
                    <p>
                        <strong>Phone</strong><br>
                        <a href="tel:{{ $siteSetting->organization_number }}">{{ $siteSetting->organization_number }}</a>
                    </p>
                @endif

                @if(!empty($siteSetting->organization_email))
                    <p>
                        <strong>Email</strong><br>
                        <a href="mailto:{{ $siteSetting->organization_email }}">{{ $siteSetting->organization_email }}</a>
                    </p>
                @endif
            </aside>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $("#contactForm").submit(function (e) {
        e.preventDefault();

        var form = this;
        var submitButton = $(form).find("button[type=submit]");

        if (!form.checkValidity()) {
            $(form).addClass('was-validated');
            return false;
        }

        $.ajax({
            url: $(form).attr('action'),
            type: "POST",
            data: new FormData(form),
            processData: false,
            contentType: false,
            beforeSend: function () {
                submitButton.prop("disabled", true).text("Sending...");
            },
            success: function (response) {
                var alertType = response.type === "success" ? "success" : "danger";
                $("#responseMessage").html('<div class="alert alert-' + alertType + '">' + response.message + '</div>');

                if (response.type === "success") {
                    form.reset();
                    $(form).removeClass('was-validated');
                }
            },
            error: function (xhr) {
                var errors = xhr.responseJSON && xhr.responseJSON.errors ? xhr.responseJSON.errors : null;
                var errorMessage = '<div class="alert alert-danger">';

                if (errors) {
                    errorMessage += '<ul class="mb-0">';
                    $.each(errors, function (key, value) {
                        errorMessage += '<li>' + value[0] + '</li>';
                    });
                    errorMessage += '</ul>';
                } else {
                    errorMessage += 'Message could not be sent. Please try again.';
                }

                errorMessage += '</div>';
                $("#responseMessage").html(errorMessage);
            },
            complete: function () {
                submitButton.prop("disabled", false).text("Send Message");
            }
        });
    });
});
</script>
@endpush
