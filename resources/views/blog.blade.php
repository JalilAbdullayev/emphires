@extends('layouts.master')
@section('title', __('Blog'))
@section('content')
    <main class="container section">
        <div class="col-md-3">
            @foreach ($blog as $article)
                <article
                    class="mx-3.5 shadow-[0_30px_50px_rgba(0,0,0,0.03)] rounded-md mb-7 bg-white flex flex-col justify-end relative">
                    <img src="{{ asset('storage/blog/' . $article->image) }}" alt="" class="rounded-md" />
                    <span
                        class="absolute top-2.5 right-2.5 rounded-md bg-primary text-[32px] leading-[34px] py-3 px-4 font-bold text-white uppercase text-center font-nunito-sans">
                        {{ Carbon\Carbon::parse($article->date)->format('d') }} <div
                            class="font-normal text-sm tracking-[3px]">
                            {{ Carbon\Carbon::parse($article->date)->format('M') }}
                        </div>
                    </span>
                    <div class="p-8">
                        <div class="mb-4 text-sm tracking-[0.5px] font-semibold">
                            <a href="{{ route('blog_category_' . session('locale'), $article->category->slug) }}"
                                class="hover:text-green-800 ml-2.5">
                                <i class="fa-regular fa-folder-open text-primary"></i> {{ $article->category->title }}
                            </a>
                        </div>
                        <h3 class="duration-500 hover:text-green-800 text-[22px] leading-7 mb-4">
                            <a href="{{ route('article_' . session('locale'), $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <p class="mb-4">
                            {{ $article->description }}
                        </p>
                        <a href="{{ route('article_' . session('locale'), $article->slug) }}"
                            class="font-extrabold uppercase hover:text-green-800">
                            <span class="pr-5 text-xs tracking-wider duration-500 link hover:text-green-800">
                                @lang('READ MORE')
                            </span> <i class="text-sm fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        {{ $blog->links() }}
    </main>
@endsection
