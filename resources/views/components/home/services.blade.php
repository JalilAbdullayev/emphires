<section class="bg-[#F8F8F9] section">
    <div class="container">
        <div class="col-2 items-center">
            <div class="px-3.5">
                <h4 class="subtitle">
                    {{ $home->services_subtitle }}
                </h4>
                <h2 class="text-6xxl">
                    {{ $home->services_title }}
                </h2>
                <a href=""
                    class="link font-extrabold text-sm tracking-wider uppercase mb-7 hover:text-green-800 inline-block">
                    <span class="pr-7">
                        {{ $home->services_link_text }}
                    </span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <p class="mb-12 px-3.5">
                {{ $home->services_text }}
            </p>
        </div>
        <div id="services" class="col-md-3 items-center gap-7">
            @foreach ($services as $service)
                <div class="service">
                    <div>
                        <img src="{{ asset('storage/services/' . $service->image) }}" alt=""
                            class="shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] mx-auto rounded-md" />
                    </div>
                    <div class="relative translate-y-0">
                        <div
                            class="bg-white px-7 pt-6 pb-2.5 -mt-7 mx-5 z-10 rounded-md shadow-[0_9px_24px_0_rgba(26,47,106,0.05)]">
                            <a href="/service.html"
                                class="text-green-800 tracking-wider font-semibold uppercase text-xs leading-6">
                                {{ $service->category->title }}
                            </a>
                            <h3 class="text-xl hover:text-green-800 duration-500">
                                <a href="/service.html">
                                    {{ $service->title }}
                                </a>
                            </h3>
                            <p class="pt-2.5 pb-5">
                                {{ $service->description }}
                            </p>
                        </div>
                        <a href="/service.html"
                            class="bg-primary rounded-full text-white text-lg size-14 flex justify-center items-center bottom-link -mt-9 leading-14 mx-auto">
                            <i class="fa-solid fa-arrow-right duration-500 hover:text-green-800"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-2.5">
            {{ $home->services_foot_text }} <a href="{{ route('contact_' . session('locale')) }}"
                class="link hover:text-green-800">
                {{ $home->services_foot_link_text }}
            </a>
        </div>
    </div>
</section>
