<section class="contact-cards">
    <div>
        <div class="contact-card-icon">
            <i class="fa-regular fa-envelope"></i>
        </div>
        <div>
            <h2>
                @lang('Email')
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
                @lang('Address')
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
                @lang('Work hours')
            </h2>
            <p>
                {{ $contact->work_hours }}
            </p>
        </div>
    </div>
</section>
