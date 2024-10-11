<section class="contact-cards">
    <div>
        <div class="contact-card-icon">
            <i class="fa-regular fa-envelope"></i>
        </div>
        <div>
            <h2>
                {{ $home->email_title }}
            </h2>
            <a href="mailto:{{ $contact->email }}">
                {{ $contact->email }}
            </a>
        </div>
    </div>
    <div>
        <div class="contact-card-icon">
            <i class="fa-solid fa-location-dot"></i>
        </div>
        <div>
            <h2>
                {{ $home->address_title }}
            </h2>
            {{ $contact->address }}
        </div>
    </div>
    <div>
        <div class="contact-card-icon">
            <i class="fa-regular fa-calendar-days"></i>
        </div>
        <div>
            <h2>
                Hours
            </h2>
            <p>
                {!! $contact->work_hours !!}
            </p>
        </div>
    </div>
</section>
