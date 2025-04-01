@extends('layouts.frontend.main')

@section('main-content')
<div class="hero-placeholder" style="height: 300px;">
    <div class="container">
        <h1 class="display-4">Contact Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Contact Information Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Send Us a Message</h2>
                        <!-- Message placeholder -->
                        <div id="responseMessage"></div>
                        <form id="contactForm" action="{{ route('contact.save') }}" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name="full_name" class="form-control" id="name" required>
                                    <div class="invalid-feedback">
                                        Please provide your name.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email_address" class="form-control" id="email" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject" required>
                                <div class="invalid-feedback">
                                    Please provide a subject.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide your message.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Office Location</h3>
                        <p>
                            123 Main Street<br>
                            Kathmandu, Nepal
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Contact Details</h3>
                        <p>
                            <strong>Phone:</strong><br>
                            +977-1-234567<br>
                            +977-1-234568
                        </p>
                        <p>
                            <strong>Email:</strong><br>
                            info@nrb.org.np<br>
                            support@nrb.org.np
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- jQuery (Ensure it's included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $("#contactForm").submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        // Frontend validation using HTML5 checkValidity
        var form = this;
        if (!form.checkValidity()) {
            $(form).addClass('was-validated');
            return false;
        }

        var formData = new FormData(form);

        $.ajax({
            url: $(form).attr('action'),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $("button[type=submit]").prop("disabled", true).text("Sending...");
            },
            success: function (response) {
                if (response.type === "success") {
                    $("#responseMessage").html(
                        '<div class="alert alert-success">' + response.message + "</div>"
                    );
                    $(form)[0].reset(); // Reset the form
                    $(form).removeClass('was-validated');
                } else {
                    $("#responseMessage").html(
                        '<div class="alert alert-danger">' + response.message + "</div>"
                    );
                }
            },
            error: function (xhr) {
                // Display validation errors if any
                var errors = xhr.responseJSON.errors;
                var errorMessage = '<div class="alert alert-danger"><ul>';
                $.each(errors, function (key, value) {
                    errorMessage += "<li>" + value[0] + "</li>";
                });
                errorMessage += "</ul></div>";
                $("#responseMessage").html(errorMessage);
            },
            complete: function () {
                $("button[type=submit]").prop("disabled", false).text("Send Message");
            }
        });
    });
});
</script>
@endsection
