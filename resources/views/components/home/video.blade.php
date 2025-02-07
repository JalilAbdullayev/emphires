<section class="pt-28 pb-56 bg-center bg-no-repeat bg-cover text-white"
    style="background-image: url('{{ asset('storage/home/' . $home->video_bg) }}')">
    <div class="container text-center text-4xl leading-14">
        <div class="py-6 mb-4">
            <a href="{{ $home->video_link }}" data-fancybox
                class="inline-block bg-white hover:text-green-800 rounded-full size-16 py-6 px-7 relative">
                <i
                    class="fa-solid fa-play absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-base"></i>
            </a>
        </div>
        <h2 class="text-white mb-2 text-[40px] leading-14">
            {{ $home->video_text }}
        </h2>
    </div>
</section>
@section('js')
    <script>
        Fancybox.bind('[data-fancybox]');
    </script>
@endsection
