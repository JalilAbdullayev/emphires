<section class="section text-center container">
    <div class="mb-14">
        <h4 class="subtitle">
            {!! $home->qualities_subtitle !!}
        </h4>
        <div class="text-6xxl">
            {!! $home->qualities_title !!}
        </div>
        <div class="text-lg leading-relaxed mx-auto max-w-[800px]">
            {!! $home->qualities_text !!}
        </div>
    </div>
    <div id="approach-qualities" class="col-xl-3 grid-cols-2 items-center">
        @foreach ($qualities as $quality)
            <div class="${index === 2 ? 'max-xl:col-span-full' : ''}">
                <div class="mb-9 relative w-fit mx-auto">
                    <div
                        class="bg-white size-36 shadow-[0_0_24px_0_rgba(26,47,106,0.13)] leading-[110px] rounded-md mx-auto">
                        <img src="{{ asset('storage/qualities/' . $quality->icon) }}" alt=""
                            class="m-auto pt-5" />
                    </div>
                    <div
                        class="bg-dark text-white size-9 text-sm font-bold leading-7 rounded-full absolute -bottom-2.5 -right-2.5">
                        0{{ $loop->index + 1 }}
                    </div>
                </div>
                <h2 class="text-[22px] leading-6 mb-2.5">
                    {{ $quality->title }}
                </h2>
                {!! $quality->description !!}
            </div>
        @endforeach
    </div>
</section>
