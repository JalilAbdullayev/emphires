@extends('layouts.master')
@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)
@section('author', $author)
@section('image', $image)
@section('content')
    <x-child-header :bg="$article->background ? asset('storage/services/' . $article->background) : null" :title="__('Services')" :subtitle="$article->title" :route="'services_' . session('locale')" />
    <main class="container grid py-20 lg:grid-cols-12">
        <section class="px-[15px] max-md:pt-20 max-lg:pb-[50px] lg:col-span-9">
            <div class="relative">
                <img src="{{ asset('storage/services/' . $article->image) }}" alt="" class="w-full img-fluid" />
            </div>
            <article class="p-[30px]">
                <div class="article-meta">
                    <span>
                        <i class="fa-solid fa-folder-open"></i> <a
                            href="{{ route('services_category_' . session('locale'), $article->category->slug) }}">
                            {{ $article->category->title }}
                        </a>
                    </span>
                </div>
                <p>
                    {!! $article->text !!}
                </p>
                <div class="flex justify-between items-center border-t border-[#EEEEEE] mt-[30px] pt-5">
                    <ul class="article-socials">
                        <li>
                            <div class="fb-share-button" data-layout="button_count" data-size=""
                                data-href="{{ url()->current() }}">
                                <a target="_blank" class="fb-xfbml-parse-ignore"
                                    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
                                </a>
                            </div>
                        </li>
                        <li>
                            <script type="IN/Share" data-url="{{ url()->current() }}"></script>
                        </li>
                        <li>
                            <a href="https://wa.me/?text={{ url()->current() }}" class="bg-[#25D366]">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </article>
        </section>
        <aside class="lg:col-span-3 pl-[30px]">
            <form action="{{ route('services_search_' . session('locale')) }}"
                class="relative mb-[30px] rounded-[5px] bg-white">
                <input type="search" name="search" id="" placeholder="Search ..."
                    class="h-[58px] border border-[#ECECEC] bg-white pr-[90px] pl-[15px] block w-full text-base text-[#848484] font-normal rounded-[5px]" />
                <button type="submit" class="absolute top-0 right-0 w-fit h-full px-[25px] bg-primary rounded-[5px]">
                    <i class="text-lg text-white fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <section class="article-posts">
                <h2 class="aside-title">
                    @lang('Other services')
                </h2>
                <ul>
                    @foreach ($others as $article)
                        <li>
                            <a href="{{ route('service_' . session('locale'), $article->slug) }}"
                                class="shrink-0 mr-5 w-[75px]">
                                <img src="{{ asset('storage/services/' . $article->image) }}" alt="" />
                            </a>
                            <div>
                                <a href="{{ route('service_' . session('locale'), $article->slug) }}"
                                    class="leading-[18px] -tracking-[0.5px] hover:text-green-800">
                                    {{ $article->title }}
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>
            <section class="article-categories">
                <h2 class="aside-title">
                    @lang('Categories')
                </h2>
                <ul>
                    @foreach ($categories as $category)
                        <li class="relative p-0 my-0 5">
                            <a href="{{ route('services_category_' . session('locale'), $category->slug) }}">
                                <i class="fa-regular fa-folder-open"></i> {{ $category->title }}
                            </a>
                            <span>
                                {{ count($category->services) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </section>
            <section class="rounded-[5px] overflow-hidden text-center text-white text-[15px] bg-cover">
                <img src="/n-ads-01-1.png" alt="" class="w-full img-fluid" />
            </section>
        </aside>
    </main>
@endsection
@section('js')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/az_AZ/sdk.js#xfbml=1&version=v20.0"
        nonce="e0jjKT8f"></script>
    <script src="https://platform.linkedin.com/in.js" type="text/javascript">
        lang: en_US
    </script>
    <script>
        (function(d, s, id) {
            let js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
