{{--
  Template Name: Front Page
--}}

@extends('layouts.app')

@section('content')
    @php
        $imageUrl = fn($imageId, $size = 'full') => $imageId ? wp_get_attachment_image_url($imageId, $size) : '';

        $heroTitleFallback = "Premium Joinery\nBuilt for Holiday Parks";
        $heroTextFallback =
            'Premium joinery for holiday parks and commercial projects. Durable decking, timber structures, and interior finishes built to last. Delivered on time, with precision and reliability.';

        $defaultServices = [
            [
                'title' => 'Commercial Projects',
                'image' => get_theme_file_uri('/resources/images/front-page-service.png'),
                'items' => ['Restaurant and bar fit-outs', 'Hospitality space finishing and refurbishment'],
                'read_more_link' => '#',
                'gallery_link' => '#',
            ],
            [
                'title' => 'Timber Construction',
                'image' => get_theme_file_uri('/resources/images/front-page-service-2.png'),
                'items' => ['Timber frame house construction', 'Wooden ceilings and structural timber work'],
                'read_more_link' => '#',
                'gallery_link' => '#',
            ],
            [
                'title' => 'Outdoor Joinery & Decking',
                'image' => get_theme_file_uri('/resources/images/front-page-service-3.png'),
                'items' => [
                    'Decking installation',
                    'Wooden and composite terraces',
                    'Pergolas, gazebos and garden structures',
                    'Garden furniture',
                    'Fencing',
                    'Exterior cladding facade finishes',
                ],
                'read_more_link' => '#',
                'gallery_link' => '#',
            ],
            [
                'title' => 'Interior Joinery & Finishing',
                'image' => get_theme_file_uri('/resources/images/front-page-service-4.png'),
                'items' => [
                    'Interior partition walls stud walls',
                    'Door installation',
                    'Flooring installation',
                    'Skirting boards',
                    'Wall, floor and ceiling panels',
                    'Kitchen fitting and installation',
                    'General carpentry and finishing work',
                ],
                'read_more_link' => '#',
                'gallery_link' => '#',
            ],
        ];

        $defaultReviews = [
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

        $defaultFaqs = [
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

        $heroImage = get_field('hero_image');
        $heroImageUrl = $imageUrl($heroImage) ?: get_theme_file_uri('/resources/images/front-page-bg-image.png');
        $heroTitle = get_field('hero_title') ?: $heroTitleFallback;
        $heroText = get_field('hero_text') ?: $heroTextFallback;

        $servicesInput = get_field('front_services') ?: [];
        $servicesRightButtonLabel = get_field('services_button_label') ?: 'View Gallery';
        $servicesLeftButtonLabel = get_field('services_left_button_label') ?: 'Read more';
        $services = collect($servicesInput)
            ->map(function ($service, $index) use ($defaultServices, $imageUrl) {
                $defaults = $defaultServices[$index] ?? [
                    'title' => '',
                    'image' => '',
                    'items' => [],
                    'read_more_link' => '#',
                    'gallery_link' => '#',
                ];

                $serviceImage = $service['service_image'] ?? null;
                $serviceImageId = is_numeric($serviceImage) ? (int) $serviceImage : null;
                $serviceFeatures = collect($service['service_features'] ?? [])
                    ->pluck('feature_text')
                    ->filter()
                    ->values()
                    ->all();

                return [
                    'title' => $service['service_title'] ?? $defaults['title'],
                    'image_id' => $serviceImageId,
                    'image_url' => $serviceImageId ? $imageUrl($serviceImageId, 'large') : $defaults['image'] ?? '',
                    'items' => $serviceFeatures ?: $defaults['items'],
                    'read_more_link' => $service['service_read_more_link'] ?? $defaults['read_more_link'],
                    'gallery_link' => $service['service_gallery_link'] ?? $defaults['gallery_link'],
                ];
            })
            ->values()
            ->all();

        if (!$services) {
            $services = collect($defaultServices)
                ->map(function ($service) use ($imageUrl) {
                    $serviceImage = $service['image'] ?? '';

                    return [
                        'title' => $service['title'],
                        'image_id' => null,
                        'image_url' => $serviceImage,
                        'items' => $service['items'],
                        'read_more_link' => $service['read_more_link'],
                        'gallery_link' => $service['gallery_link'],
                    ];
                })
                ->all();
        }

        $aboutImage = get_field('about_image');
        $aboutImageId = is_numeric($aboutImage) ? (int) $aboutImage : null;
        $aboutImageUrl = $aboutImageId
            ? $imageUrl($aboutImageId)
            : get_theme_file_uri('/resources/images/front-page-about.png');
        $aboutTitle = get_field('about_title') ?: 'About Us';
        $aboutText =
            get_field('about_text') ?:
            'At Joinery Atelier, we provide high-quality carpentry for holiday parks, developers, and private clients. From large-scale decking to bespoke interior installations, every project is delivered with precision and reliability. We focus on practical solutions and strict timelines. Our team also offers expert consultancy to refine designs, ensuring every structure is durable, functional, and built to a high standard.';
        $aboutLink = get_field('about_link') ?: '#';
        $aboutButtonLabel = get_field('about_button_label') ?: 'Read more';

        $reviewsTitle = get_field('reviews_title') ?: 'Reviews';
        $reviewsInput = get_field('front_reviews') ?: [];
        $reviews = collect($reviewsInput)
            ->map(function ($review) {
                return [
                    'quote' => $review['review_text'] ?? '',
                    'name' => $review['review_name'] ?? '',
                    'location' => $review['review_location'] ?? '',
                ];
            })
            ->filter(function ($review) {
                return $review['quote'] || $review['name'] || $review['location'];
            })
            ->values()
            ->all();

        if (!$reviews) {
            $reviews = $defaultReviews;
        }

        $durabilityImage = get_field('durability_image');
        $durabilityImageId = is_numeric($durabilityImage) ? (int) $durabilityImage : null;
        $durabilityImageUrl = $durabilityImageId
            ? $imageUrl($durabilityImageId)
            : get_theme_file_uri('/resources/images/front-page-bg-image-2.png');
        $durabilityTitle = get_field('durability_title') ?: "Designed\nFor Durability.";
        $durabilityText = get_field('durability_text') ?: 'Built for durability. Designed for demanding environments.';

        $faqTitle = get_field('faq_title') ?: 'FAQ';
        $faqsInput = get_field('front_faqs') ?: [];
        $faqs = collect($faqsInput)
            ->map(function ($faq) {
                return [
                    'question' => $faq['question'] ?? '',
                    'answer' => $faq['answer'] ?? '',
                ];
            })
            ->filter(function ($faq) {
                return $faq['question'] || $faq['answer'];
            })
            ->values()
            ->all();

        if (!$faqs) {
            $faqs = $defaultFaqs;
        }
    @endphp

    <main class="bg-white text-[#541D23]">
        {{-- Hero --}}
        <section class="relative min-h-130 md:min-h-180 flex items-center justify-center bg-cover bg-center"
            style="background-image: url('{{ $heroImageUrl }}');">
            <div class="absolute inset-0 bg-black/55"></div>

            <div class="relative z-10 max-w-5xl mx-auto px-6 text-center text-white">
                <h1 class="font-serif text-4xl md:text-6xl uppercase tracking-tight leading-tight">
                    {!! nl2br(e($heroTitle)) !!}
                </h1>

                <p class="mt-7 max-w-3xl mx-auto text-sm md:text-base text-white/80 leading-relaxed">
                    {!! nl2br(e($heroText)) !!}
                </p>
            </div>
        </section>

        {{-- Services --}}
        <section class="py-16 md:py-20 bg-white">
            <div class="md:px-12 lg:px-20 mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-12">
                    @foreach ($services as $service)
                        <article class="flex flex-col h-full">
                            <div class="aspect-16/6 md:aspect-16/5.5 overflow-hidden">
                                @if (!empty($service['image_id']))
                                    {!! wp_get_attachment_image($service['image_id'], 'large', false, [
                                        'class' => 'w-full h-full object-cover',
                                        'loading' => 'lazy',
                                        'sizes' => '(min-width: 1024px) 50vw, 100vw',
                                    ]) !!}
                                @else
                                    <img src="{{ $service['image_url'] }}" alt="{{ $service['title'] }}"
                                        class="w-full h-full object-cover" loading="lazy">
                                @endif
                            </div>
                            <div class="mt-8 flex flex-col gap-8 justify-between flex-1">
                                <div class="grid grid-cols-1 md:grid-cols-[190px_1fr] gap-5 md:gap-8">
                                    <h3
                                        class="text-[#541D23] font-extrabold uppercase tracking-[0.06em] leading-snug text-xl">
                                        {!! str_replace(' & ', '<br>& ', e($service['title'])) !!}
                                    </h3>

                                    <ul class="space-y-2 text-sm text-neutral-500">
                                        @foreach ($service['items'] as $item)
                                            <li class="flex gap-3">
                                                <span class="text-[#FCBA59] font-bold">✓</span>
                                                <span class="text-[16px]">{{ $item }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <a href="{{ $service['read_more_link'] ?: '#' }}"
                                        class="inline-flex items-center justify-center h-12 bg-[#FCBA59] text-[#541D23] text-[16px] font-medium hover:opacity-90 transition rounded-sm">
                                        {{ $servicesRightButtonLabel }}
                                    </a>

                                    <a href="{{ $service['gallery_link'] ?: '#' }}"
                                        class="inline-flex items-center justify-center h-12 border-2 border-[#FCBA59] text-[#541D23] text-[16px] font-medium hover:bg-[#FCBA59] transition rounded-sm ">
                                        {{ $servicesLeftButtonLabel }}
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- About --}}
        <section class="grid grid-cols-1 lg:grid-cols-2 bg-[#EFEAE8]">
            <div class="min-h-105 md:min-h-140">
                @if ($aboutImageId)
                    {!! wp_get_attachment_image($aboutImageId, 'full', false, [
                        'class' => 'w-full h-full object-cover',
                        'loading' => 'lazy',
                    ]) !!}
                @else
                    <img src="{{ $aboutImageUrl }}" alt="Joinery table detail" class="w-full h-full object-cover"
                        loading="lazy">
                @endif
            </div>

            <div class="flex items-center">
                <div class="max-w-xl mx-auto px-6 py-20 lg:py-24">
                    <h2 class="font-serif text-4xl md:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                        {{ $aboutTitle }}
                    </h2>

                    <p class="mt-6 text-[16px] md:text-base leading-relaxed text-neutral-500">
                        {!! nl2br(e($aboutText)) !!}
                    </p>

                    <a href="{{ $aboutLink ?: '#' }}"
                        class="mt-8 inline-flex items-center justify-center h-12 px-14 bg-[#FCBA59] text-[#541D23] text-[16px] font-medium hover:opacity-90 transition rounded-sm">
                        {{ $aboutButtonLabel }}
                    </a>
                </div>
            </div>
        </section>

        {{-- Reviews --}}
        <section class="bg-[#541D23] py-16 md:py-20">
            <div class="md:px-12 lg:px-20 mx-auto px-6">
                <h2 class="font-serif text-4xl md:text-6xl uppercase tracking-[0.08em] text-[#FCBA59]">
                    {{ $reviewsTitle }}
                </h2>

                <div class="mt-9 grid grid-cols-1 md:grid-cols-3 gap-7">
                    @foreach ($reviews as $review)
                        <article class="border border-white/10 px-10 py-9 min-h-37.5 rounded-sm">
                            <p class="text-white text-[16px] md:text-base leading-relaxed">
                                “{{ $review['quote'] }}”
                            </p>

                            <p class="mt-6 text-[16px] text-white">
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
        <section class="relative min-h-105 md:min-h-180 flex items-center justify-center bg-cover bg-center"
            style="background-image: url('{{ $durabilityImageUrl }}');">
            <div class="absolute inset-0 bg-black/55"></div>

            <div class="relative z-10 max-w-4xl mx-auto px-6 text-center text-white">
                <h2 class="font-serif text-4xl md:text-6xl lg:text-7xl uppercase tracking-[0.08em] leading-tight">
                    {!! nl2br(e($durabilityTitle)) !!}
                </h2>

                <p class="mt-7 text-[16px] md:text-base text-white/80">
                    {!! nl2br(e($durabilityText)) !!}
                </p>
            </div>
        </section>

        {{-- FAQ --}}
        <section class="bg-white py-20 md:py-24">
            <div class="max-w-4xl mx-auto px-6">
                <h2 class="font-serif text-4xl md:text-6xl uppercase tracking-[0.08em] text-center text-[#541D23]">
                    {{ $faqTitle }}
                </h2>

                <div class="mt-12 space-y-4" data-faq-accordion>
                    @foreach ($faqs as $faq)
                        <article class="border border-neutral-200 bg-white transition rounded-sm" data-faq-item>
                            <button type="button"
                                class="w-full flex items-center justify-between gap-6 px-8 md:px-12 py-6 text-left text-base md:text-lg text-neutral-900"
                                data-faq-button aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                <span>{{ $faq['question'] }}</span>

                                <span
                                    class="text-[#FCBA59] text-2xl leading-none transition-transform duration-300 {{ $loop->first ? 'rotate-45' : '' }}"
                                    data-faq-icon aria-hidden="true">
                                    +
                                </span>
                            </button>

                            <div class="{{ $loop->first ? '' : 'hidden' }} px-8 md:px-12 pb-8" data-faq-panel>
                                <p class="max-w-3xl md:pl-8 text-base md:text-lg leading-relaxed text-[#828282]">
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
