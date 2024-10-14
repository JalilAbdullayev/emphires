<section class="bg-[#F8F8F9] section">
    <div class="container">
        <div class="items-center col-2">
            <div class="px-3.5">
                <h4 class="subtitle">
                    {{ $home->services_subtitle }}
                </h4>
                <h2 class="text-6xxl">
                    {{ $home->services_title }}
                </h2>
                <a href="{{ route('services_' . session('locale')) }}"
                    class="inline-block text-sm font-extrabold tracking-wider uppercase link mb-7 hover:text-green-800">
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
        <div id="services" class="items-center col-md-3 gap-7">
            @foreach ($services as $service)
                <div class="service">
                    <div>
                        <img src="{{ asset('storage/services/' . $service->image) }}" alt=""
                            class="shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] mx-auto rounded-md" />
                    </div>
                    <div class="relative translate-y-0">
                        <div
                            class="bg-white px-7 pt-6 pb-2.5 -mt-7 mx-5 z-10 rounded-md shadow-[0_9px_24px_0_rgba(26,47,106,0.05)]">
                            <a href="{{ route('services_category_' . session('locale'), $service->category->slug) }}"
                                class="text-xs font-semibold leading-6 tracking-wider text-green-800 uppercase">
                                {{ $service->category->title }}
                            </a>
                            <h3 class="text-xl duration-500 hover:text-green-800">
                                <a href="{{ route('service_' . session('locale'), $service->slug) }}">
                                    {{ $service->title }}
                                </a>
                            </h3>
                            <p class="pt-2.5 pb-5">
                                {{ $service->description }}
                            </p>
                        </div>
                        <a href="{{ route('service_' . session('locale'), $service->slug) }}"
                            class="flex items-center justify-center mx-auto text-lg text-white rounded-full bg-primary size-14 bottom-link -mt-9 leading-14">
                            <i class="duration-500 fa-solid fa-arrow-right hover:text-green-800"></i>
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
