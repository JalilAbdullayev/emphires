<footer class="bg-[#F8F8F9] pt-[75px] pb-12 bg-center bg-no-repeat bg-scroll bg-auto">
    <div class="container">
        <section class="grid-cols-2 pb-10 col-lg-4">
            <div class="mx-3.5">
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="" class="mb-5"/>
                <p class="mt-2.5 mb-4">
                    {{ $settings->description }}
                </p>
                <div class="flex items-center justify-between py-5 bg-white rounded-lg px-7">
                    <h5 class="text-base font-black">
                        <div class="font-bold">
                            {{ $home->phone_title }}
                        </div>
                        <a href="tel:{{ preg_replace('/\s+/', '', $contact->phone) }}">
                            {{ $contact->phone }}
                        </a>
                    </h5>
                    <i class="text-5xl text-green-800 fa-solid fa-phone-volume"></i>
                </div>
            </div>
            <div class="mx-3.5">
                <h2 class="footer-header">
                    {{ $home->footer_services_title }}
                </h2>
                <ul class="[&>li]:mb-4 [&>li]:font-bold [&>li]:text-[#0C121D]">
                    @foreach ($allServices as $service)
                        <li>
                            <a href="{{ route('service_' . session('locale'), $service->slug) }}"
                               class="hover:text-green-800">
                                <i class="fa-solid fa-chevron-right"></i> <span class="pl-2.5">
                                    {{ $service->title }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mx-3.5">
                <h2 class="footer-header">
                    {{ $home->footer_blog_title }}
                </h2>
                <ul>
                    @foreach ($allBlog as $article)
                        <li class="gap-4 mb-4 col-3">
                            <img src="{{ asset('storage/blog/' . $article->image) }}" alt="" class="w-full"/>
                            <div class="col-span-2">
                                <a href="" class="font-bold hover:text-green-800">
                                    {{ $article->title }}
                                </a>
                                <div class="text-green-800">
                                    {{ Carbon\Carbon::parse($article->date)->format('j F Y') }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mx-3.5">
                <h2 class="mt-6 footer-header">
                    {{ $home->footer_social_title }}
                </h2>
                <div class="grid col-4 [&>a]:mb-4">
                    @foreach ($socials as $social)
                        <a href="{{ $social->url }}" target="_blank" class="footer-social">
                            {!! $social->icon !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        <section
            class="bg-white flex justify-between items-center py-7 pr-4 pl-6 rounded-lg shadow-[0_9px_30px_0_rgba(26,47,106,0.07)] relative">
            <p class="text-sm leading-relaxed text-dark">
                © {{ $about->year }} @if (date('Y') > $about->year)
                    - {{ date('Y') }}
                @endif
                <a href="/" class="text-green-800">
                    {{ $settings->title }}
                </a> @lang('All Rights Reserved').
            </p>
            <a href="#"
               class="absolute left-1/2 -translate-x-1/2 -top-5 right-5 size-16 leading-[64px] text-[22px] text-center bg-dark text-white rounded-lg hover:bg-green-800 z-10">
                <i class="fa-solid fa-arrow-up"></i>
            </a>
        </section>
        <div
            class="opacity-0 invisible fixed top-0 left-0 size-full bg-[#0C121DE6] duration-300 -translate-y-[30%] z-50"
            id="search-modal">
            <div class="absolute text-white top-[25px] right-[25px] cursor-pointer" id="close-modal">
                <i class="block text-3xl fa-solid fa-xmark"></i>
            </div>
            <div class="max-w-[970px] mx-auto relative top-1/2 left-0 -translate-y-1/2">
                <form action="{{ route('search_' . session('locale')) }}" class="relative">
                    <input type="search" name="search" placeholder="Type Word Then Press Enter"
                           class="border-0 text-base text-[#09162A] pl-4 text-left h-[70px] leading-[70px] bg-white shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] w-full rounded-md duration-150 -outline-offset-2 max-w-full"/>
                    <button type="submit"
                            class="absolute top-[5px] right-[5px] text-xl size-[60px] leading-[60px] rounded text-white bg-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</footer>
