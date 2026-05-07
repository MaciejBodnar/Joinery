{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    @php
        $contactTitle = get_field('contact_title') ?: 'Contact';
        $contactPhone = get_field('contact_phone') ?: '07000 000 000';
        $contactEmail = get_field('contact_email') ?: 'info@yourdomain.com';
        $contactAddress = get_field('contact_address') ?: '123 Street Road, POST CODE';
        $contactSocialLabel = get_field('contact_social_label') ?: 'Find us on';
        $contactFormShortcode = get_field('contact_form_shortcode') ?: '[contact-form-7 id="98d3aa4" title="Contact"]';
        $contactSocialLinks = collect(get_field('header_social_media', 'option') ?: [])
            ->filter(fn($item) => !empty($item['social_icon']) && !empty($item['social_link']))
            ->values();
    @endphp

    <section class="bg-white py-24 md:py-32 lg:py-40">
        <div class="md:px-12 lg:px-20 mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-[360px_1fr] gap-16 lg:gap-28">
                <aside>
                    <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                        {{ $contactTitle }}
                    </h1>

                    <div class="mt-12 space-y-7 text-lg md:text-xl text-[#828282]">
                        @if ($contactPhone)
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactPhone) }}"
                                class="block hover:text-[#541D23] transition">
                                {{ $contactPhone }}
                            </a>
                        @endif

                        @if ($contactEmail)
                            <a href="mailto:{{ $contactEmail }}" class="block hover:text-[#541D23] transition">
                                {{ $contactEmail }}
                            </a>
                        @endif

                        @if ($contactAddress)
                            <p>{!! nl2br(e($contactAddress)) !!}</p>
                        @endif
                    </div>

                    <div class="mt-8 flex items-start gap-7 text-[#828282]">
                        <span class="text-base">{{ $contactSocialLabel }}</span>

                        <div class="flex items-center gap-6 text-[#FCBA59]">
                            @foreach ($contactSocialLinks as $socialLink)
                                <a href="{{ $socialLink['social_link'] }}" aria-label="Social media link"
                                    class="hover:text-[#828282] transition" target="_blank" rel="noreferrer">
                                    {!! $socialLink['social_icon'] !!}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>

                <div class="contact-form-wrap">
                    <div class="ja-contact-form">
                        {!! do_shortcode($contactFormShortcode) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
