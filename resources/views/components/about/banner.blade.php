<section class="pt-[100px] pb-[90px] bg-[center_left] bg-no-repeat bg-cover"
    style="background-image: url('{{ asset('storage/about/' . $about->banner_bg) }}')">
    <div class="container flex max-lg:flex-col justify-between items-center max-lg:items-start">
        <div class="flex gap-6">
            <div class="text-[80px] leading-[80px] text-white">
                <i class="fa-solid fa-user-tie"></i>
            </div>
            <div>
                <h4 class="text-white font-bold text-[22px] mb-2.5 [&>*]:mb-0">
                    {!! $about->banner_text !!}
                </h4>
                <h2 class="text-green-700 text-5xl max-lg:text-[35px] leading-[55px] tracking-normal">
                    {{ $contact->phone }}
                </h2>
            </div>
        </div>
        <div class="px-3.5">
            <a href="tel:{{ preg_replace('/[\s\(\)\-]+/', '', $contact->phone) }}"
                class="py-[17px] px-[45px] text-white border-2 border-white rounded-md uppercase hover:bg-white hover:text-[#0C121D] inline-block [&>*]:mb-0">
                {!! $about->banner_button !!}
            </a>
        </div>
    </div>
</section>
