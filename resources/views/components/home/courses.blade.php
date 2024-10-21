<section class="container section">
    <div class="text-center">
        <h4 class="subtitle">
            {{ $home->courses_subtitle }}
        </h4>
        <h2 class="text-6xxl">
            {{ $home->courses_title }}
        </h2>
    </div>
    <div id="courses" class="flex flex-wrap justify-center items-center">
        @foreach ($courses as $course)
            <article
                class='mx-3.5 shadow-[0_30px_50px_rgba(0,0,0,0.03)] rounded-md mb-7 bg-white xl:w-[30%] md:w-5/12 w-full'>
                <div class="relative">
                    <img src="{{ asset("storage/courses/$course->image") }}" alt="" class="rounded-md"/>
                </div>
                <div class="p-8">
                    <div class="mb-4 text-sm tracking-[0.5px] font-semibold">
                        <a href="{{ route('courses_category_' . session('locale'), $course->category->slug) }}"
                           class="hover:text-green-800 ml-2.5">
                            <i class="fa-regular fa-folder-open text-green-800"></i> {{ $course->category->title }}
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
                       class="uppercase font-extrabold hover:text-green-800">
                        <span class="link pr-5 text-xs tracking-wider duration-500 hover:text-green-800">
                            @lang('READ MORE')
                        </span> <i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </article>
        @endforeach
    </div>
</section>
