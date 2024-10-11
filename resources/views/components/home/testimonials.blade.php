<section>
    <div class="bg-primary section bg-center bg-no-repeat"
        style="background-image: url('{{ asset('front/images/bg-map-01.png') }}')">
        <div class="container col-xl-3 grid-cols-1 justify-between items-center gap-12">
            <div>
                <h4 class="uppercase text-white text-sm font-bold tracking-[3px] mb-2.5">
                    {{ $home->testimonials_subtitle }}
                </h4>
                <div class="text-white [&>*]:text-white text-[40px] leading-[48px] mb-14">
                    {{ $home->testimonials_title }}
                </div>
                <div class="text-white text-lg font-semibold -mt-11">
                    {!! $home->testimonials_text !!}
                </div>
                <a href="" class="uppercase link hover:text-white px-7 font-extrabold text-xs tracking-wider">
                    <span class="mr-5 [&>*]:mb-0 [&>*]:inline">
                        {{ $home->testimonials_link_text }}
                    </span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="glide testimonial-glide xl:col-span-2">
                <div class="glide__track overflow-hidden" data-glide-el="track">
                    <div class="glide__slides flex">
                        @foreach ($testimonials as $testimonial)
                            <div class="glide__slide relative pt-10 pl-14 mr-7">
                                <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" alt=""
                                    class="absolute top-0 left-0 border-4 border-white rounded-md shadow-[0_0_30px_rgba(140,152,164,0.5)] h-24" />
                                <div class="bg-white pt-10 pr-7 pb-12 pl-20 rounded-md">
                                    <blockquote class="pb-1">
                                        <div class="text-[22px] leading-7 mb-4 text-dark">
                                            {!! $testimonial->text !!}
                                        </div>
                                    </blockquote>
                                    <div>
                                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="text-green-800 text-lg font-bold inline">
                                                    {{ $testimonial->name }}
                                                </h3> - <span>
                                                    {{ $testimonial->position }}
                                                </span>
                                            </div>
                                            <i class="fa-solid fa-quote-right text-6xl text-green-800"></i>
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
