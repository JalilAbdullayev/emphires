<section class="bg-no-repeat bg-right-top bg-cover bg-scroll py-16 min-h-[600px] relative"
    style="background-image: url('{{ $bg }}')">
    <div class="container">
        <div @class([
            'absolute top-1/2 font-bold',
            '[&>*]:text-black' => $bg === null,
            '[&>*]:text-white' => $bg !== null,
        ])>
            <h1 class='mb-1 text-5xl capitalize leading-14'>
                {{ $subtitle }}
            </h1>
            <div @class([
                'text-xs leading-normal',
                '[&>*]:text-white' => $bg !== null,
                '[&>*]:text-black' => $bg === null,
            ])>
                <a href="/" class='hover:text-green-800'>
                    {{ $settings->title }}
                </a> - <a href="{{ $route }}" class='hover:text-green-800'>
                    {{ $title }}
                </a> - <span>
                    {{ $subtitle }}
                </span>
            </div>
        </div>
    </div>
</section>
