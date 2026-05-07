{{--
  Template Name: Privacy Policy
--}}

@extends('layouts.app')

@section('content')
    @php
        $eyebrow = get_field('privacy_eyebrow') ?: 'Legal';
        $title = get_field('privacy_title') ?: get_the_title();
        $content = get_field('privacy_content') ?: '';
    @endphp

    <section class="bg-white py-20 md:py-28 lg:py-32">
        <div class="max-w-4xl mx-auto px-6 lg:px-10">
            <div class="text-center">
                @if ($eyebrow)
                    <p class="text-sm md:text-base font-bold uppercase tracking-[0.08em] text-[#541D23]">
                        {{ $eyebrow }}
                    </p>
                @endif

                <h1 class="mt-4 font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                    {{ $title }}
                </h1>
            </div>

            @if ($content)
                <div class="ja-privacy-content mt-14 md:mt-20">
                    {!! wp_kses_post($content) !!}
                </div>
            @endif
        </div>
    </section>
@endsection
