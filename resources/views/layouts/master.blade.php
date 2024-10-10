<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="@yield('keywords', $settings->keywords)" />
    <meta name="description" content="@yield('description', $settings->description)" />
    <meta name="author" content="@yield('author', $settings->author)" />
    <meta property="og:title" content="@yield('title', $settings->title)" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('image', asset('storage/' . $settings->logo))" />
    <meta property="og:site_name" content="{{ $settings->title }}" />
    <meta name="twitter:title" content="@yield('title', $settings->title)" />
    <meta name="twitter:description" content="@yield('description', $settings->description)" />
    <meta name="twitter:image" content="@yield('image', asset('storage/' . $settings->logo))" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:alt" content="{{ $settings->title }}" />
    <title>
        @yield('title', $settings->title)
    </title>
    <link rel="icon" href="{{ asset('storage/' . $settings->favicon) }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.core.min.css"
        integrity="sha512-YQlbvfX5C6Ym6fTUSZ9GZpyB3F92hmQAZTO5YjciedwAaGRI9ccNs4iw2QTCJiSPheUQZomZKHQtuwbHkA9lgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('css')
</head>

<body>
    <header @class([
        'bg-white text-dark',
        'absolute top-0 left-0 right-0 z-50 text-white bg-transparent' => Route::is(
            'home'),
    ])>
        <nav
            class="flex justify-between text-sm font-semibold leading-[50px] px-9 border-b border-[#ffffff21] max-xl:hidden">
            <div class="flex">
                <div class="flex items-center border-x border-[#ffffff21] px-4">
                    <a href="mailto:{{ $contact->email }}" @class(['text-white' => Route::is('home')])>
                        <i class="fa-solid fa-envelope-open-text text-green-800 mr-3"></i> Email Address :
                        {{ $contact->email }}
                    </a>
                </div>
                <div @class([
                    'flex items-center border-e border-[#ffffff21] px-4 [&>*]:mb-0',
                    'text-white' => Route::is('home'),
                ])>
                    <i class="fa-solid fa-map-location-dot mr-3 text-green-800"></i> <span class="mr-3">Office Address
                        :</span> {!! $contact->address !!}
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
                <a href="/" @class(['text-white', 'text-green-800' => Route::is('home')])">
                    Home
                </a>
                <a href="{{ route('about_' . session('locale')) }}" @class([
                    'text-white',
                    'text-green-800' => Route::is('about_' . session('locale')),
                ])>
                    About Us
                </a>
                <a href="" @class(['text-white'])>
                    Services
                </a>
                <a href="/projects.html" @class(['text-white'])>
                    Projects
                </a>
                <a href="/blog.html" @class(['text-white'])>
                    Blog
                </a>
                <a href="/contact.html" @class(['text-white'])>
                    Contact Us
                </a>
            </div>
            <div class="flex justify-between gap-3 max-xl:hidden">
                <i class="fa-regular fa-comments text-5xl text-green-800"></i>
                <div>
                    <div @class(['mb-1', 'text-white' => Route::is('home')])>
                        Have any Questions?
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
                    <li>
                        <a href="{{ route('about_' . session('locale')) }}" @class(['text-green-800' => Route::is('about_' . session('locale'))])>
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="/service.html">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="/projects.html">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="/blog.html">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/contact.html">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer class="bg-[#F8F8F9] pt-[75px] pb-12 bg-center bg-no-repeat bg-scroll bg-auto">
        <div class="container">
            <section class="col-lg-4 grid-cols-2 pb-10">
                <div class="mx-3.5">
                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="" class="mb-5" />
                    <p class="mt-2.5 mb-4">
                        {{ $settings->description }}
                    </p>
                    <div class="flex justify-between items-center bg-white rounded-lg py-5 px-7">
                        <h5 class="font-black text-base">
                            <div class="font-bold">
                                Talk To Our Support
                            </div>
                            <a href="tel:{{ preg_replace('/\s+/', '', $contact->phone) }}">
                                {{ $contact->phone }}
                            </a>
                        </h5>
                        <i class="fa-solid fa-phone-volume text-5xl text-green-800"></i>
                    </div>
                </div>
                <div class="mx-3.5">
                    <h2 class="footer-header">
                        INFORMATION
                    </h2>
                    <ul class="[&>li]:mb-4 [&>li]:font-bold [&>li]:text-[#0C121D]">
                        @foreach ($allServices as $service)
                            <li>
                                <a href="" class="hover:text-green-800">
                                    <i class="fa-solid fa-chevron-right"></i> <span
                                        class="pl-2.5">{{ $service->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mx-3.5">
                    <h2 class="footer-header">
                        LATEST NEWS
                    </h2>
                    <ul>
                        @foreach ($blog as $article)
                            <li class="col-3 mb-4 gap-4">
                                <img src="{{ asset('storage/blog/' . $article->image) }}" alt=""
                                    class="w-full" />
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
                    <h2 class="footer-header">
                        NEWSLETTER
                    </h2>
                    <p>
                        Sign up today for hints, tips and the latest product news
                    </p>
                    <form action="" method="POST" class="relative">
                        <input type="email" name="" placeholder="Your email address" required
                            class="h-14 border border-[#ffffff33] bg-white rounded-md py-2.5 pl-4 mb-2.5 outline-none w-full" />
                        <button type="submit"
                            class="rounded-md size-12 text-white tracking-wider bg-primary font-bold absolute top-1 right-1">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                    <h2 class="footer-header mt-6">
                        FOLLOW US ON
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
                    Copyright © 2022 <a href="/" class="text-green-800">{{ $settings->title }}</a> All Rights
                    Reserved.
                </p>
                <a href="#"
                    class="absolute left-1/2 -translate-x-1/2 -top-5 right-5 size-16 leading-[64px] text-[22px] text-center bg-dark text-white rounded-lg hover:bg-green-800 z-10">
                    <i class="fa-solid fa-arrow-up"></i>
                </a>
                <ul class="flex justify-between [&>li]:mx-2.5 [&>li]:text-sm">
                    <li class="duration-500 hover:text-green-800">
                        <a href="">
                            Privacy & Policy
                        </a>
                    </li>
                    <li class="duration-500 hover:text-green-800">
                        <a href="">
                            Conditions
                        </a>
                    </li>
                    <li class="duration-500 hover:text-green-800">
                        <a href="">
                            Refund Policy
                        </a>
                    </li>
                </ul>
            </section>
            <div class="opacity-0 invisible fixed top-0 left-0 size-full bg-[#0C121DE6] duration-300 -translate-y-[30%] z-50"
                id="search-modal">
                <div class="absolute text-white top-[25px] right-[25px] cursor-pointer" id="close-modal">
                    <i class="fa-solid fa-xmark text-3xl block"></i>
                </div>
                <div class="max-w-[970px] mx-auto relative top-1/2 left-0 -translate-y-1/2">
                    <form action="" class="relative">
                        <input type="search" name=""
                            class="border-0 text-base text-[#09162A] pl-4 text-left h-[70px] leading-[70px] bg-white shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] w-full rounded-md duration-150 -outline-offset-2 max-w-full"
                            placeholder="Type Word Then Press Enter" />
                        <button type="submit"
                            class="absolute top-[5px] right-[5px] text-xl size-[60px] leading-[60px] rounded text-white bg-primary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/glide.min.js"
        integrity="sha512-IkLiryZhI6G4pnA3bBZzYCT9Ewk87U4DGEOz+TnRD3MrKqaUitt+ssHgn2X/sxoM7FxCP/ROUp6wcxjH/GcI5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
