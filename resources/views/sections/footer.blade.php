<footer class="bg-white text-neutral-400">
    @php
        $option = fn($key, $default = null) => get_field($key, 'option') ?: $default;

        $footerLogoId = $option('footer_logo');
        $footerLogoUrl = $footerLogoId
            ? wp_get_attachment_image_url($footerLogoId, 'full')
            : get_theme_file_uri('resources/images/joinery-footer-logo.svg');

        $footerCallbackTitle = $option('footer_callback_title', 'Leave Your Number');
        $footerCallbackPlaceholder = $option('footer_callback_placeholder', '07000 000 000');
        $footerCallbackButtonLabel = $option('footer_callback_button_label', 'Request a call back');
        $footerCallbackShortcode = $option('footer_callback_form_shortcode');

        $footerPrivacyLink = $option('footer_privacy_link') ?: home_url('/privacy-policy');
        $footerPrivacyLabel = $option('footer_privacy_label', 'Privacy Policy');
        $footerCopyrightText =
            $option('footer_copyright_text') ?: date('Y') . ' Joinery Atelier Ltd - D&C with ♥ SLT Media';

        $footerLinks = collect(
            get_field('footer_links', 'option') ?: [
                ['item_label' => 'Commercial Projects', 'item_link' => home_url('/commercial-projects')],
                ['item_label' => 'Timber Construction', 'item_link' => home_url('/timber-construction')],
                ['item_label' => 'Outdoor Joinery & Decking', 'item_link' => home_url('/outdoor-joinery-decking')],
                [
                    'item_label' => 'Interior Joinery & Finishing',
                    'item_link' => home_url('/interior-joinery-finishing'),
                ],
            ],
        )
            ->map(function ($item) {
                return [
                    'label' => $item['item_label'] ?? '',
                    'url' => $item['item_link'] ?? '#',
                ];
            })
            ->filter(fn($item) => $item['label'])
            ->values();

        $footerPhone = $option('footer_phone', '07000 000 000');
        $footerPhoneLink = $option('footer_phone_link') ?: 'tel:' . preg_replace('/[^0-9+]/', '', $footerPhone);
        $footerEmail = $option('footer_email', 'info@yourdomain.com');
        $footerAddress = $option('footer_address', '123 Street Road, POST CODE');

        $footerFacebookUrl = $option('footer_facebook_url');
        $footerInstagramUrl = $option('footer_instagram_url');
        $footerTiktokUrl = $option('footer_tiktok_url');
    @endphp

    <section class="bg-[#541D23] py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            @if ($footerCallbackShortcode)
                <div class="footer-callback-form">
                    {!! do_shortcode($footerCallbackShortcode) !!}
                </div>
            @else
                <form action="#" method="post"
                    class="grid grid-cols-1 lg:grid-cols-[1fr_420px_260px] items-center gap-8 lg:gap-10">
                    <h2 class="font-serif text-4xl md:text-6xl lg:text-7xl uppercase tracking-[0.08em] text-[#FCBA59]">
                        {{ $footerCallbackTitle }}
                    </h2>

                    <label class="sr-only" for="callback-phone">
                        Phone number
                    </label>

                    <input id="callback-phone" name="callback_phone" type="tel"
                        placeholder="{{ $footerCallbackPlaceholder }}"
                        class="h-16 w-full border border-white/15 bg-transparent px-8 text-xl text-white placeholder:text-white/90 outline-none transition focus:border-[#FCBA59]">

                    <button type="submit"
                        class="h-16 bg-[#FCBA59] px-8 text-xl text-[#541D23] transition hover:opacity-90">
                        {{ $footerCallbackButtonLabel }}
                    </button>
                </form>
            @endif
        </div>
    </section>

    <section class="py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-[1.2fr_1.15fr_1fr] lg:gap-20 items-start">
                <div class="grid grid-cols-1 sm:grid-cols-[180px_1fr] gap-10 items-center">
                    <a href="{{ home_url('/') }}" aria-label="{{ get_bloginfo('name') }} home">
                        <img src="{{ $footerLogoUrl }}" alt="{{ get_bloginfo('name') }}"
                            class="w-37.5 md:w-42.5 h-auto">
                    </a>

                    <div class="space-y-7 text-xl">
                        <a href="{{ $footerPrivacyLink }}" class="hover:text-[#541D23] transition">
                            {{ $footerPrivacyLabel }}
                        </a>

                        <p>{!! $footerCopyrightText !!}</p>
                    </div>
                </div>

                <nav class="space-y-7 text-xl" aria-label="Footer links">
                    @foreach ($footerLinks as $link)
                        <a href="{{ $link['url'] }}" class="block hover:text-[#541D23] transition">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="space-y-7 text-xl">
                    @if ($footerPhone)
                        <a href="{{ $footerPhoneLink }}" class="block hover:text-[#541D23] transition">
                            {{ $footerPhone }}
                        </a>
                    @endif

                    @if ($footerEmail)
                        <a href="mailto:{{ $footerEmail }}" class="block hover:text-[#541D23] transition">
                            {{ $footerEmail }}
                        </a>
                    @endif

                    @if ($footerAddress)
                        <p>{!! nl2br(e($footerAddress)) !!}</p>
                    @endif

                    <div class="flex items-center gap-6 pt-2 text-[#FCBA59]">
                        @if ($footerFacebookUrl)
                            <a href="{{ $footerFacebookUrl }}" aria-label="Facebook"
                                class="hover:text-[#541D23] transition" target="_blank" rel="noreferrer">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M14 8.5V6.25C14 5.56 14.56 5 15.25 5H17V2h-2.5A4.5 4.5 0 0 0 10 6.5v2H7v3h3V22h4V11.5h3l.5-3H14Z" />
                                </svg>
                            </a>
                        @endif

                        @if ($footerInstagramUrl)
                            <a href="{{ $footerInstagramUrl }}" aria-label="Instagram"
                                class="hover:text-[#541D23] transition" target="_blank" rel="noreferrer">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <circle cx="17.5" cy="6.5" r="1"></circle>
                                </svg>
                            </a>
                        @endif

                        @if ($footerTiktokUrl)
                            <a href="{{ $footerTiktokUrl }}" aria-label="TikTok"
                                class="hover:text-[#541D23] transition" target="_blank" rel="noreferrer">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M16.6 5.8a5.5 5.5 0 0 0 3.4 1.1v3.4a8.7 8.7 0 0 1-3.5-.8v6.2a6.3 6.3 0 1 1-6.3-6.3c.4 0 .8 0 1.2.1V13a3 3 0 1 0 2.1 2.9V2h3.1c.2 1.5.9 2.8 2 3.8Z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
