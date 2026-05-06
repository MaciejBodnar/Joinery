<header class="relative z-50 bg-[#541D23] text-white">
    @php
        $option = fn($key, $default = null) => get_field($key, 'option') ?: $default;

        $headerLogoId = $option('header_logo');
        $headerLogoUrl = $headerLogoId
            ? wp_get_attachment_image_url($headerLogoId, 'full')
            : get_theme_file_uri('resources/images/logo.svg');

        $headerPhoneLabel = $option('header_phone_label', 'Get in touch');
        $headerPhoneNumber = $option('header_phone_number', '07123 456 789');
        $headerPhoneLink = $option('header_phone_link') ?: 'tel:' . preg_replace('/[^0-9+]/', '', $headerPhoneNumber);

        $headerSocialLabel = $option('header_social_label', 'Find us on');
        $headerFacebookUrl = $option('header_facebook_url');
        $headerInstagramUrl = $option('header_instagram_url');
        $headerTiktokUrl = $option('header_tiktok_url');

        $leftNav = collect(
            get_field('header_left_nav', 'option') ?: [
                ['item_label' => 'Home', 'item_link' => home_url('/')],
                ['item_label' => 'About us', 'item_link' => home_url('/about')],
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

        $whatWeDoLabel = $option('header_what_we_do_label', 'What we do');
        $whatWeDoItems = collect(
            get_field('header_what_we_do_items', 'option') ?: [
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

        $rightNav = collect(
            get_field('header_right_nav', 'option') ?: [
                ['item_label' => 'Gallery', 'item_link' => home_url('/gallery')],
                ['item_label' => 'FAQ', 'item_link' => home_url('/faq')],
                ['item_label' => 'Contact', 'item_link' => home_url('/contact')],
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
    @endphp

    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="relative min-h-47.5 md:min-h-53.75">
            <div class="hidden md:grid grid-cols-3 items-center pt-8 text-sm text-white/55">
                <div class="justify-self-start inline-flex items-center gap-2">
                    <a href="{{ $headerPhoneLink }}" class="hover:text-[#FCBA59] transition">
                        <span>{{ $headerPhoneLabel }}</span>
                    </a>
                    <span aria-hidden="true">☏</span>
                    <a href="{{ $headerPhoneLink }}" class="font-semibold tracking-wide hover:text-[#FCBA59] transition">
                        {{ $headerPhoneNumber }}
                    </a>
                </div>

                <a href="{{ home_url('/') }}" class="flex justify-center w-full"
                    aria-label="{{ get_bloginfo('name') }} home">
                    <img src="{{ $headerLogoUrl }}" alt="{{ get_bloginfo('name') }}" class="w-21.5 h-auto">
                </a>

                <div class="justify-self-end inline-flex items-center gap-6">
                    <span>{{ $headerSocialLabel }}</span>

                    <div class="inline-flex items-center gap-5">
                        @if ($headerFacebookUrl)
                            <a href="{{ $headerFacebookUrl }}" aria-label="Facebook"
                                class="hover:text-[#FCBA59] transition" target="_blank" rel="noreferrer">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M14 8.5V6.25C14 5.56 14.56 5 15.25 5H17V2h-2.5A4.5 4.5 0 0 0 10 6.5v2H7v3h3V22h4V11.5h3l.5-3H14Z" />
                                </svg>
                            </a>
                        @endif

                        @if ($headerInstagramUrl)
                            <a href="{{ $headerInstagramUrl }}" aria-label="Instagram"
                                class="hover:text-[#FCBA59] transition" target="_blank" rel="noreferrer">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <circle cx="17.5" cy="6.5" r="1"></circle>
                                </svg>
                            </a>
                        @endif

                        @if ($headerTiktokUrl)
                            <a href="{{ $headerTiktokUrl }}" aria-label="TikTok"
                                class="hover:text-[#FCBA59] transition" target="_blank" rel="noreferrer">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M16.6 5.8a5.5 5.5 0 0 0 3.4 1.1v3.4a8.7 8.7 0 0 1-3.5-.8v6.2a6.3 6.3 0 1 1-6.3-6.3c.4 0 .8 0 1.2.1V13a3 3 0 1 0 2.1 2.9V2h3.1c.2 1.5.9 2.8 2 3.8Z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="md:hidden flex items-center justify-between min-h-30">
                <a href="{{ $headerPhoneLink }}" class="text-sm text-white/60 hover:text-[#FCBA59] transition">
                    {{ $headerPhoneNumber }}
                </a>

                <a href="{{ home_url('/') }}" class="flex justify-center"
                    aria-label="{{ get_bloginfo('name') }} home">
                    <img src="{{ $headerLogoUrl }}" alt="{{ get_bloginfo('name') }}" class="w-18 h-auto">
                </a>

                <button type="button" class="relative z-20 text-sm uppercase tracking-[0.18em] text-white"
                    data-mobile-menu-button aria-expanded="false">
                    Menu
                </button>
            </div>

            <nav
                class="mx-20 hidden md:grid absolute w-full bottom-10 grid-cols-[1fr_auto_1fr] items-center gap-8 text-xl text-white/90">
                <div class="flex items-center gap-6">
                    @foreach ($leftNav as $item)
                        <a href="{{ $item['url'] }}" class="min-w-28 hover:text-[#FCBA59] transition">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <div class="relative group justify-self-center">
                    <button type="button" class="min-w-28 cursor-default hover:text-[#FCBA59] transition"
                        aria-haspopup="true" aria-expanded="false">
                        {{ $whatWeDoLabel }}
                    </button>

                    <div class="invisible opacity-0 translate-y-3 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0 absolute left-1/2 top-full mt-5 w-[320px] -translate-x-1/2 bg-[#EFEAE8] text-[#541D23] shadow-xl transition duration-200"
                        role="dialog" aria-label="{{ $whatWeDoLabel }}">
                        <div class="h-1 bg-[#FCBA59]"></div>

                        <div class="py-3">
                            @foreach ($whatWeDoItems as $subItem)
                                <a href="{{ $subItem['url'] }}"
                                    class="min-w-28 block px-6 py-3 text-base hover:bg-white hover:text-[#541D23] transition">
                                    {{ $subItem['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-6">
                    @foreach ($rightNav as $item)
                        <a href="{{ $item['url'] }}" class="min-w-28 hover:text-[#FCBA59] transition">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </nav>
        </div>
    </div>

    <div class="hidden md:hidden border-t border-white/10 bg-[#541D23]" data-mobile-menu>
        <nav class="px-6 py-6 space-y-4 text-white">
            @foreach ($leftNav as $item)
                <a href="{{ $item['url'] }}" class="block py-3 hover:text-[#FCBA59] transition">
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="py-3">
                <button type="button"
                    class="w-full flex items-center justify-between text-left hover:text-[#FCBA59] transition"
                    data-mobile-submenu-button aria-expanded="false">
                    <span>{{ $whatWeDoLabel }}</span>
                    <span aria-hidden="true">+</span>
                </button>

                <div class="hidden mt-3 ml-4 space-y-1 border-l border-white/10 pl-4" data-mobile-submenu>
                    @foreach ($whatWeDoItems as $subItem)
                        <a href="{{ $subItem['url'] }}"
                            class="block py-2 text-sm text-white/70 hover:text-[#FCBA59] transition">
                            {{ $subItem['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            @foreach ($rightNav as $item)
                <a href="{{ $item['url'] }}" class="block py-3 hover:text-[#FCBA59] transition">
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="pt-4 border-t border-white/10 space-y-4 text-sm text-white/70">
                <div class="inline-flex items-center gap-2">
                    <span>{{ $headerSocialLabel }}</span>
                </div>

                <div class="inline-flex items-center gap-4 text-[#FCBA59]">
                    @if ($headerFacebookUrl)
                        <a href="{{ $headerFacebookUrl }}" aria-label="Facebook" class="hover:text-white transition"
                            target="_blank" rel="noreferrer">Facebook</a>
                    @endif
                    @if ($headerInstagramUrl)
                        <a href="{{ $headerInstagramUrl }}" aria-label="Instagram"
                            class="hover:text-white transition" target="_blank" rel="noreferrer">Instagram</a>
                    @endif
                    @if ($headerTiktokUrl)
                        <a href="{{ $headerTiktokUrl }}" aria-label="TikTok" class="hover:text-white transition"
                            target="_blank" rel="noreferrer">TikTok</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
