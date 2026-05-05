{{--
  Template Name: Gallery Album
--}}

@extends('layouts.app')

@section('content')
    @php
        $eyebrow = get_field('gallery_album_eyebrow') ?: 'Gallery';
        $title = get_field('gallery_album_title') ?: get_the_title();
        $images = get_field('gallery_album_images') ?: [];

        $backCategoryLink = get_field('gallery_back_category_link') ?: home_url('/gallery');
        $backCategoryLabel = get_field('gallery_back_category_label') ?: 'Go back';

        $backGalleryLink = get_field('gallery_back_gallery_link') ?: home_url('/gallery');
        $backGalleryLabel = get_field('gallery_back_gallery_label') ?: 'Go back to Gallery';
    @endphp

    <section class="bg-white py-20 md:py-28 lg:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="text-center">
                <p class="text-sm md:text-base font-bold uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $eyebrow }}
                </p>

                <h1 class="mt-4 font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $title }}
                </h1>
            </div>

            @if ($images)
                <div class="mt-14 md:mt-20 grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                    @foreach ($images as $index => $item)
                        @php
                            $image = $item['image'] ?? null;
                            $layout = $item['image_layout'] ?? 'normal';
                            $isWide = $layout === 'wide';

                            $fullImage = $image ? wp_get_attachment_image_url($image, 'full') : '';
                            $alt = $image ? get_post_meta($image, '_wp_attachment_image_alt', true) : '';
                            $alt = $alt ?: $title . ' image ' . ($index + 1);
                        @endphp

                        @if ($image)
                            <button type="button"
                                class="group block w-full overflow-hidden bg-[#EFEAE8] {{ $isWide ? 'md:col-span-2' : '' }}"
                                data-gallery-lightbox data-gallery-src="{{ $fullImage }}"
                                data-gallery-alt="{{ $alt }}" aria-label="Open {{ $alt }}">
                                <span class="block {{ $isWide ? 'aspect-16/7.5 md:aspect-[16/6.2]' : 'aspect-video' }}">
                                    {!! wp_get_attachment_image($image, $isWide ? 'full' : 'large', false, [
                                        'class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105',
                                        'loading' => 'lazy',
                                        'sizes' => $isWide ? '(min-width: 768px) 100vw, 100vw' : '(min-width: 768px) 50vw, 100vw',
                                    ]) !!}
                                </span>
                            </button>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="mt-16 flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ $backCategoryLink }}"
                    class="inline-flex h-12 min-w-65 items-center justify-center bg-[#FCBA59] px-8 text-[#541D23] transition hover:opacity-90">
                    {{ $backCategoryLabel }}
                </a>

                <a href="{{ $backGalleryLink }}"
                    class="inline-flex h-12 min-w-65 items-center justify-center border border-[#FCBA59] px-8 text-[#541D23] transition hover:bg-[#FCBA59]">
                    {{ $backGalleryLabel }}
                </a>
            </div>
        </div>
    </section>
@endsection
