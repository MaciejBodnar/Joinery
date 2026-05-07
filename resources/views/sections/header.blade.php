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

        // Get menu items - try different approaches
        $menuItems = [];
        $locations = get_nav_menu_locations();

        if (isset($locations['primary_navigation'])) {
            $menu = wp_get_nav_menu_object($locations['primary_navigation']);
            if ($menu) {
                $menuItems = wp_get_nav_menu_items($menu->term_id);
            }
        }

        // Separate top-level items
        $topLevelItems = array_filter($menuItems ?: [], fn($item) => $item->menu_item_parent == 0);

        // Split items: first 3 left, rest right
        $leftItems = array_slice($topLevelItems, 0, 3);
        $rightItems = array_slice($topLevelItems, 3);

        $headerSocialLinks = collect(get_field('header_social_media', 'option') ?: [])
            ->filter(fn($item) => !empty($item['social_icon']) && !empty($item['social_link']))
            ->values();

        // Helper function to get children of an item
        $getChildren = function ($itemId) use ($menuItems) {
            return array_filter($menuItems ?: [], fn($item) => $item->menu_item_parent == $itemId);
        };
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
                        <a href="{{ $headerPhoneLink }}"
                            class="hover:text-[#FCBA59] transition flex items-center gap-4">
                            <span>{{ $headerPhoneLabel }}</span>

                            <span aria-hidden="true">
                                <i class="fa-brands fa-whatsapp"></i>
                            </span>
                            <span href="{{ $headerPhoneLink }}"
                                class="font-semibold tracking-wide hover:text-[#FCBA59] transition">
                                {{ $headerPhoneNumber }}
                            </span>
                        </a>
                    </div>
                    <div class="flex items-center gap-6 row-3 justify-end">
                        @foreach ($leftItems as $item)
                            @php $children = $getChildren($item->ID); @endphp
                            @if (!empty($children))
                                <div class="relative group">
                                    <button type="button"
                                        class="min-w-28 cursor-default hover:text-[#FCBA59] transition"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{ $item->title }}
                                    </button>
                                    <div class="invisible opacity-0 translate-y-3 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0 absolute left-0 top-full mt-3 w-[320px] bg-[#EFEAE8] text-[#541D23] shadow-xl transition duration-200"
                                        role="dialog" aria-label="{{ $item->title }}">
                                        <div class="h-1 bg-[#FCBA59]"></div>
                                        <div class="py-3">
                                            @foreach ($children as $child)
                                                <a href="{{ $child->url }}"
                                                    class="min-w-28 block px-6 py-3 text-base hover:bg-white hover:text-[#541D23] transition">
                                                    {{ $child->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ $item->url }}" class="min-w-28 hover:text-[#FCBA59] transition">
                                    {{ $item->title }}
                                </a>
                            @endif
                        @endforeach
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
                        @foreach ($rightItems as $item)
                            @php $children = $getChildren($item->ID); @endphp
                            @if (!empty($children))
                                <div class="relative group">
                                    <button type="button"
                                        class="min-w-28 cursor-default hover:text-[#FCBA59] transition"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{ $item->title }}
                                    </button>
                                    <div class="invisible opacity-0 translate-y-3 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0 absolute left-0 top-full mt-3 w-[320px] bg-[#EFEAE8] text-[#541D23] shadow-xl transition duration-200"
                                        role="dialog" aria-label="{{ $item->title }}">
                                        <div class="h-1 bg-[#FCBA59]"></div>
                                        <div class="py-3">
                                            @foreach ($children as $child)
                                                <a href="{{ $child->url }}"
                                                    class="min-w-28 block px-6 py-3 text-base hover:bg-white hover:text-[#541D23] transition">
                                                    {{ $child->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ $item->url }}" class="min-w-28 hover:text-[#FCBA59] transition">
                                    {{ $item->title }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="hidden md:hidden border-t border-white/10 bg-[#541D23]" data-mobile-menu>
        <nav class="px-6 py-6 space-y-4 text-white">
            @foreach ($topLevelItems as $item)
                @php $children = $getChildren($item->ID); @endphp
                @if (!empty($children))
                    <div class="py-3">
                        <button type="button"
                            class="w-full flex items-center justify-between text-left hover:text-[#FCBA59] transition"
                            data-mobile-submenu-button aria-expanded="false">
                            <span>{{ $item->title }}</span>
                            <span aria-hidden="true">+</span>
                        </button>

                        <div class="hidden mt-3 ml-4 space-y-1 border-l border-white/10 pl-4" data-mobile-submenu>
                            @foreach ($children as $child)
                                <a href="{{ $child->url }}"
                                    class="block py-2 text-sm text-white/70 hover:text-[#FCBA59] transition">
                                    {{ $child->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item->url }}" class="block py-3 hover:text-[#FCBA59] transition">
                        {{ $item->title }}
                    </a>
                @endif
            @endforeach

            <div class="pt-4 border-t border-white/10 space-y-4 text-sm text-white/70 flex flex-col">
                <a href="{{ $headerPhoneLink }}" class="text-sm text-white/60 hover:text-[#FCBA59] transition">
                    {{ $headerPhoneNumber }}
                </a>
                <div class="inline-flex items-center gap-2">
                    <span>{{ $headerSocialLabel }}</span>
                </div>

                <div class="inline-flex items-center gap-4 text-[#FCBA59]">
                    @foreach ($headerSocialLinks as $socialLink)
                        <a href="{{ $socialLink['social_link'] }}" aria-label="Social media link"
                            class="hover:text-white transition" target="_blank" rel="noreferrer">
                            {!! $socialLink['social_icon'] !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </nav>
    </div>
</header>
