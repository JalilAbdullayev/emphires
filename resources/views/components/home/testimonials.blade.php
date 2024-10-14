<section>
    <div class="bg-center bg-no-repeat bg-primary section"
        style="background-image: url('{{ asset('front/images/bg-map-01.png') }}')">
        <div class="container items-center justify-between grid-cols-1 gap-12 col-xl-3">
            <div>
                <h4 class="uppercase text-white text-sm font-bold tracking-[3px] mb-2.5">
                    {{ $home->testimonials_subtitle }}
                </h4>
                <h2 class="text-white text-[40px] leading-[48px] mb-14">
                    {{ $home->testimonials_title }}
                </h2>
                <p class="text-lg font-semibold text-white -mt-11">
                    {{ $home->testimonials_text }}
                </p>
                <a href="{{ route('contact_' . session('locale')) }}"
                    class="text-xs font-extrabold tracking-wider uppercase link hover:text-white px-7">
                    <span class="mr-5 [&>*]:mb-0 [&>*]:inline">
                        {{ $home->testimonials_link_text }}
                    </span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="glide testimonial-glide xl:col-span-2">
                <div class="overflow-hidden glide__track" data-glide-el="track">
                    <div class="flex glide__slides">
                        @foreach ($testimonials as $testimonial)
                            <div class="relative pt-10 glide__slide pl-14 mr-7">
                                <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" alt=""
                                    class="absolute top-0 left-0 border-4 border-white rounded-md shadow-[0_0_30px_rgba(140,152,164,0.5)] h-24" />
                                <div class="pt-10 pb-12 pl-20 bg-white rounded-md pr-7">
                                    <blockquote class="pb-1">
                                        <div class="text-[22px] leading-7 mb-4 text-dark">
                                            {!! $testimonial->text !!}
                                        </div>
                                    </blockquote>
                                    <div>
                                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="inline text-lg font-bold text-green-800">
                                                    {{ $testimonial->name }}
                                                </h3> - <span>
                                                    {{ $testimonial->position }}
                                                </span>
                                            </div>
                                            <i class="text-6xl text-green-800 fa-solid fa-quote-right"></i>
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
