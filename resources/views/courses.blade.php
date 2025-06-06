@extends('layouts.master')
@section('title', __('Courses'))
@section('content')
    <x-main-header :title="__('Courses')" :bg="null"/>
    <main class="container section">
        <div class="col-md-3">
            @foreach ($courses as $course)
                <article
                    class="mx-3.5 shadow-[0_30px_50px_rgba(0,0,0,0.03)] rounded-md mb-7 bg-white flex flex-col justify-end relative">
                    <img src="{{ asset('storage/courses/' . $course->image) }}" alt="" class="rounded-md"/>
                    <div class="p-8">
                        <div class="mb-4 text-sm tracking-[0.5px] font-semibold">
                            <a href="{{ route('blog_category_' . session('locale'), $course->category->slug) }}"
                               class="hover:text-green-800 ml-2.5">
                                <i class="fa-regular fa-folder-open text-primary"></i> {{ $course->category->title }}
                            </a>
                        </div>
                        <h3 class="duration-500 hover:text-green-800 text-[22px] leading-7 mb-4">
                            <a href="{{ route('course_' . session('locale'), $course->slug) }}">
                                {{ $course->title }}
                            </a>
                        </h3>
                        <p class="mb-4">
                            {{ $course->description }}
                        </p>
                        <a href="{{ route('course_' . session('locale'), $course->slug) }}"
                           class="font-extrabold uppercase hover:text-green-800">
                            <span class="pr-5 text-xs tracking-wider duration-500 link hover:text-green-800">
                                @lang('READ MORE')
                            </span> <i class="text-sm fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        {{ $courses->links() }}
    </main>
@endsection
