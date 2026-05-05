{{--
  Template Name: Front Page
--}}

@extends('layouts.app')

@php
    $img = fn($file) => get_theme_file_uri('/resources/images/front-page/' . $file);

    $services = [
        [
            'title' => 'Commercial Projects',
            'image' => get_theme_file_uri('/resources/images/' . 'front-page-service.png'),
            'items' => ['Restaurant and bar fit-outs', 'Hospitality space finishing and refurbishment'],
        ],
        [
            'title' => 'Timber Construction',
            'image' => get_theme_file_uri('/resources/images/' . 'front-page-service-2.png'),
            'items' => ['Timber frame house construction', 'Wooden ceilings and structural timber work'],
        ],
        [
            'title' => 'Outdoor Joinery & Decking',
            'image' => get_theme_file_uri('/resources/images/' . 'front-page-service-3.png'),
            'items' => [
                'Decking installation',
                'Wooden and composite terraces',
                'Pergolas, gazebos and garden structures',
                'Garden furniture',
                'Fencing',
                'Exterior cladding facade finishes',
            ],
        ],
        [
            'title' => 'Interior Joinery & Finishing',
            'image' => get_theme_file_uri('/resources/images/' . 'front-page-service-4.png'),
            'items' => [
                'Interior partition walls stud walls',
                'Door installation',
                'Flooring installation',
                'Skirting boards',
                'Wall, floor and ceiling panels',
                'Kitchen fitting and installation',
                'General carpentry and finishing work',
            ],
        ],
    ];

    $reviews = [
        [
            'quote' =>
                'Exceptional quality and attention to detail. The team delivered on time and the finish is flawless.',
            'name' => 'James',
            'location' => 'Dorset',
        ],
        [
            'quote' => 'Professional, reliable, and easy to work with. The results exceeded our expectations.',
            'name' => 'Sarah',
            'location' => 'London',
        ],
        [
            'quote' => 'Great communication and high-quality workmanship throughout the project.',
            'name' => 'Mark',
            'location' => 'Surrey',
        ],
    ];

    $faqs = [
        [
            'question' => 'Do you take on large-scale commercial projects?',
            'answer' =>
                'Yes. We regularly deliver high-volume projects for holiday parks, developers, and commercial contractors.',
        ],
        [
            'question' => 'Can you meet tight project deadlines?',
            'answer' =>
                'Yes. We plan every project carefully and work to clear timelines to help keep your site schedule on track.',
        ],
        [
            'question' => 'Do you offer design consultancy?',
            'answer' =>
                'Yes. We can advise on materials, structure, finishes, practical details, and long-term durability.',
        ],
        [
            'question' => 'What materials do you work with?',
            'answer' =>
                'We work with timber, composite decking, interior panels, flooring, cladding, and a range of finishing materials.',
        ],
        [
            'question' => 'Who are your typical clients?',
            'answer' =>
                'Our clients include holiday parks, developers, hospitality businesses, commercial contractors, and private clients.',
        ],
    ];
@endphp

