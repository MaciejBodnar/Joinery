<footer class="bg-white text-neutral-400">
    @php
        $footerLogo = asset('images/joinery-footer-logo.svg')->uri();

        $services = [
            [
                'label' => 'Commercial Projects',
                'url' => home_url('/commercial-projects'),
            ],
            [
                'label' => 'Timber Construction',
                'url' => home_url('/timber-construction'),
            ],
            [
                'label' => 'Outdoor Joinery & Decking',
                'url' => home_url('/outdoor-joinery-decking'),
            ],
            [
                'label' => 'Interior Joinery & Finishing',
                'url' => home_url('/interior-joinery-finishing'),
            ],
        ];
    @endphp

    {{-- Callback bar --}}
    <section class="bg-[#541D23] py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <form action="#" method="post"
                class="grid grid-cols-1 lg:grid-cols-[1fr_420px_260px] items-center gap-8 lg:gap-10">
                <h2 class="font-serif text-4xl md:text-6xl lg:text-7xl uppercase tracking-[0.08em] text-[#FCBA59]">
                    Leave Your Number
                </h2>

                <label class="sr-only" for="callback-phone">
                    Phone number
                </label>

                <input id="callback-phone" name="callback_phone" type="tel" placeholder="07000 000 000"
                    class="h-16 w-full border border-white/15 bg-transparent px-8 text-xl text-white placeholder:text-white/90 outline-none transition focus:border-[#FCBA59]">

                <button type="submit"
                    class="h-16 bg-[#FCBA59] px-8 text-xl text-[#541D23] transition hover:opacity-90">
                    Request a call back
                </button>
            </form>
        </div>
    </section>

    {{-- Main footer --}}
    <section class="py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-[1.2fr_1.15fr_1fr] lg:gap-20 items-start">

                {{-- Logo / legal --}}
                <div class="grid grid-cols-1 sm:grid-cols-[180px_1fr] gap-10 items-center">
                    <a href="{{ home_url('/') }}" aria-label="{{ get_bloginfo('name') }} home">
                        <img src="{{ get_theme_file_uri('resources/images/logo.svg') }}"
                            alt="{{ get_bloginfo('name') }}" class="w-37.5 md:w-42.5 h-auto">
                    </a>

                    <div class="space-y-7 text-xl">
                        <a href="{{ home_url('/privacy-policy') }}" class="hover:text-[#541D23] transition">
                            Privacy Policy
                        </a>

                        <p>
                            {{ date('Y') }} Joinery Atelier Ltd - D&C with
                            <span class="text-[#FCBA59]">♥</span>
                            SLT Media
                        </p>
                    </div>
                </div>

                {{-- Services --}}
                <nav class="space-y-7 text-xl" aria-label="Footer services">
                    @foreach ($services as $service)
                        <a href="{{ $service['url'] }}" class="block hover:text-[#541D23] transition">
                            {{ $service['label'] }}
                        </a>
                    @endforeach
                </nav>

                {{-- Contact --}}
                <div class="space-y-7 text-xl">
                    <a href="tel:07000000000" class="block hover:text-[#541D23] transition">
                        07000 000 000
                    </a>

                    <a href="mailto:info@yourdomain.com" class="block hover:text-[#541D23] transition">
                        info@yourdomain.com
                    </a>

                    <p>
                        123 Street Road, POST CODE
                    </p>

                    <div class="flex items-center gap-6 pt-2 text-[#FCBA59]">
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

            </div>
        </div>
    </section>
</footer>
