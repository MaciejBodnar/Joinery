<header class="relative z-50 bg-[#541D23] text-white">
    @php
        $logo = asset('images/joinery-logo.svg')->uri();

        // Get menu items from WordPress
        $menuLocations = get_nav_menu_locations();
        $primaryMenuId = $menuLocations['primary_navigation'] ?? null;

        $menuItems = [];
        $whatWeDoItems = [];

        if ($primaryMenuId) {
            $items = wp_get_nav_menu_items($primaryMenuId) ?: [];
            $itemsById = [];

            // Build a map of items by ID
            foreach ($items as $item) {
                $itemsById[$item->ID] = $item;
            }

            // Get top-level items and find "What we do" children
            foreach ($items as $item) {
                if ($item->menu_item_parent == 0) {
                    $menuItems[] = $item;
                } else {
                    // Check if parent is "What we do"
                    if (
                        isset($itemsById[$item->menu_item_parent]) &&
                        $itemsById[$item->menu_item_parent]->title === 'What we do'
                    ) {
                        $whatWeDoItems[] = $item;
                    }
                }
            }
        }

        // Fallback if no menu is assigned
        if (empty($menuItems)) {
            $menuItems = [
                (object) ['title' => 'Home', 'url' => home_url('/'), 'menu_item_parent' => 0],
                (object) ['title' => 'About us', 'url' => home_url('/about'), 'menu_item_parent' => 0],
                (object) ['title' => 'What we do', 'url' => '#', 'menu_item_parent' => 0],
                (object) ['title' => 'Gallery', 'url' => home_url('/gallery'), 'menu_item_parent' => 0],
                (object) ['title' => 'FAQ', 'url' => home_url('/faq'), 'menu_item_parent' => 0],
                (object) ['title' => 'Contact', 'url' => home_url('/contact'), 'menu_item_parent' => 0],
            ];

            $whatWeDoItems = [
                (object) ['title' => 'Commercial Projects', 'url' => home_url('/commercial-projects')],
                (object) ['title' => 'Timber Construction', 'url' => home_url('/timber-construction')],
                (object) ['title' => 'Outdoor Joinery & Decking', 'url' => home_url('/outdoor-joinery-decking')],
                (object) ['title' => 'Interior Joinery & Finishing', 'url' => home_url('/interior-joinery-finishing')],
            ];
        }
    @endphp

    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="relative min-h-47.5 md:min-h-53.75">

            {{-- Top row --}}
            <div class="hidden md:grid grid-cols-3 items-center pt-8 text-sm text-white/55">
                <div></div>

                <a href="tel:07123456789"
                    class="justify-self-start inline-flex items-center gap-2 hover:text-[#FCBA59] transition">
                    <span>Get in touch</span>
                    <span aria-hidden="true">☏</span>
                    <span class="font-semibold tracking-wide">07123 456 789</span>
                </a>

                <div class="justify-self-end inline-flex items-center gap-6">
                    <span>Find us on</span>

                    <div class="inline-flex items-center gap-5">
                        <a href="#" aria-label="Facebook" class="hover:text-[#FCBA59] transition">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M14 8.5V6.25C14 5.56 14.56 5 15.25 5H17V2h-2.5A4.5 4.5 0 0 0 10 6.5v2H7v3h3V22h4V11.5h3l.5-3H14Z" />
                            </svg>
                        </a>

                        <a href="#" aria-label="Instagram" class="hover:text-[#FCBA59] transition">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                                <circle cx="12" cy="12" r="4"></circle>
                                <circle cx="17.5" cy="6.5" r="1"></circle>
                            </svg>
                        </a>

                        <a href="#" aria-label="TikTok" class="hover:text-[#FCBA59] transition">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M16.6 5.8a5.5 5.5 0 0 0 3.4 1.1v3.4a8.7 8.7 0 0 1-3.5-.8v6.2a6.3 6.3 0 1 1-6.3-6.3c.4 0 .8 0 1.2.1V13a3 3 0 1 0 2.1 2.9V2h3.1c.2 1.5.9 2.8 2 3.8Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Center logo --}}
            <a href="{{ home_url('/') }}" class="flex justify-center w-full"
                aria-label="{{ get_bloginfo('name') }} home">
                <img src="{{ get_theme_file_uri('resources/images/logo.svg') }}" alt="{{ get_bloginfo('name') }}"
                    class="w-21.5 h-auto">
            </a>

            {{-- Desktop navigation --}}
            <nav
                class="mx-20 hidden md:flex absolute w-full md:justify-between bottom-10 items-center gap-46.5 text-xl text-white/90">
                <div class="flex items-center gap-6">
                    @foreach (array_slice($menuItems, 0, 3) as $item)
                        @if ($item->title === 'What we do')
                            {{-- Not clickable, only opens dropdown --}}
                            <div class="relative group min-w-28 ">
                                <button type="button" class="min-w-28 cursor-default hover:text-[#FCBA59] transition"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ $item->title }}
                                </button>

                                <div class="invisible opacity-0 translate-y-3 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0 absolute left-1/2 top-full mt-5 w-[320px] -translate-x-1/2 bg-[#EFEAE8] text-[#541D23] shadow-xl transition duration-200"
                                    role="dialog" aria-label="What we do">
                                    <div class="h-1 bg-[#FCBA59]"></div>

                                    <div class="py-3">
                                        @foreach ($whatWeDoItems as $subItem)
                                            <a href="{{ $subItem->url }}"
                                                class="min-w-28 block px-6 py-3 text-base hover:bg-white hover:text-[#541D23] transition">
                                                {{ $subItem->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ $item->url }}" class="hover:text-[#FCBA59] transition min-w-28">
                                {{ $item->title }}
                            </a>
                        @endif
                    @endforeach
                </div>

                <div class="flex items-center gap-6">
                    @foreach (array_slice($menuItems, 3) as $item)
                        <a href="{{ $item->url }}" class="min-w-28 hover:text-[#FCBA59] transition">
                            {{ $item->title }}
                        </a>
                    @endforeach
                </div>
            </nav>

            {{-- Mobile header --}}
            <div class="md:hidden flex items-center justify-between min-h-30">
                <a href="tel:07123456789" class="text-sm text-white/60 hover:text-[#FCBA59] transition">
                    07123 456 789
                </a>

                <button type="button" class="relative z-20 text-sm uppercase tracking-[0.18em] text-white"
                    data-mobile-menu-button aria-expanded="false">
                    Menu
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div class="hidden md:hidden border-t border-white/10 bg-[#541D23]" data-mobile-menu>
        <nav class="px-6 py-6 space-y-1 text-white">
            @foreach ($menuItems as $item)
                @if ($item->title === 'What we do')
                    <div class="py-3">
                        <button type="button"
                            class="w-full flex items-center justify-between text-left hover:text-[#FCBA59] transition"
                            data-mobile-submenu-button aria-expanded="false">
                            <span>{{ $item->title }}</span>
                            <span aria-hidden="true">+</span>
                        </button>

                        <div class="hidden mt-3 ml-4 space-y-1 border-l border-white/10 pl-4" data-mobile-submenu>
                            @foreach ($whatWeDoItems as $subItem)
                                <a href="{{ $subItem->url }}"
                                    class="block py-2 text-sm text-white/70 hover:text-[#FCBA59] transition">
                                    {{ $subItem->title }}
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
        </nav>
    </div>
</header>
