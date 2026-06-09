@php
    $siteName = $siteSetting->organization_name ?? config('app.name', 'NRN Association');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer__grid">
            <div>
                <p class="footer__eyebrow">Association</p>
                <h2>{{ $siteName }}</h2>
                <p>{{ $siteSetting->about_organisation ?? 'Community information, public updates, projects, events, and contact details for the association.' }}</p>
            </div>

            <div>
                <p class="footer__eyebrow">Quick Links</p>
                <ul class="footer__links">
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('board') }}">Board Members</a></li>
                    <li><a href="{{ route('project') }}">Our Projects</a></li>
                    <li><a href="{{ route('news-events') }}">News & Events</a></li>
                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                </ul>
            </div>

            <div>
                <p class="footer__eyebrow">Contact</p>
                <address>
                    @if(!empty($siteSetting->organization_address))
                        {{ $siteSetting->organization_address }}<br>
                    @endif
                    @if(!empty($siteSetting->organization_number))
                        <a href="tel:{{ $siteSetting->organization_number }}">{{ $siteSetting->organization_number }}</a><br>
                    @endif
                    @if(!empty($siteSetting->organization_email))
                        <a href="mailto:{{ $siteSetting->organization_email }}">{{ $siteSetting->organization_email }}</a>
                    @endif
                </address>
                <a class="footer__button" href="{{ route('contact') }}">Send a message</a>
            </div>
        </div>

        <div class="footer__bottom">
            <p>&copy; {{ date('Y') }} {{ $siteName }}. All rights reserved.</p>
        </div>
    </div>
</footer>
