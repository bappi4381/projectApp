<nav
    class="order-first w-72 h-screen bg-[#0f172a] border-r border-white/5 flex flex-col sticky top-0 overflow-hidden group/sidebar shadow-[20px_0_50px_rgba(0,0,0,0.2)]">

    {{-- Decorative Blur --}}
    <div
        class="absolute top-0 left-0 w-32 h-32 bg-indigo-500/10 blur-[80px] -translate-x-1/2 -translate-y-1/2 pointer-events-none">
    </div>

    {{-- Header / Logo --}}
    <div class="p-8 pb-4 flex items-center gap-3 shrink-0">
        <div
            class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-indigo-500 to-indigo-700 flex items-center justify-center text-white shadow-lg shadow-indigo-500/30 relative overflow-hidden group">
            <div
                class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
            </div>
            <i class="ri-fire-fill text-xl relative z-10"></i>
        </div>
        <div>
            <span class="text-xl font-black tracking-tight text-white block leading-none">PixelForge</span>
            <span class="text-[9px] font-black uppercase tracking-[0.2em] text-indigo-400 mt-1 block opacity-80">Studio
                Admin</span>
        </div>
    </div>

    {{-- Separator --}}
    <div class="px-8 mb-6">
        <div class="h-px w-full bg-gradient-to-r from-white/10 to-transparent"></div>
    </div>

    {{-- Helper for Link Rendering --}}
    @php
        if (!function_exists('renderSidebarItem')) {
            function renderSidebarItem($route, $icon, $label, $badge = null, $color = 'indigo')
            {
                $isActive = request()->routeIs($route . '*');
                $colorClass = $color === 'emerald' ? 'emerald' : 'indigo';

                $activeClasses = $colorClass === 'indigo'
                    ? 'bg-indigo-500/10 text-indigo-400 font-bold border-indigo-500/20'
                    : 'bg-emerald-500/10 text-emerald-400 font-bold border-emerald-500/20';

                $iconActive = $colorClass === 'indigo' ? 'bg-indigo-500/20 shadow-[0_0_15px_rgba(99,102,241,0.2)]' : 'bg-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.2)]';

                $html = '<a href="' . route($route) . '" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all group/link border border-transparent ';
                $html .= $isActive ? $activeClasses : 'text-slate-500 hover:bg-white/[0.03] hover:text-slate-200';
                $html .= '">';

                $html .= '<div class="w-7 h-7 rounded-lg flex items-center justify-center transition-all ';
                $html .= $isActive ? $iconActive : 'bg-slate-800/40 group-hover/link:bg-slate-700/50';
                $html .= '"><i class="' . $icon . ' text-sm"></i></div>';

                $html .= '<span class="text-[12.5px]">' . $label . '</span>';

                if ($badge) {
                    $html .= '<span class="ml-auto text-[8px] font-black px-1.5 py-0.5 rounded bg-slate-800 text-slate-600 border border-white/5 group-hover/link:border-white/10 group-hover/link:text-slate-400 transition-colors">' . $badge . '</span>';
                }

                if ($isActive) {
                    $html .= '<div class="ml-auto w-1 h-3 rounded-full bg-' . $colorClass . '-400 shadow-[0_0_8px_rgba(' . ($colorClass == "indigo" ? "99,102,241" : "16,185,129") . ',0.6)]"></div>';
                }

                $html .= '</a>';
                return $html;
            }
        }
    @endphp

    {{-- Scrollable Content --}}
    <div class="flex-1 overflow-y-auto custom-sidebar-scroll px-4 space-y-8 pb-10">

        {{-- Menu Group: General --}}
        <div class="space-y-1">
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4 pl-4">Management Portal</p>

            <a href="{{ route('admin.service-selection') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                {{ request()->routeIs('admin.service-selection')
    ? 'bg-indigo-500/10 text-indigo-400 font-bold shadow-[inset_0_0_20px_rgba(99,102,241,0.05)] border border-indigo-500/20'
    : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                <div
                    class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                    {{ request()->routeIs('admin.service-selection') ? 'bg-indigo-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                    <i class="ri-grid-fill"></i>
                </div>
                <span class="text-[13px]">Portal Home</span>
                @if(request()->routeIs('admin.service-selection'))
                    <div class="ml-auto w-1 h-1 rounded-full bg-indigo-400 shadow-[0_0_8px_#818cf8]"></div>
                @endif
            </a>
        </div>

        {{-- WORKSPACE: GRAPHICS --}}
        @if(request()->routeIs('admin.graphics.*'))
            <div class="space-y-8">
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4 pl-4">Graphics Workspace</p>

                    <a href="{{ route('admin.graphics.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.graphics.dashboard')
            ? 'bg-indigo-500/10 text-indigo-400 font-bold shadow-[inset_0_0_20px_rgba(99,102,241,0.05)] border border-indigo-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.graphics.dashboard') ? 'bg-indigo-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-dashboard-line"></i>
                        </div>
                        <span class="text-[13px]">Dashboard</span>
                        @if(request()->routeIs('admin.graphics.dashboard'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-indigo-400 shadow-[0_0_8px_#818cf8]"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.graphics.chat.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.graphics.chat.*')
            ? 'bg-indigo-500/10 text-indigo-400 font-bold shadow-[inset_0_0_20px_rgba(99,102,241,0.05)] border border-indigo-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.graphics.chat.*') ? 'bg-indigo-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-messenger-line"></i>
                        </div>
                        <span class="text-[13px]">Live Chat</span>
                        @if(request()->routeIs('admin.graphics.chat.*'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-indigo-400 shadow-[0_0_8px_#818cf8]"></div>
                        @endif
                    </a>
                    <a href="{{ route('admin.graphics.quotes.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.graphics.quotes.*')
            ? 'bg-indigo-500/10 text-indigo-400 font-bold shadow-[inset_0_0_20px_rgba(99,102,241,0.05)] border border-indigo-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.graphics.quotes.*') ? 'bg-indigo-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-file-list-3-line"></i>
                        </div>
                        <span class="text-[13px]">Quotes & Payments</span>
                        @if(request()->routeIs('admin.graphics.quotes.*'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-indigo-400 shadow-[0_0_8px_#818cf8]"></div>
                        @endif
                    </a>
                </div>

                {{-- Menu Group: Service Architecture --}}
                @php $isServiceMgmt = request()->routeIs('admin.graphics.categories.*') || request()->routeIs('admin.graphics.subcategories.*') || request()->routeIs('admin.graphics.services.*') || request()->routeIs('admin.graphics.variants.*'); @endphp

                <div x-data="{ open: @json($isServiceMgmt) }" class="space-y-1">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-2 hover:bg-white/[0.04] rounded-xl transition-all group/btn border border-transparent hover:border-white/5">
                        <div class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-indigo-500 shadow-[0_0_8px_rgba(99,102,241,0.6)]"></div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Service Architecture</p>
                        </div>
                        <i class="ri-arrow-down-s-line text-slate-600 transition-transform duration-300"
                            :class="open ? 'rotate-180' : ''"></i>
                    </button>
        
                    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                        class="pt-2 space-y-1 pl-3 border-l border-white/5 ml-4">
                        {!! renderSidebarItem('admin.graphics.categories.index', 'ri-node-tree', 'L1 Verticals', 'Category') !!}
                        {!! renderSidebarItem('admin.graphics.subcategories.index', 'ri-survey-line', 'L2 Groups', 'SubGroup') !!}
                        {!! renderSidebarItem('admin.graphics.services.index', 'ri-scissors-2-line', 'L3 Core Services', 'Service') !!}
                        {!! renderSidebarItem('admin.graphics.variants.index', 'ri-bubble-chart-line', 'L4 Detail Variants', 'Variant') !!}
                    </div>
                </div>

                {{-- Menu Group: Pricing & Rates --}}
                <div class="space-y-1">
                    {!! renderSidebarItem('admin.graphics.price-list.index', 'ri-price-tag-3-line', 'Pricing List', 'Pricing', 'emerald') !!}
                    {!! renderSidebarItem('admin.graphics.video-pricing.index', 'ri-video-line', 'Video Pricing', 'NEW', 'emerald') !!}
                </div>

                {{-- Menu Group: Studio Content --}}
                @php $isStudio = request()->routeIs('admin.graphics.blog.*') || request()->routeIs('admin.graphics.testimonials.*') || request()->routeIs('admin.graphics.brands.*') || request()->routeIs('admin.graphics.ecommerce-page.*') || request()->routeIs('admin.graphics.portfolios.*') || request()->routeIs('admin.graphics.home-page.*'); @endphp

                <div x-data="{ open: @json($isStudio) }" class="space-y-1">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-2 hover:bg-white/[0.02] rounded-xl transition-all group/btn">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Studio Content</p>
                        <i class="ri-arrow-down-s-line text-slate-600 transition-transform duration-300"
                            :class="open ? 'rotate-180' : ''"></i>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                        class="pt-2 space-y-1">
                        {!! renderSidebarItem('admin.graphics.blog.index', 'ri-article-line', 'Blog Articles', null, 'emerald') !!}
                        {!! renderSidebarItem('admin.graphics.testimonials.index', 'ri-chat-quote-line', 'Client Reviews', null, 'emerald') !!}
                        {!! renderSidebarItem('admin.graphics.brands.index', 'ri-verified-badge-line', 'Brand/Client Logos', null, 'emerald') !!}
                        {!! renderSidebarItem('admin.graphics.portfolios.index', 'ri-gallery-line', 'Portfolio Items', null, 'emerald') !!}
                        {!! renderSidebarItem('admin.graphics.home-page.edit', 'ri-slideshow-line', 'Home Slider', null, 'emerald') !!}
                        {!! renderSidebarItem('admin.graphics.ecommerce-page.edit', 'ri-pages-line', 'Ecommerce Page', null, 'emerald') !!}
                    </div>
                </div>
            </div>
        @endif

        {{-- WORKSPACE: IT SOLUTIONS --}}
        @if(request()->routeIs('admin.it.*'))
            <div class="space-y-8">
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4 pl-4">IT Workspace</p>

                    <a href="{{ route('admin.it.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.it.dashboard')
            ? 'bg-cyan-500/10 text-cyan-400 font-bold shadow-[inset_0_0_20px_rgba(6,182,212,0.05)] border border-cyan-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.it.dashboard') ? 'bg-cyan-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-dashboard-line"></i>
                        </div>
                        <span class="text-[13px]">Command Center</span>
                        @if(request()->routeIs('admin.it.dashboard'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-cyan-400 shadow-[0_0_8px_#22d3ee]"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.it.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.it.services.*')
            ? 'bg-cyan-500/10 text-cyan-400 font-bold shadow-[inset_0_0_20px_rgba(6,182,212,0.05)] border border-cyan-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.it.services.*') ? 'bg-cyan-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-server-line"></i>
                        </div>
                        <span class="text-[13px]">Managed Services</span>
                        @if(request()->routeIs('admin.it.services.*'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-cyan-400 shadow-[0_0_8px_#22d3ee]"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.it.software.catalog') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.it.software.catalog')
            ? 'bg-cyan-500/10 text-cyan-400 font-bold shadow-[inset_0_0_20px_rgba(6,182,212,0.05)] border border-cyan-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.it.software.catalog') ? 'bg-cyan-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-app-store-line"></i>
                        </div>
                        <span class="text-[13px]">Software Catalog</span>
                        @if(request()->routeIs('admin.it.software.catalog'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-cyan-400 shadow-[0_0_8px_#22d3ee]"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.it.chat.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.it.chat.*')
            ? 'bg-cyan-500/10 text-cyan-400 font-bold shadow-[inset_0_0_20px_rgba(6,182,212,0.05)] border border-cyan-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.it.chat.*') ? 'bg-cyan-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-messenger-line"></i>
                        </div>
                        <span class="text-[13px]">Live Chat</span>
                        @if(request()->routeIs('admin.it.chat.*'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-cyan-400 shadow-[0_0_8px_#22d3ee]"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.it.sliders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.it.sliders.*')
            ? 'bg-cyan-500/10 text-cyan-400 font-bold shadow-[inset_0_0_20px_rgba(6,182,212,0.05)] border border-cyan-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.it.sliders.*') ? 'bg-cyan-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-slideshow-line"></i>
                        </div>
                        <span class="text-[13px]">Hero Sliders</span>
                        @if(request()->routeIs('admin.it.sliders.*'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-cyan-400 shadow-[0_0_8px_#22d3ee]"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.it.metrics.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group/item
                        {{ request()->routeIs('admin.it.metrics.*')
            ? 'bg-cyan-500/10 text-cyan-400 font-bold shadow-[inset_0_0_20px_rgba(6,182,212,0.05)] border border-cyan-500/20'
            : 'text-slate-400 hover:bg-white/[0.03] hover:text-white' }}">
                        <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center transition-all 
                            {{ request()->routeIs('admin.it.metrics.*') ? 'bg-cyan-500/20' : 'bg-slate-800/50 group-hover/item:bg-white/10' }}">
                            <i class="ri-bar-chart-box-line"></i>
                        </div>
                        <span class="text-[13px]">Success Metrics</span>
                        @if(request()->routeIs('admin.it.metrics.*'))
                            <div class="ml-auto w-1 h-1 rounded-full bg-cyan-400 shadow-[0_0_8px_#22d3ee]"></div>
                        @endif
                    </a>
                </div>
            </div>
        @endif

    </div>

    {{-- Bottom Group: System --}}
    <div class="p-6 shrink-0 bg-slate-900/40 border-t border-white/5 space-y-2">
        <a href="{{ route('home') }}" target="_blank"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 hover:text-white transition-all text-[13px] hover:bg-white/5 group">
            <i class="ri-home-4-line group-hover:scale-110 transition-transform"></i>
            <span>Visit Website</span>
            <i class="ri-external-link-line ml-auto text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i>
        </a>

        <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 hover:text-rose-400 transition-all text-[13px] hover:bg-rose-500/5 group">
                <i class="ri-logout-circle-r-line transition-transform group-hover:translate-x-1"></i>
                <span>Logout Session</span>
            </button>
        </form>
    </div>
</nav>

<style>
    .custom-sidebar-scroll::-webkit-scrollbar {
        width: 4px;
    }

    .custom-sidebar-scroll::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-sidebar-scroll::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
    }

    .custom-sidebar-scroll:hover::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
    }
</style>