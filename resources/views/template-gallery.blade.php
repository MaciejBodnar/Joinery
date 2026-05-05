{{--
  Template Name: Gallery
--}}

@extends('layouts.app')

@section('content')
    @php
        $categories = get_field('gallery_categories') ?: [];
        $eyebrow = get_field('gallery_eyebrow') ?: 'Gallery';
    @endphp

    <section class="bg-white py-20 md:py-28 lg:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <h1 class="font-serif text-4xl md:text-5xl uppercase tracking-[0.08em] text-center text-[#541D23]">
                {{ $eyebrow }}
            </h1>

            @if ($categories)
                <div class="mt-14 md:mt-20 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-14">
                    @foreach ($categories as $category)
                        @php
                            $image = $category['category_image'] ?? null;
                            $title = $category['category_title'] ?? '';
                            $subtitle = $category['category_subtitle'] ?? '';
                            $link = $category['category_link'] ?? '#';
                        @endphp

                        <a href="{{ $link }}" class="group block" aria-label="View {{ $title }}">
                            <div class="overflow-hidden bg-[#EFEAE8] aspect-[16/5.8] md:aspect-[16/5.6]">
                                @if ($image)
                                    {!! wp_get_attachment_image($image, 'large', false, [
                                        'class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105',
                                        'loading' => 'lazy',
                                        'sizes' => '(min-width: 768px) 50vw, 100vw',
                                    ]) !!}
                                @else
                                    <div class="h-full w-full bg-[#EFEAE8]"></div>
                                @endif
                            </div>

                            <div class="mt-8 flex items-start justify-between gap-6">
                                <div>
                                    <h2 class="text-lg md:text-xl font-bold uppercase tracking-[0.04em] text-[#541D23]">
                                        {{ $title }}
                                    </h2>

                                    @if ($subtitle)
                                        <p class="mt-1 text-sm md:text-base text-neutral-400">
                                            {{ $subtitle }}
                                        </p>
                                    @endif
                                </div>

                                <span
                                    class="inline-flex h-12 w-12 shrink-0 items-center justify-center bg-[#FCBA59] text-[#541D23] text-2xl transition group-hover:translate-x-1">
                                    →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
