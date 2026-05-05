{{--
  Template Name: What We Do
--}}

@extends('layouts.app')

@section('content')
    @php
        $img = fn($file) => asset('images/what-we-do/' . $file)->uri();

        $currentSlug = get_post_field('post_name', get_the_ID());

        $pages = [
            'commercial-projects' => [
                'eyebrow' => 'What we do',
                'title' => 'Commercial Projects',
                'hero' => $img('commercial-projects-hero.jpg'),
                'paragraphs' => [
                    'We deliver joinery services for commercial projects, including holiday parks, residential developments, and business premises. Our work includes decking, terraces, timber structures, cladding, and interior installations such as flooring, doors, partition walls, and kitchens.',
                    'We understand the importance of working to schedule and coordinating with other trades. Our team works efficiently and delivers consistent results, ensuring projects are completed on time and to a high standard.',
                ],
                'gallery' => [
                    $img('commercial-projects-01.jpg'),
                    $img('commercial-projects-02.jpg'),
                    $img('commercial-projects-03.jpg'),
                ],
                'gallery_url' => home_url('/gallery'),
            ],

            'timber-construction' => [
                'eyebrow' => 'What we do',
                'title' => 'Timber Construction',
                'hero' => $img('timber-construction-hero.jpg'),
                'paragraphs' => [
                    'We provide timber construction services for holiday parks, developments, and private projects. Our work includes timber frame structures, wooden ceilings, external features, and structural timber installations.',
                    'Every project is built with durability, accuracy, and long-term performance in mind. We work closely with clients and contractors to ensure every detail is delivered correctly and on schedule.',
                ],
                'gallery' => [
                    $img('timber-construction-01.jpg'),
                    $img('timber-construction-02.jpg'),
                    $img('timber-construction-03.jpg'),
                ],
                'gallery_url' => home_url('/gallery'),
            ],

            'outdoor-joinery-decking' => [
                'eyebrow' => 'What we do',
                'title' => 'Outdoor Joinery & Decking',
                'hero' => $img('outdoor-joinery-hero.jpg'),
                'paragraphs' => [
                    'We design and install outdoor joinery including decking, terraces, pergolas, gazebos, fencing, garden structures, exterior cladding, and outdoor furniture.',
                    'Our outdoor work is built for demanding environments, with practical material choices and reliable installation methods that help each structure last.',
                ],
                'gallery' => [
                    $img('outdoor-joinery-01.jpg'),
                    $img('outdoor-joinery-02.jpg'),
                    $img('outdoor-joinery-03.jpg'),
                ],
                'gallery_url' => home_url('/gallery'),
            ],

            'interior-joinery-finishing' => [
                'eyebrow' => 'What we do',
                'title' => 'Interior Joinery & Finishing',
                'hero' => $img('interior-joinery-hero.jpg'),
                'paragraphs' => [
                    'We carry out interior joinery and finishing work including partition walls, door installation, flooring, skirting boards, wall panels, ceiling panels, kitchens, and general carpentry.',
                    'Our team focuses on clean finishes, accurate installation, and reliable delivery for both commercial and private interiors.',
                ],
                'gallery' => [
                    $img('interior-joinery-01.jpg'),
                    $img('interior-joinery-02.jpg'),
                    $img('interior-joinery-03.jpg'),
                ],
                'gallery_url' => home_url('/gallery'),
            ],
        ];

        $page = $pages[$currentSlug] ?? $pages['commercial-projects'];
    @endphp

    <main class="bg-white text-[#541D23]">

        {{-- Hero image --}}
        <section class="w-full">
            <img src="{{ get_theme_file_uri('/resources/images/' . 'service-1.png') }}" alt=""
                class="h-55 md:h-70 lg:h-80 w-full object-cover">
        </section>

        {{-- Intro content --}}
        <section class="py-16 md:py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <p class="text-sm md:text-base font-bold uppercase tracking-[0.08em] text-[#541D23]">
                    What we do
                </p>

                <h1 class="mt-6 font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                    Commercial Projects
                </h1>

                <div
                    class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 text-neutral-400 text-base md:text-lg leading-relaxed">
                    <p>
                        We deliver joinery services for commercial projects, including holiday parks, residential
                        developments, and business premises. Our work includes decking, terraces, timber structures,
                        cladding, and interior installations such as flooring, doors, partition walls, and kitchens.
                    </p>
                    <p>
                        We understand the importance of working to schedule and coordinating with other trades. Our team
                        works efficiently and delivers consistent results, ensuring projects are completed on time and to a
                        high standard.
                    </p>
                </div>
            </div>
        </section>

        {{-- Image strip --}}
        <section class="grid grid-cols-1 md:grid-cols-3">
            <img src="{{ get_theme_file_uri('/resources/images/' . 'service-1-1.png') }}" alt=""
                class="h-65 md:h-85 lg:h-97.5 w-full object-cover" loading="lazy">
            <img src="{{ get_theme_file_uri('/resources/images/' . 'service-1-2.png') }}" alt=""
                class="h-65 md:h-85 lg:h-97.5 w-full object-cover" loading="lazy">
            <img src="{{ get_theme_file_uri('/resources/images/' . 'service-1-3.png') }}" alt=""
                class="h-65 md:h-85 lg:h-97.5 w-full object-cover" loading="lazy">
        </section>

        {{-- Gallery button --}}
        <section class="py-12 md:py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="flex justify-center">
                    <a href="{{ home_url('/gallery') }}"
                        class="inline-flex h-14 w-full max-w-130 items-center justify-center border border-[#FCBA59] text-[#541D23] text-base transition hover:bg-[#FCBA59]">
                        View Gallery
                    </a>
                </div>
            </div>
        </section>

    </main>
@endsection
