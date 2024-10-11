<div class="pt-14 pl-14 xl:mr-auto flex flex-col gap-7">
    <div class="relative">
        <img src="{{ asset('storage/home/' . $home->skills_img) }}" alt=""
            class="mr-10 rounded-md max-xl:w-full max-xl:mb-16" />
        <div
            class="bg-dark rounded-md xl:rotate-90 xl:origin-[0_top] absolute xl:top-0 -bottom-1 xl:left-[calc(100%-15px)] left-0 xl:w-[170px] w-full z-0 h-11 flex justify-center items-center">
            <h4 class="uppercase text-white text-base leading-8 [&>*]:mb-0">
                {{ $home->skills_text }}
            </h4>
        </div>
    </div>
    <div id="skills"></div>
</div>
