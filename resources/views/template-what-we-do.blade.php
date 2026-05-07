{{--
  Template Name: What We Do
--}}

@extends('layouts.app')

@section('content')
    @php
        $imageUrl = fn($imageId, $size = 'full') => $imageId ? wp_get_attachment_image_url($imageId, $size) : '';

        $serviceHeroImage = get_field('service_hero_image');
        $serviceHeroImageId = is_numeric($serviceHeroImage) ? (int) $serviceHeroImage : null;
        $serviceHeroImageUrl = $serviceHeroImageId
            ? $imageUrl($serviceHeroImageId)
            : get_theme_file_uri('/resources/images/service-1.png');

        $serviceEyebrow = get_field('service_eyebrow') ?: 'What we do';
        $serviceTitle = get_field('service_title') ?: get_the_title();
        $serviceTextLeft = get_field('service_text_left') ?: '';
        $serviceTextRight = get_field('service_text_right') ?: '';
        $serviceGalleryImages = get_field('service_gallery_images') ?: [];
        $serviceGalleryLink = get_field('service_gallery_link') ?: home_url('/gallery');
        $serviceGalleryButtonLabel = get_field('service_gallery_button_label') ?: 'View Gallery';

        if (!$serviceTextLeft && !$serviceTextRight) {
            $defaults = [
                'commercial-projects' => [
                    'text_left' =>
                        'We deliver joinery services for commercial projects, including holiday parks, residential developments, and business premises. Our work includes decking, terraces, timber structures, cladding, and interior installations such as flooring, doors, partition walls, and kitchens.',
                    'text_right' =>
                        'We understand the importance of working to schedule and coordinating with other trades. Our team works efficiently and delivers consistent results, ensuring projects are completed on time and to a high standard.',
                ],
                'timber-construction' => [
                    'text_left' =>
                        'We provide timber construction services for holiday parks, developments, and private projects. Our work includes timber frame structures, wooden ceilings, external features, and structural timber installations.',
                    'text_right' =>
                        'Every project is built with durability, accuracy, and long-term performance in mind. We work closely with clients and contractors to ensure every detail is delivered correctly and on schedule.',
                ],
                'outdoor-joinery-decking' => [
                    'text_left' =>
                        'We design and install outdoor joinery including decking, terraces, pergolas, gazebos, fencing, garden structures, exterior cladding, and outdoor furniture.',
                    'text_right' =>
                        'Our outdoor work is built for demanding environments, with practical material choices and reliable installation methods that help each structure last.',
                ],
                'interior-joinery-finishing' => [
                    'text_left' =>
                        'We carry out interior joinery and finishing work including partition walls, door installation, flooring, skirting boards, wall panels, ceiling panels, kitchens, and general carpentry.',
                    'text_right' =>
                        'Our team focuses on clean finishes, accurate installation, and reliable delivery for both commercial and private interiors.',
                ],
            ];

            $currentSlug = get_post_field('post_name', get_the_ID());
            $fallback = $defaults[$currentSlug] ?? $defaults['commercial-projects'];
            $serviceTextLeft = $fallback['text_left'];
            $serviceTextRight = $fallback['text_right'];
        }
    @endphp

    <main class="bg-white text-[#541D23]">
        <section class="w-full">
            <img src="{{ $serviceHeroImageUrl }}" alt="{{ $serviceTitle }}" class="h-55 md:h-70 lg:h-80 w-full object-cover"
                loading="lazy">
        </section>

        <section class="py-16 md:py-20">
            <div class="md:px-12 lg:px-20 mx-auto px-6">
                <p class="text-xl font-bold uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $serviceEyebrow }}
                </p>

                <h1 class="mt-6 font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $serviceTitle }}
                </h1>

                <div
                    class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 text-[#828282] text-base leading-relaxed">
                    <p>{!! nl2br(e($serviceTextLeft)) !!}</p>
                    <p>{!! nl2br(e($serviceTextRight)) !!}</p>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-3">
            @forelse ($serviceGalleryImages as $item)
                @php
                    $image = $item['image'] ?? null;
                    $imageId = is_numeric($image) ? (int) $image : null;
                @endphp

                @if ($imageId)
                    {!! wp_get_attachment_image($imageId, 'large', false, [
                        'class' => 'h-65 md:h-85 lg:h-97.5 w-full object-cover',
                        'loading' => 'lazy',
                        'sizes' => '(min-width: 768px) 33vw, 100vw',
                    ]) !!}
                @endif
            @empty
                <img src="{{ get_theme_file_uri('/resources/images/service-1-1.png') }}" alt=""
                    class="h-65 md:h-85 lg:h-97.5 w-full object-cover" loading="lazy">
                <img src="{{ get_theme_file_uri('/resources/images/service-1-2.png') }}" alt=""
                    class="h-65 md:h-85 lg:h-97.5 w-full object-cover" loading="lazy">
                <img src="{{ get_theme_file_uri('/resources/images/service-1-3.png') }}" alt=""
                    class="h-65 md:h-85 lg:h-97.5 w-full object-cover" loading="lazy">
            @endforelse
        </section>

        <section class="py-12 md:py-16">
            <div class="md:px-12 lg:px-20 mx-auto px-6">
                <div class="flex justify-center">
                    <a href="{{ $serviceGalleryLink ?: '#' }}"
                        class="inline-flex h-14 w-full max-w-130 items-center justify-center border border-[#FCBA59] text-[#541D23] text-base transition hover:bg-[#FCBA59]">
                        {{ $serviceGalleryButtonLabel }}
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
