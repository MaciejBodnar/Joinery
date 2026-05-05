{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    <section class="bg-white py-24 md:py-32 lg:py-40">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-[360px_1fr] gap-16 lg:gap-28">

                {{-- Contact details --}}
                <aside>
                    <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl uppercase tracking-[0.08em] text-[#541D23]">
                        Contact
                    </h1>

                    <div class="mt-12 space-y-7 text-lg md:text-xl text-neutral-400">
                        <a href="tel:07000000000" class="block hover:text-[#541D23] transition">
                            07000 000 000
                        </a>

                        <a href="mailto:info@yourdomain.com" class="block hover:text-[#541D23] transition">
                            info@yourdomain.com
                        </a>

                        <p>
                            123 Street Road, POST CODE
                        </p>
                    </div>

                    <div class="mt-8 flex items-center gap-7 text-neutral-400">
                        <span class="text-base">Find us on</span>

                        <div class="flex items-center gap-6 text-[#FCBA59]">
                            <a href="#" aria-label="Facebook" class="hover:text-[#541D23] transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M14 8.5V6.25C14 5.56 14.56 5 15.25 5H17V2h-2.5A4.5 4.5 0 0 0 10 6.5v2H7v3h3V22h4V11.5h3l.5-3H14Z" />
                                </svg>
                            </a>

                            <a href="#" aria-label="Instagram" class="hover:text-[#541D23] transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <circle cx="17.5" cy="6.5" r="1"></circle>
                                </svg>
                            </a>

                            <a href="#" aria-label="TikTok" class="hover:text-[#541D23] transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M16.6 5.8a5.5 5.5 0 0 0 3.4 1.1v3.4a8.7 8.7 0 0 1-3.5-.8v6.2a6.3 6.3 0 1 1-6.3-6.3c.4 0 .8 0 1.2.1V13a3 3 0 1 0 2.1 2.9V2h3.1c.2 1.5.9 2.8 2 3.8Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </aside>

                {{-- CF7 form --}}
                <div class="contact-form-wrap">
                    {!! do_shortcode('[contact-form-7 id="123" title="Contact form"]') !!}
                </div>

            </div>
        </div>
    </section>
@endsection
