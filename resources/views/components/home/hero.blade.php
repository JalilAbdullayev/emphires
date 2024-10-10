<section class="glide hero-glide min-h-screen">
    <div class="glide__track overflow-hidden" data-glide-el="track">
        <div class="glide__slides flex">
            @foreach ($slider as $slide)
                <div class="glide__slide relative">
                    <img src="{{ asset('storage/slider/' . $slide->image) }}" alt=""
                        class="min-h-screen object-cover object-[70%]" />
                    <div class="absolute top-96 left-10 xl:left-48 right-0">
                        <div class="uppercase text-sm font-bold leading-6 mb-4 text-white">
                            {!! $slide->title !!}
                        </div>
                        <h1 class="text-7xl font-['Nunito'] mb-8 mt-4 text-white">
                            {!! $slide->subtitle !!}
                        </h1>
                        <div class="text-white mt-8 flex items-center gap-12">
                            <a href=""
                                class="font-['Nunito'] leading-6 font-extrabold border-2 border-white py-4 px-12 rounded-md uppercase text-sm hover:bg-green-800 duration-500 hover:border-green-800 text-white [&>*]:mb-0">
                                {!! $slide->button_text !!}
                            </a>
                            {{-- <div class="flex items-center my-auto">
                                <a href="">
                                    <img src="{{ asset('front/images/n-play-button.png') }}" alt="" />
                                </a>
                                <span class="font-['Poppins'] tracking-wider font-semibold leading-6">
                                    How We Work
                                </span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
