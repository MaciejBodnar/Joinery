{{--
  Template Name: Gallery Category
--}}

@extends('layouts.app')

@section('content')
    @php
        $eyebrow = get_field('gallery_category_eyebrow') ?: 'Gallery';
        $title = get_field('gallery_category_title') ?: get_the_title();
        $albums = get_field('gallery_albums') ?: [];

        $backLink = get_field('gallery_back_link') ?: home_url('/gallery');
        $backLabel = get_field('gallery_back_label') ?: 'Go back to Gallery';

        $readMoreLink = get_field('gallery_read_more_link');
        $readMoreLabel = get_field('gallery_read_more_label') ?: 'Read more';
    @endphp

    <section class="bg-white py-20 md:py-28 lg:py-32">
        <div class="md:px-12 lg:px-20 mx-auto px-6">
            <div class="text-center">
                <p class="text-xl font-bold uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $eyebrow }}
                </p>

                <h1 class="mt-4 font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $title }}
                </h1>
            </div>

            @if ($albums)
                <div class="mt-14 md:mt-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-14">
                    @foreach ($albums as $album)
                        @php
                            $image = $album['album_image'] ?? null;
                            $albumTitle = $album['album_title'] ?? '';
                            $subtitle = $album['album_subtitle'] ?? '';
                            $link = $album['album_link'] ?? '#';
                        @endphp

                        <a href="{{ $link }}" class="group block" aria-label="View {{ $albumTitle }}">
                            <div class="overflow-hidden bg-[#EFEAE8] aspect-[16/7.2]">
                                @if ($image)
                                    {!! wp_get_attachment_image($image, 'large', false, [
                                        'class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105',
                                        'loading' => 'lazy',
                                        'sizes' => '(min-width: 1024px) 33vw, (min-width: 768px) 50vw, 100vw',
                                    ]) !!}
                                @else
                                    <div class="h-full w-full bg-[#EFEAE8]"></div>
                                @endif
                            </div>

                            <div class="mt-8 flex items-start justify-between gap-6">
                                <div>
                                    <h3 class="text-lg md:text-xl font-bold uppercase tracking-[0.04em] text-[#541D23]">
                                        {{ $albumTitle }}
                                    </h3>

                                    @if ($subtitle)
                                        <p class="mt-1 text-sm md:text-base text-[#828282]">
                                            {{ $subtitle }}
                                        </p>
                                    @endif
                                </div>

                                <span
                                    class="inline-flex h-12 w-12 shrink-0 items-center justify-center bg-[#FCBA59] text-[#541D23] text-2xl transition group-hover:translate-x-1 rounded-sm">
                                    →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="mt-16 flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ $backLink }}"
                    class="inline-flex h-12 min-w-65 items-center justify-center bg-[#FCBA59] px-8 text-[#541D23] transition hover:opacity-90 rounded-sm">
                    {{ $backLabel }}
                </a>

                @if ($readMoreLink)
                    <a href="{{ $readMoreLink }}"
                        class="inline-flex h-12 min-w-65 items-center justify-center border-2 border-[#FCBA59] px-8 text-[#541D23] transition hover:bg-[#FCBA59] rounded-sm">
                        {{ $readMoreLabel }}
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection
