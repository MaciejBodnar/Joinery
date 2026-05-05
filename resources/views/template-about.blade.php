{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
    @php
        $img = fn($file) => asset('images/about/' . $file)->uri();

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
    @endphp

    {{-- About intro --}}
    <section class="bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center">
                <div class="max-w-2xl px-6 py-16 md:px-12 lg:px-20 lg:py-24">
                    <p class="text-sm md:text-base font-bold uppercase tracking-[0.08em] text-[#541D23]">
                        Learn More
                    </p>

                    <h1 class="mt-6 font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                        About Us
                    </h1>

                    <div class="mt-9 space-y-7 text-base md:text-lg leading-relaxed text-neutral-400">
                        <p>
                            At Joinery Atelier, we provide high-quality carpentry for holiday parks,
                            developers, architects, businesses, property managers, and private clients.
                            From large-scale decking to bespoke interior installations, every project is
                            delivered with precision and reliability. We focus on practical solutions and
                            strict timelines. Our team also offers expert consultancy to refine designs,
                            ensuring every structure is durable, functional, and built to a high standard.
                        </p>

                        <p>
                            We take a straightforward, professional approach to every project. Whether
                            working on a commercial site or a private property, we focus on clear
                            communication, well-organised work, and consistent results. Alongside
                            installation, we provide practical input to help improve designs where needed,
                            ensuring everything is built properly and performs over time.
                        </p>
                    </div>
                </div>
            </div>

            <div class="min-h-90 md:min-h-130 lg:min-h-152.5">
                <img src="{{ get_theme_file_uri('/resources/images/' . 'about.png') }}"
                    alt="Joinery material samples and consultation" class="h-full w-full object-cover">
            </div>
        </div>
    </section>


    {{-- Reviews --}}
    <section class="bg-[#EFEAE8] py-16 md:py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                Reviews
            </h2>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach ($reviews as $review)
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
@endsection
