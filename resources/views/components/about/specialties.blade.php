<section class="bg-center bg-no-repeat bg-cover pt-[100px] pb-[120px]"
    style="background-image: url('{{ asset('storage/about/' . $about->specialties_bg) }}')">
    <div class="container col-xl-2 gap-7">
        <div>
            <div class="mb-10">
                <h4 class="text-sm leading-5 font-bold mb-2.5 tracking-[3px] text-white">
                    {{ $about->specialties_subtitle }}
                </h4>
                <h2 class="text-[42px] leading-[48px] tracking-normal mb-[15px] text-white">
                    {{ $about->specialties_title }}
                </h2>
            </div>
            <a href="{{ route('contact_' . session('locale')) }}"
                class="text-white uppercase py-[17px] px-[45px] border-2 border-white rounded-md hover:bg-white hover:text-[#0C121D] font-nunito-sans font-extrabold leading-none [&>*]:mb-0 [&>*]:inline">
                {{ $about->specialties_button }}
            </a>
        </div>
        <div class="specialties">
            <div>
                <h4>
                    1790
                </h4>
                <h3>
                    ACCOUNT NUMBER
                </h3>
            </div>
        </div>
    </div>
</section>