@section('content')
    <main class="bg-white text-[#541D23]">

        {{-- Hero --}}
        <section class="relative min-h-130 md:min-h-155 flex items-center justify-center bg-cover bg-center"
            style="background-image: url('{{ get_theme_file_uri('/resources/images/' . 'front-page-bg-image.png') }}');">
            <div class="absolute inset-0 bg-black/55"></div>

            <div class="relative z-10 max-w-5xl mx-auto px-6 text-center text-white">
                <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl uppercase tracking-[0.08em] leading-tight">
                    Premium Joinery<br>
                    Built for Holiday Parks
                </h1>

                <p class="mt-7 max-w-3xl mx-auto text-sm md:text-base text-white/80 leading-relaxed">
                    Premium joinery for holiday parks and commercial projects. Durable decking,
                    timber structures, and interior finishes built to last. Delivered on time,
                    with precision and reliability.
                </p>
            </div>
        </section>


        {{-- Services --}}
        <section class="py-16 md:py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-12">

                    @foreach ($services as $service)
                        <article>
                            <div class="aspect-16/6 md:aspect-16/5.5 overflow-hidden">
                                <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}"
                                    class="w-full h-full object-cover" loading="lazy">
                            </div>

                            <div class="mt-8 grid grid-cols-1 md:grid-cols-[190px_1fr] gap-5 md:gap-8">
                                <h2 class="text-[#541D23] uppercase font-bold tracking-[0.06em] leading-snug text-lg">
                                    {!! str_replace(' & ', '<br>& ', e($service['title'])) !!}
                                </h2>

                                <ul class="space-y-2 text-sm text-neutral-500">
                                    @foreach ($service['items'] as $item)
                                        <li class="flex gap-3">
                                            <span class="text-[#FCBA59] font-bold">✓</span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <a href="#"
                                    class="inline-flex items-center justify-center h-12 bg-[#FCBA59] text-[#541D23] text-sm font-medium hover:opacity-90 transition">
                                    Read more
                                </a>

                                <a href="#"
                                    class="inline-flex items-center justify-center h-12 border border-[#FCBA59] text-[#541D23] text-sm font-medium hover:bg-[#FCBA59] transition">
                                    View Gallery
                                </a>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </section>


        {{-- About --}}
        <section class="grid grid-cols-1 lg:grid-cols-2 bg-[#EFEAE8]">
            <div class="min-h-105 md:min-h-140">
                <img src="{{ get_theme_file_uri('/resources/images/' . 'front-page-about.png') }}"
                    alt="Joinery table detail" class="w-full h-full object-cover" loading="lazy">
            </div>

            <div class="flex items-center">
                <div class="max-w-md mx-auto px-6 py-20 lg:py-24">
                    <h2 class="font-serif text-4xl md:text-5xl uppercase tracking-[0.08em] text-[#541D23]">
                        About Us
                    </h2>

                    <p class="mt-6 text-sm md:text-base leading-relaxed text-neutral-500">
                        At Joinery Atelier, we provide high-quality carpentry for holiday parks,
                        developers, and private clients. From large-scale decking to bespoke
                        interior installations, every project is delivered with precision and
                        reliability. We focus on practical solutions and strict timelines. Our team
                        also offers expert consultancy to refine designs, ensuring every structure
                        is durable, functional, and built to a high standard.
                    </p>

                    <a href="#"
                        class="mt-8 inline-flex items-center justify-center h-12 px-14 bg-[#FCBA59] text-[#541D23] text-sm font-medium hover:opacity-90 transition">
                        Read more
                    </a>
                </div>
            </div>
        </section>
        {{-- Reviews --}}
        <section class="bg-[#541D23] py-16 md:py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <h2 class="font-serif text-4xl md:text-5xl uppercase tracking-[0.08em] text-[#FCBA59]">
                    Reviews
                </h2>

                <div class="mt-9 grid grid-cols-1 md:grid-cols-3 gap-7">
                    @foreach ($reviews as $review)
                        <article class="border border-white/10 px-10 py-9 min-h-37.5">
                            <p class="text-white text-sm md:text-base leading-relaxed">
                                “{{ $review['quote'] }}”
                            </p>

                            <p class="mt-6 text-sm text-white">
                                <span class="text-[#FCBA59]">{{ $review['name'] }}</span>
                                <span class="text-white/60"> | </span>
                                <span>{{ $review['location'] }}</span>
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>


        {{-- Durability Banner --}}
        <section class="relative min-h-105 md:min-h-140 flex items-center justify-center bg-cover bg-center"
            style="background-image: url('{{ get_theme_file_uri('/resources/images/' . 'front-page-bg-image-2.png') }}');">
            <div class="absolute inset-0 bg-black/55"></div>

            <div class="relative z-10 max-w-4xl mx-auto px-6 text-center text-white">
                <h2 class="font-serif text-4xl md:text-6xl lg:text-7xl uppercase tracking-[0.08em] leading-tight">
                    Designed<br>
                    For Durability.
                </h2>

                <p class="mt-7 text-sm md:text-base text-white/80">
                    Built for durability. Designed for demanding environments.
                </p>
            </div>
        </section>


        {{-- FAQ --}}
        <section class="bg-white py-20 md:py-24">
            <div class="max-w-4xl mx-auto px-6">
                <h2 class="font-serif text-4xl md:text-5xl uppercase tracking-[0.08em] text-center text-[#541D23]">
                    FAQ
                </h2>

                <div class="mt-12 space-y-4" data-faq-accordion>
                    @foreach ($faqs as $faq)
                        <div class="border border-neutral-200 bg-white" data-faq-item>
                            <button type="button"
                                class="w-full flex items-center justify-between gap-6 px-7 py-5 text-left text-sm md:text-base text-neutral-900"
                                data-faq-button aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                <span>{{ $faq['question'] }}</span>

                                <span
                                    class="text-[#FCBA59] text-xl leading-none transition-transform duration-300 {{ $loop->first ? 'rotate-45' : '' }}"
                                    data-faq-icon aria-hidden="true">
                                    +
                                </span>
                            </button>

                            <div class="{{ $loop->first ? '' : 'hidden' }} px-7 pb-6" data-faq-panel>
                                <p class="max-w-2xl text-sm md:text-base leading-relaxed text-neutral-500">
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
