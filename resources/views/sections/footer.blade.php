<footer class="bg-white text-[#828282]">
    @php
        $option = fn($key, $default = null) => get_field($key, 'option') ?: $default;

        $footerLogoId = $option('footer_logo');
        $footerLogoUrl = $footerLogoId
            ? wp_get_attachment_image_url($footerLogoId, 'full')
            : get_theme_file_uri('resources/images/logo-footer.svg');

        $footerCallbackTitle = $option('footer_callback_title', 'Leave Your Number');
        $footerCallbackDescription = $option('footer_callback_description', 'We’ll get in touch with you!');
        $footerCallbackPlaceholder = $option('footer_callback_placeholder', '07000 000 000');
        $footerCallbackButtonLabel = $option('footer_callback_button_label', 'Request a call back');
        $footerCallbackShortcode = $option('footer_callback_form_shortcode');

        $footerPrivacyLink = $option('footer_privacy_link') ?: home_url('/privacy-policy');
        $footerPrivacyLabel = $option('footer_privacy_label', 'Privacy Policy');
        $footerCopyrightText =
            $option('footer_copyright_text') ?:
            date('Y') .
                ' Joinery Atelier Ltd - D&C with 🧡 <a href="https://sltmedia.com/" target="_blank" rel="noopener noreferrer">SLT&nbsp;Media</a>';

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
        <div class="md:px-12 lg:px-20 mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_420px_260px] items-center gap-8 lg:gap-10">
                <div class="space-y-7 text-center lg:text-left">
                    <h2 class="font-serif text-4xl md:text-5xl uppercase tracking-[0.08em] text-[#FCBA59]">
                        {{ $footerCallbackTitle }}
                    </h2>
                    <p class="mt-4 text-lg md:text-xl text-white/90">
                        {{ $footerCallbackDescription }}
                    </p>
                </div>

                <label class="sr-only" for="callback-phone">
                    Phone number
                </label>
                @if ($footerCallbackShortcode)
                    <div class="footer-callback-form">
                        {!! do_shortcode($footerCallbackShortcode) !!}
                    </div>
                @else
                    <input id="callback-phone" name="callback_phone" type="tel"
                        placeholder="{{ $footerCallbackPlaceholder }}"
                        class="h-16 w-full border border-white/15 bg-transparent px-8 text-xl text-white placeholder:text-white/90 outline-none transition focus:border-[#FCBA59]">
                    <button type="submit"
                        class="h-16 bg-[#FCBA59] px-8 text-xl text-[#541D23] transition hover:opacity-90">
                        {{ $footerCallbackButtonLabel }}
                    </button>
                @endif
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 items-center">
        <div class="md:px-12 lg:px-20 mx-auto px-6">
            <div class="items-center grid grid-cols-1 gap-12 lg:grid-cols-[2fr_1fr_1fr] lg:gap-20">
                <div
                    class="grid grid-cols-1 sm:grid-cols-[250px_1fr] gap-10 items-center text-center md:text-left h-full text-[#B4AFAF]">
                    <a class="flex justify-center" href="{{ home_url('/') }}"
                        aria-label="{{ get_bloginfo('name') }} home">
                        <img src="{{ $footerLogoUrl }}" alt="{{ get_bloginfo('name') }}" class="w-62 h-auto">
                    </a>

                    <div class="space-y-7 text-xl flex flex-col justify-end h-full md:mb-12">
                        <a href="{{ $footerPrivacyLink }}" class="hover:text-[#541D23] transition">
                            {{ $footerPrivacyLabel }}
                        </a>

                        <p>{!! $footerCopyrightText !!}</p>
                    </div>
                </div>

                <nav class="space-y-7 text-xl text-center md:text-left" aria-label="Footer links">
                    @foreach ($footerLinks as $link)
                        <a href="{{ $link['url'] }}" class="block hover:text-[#541D23] transition">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="space-y-7 text-xl text-center md:text-left">
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
                        {{-- TODO ADD SOCIAL MEDIA AS FOREACH AWESOME FONTS ICON + URL --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
