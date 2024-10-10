<section class="container col-md-2 mb-[60px] shadow-[0_9px_35px_0_rgba(26,47,106,0.07)]">
    <div class="pt-[50px] pr-10 pb-10 pl-[50px]">
        <div class="mb-[30px]">
            <h4 class="text-sm leading-5 font-bold tracking-[3px] text-[#B0B6BF] mb-2.5 uppercase">
                MESSAGE US
            </h4>
            <h2 class="text-[44px] leading-[48px] mb-[15px]">
                Have been any Question? feel free to contact with us.
            </h2>
        </div>
        <p class="mb-6">
            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web
            designs.
        </p>
        <ul class="contact-social">
            @foreach ($socials as $social)
                <li>
                    <a href="{{ $social->url }}" target="_blank">
                        {!! $social->icon !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="pt-[50px] pr-[50px] pb-[30px] pl-[15px]">
        <form action="{{ route('message') }}" method="POST" class="contact-form">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Your Name" required />
                <input type="email" name="email" placeholder="Email Address" />
            </div>
            <div>
                <input type="tel" name="phone" placeholder="Phone number" required />
                <input type="text" name="subject" placeholder="Subject" />
            </div>
            <textarea name="message" rows="5" placeholder="Write Message" required></textarea>
            <button type="submit" class="uppercase">
                @lang('Send')
            </button>
        </form>
    </div>
</section>
