
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>About {{@$siteSetting->organization_name}}</h4>
                    <p>{{@$siteSetting->about_organisation}}</p>
                </div>
                <div class="col-md-4">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="about.html" class="text-white">About Us</a></li>
                        <li><a href="projects.html" class="text-white">Our Projects</a></li>
                        <li><a href="news.html" class="text-white">News & Events</a></li>
                        <li><a href="contact.html" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Contact Info</h4>
                    <p>
                    {{@$siteSetting->organization_address}}<br>
                        Phone:  {{@$siteSetting->organization_number}}<br>
                        Email: {{@$siteSetting->organization_email}}<br>

                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                     <p class="mb-0">&copy; {{ date('Y') }} {{ $siteSetting->organization_name ?? '' }}. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>