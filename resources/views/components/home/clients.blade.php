<section class="py-16 border-b border-[#DCE5E7]">
    <div class="glide clients-glide">
        <div class="glide__track overflow-hidden" data-glide-el="track">
            <div class="glide__slides flex">
                @foreach ($clients as $client)
                    <div class="glide__slide">
                        <a href="{{ $client->url }}">
                            <img src="{{ asset('storage/clients/' . $client->image) }}" alt="" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
