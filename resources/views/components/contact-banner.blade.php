<section class="py-12 bg-primary bg-no-repeat bg-[70%]"
    style="background-image: url('{{ asset('front/images/footer-bg.png') }}')">
    <div class="px-7 col-4 items-center">
        <div class="bg-white size-16 rounded-full text-center">
            <i class="fa-regular fa-calendar-days text-dark text-[32px] leading-[70px] font-medium"></i>
        </div>
        <div class="text-2xl font-bold text-white col-span-2 [&>*]:text-white">
            {!! $contact->banner_text !!}
        </div>
        <a href="{{ route('contact_' . session('locale')) }}"
            class="uppercase text-white py-4 px-11 border-2 border-white rounded-md hover:bg-white hover:text-[#0C121D] font-extrabold font-nunito-sans tracking-wider md:w-fit [&>*]:mb-0 [&>*]:inline]">
            {!! $contact->banner_button !!}
        </a>
    </div>
</section>
