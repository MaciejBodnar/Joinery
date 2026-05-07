{{--
  Template Name: FAQ
--}}

@extends('layouts.app')

@section('content')
    @php
        $defaultFaqs = [
            [
                'question' => 'Do you take on large-scale commercial projects?',
                'answer' =>
                    'Yes. We regularly deliver high-volume projects for holiday parks, developers, and commercial contractors.',
            ],
            [
                'question' => 'Can you meet tight project deadlines?',
                'answer' =>
                    'Yes. We plan each project carefully, communicate clearly, and work to agreed timelines so the work can be completed efficiently.',
            ],
            [
                'question' => 'Do you offer design consultancy?',
                'answer' =>
                    'Yes. We can provide practical design input, material advice, and construction guidance to help improve durability, usability, and finish quality.',
            ],
            [
                'question' => 'What materials do you work with?',
                'answer' =>
                    'We work with timber, composite decking, cladding, flooring, interior panels, doors, skirting boards, and other joinery finishing materials.',
            ],
            [
                'question' => 'Who are your typical clients?',
                'answer' =>
                    'Our clients include holiday parks, developers, architects, commercial contractors, hospitality businesses, property managers, and private clients.',
            ],
        ];

        $faqTitle = get_field('faq_title') ?: 'FAQ';
        $faqsInput = get_field('faqs') ?: [];
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

    <section class="bg-white py-24 md:py-32 lg:py-40">
        <div class="max-w-5xl mx-auto px-6 lg:px-10">
            <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-center text-[#541D23]">
                {{ $faqTitle }}
            </h1>

            <div class="mt-14 md:mt-20 space-y-5" data-faq-accordion>
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
@endsection
