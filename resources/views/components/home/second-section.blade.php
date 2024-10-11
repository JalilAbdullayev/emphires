<section class="bg-no-repeat bg-cover bg-primary bg-[0_-55%]"
    style="background-image: url('{{ asset('front/images/bg-16.png') }}')">
    @if ($home->second_section_services)
        <div id="qualities" class="col-md-3 gap-7 container xl:-mt-20 max-xl:pt-20 xl:relative xl:z-10">
            @foreach ($qualities as $quality)
                <div
                    class="mt-4 pt-7 pb-10 pr-14 pl-7 lg:mb-7 rounded-md shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] bg-white relative overflow-hidden">
                    <div class="flex justify-between">
                        <img src="{{ asset('storage/qualities/' . $quality->icon) }}" alt="" />
                        <h3 class="text-7xl font-black text-[#E3E4E9]">
                            0{{ $loop->index + 1 }}
                        </h3>
                    </div>
                    <h2 class="text-xl leading-6 mb-2.5 mt-7">
                        {{ $quality->title }}
                    </h2>
                    <p>
                        {!! $quality->description !!}
                    </p>
                    <a href=""
                        class="bg-dark text-white rounded-[50%] size-[130px] inline-block absolute -bottom-20 right-[-40px]">
                        <i class="fa-solid fa-arrow-right text-lg leading-4 absolute top-3 left-11"></i>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
    <section class="col-md-2 gap-10 text-white pt-12 pb-20 container">
        <blockquote class="text-xl leading-7 font-medium border-r border-[#FFFFFF80]">
            <div class="flex gap-6">
                <i class="fa-solid fa-quote-right text-5xl leading-10"></i>
                <span>
                    {!! $home->quote !!}
                </span>
            </div>
            <cite class="block text-lg pt-1.5 pl-12 mt-4">
                {!! $home->quote_author !!}
            </cite>
        </blockquote>
        <div class="mb-4">
            {!! $home->second_section_text !!}
        </div>
    </section>
</section>
