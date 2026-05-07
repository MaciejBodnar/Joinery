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

        $headerSocialLinks = collect(get_field('header_social_media', 'option') ?: [])
            ->filter(fn($item) => !empty($item['social_icon']) && !empty($item['social_link']))
            ->values();
    @endphp

    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="relative min-h-30 md:min-h-53.75">

            <div class="md:hidden flex items-center justify-between min-h-30 mx-6">
                <a href="{{ home_url('/') }}" class="flex justify-center" aria-label="{{ get_bloginfo('name') }} home">
                    <img src="{{ $headerLogoUrl }}" alt="{{ get_bloginfo('name') }}" class="w-18 h-auto">
                </a>

                <button type="button" class="relative z-20 text-sm uppercase tracking-[0.18em] text-white"
                    data-mobile-menu-button aria-expanded="false">
                    Menu
                </button>
            </div>

            <nav class="mx-20 hidden md:flex absolute w-full bottom-10 items-center gap-8 text-xl text-white/90">
                <div class="w-full grid grid-cols-[1fr_200px_1fr] items-center justify-between">
                    <div class="text-sm text-white/55 flex items-center gap-6 row-1 justify-end">
                        <a href="{{ $headerPhoneLink }}" class="hover:text-[#FCBA59] transition">
                            <span>{{ $headerPhoneLabel }}</span>
                        </a>
                        <span aria-hidden="true">☏</span>
                        <a href="{{ $headerPhoneLink }}"
                            class="font-semibold tracking-wide hover:text-[#FCBA59] transition">
                            {{ $headerPhoneNumber }}
                        </a>
                    </div>
                    <div class="flex items-center gap-6 row-3 justify-end">
                        @foreach ($leftNav as $item)
                            <a href="{{ $item['url'] }}" class="min-w-28 hover:text-[#FCBA59] transition">
                                {{ $item['label'] }}
                            </a>
                        @endforeach

                        <div class="relative group">
                            <button type="button" class="min-w-28 cursor-default hover:text-[#FCBA59] transition"
                                aria-haspopup="true" aria-expanded="false">
                                {{ $whatWeDoLabel }}
                            </button>

                            <div class="invisible opacity-0 translate-y-3 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0 absolute left-0 top-full mt-3 w-[320px] bg-[#EFEAE8] text-[#541D23] shadow-xl transition duration-200"
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
                    </div>

                    <a href="{{ home_url('/') }}" class="flex items-center justify-center row-span-3"
                        aria-label="{{ get_bloginfo('name') }} home">
                        <img src="{{ $headerLogoUrl }}" alt="{{ get_bloginfo('name') }}" class="w-21.5 h-auto">
                    </a>
                    <div class="flex items-center gap-6 row-1 col-start-3 justify-start text-sm text-white/55">
                        <span>{{ $headerSocialLabel }}</span>
                        @foreach ($headerSocialLinks as $socialLink)
                            <a href="{{ $socialLink['social_link'] }}" aria-label="Social media link"
                                class="hover:text-[#FCBA59] text-sm transition" target="_blank" rel="noreferrer">
                                {!! $socialLink['social_icon'] !!}
                            </a>
                        @endforeach
                    </div>
                    <div class="flex items-center gap-6 row-3 col-start-3">
                        @foreach ($rightNav as $item)
                            <a href="{{ $item['url'] }}" class="min-w-28 hover:text-[#FCBA59] transition">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
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

            <div class="pt-4 border-t border-white/10 space-y-4 text-sm text-white/70 flex flex-col">
                <a href="{{ $headerPhoneLink }}" class="text-sm text-white/60 hover:text-[#FCBA59] transition">
                    {{ $headerPhoneNumber }}
                </a>
                <div class="inline-flex items-center gap-2">
                    <span>{{ $headerSocialLabel }}</span>
                </div>

                <div class="inline-flex items-center gap-4 text-[#FCBA59]">
                    @if ($headerFacebookUrl)
                        <a href="{{ $headerFacebookUrl }}" aria-label="Facebook" class="hover:text-white transition"
                            target="_blank" rel="noreferrer">Facebook</a>
                    @endif
                    @if ($headerInstagramUrl)
                        <a href="{{ $headerInstagramUrl }}" aria-label="Instagram" class="hover:text-white transition"
                            target="_blank" rel="noreferrer">Instagram</a>
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
