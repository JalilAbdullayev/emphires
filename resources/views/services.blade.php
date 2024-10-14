@extends('layouts.master')
@section('title', __('Services'))
@section('content')
    <x-main-header :title="__('Services')" :bg="null" />
    <section class="container items-end col-md-3 gap-7">
        @foreach ($services as $service)
            <div class="mb-[30px]">
                <div>
                    <img src="{{ asset('storage/services/' . $service->image) }}" alt="" class="mx-auto img-fluid" />
                </div>
                <div class="p-[30px] shadow-[-1px_3px_10px_0_rgba(0,0,0,0.06)]">
                    <div class="leading-[13px] mb-2.5">
                        <a href="{{ route('services_category_' . session('locale'), $service->category->slug) }}"
                            class="uppercase text-[13px] leading-[13px] font-bold tracking-[1px] inline-block text-green-800">
                            {{ $service->category->title }}
                        </a>
                    </div>
                    <h3 class="font-extrabold text-[22px] leading-[30px]">
                        <a href="{{ route('service_' . session('locale'), $service->slug) }}" class="text-[#2C2C2C]">
                            {{ $service->title }}
                        </a>
                    </h3>
                </div>
            </div>
        @endforeach
    </section>
@endsection
