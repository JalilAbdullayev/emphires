@extends('layouts.master')
@section('title', __('Search'))
@section('content')
    <x-main-header :title="__('Search')" :bg="null"/>
    <section class="container section">
        <div class="items-end col-md-3 gap-7">
            @foreach ($results as $result)
                <div class="mb-[30px]">
                    <div>
                        <img
                            src="{{ asset('storage/' . $result->url === 'article' ? 'blog/' : $result->url . 's/' . $result->image) }}"
                            alt="" class="mx-auto img-fluid"/>
                    </div>
                    <div class="p-[30px] shadow-[-1px_3px_10px_0_rgba(0,0,0,0.06)]">
                        <h3 class="font-extrabold text-[22px] leading-[30px]">
                            <a href="{{ route($result->url . '_' . session('locale'), $result->slug) }}"
                               class="text-[#2C2C2C]">
                                {{ $result->title }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $results->links() }}
    </section>
@endsection
