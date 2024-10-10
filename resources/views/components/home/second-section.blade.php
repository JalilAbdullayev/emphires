<section class="bg-no-repeat bg-cover bg-primary bg-[0_-55%]"
    style="background-image: url('{{ asset('front/images/bg-16.png') }}')">
    @if ($home->second_section_services)
        <div id="qualities" class="col-md-3 gap-7 container xl:-mt-20 max-xl:pt-20 xl:relative xl:z-10">
            @foreach ($qualities as $quality)
                <x-home.quality :quality="$quality" :loop="$loop" />
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
