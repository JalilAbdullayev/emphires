<header @class([
    'bg-white text-dark' => !Route::is('home'),
    'absolute top-0 left-0 right-0 z-50 text-white' => Route::is('home'),
])>
    <nav
        class="flex justify-between text-sm font-semibold leading-[50px] px-9 border-b border-[#ffffff21] max-xl:hidden">
        <div class="flex">
            <div class="flex items-center border-x border-[#ffffff21] px-4">
                <a href="mailto:{{ $contact->email }}" @class(['text-white' => Route::is('home')])>
                    <i class="fa-solid fa-envelope-open-text text-green-800 mr-3"></i> {{ $home->email_title }}
                    {{ $contact->email }}
                </a>
            </div>
            <div @class([
                'flex items-center border-e border-[#ffffff21] px-4 [&>*]:mb-0',
                'text-white' => Route::is('home'),
            ])>
                <i class="fa-solid fa-map-location-dot mr-3 text-green-800"></i> <span
                    class="mr-3">{{ $home->address_title }}
                </span> {{ $contact->address }}
            </div>
        </div>
        <div class="flex">
            <div @class([
                'border-x border-[#ffffff21] px-4 flex gap-8 [&>a]:duration-500',
                '[&>a]:text-white' => Route::is('home'),
            ])>
                @foreach ($socials as $social)
                    <a href="{{ $social->url }}" target="_blank" class="mx-1 hover:text-green-800">
                        {!! $social->icon !!}
                    </a>
                @endforeach
            </div>
            <div>
                <button @class(['mx-4', 'text-white' => Route::is('home')]) id="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </nav>
    <nav class="px-12 flex justify-between items-center border-b border-[#ffffff21] tracking-wider h-28 duration-500"
        id="navbar">
        <a href="/" class="shrink-0">
            <img src="{{ asset('storage/' . $settings->logo) }}" alt="" class="max-h-14" />
        </a>
        <div
            class="flex gap-8 font-extrabold [&>a:hover]:text-green-800 [&>a:hover]:duration-500 max-xl:opacity-0 max-xl:hidden">
            <a href="/" @class(['text-green-800' => Route::is('home')])>
                Home
            </a>
            @if ($about->status)
                <a href="{{ route('about_' . session('locale')) }}" @class([
                    'text-white',
                    'text-green-800' => Route::is('about_' . session('locale')),
                ])>
                    {{ $about->title }}
                </a>
            @endif
            <a href="" @class(['text-white'])>
                Services
            </a>
            <a href="/blog.html" @class(['text-white'])>
                Blog
            </a>
            @if ($contact->status)
                <a href="{{ route('contact_' . session('locale')) }}" @class([
                    'text-white',
                    'text-green-800' => Route::is('contact_' . session('locale')),
                ])>
                    {{ $contact->title }}
                </a>
            @endif
        </div>
        <div class="flex justify-between gap-3 max-xl:hidden">
            <i class="fa-regular fa-comments text-5xl text-green-800"></i>
            <div>
                <div class="mb-1">
                    {{ $home->phone_title }}
                </div>
                <a href="tel:{{ preg_replace('/[\s\(\)\-]+/', '', $contact->phone) }}" class="mb-1 text-white">
                    {{ $contact->phone }}
                </a>
            </div>
        </div>
        <i class="fa-solid fa-bars xl:hidden text-4xl cursor-pointer" id="mobile-button"></i>
    </nav>
    <div class="relative">
        <nav class="bg-white border-t-4 border-green-800 opacity-0 pointer-events-none transform translate-y-[32.3%] transition-all ease-in-out fixed top-0 z-50 w-full"
            id="mobile-nav">
            <ul
                class="[&>li]:text-[#0C121D] [&>li]:py-2.5 [&>li]:px-4 [&>li]:border-b border-[#09162a26] [&>li]:font-extrabold duration-500">
                <li>
                    <a href="/" @class(['text-green-800' => Route::is('home')])>
                        Home
                    </a>
                </li>
                @if ($about->status)
                    <li>
                        <a href="{{ route('about_' . session('locale')) }}" @class(['text-green-800' => Route::is('about_' . session('locale'))])>
                            {{ $about->title }}
                        </a>
                    </li>
                @endif
                <li>
                    <a href="/service.html">
                        Services
                    </a>
                </li>
                <li>
                    <a href="/blog.html">
                        Blog
                    </a>
                </li>
                @if ($contact->status)
                    <li>
                        <a href="{{ route('contact_' . session('locale')) }}" @class([
                            'text-green-800' => Route::is('contact_' . session('locale')),
                        ])>
                            {{ $contact->title }}
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
