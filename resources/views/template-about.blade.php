{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
    @php
        $imageUrl = fn($imageId, $size = 'full') => $imageId ? wp_get_attachment_image_url($imageId, $size) : '';

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
            [
                'quote' =>
                    'Exceptional quality and attention to detail. The team delivered on time and the finish is excellent. A pleasure to work with.',
                'name' => 'John',
                'location' => 'Somerset',
            ],
            [
                'quote' =>
                    'Professional, reliable, and easy to work with. They handled our holiday park installation efficiently and met every deadline.',
                'name' => 'Francis',
                'location' => 'Devon',
            ],
            [
                'quote' =>
                    'The quality of the timber work is excellent. Also provided useful advice during the design stage, which saved us time and cost.',
                'name' => 'Kaitlyn',
                'location' => 'Dorset',
            ],
        ];

        $aboutEyebrow = get_field('about_eyebrow') ?: 'Learn More';
        $aboutTitle = get_field('about_title') ?: 'About Us';
        $aboutContent =
            get_field('about_content') ?:
            'At Joinery Atelier, we provide high-quality carpentry for holiday parks, developers, architects, businesses, property managers, and private clients. From large-scale decking to bespoke interior installations, every project is delivered with precision and reliability. We focus on practical solutions and strict timelines. Our team also offers expert consultancy to refine designs, ensuring every structure is durable, functional, and built to a high standard.';
        $aboutImage = get_field('about_image');
        $aboutImageId = is_numeric($aboutImage) ? (int) $aboutImage : null;
        $aboutImageUrl = $aboutImageId ? $imageUrl($aboutImageId) : get_theme_file_uri('/resources/images/about.png');

        $reviewsTitle = get_field('reviews_title') ?: 'Reviews';
        $aboutReviewsInput = get_field('about_reviews') ?: [];
        $aboutReviews = collect($aboutReviewsInput)
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

        if (!$aboutReviews) {
            $aboutReviews = $defaultReviews;
        }
    @endphp

    <main class="bg-white text-[#541D23]">
        <section class="bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="order-1 flex items-center">
                    <div class="max-w-2xl px-6 py-16 md:px-12 lg:px-20 lg:py-24">
                        <p class="text-sm md:text-base font-bold uppercase tracking-[0.08em] text-[#541D23]">
                            {{ $aboutEyebrow }}
                        </p>

                        <h1
                            class="mt-6 font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                            {{ $aboutTitle }}
                        </h1>

                        <div class="mt-9 space-y-7 text-base md:text-lg leading-relaxed text-neutral-400">
                            {!! wp_kses_post($aboutContent) !!}
                        </div>
                    </div>
                </div>

                <div class="order-2 min-h-90 md:min-h-130 lg:min-h-152.5">
                    @if ($aboutImageId)
                        {!! wp_get_attachment_image($aboutImageId, 'full', false, [
                            'class' => 'h-full w-full object-cover',
                            'loading' => 'lazy',
                        ]) !!}
                    @else
                        <img src="{{ $aboutImageUrl }}" alt="Joinery material samples and consultation"
                            class="h-full w-full object-cover" loading="lazy">
                    @endif
                </div>
            </div>
        </section>

        <section class="bg-[#EFEAE8] py-16 md:py-20 lg:py-24">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $reviewsTitle }}
                </h2>

                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                    @foreach ($aboutReviews as $review)
                        <article class="border border-neutral-200 bg-white/30 px-8 md:px-12 py-9 md:py-11 min-h-42.5">
                            <p class="text-base md:text-lg leading-relaxed text-neutral-400">
                                “{{ $review['quote'] }}”
                            </p>

                            <p class="mt-7 text-base md:text-lg text-neutral-400">
                                <span class="text-[#FCBA59]">{{ $review['name'] }}</span>
                                <span class="text-neutral-300"> | </span>
                                <span>{{ $review['location'] }}</span>
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
