<section class="container section">
    <div class="mb-[60px] text-center">
        <h4 class="subtitle">
            {!! $about->team_subtitle !!}
        </h4>
        <div class="text-[42px] leading-[48px] mb-[15px]">
            {!! $about->team_title !!}
        </div>
    </div>
    <div id="team" class="col-lg-4 grid-cols-2 gap-7">
        @foreach ($team as $member)
            <div
                class="bg-white rounded-md shadow-[0_0_24px_0_rgba(26,47,106,0.07)] mb-10 border-b-[3px] transform translate-y-0 border-green-800 overflow-hidden relative duration-500 hover:border-[#0C121D] hover:-translate-y-[5px]">
                <div class="absolute right-[50px] top-[15px] text-center">
                    <div class="plus-icon">
                        <div
                            class="size-10 absolute top-0 leading-10 rounded-full cursor-pointer bg-white text-[#1C325B]">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <div class="absolute top-[50px] opacity-0 invisible -left-[30px] duration-500 social-icons">
                            <ul class="about-social">
                                <li>
                                    <a href="{{ $member->facebook }}" target="_blank">
                                        <i class="fa-brands fa-square-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $member->twitter }}" target="_blank">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $member->linkedin }}" target="_blank">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('storage/team/' . $member->image) }}" alt="" class="mx-auto" />
                </div>
                <div class="py-5 pr-[30px] pl-[25px] text-center">
                    <div>
                        <h3 class="hover:text-green-800 text-[22px] leading-6 mt-[5px] duration-500">
                            <a class="cursor-default hover:text-green-800 duration-500">
                                {{ $member->name }}
                            </a>
                        </h3>
                        <div class="uppercase px-2.5">
                            <h4 class="text-xs font-semibold tracking-[1px] px-2.5 text-secondary">
                                {{ $member->position }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
