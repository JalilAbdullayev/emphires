<section class="container flex flex-row-reverse -mt-[100px]">
    <div
        class="py-[35px] pr-[15px] pl-[35px] bg-repeat bg-primary rounded-lg"
        style="background-image: url('{{ asset("front/images/trans-pattern-bg.png") }}')">
        <div class="md:grid md:grid-cols-12 items-center gap-[15px]">
            <div
                class="size-[110px] leading-[110px] text-center rounded-full bg-white text-green-800 text-[50px] md:col-span-2 mx-auto mb-4">
                <i class="fa-solid fa-square-poll-horizontal"></i>
            </div>
            <div class="md:col-span-10">
                <h2 class="text-xl font-bold leading-[30px] text-white">
                    {{ $about->specialties_card }}
                </h2>
            </div>
        </div>
    </div>
</section>
