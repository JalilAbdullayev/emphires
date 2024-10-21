<div class="flex flex-col pt-14 gap-7">
    <div class="relative">
        <img src="{{ asset('storage/home/' . $home->skills_img) }}" alt=""
            class="mr-10 rounded-md max-xl:w-full max-xl:mb-16" />
        <div
            class="bg-dark rounded-md xl:rotate-90 xl:origin-[0_top] absolute xl:top-0 -bottom-1 xl:left-[100%] left-0 xl:w-[170px] w-full z-0 h-11 flex justify-center items-center">
            <h4 class="text-base leading-8 text-white uppercase">
                {{ $home->skills_text }}
            </h4>
        </div>
    </div>
    <div>
        @foreach ($skills as $skill)
            <div class="mb-5">
                <div class="flex justify-between">
                    <span class="font-bold leading-9 text-dark">
                        {{ $skill->title }}
                    </span>
                    <span class="font-bold text-dark">
                        {{ $skill->percent }}%
                    </span>
                </div>
                <div>
                    <div class="flex w-full h-2 bg-[#ECECF0] rounded-full overflow-hidden" role="progressbar"
                        aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100">
                        <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 rounded-full bg-primary whitespace-nowrap"
                            style="width: {{ $skill->percent }}%"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
