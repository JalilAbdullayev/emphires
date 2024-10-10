<section class="bg-no-repeat bg-right-top bg-cover bg-scroll py-16 min-h-[600px] relative"
    style="background-image: url('{{ $bg }}')">
    <div class="container">
        <div class="absolute top-1/2 font-bold">
            <h1 class="mb-1 leading-14 text-5xl capitalize text-white">
                {{ $title }}
            </h1>
            <div class="text-xs leading-normal text-white">
                <a href="/" class="hover:text-green-800 text-white">
                    {{ $settings->title }}
                </a> - <span>
                    {{ $title }}
                </span>
            </div>
        </div>
    </div>
</section>
