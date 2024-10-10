<div class="bg-repeat bg-auto bg-[0_0] bg-primary py-[60px] pr-[110px] -mt-[140px] rounded-tr-md rounded-br-md"
    style="background-image: url('{{ asset('front/images/trans-pattern-bg.png') }}')">
    <div class="pl-14 ml-auto">
        <div class="grid grid-cols-12">
            <div class="xl:col-span-6"></div>
            <div class="xl:col-span-6 col-span-12">
                <div class="mb-[60px]">
                    <h4 class="uppercase text-white text-sm font-bold tracking-[3px] mb-2.5">
                        WHO WE ARE
                    </h4>
                    <h2 class="text-6xxl text-white">
                        Subscribe <em class="selected-dark">
                            Newsletter
                        </em>
                    </h2>
                </div>
                <form action="{{ route('message') }}" method="POST" class="flex flex-col text-sm text-[#888888]">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name" required
                        class="border border-[#DCE5E7] rounded-md outline-none shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] h-14 mb-6 px-4" />
                    <input type="tel" name="phone" placeholder="Phone number" required
                        class="border border-[#DCE5E7] rounded-md outline-none shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] h-14 mb-6 px-4" />
                    <input type="email" name="email" placeholder="Email address"
                        class="border border-[#DCE5E7] rounded-md outline-none shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] h-14 mb-6 px-4" />
                    <input type="text" name="subject" placeholder="Subject"
                        class="border border-[#DCE5E7] rounded-md outline-none shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] h-14 mb-6 px-4" />
                    <textarea name="message" cols="40" rows="10" placeholder="Message" required
                        class="border border-[#DCE5E7] rounded-md outline-none shadow-[0_9px_24px_0_rgba(26,47,106,0.05)] mb-6 py-2.5 px-4"></textarea>
                    <input type="submit" value="Subscribe"
                        class="uppercase bg-dark text-white hover:bg-[#FFFFFF] hover:text-[#0C121D] py-5 pb-4 px-7 duration-300 self-start rounded-md tracking-wider font-extrabold text-sm cursor-pointer" />
                </form>
            </div>
        </div>
    </div>
</div>
