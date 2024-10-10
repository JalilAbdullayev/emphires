<section class="section container">
    <div class="text-center mb-14">
        <h4 class="subtitle">
            {!! $home->who_us_subtitle !!}
        </h4>
        <h2 class="text-6xxl">
            {!! $home->who_us_title !!}
        </h2>
    </div>
    <div class="col-xl-2">
        <div class="relative">
            <img src="{{ asset('storage/home/' . $home->who_us_img) }}" alt=""
                class="shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] rounded-lg mx-auto w-5/6 max-xl:mb-16" />
            <div
                class="bg-white flex justify-center items-center gap-4 py-4 pr-10 pl-5 rounded-md shadow-[9px_0_30px_0_rgba(26,47,106,0.09)] w-fit absolute top-12 xl:right-2.5 -right-2">
                <div class="relative size-28">
                    <svg class="size-full -rotate-90" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="16" fill="none"
                            class="stroke-current text-[#B5E6F9]" stroke-width="2"></circle>
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-green-800"
                            stroke-width="2" stroke-dasharray="100"
                            stroke-dashoffset="{{ 100 - $home->who_us_percent }}" stroke-linecap="round">
                        </circle>
                    </svg>
                </div>
                <div>
                    <h4 class="text-3xl leading-8 font-black">
                        {{ $home->who_us_percent }}<sup class="text-lg relative -top-2 -left-1">
                            %
                        </sup>
                    </h4>
                    <h5 class="text-base leading-5 font-semibold">
                        {!! $home->who_us_percent_title !!}
                    </h5>
                </div>
            </div>
        </div>
        <div>
            <p class="text-lg font-semibold leading-7 max-xl:mb-12">
                {!! $home->who_us_text !!}
            </p>
            @foreach ($advantages as $advantage)
                <div class="xl:mt-12 xl:mb-7 col-xl-5 grid-cols-8">
                    <i class="fa-regular fa-handshake text-green-800 text-[68px] leading-[68px]"></i>
                    <div class="xl:col-span-4 col-span-7">
                        <h2 class="text-lg leading-5">
                            {!! $advantage->title !!}
                        </h2>
                        <p class="mt-1.5 mb-4">
                            {!! $advantage->description !!}
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="mt-2.5">
                {!! $home->who_us_foot !!} <a href="" class="link hover:text-green-800]">
                    {!! $home->who_us_foot_link_text !!}
                </a>
            </div>
        </div>
    </div>
</section>
