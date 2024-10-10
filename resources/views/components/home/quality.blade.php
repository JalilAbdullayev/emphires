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
