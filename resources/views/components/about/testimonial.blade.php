<section class="container grid lg:grid-cols-2 grid-cols-1 gap-4 section">
    <div class="about-img">
        <img src="{{ asset('storage/about/' . $about->testimonials_img) }}" alt="" />
        @if ($about->testimonials_img_card_status)
            <div
                class="bg-white absolute py-[15px] pr-10 pl-5 rounded-md shadow-[9px_0_30px_0_rgba(26,47,106,0.09)] top-[50px] -right-10 z-[9] inline-table text-center">
                <div class="flex justify-center items-center gap-[15px]">
                    <div class="relative">
                        <svg class="w-[110px] img-fluid -rotate-90 rounded-full" viewBox="0 0 36 36"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18" cy="18" r="16" fill="none"
                                class="stroke-current text-[#B5E6F9]" stroke-width="2"></circle>
                            <circle cx="18" cy="18" r="16" fill="none"
                                class="stroke-current text-green-800" stroke-width="2" stroke-dasharray="100"
                                stroke-dashoffset="{{ 100 - $about->testimonials_number }}" stroke-linecap="round">
                            </circle>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h4 class="text-3xl leading-8 font-black">
                            {{ $about->testimonials_number }}<sup class="text-lg relative -top-2 -left-1">
                                %
                            </sup>
                        </h4>
                        <h5 class="text-[15px] leading-5 font-semibold">
                            {{ $about->testimonials_img_title }}
                        </h5>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div>
        <div class="mb-[30px] pl-5">
            <h4 class="subtitle">
                {{ $about->testimonials_subtitle }}
            </h4>
            <h2 class="text-6xxl">
                {{ $about->testimonials_title }}
            </h2>
        </div>
        <div class="glide about-testimonial">
            <div class="glide__track overflow-hidden" data-glide-el="track">
                <div class="flex glide__slides">
                    @foreach ($testimonials as $testimonial)
                        <div class="glide__slide">
                            <div class="pl-5 pb-2.5">
                                <blockquote class="text-2xl leading-[36px] p-0 mt-[15px] border-0 font-light text-dark">
                                    <div class="m-0">
                                        {!! $testimonial->text !!}
                                    </div>
                                </blockquote>
                            </div>
                            <div class="flex pl-5 pb-5">
                                <div class="pr-5">
                                    <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" alt=""
                                        class="rounded-md h-[75px] border-[5px] border-white shadow-[0_0_40px_0_rgba(26,47,106,0.08)] w-full max-w-full align-middle" />
                                </div>
                                <div>
                                    <h3 class="text-lg leading-6 mt-[15px] text-primary">
                                        {{ $testimonial->name }}
                                    </h3>
                                    <div>
                                        {{ $testimonial->position }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
