{{-- resources/views/graphics/partials/video-navbar.blade.php --}}
<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-700 ease-in-out" x-data="{ 
        open: false, 
        scrolled: false,
        activeSection: '{{ Request::routeIs('graphics.pricing') ? 'pricing' : (Request::routeIs('graphics.payment') ? 'payment' : (Request::routeIs('graphics.offers') ? 'offers' : '')) }}',
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 40;
                const nav = document.getElementById('main-navbar');
                if (this.scrolled) nav.classList.add('nav-scrolled');
                else nav.classList.remove('nav-scrolled');
            });
        }
     }">

    {{-- Top Bar (Fixed Color) --}}
    <div class="hidden lg:block w-full border-b border-white/10 py-3 shadow-lg" style="background-color: #0b2b3d;">
        <div class="max-w-[1500px] mx-auto px-12 flex items-center justify-between">
            <div class="flex items-center gap-10 text-white font-bold text-[10px] tracking-widest uppercase">
                 <span class="text-blue-400">Production Studio</span>
                 <a href="tel:+17575405884" class="hover:text-yellow-400 transition-colors">USA: +1 757 540-5884</a>
                 <a href="mailto:info@colorexpertsbd.com" class="hover:text-yellow-400 transition-colors border-l border-white/20 pl-10">Email Support</a>
            </div>
            <div class="flex items-center gap-8 text-white/70 font-bold text-[10px] uppercase tracking-widest">
                <a href="{{ route('graphics.index') }}" class="hover:text-white transition-all underline decoration-blue-500 underline-offset-4">Global Home</a>
                <a href="{{ route('graphics.blog') }}" class="hover:text-white transition-all">Studio Blog</a>
                <a href="#" class="hover:text-white transition-all">Contact</a>
            </div>
        </div>
    </div>

    <style>
        #main-navbar { background: transparent; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        #main-navbar.nav-scrolled { background: rgba(11, 43, 61, 0.98); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,0.05); }
        .studio-nav-link { font-size: 11px; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase; color: white; transition: all 0.3s ease; }
        .studio-nav-link:hover { color: #38bdf8; }
        .nav-scrolled .studio-nav-link:hover { color: #facc15; }
    </style>

    <div class="max-w-[1500px] mx-auto px-4 lg:px-12">
        <div class="flex items-center justify-between h-20 md:h-24">

            {{-- Studio Logo --}}
            <a href="{{ route('graphics.index') }}" class="flex items-center gap-4 group">
                <div class="w-12 h-12 flex items-center justify-center bg-blue-500 rounded-xl rotate-45 group-hover:rotate-90 transition-all duration-500 shadow-lg shadow-blue-500/20">
                    <i class="ri-video-chat-fill text-white -rotate-45 group-hover:-rotate-90 transition-all duration-500 text-2xl"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-black text-xl leading-none tracking-tighter uppercase">VIDEO STUDIO</span>
                    <span class="text-white/40 text-[8px] font-bold tracking-[0.3em] uppercase mt-1">Production Hub</span>
                </div>
            </a>

            {{-- Specialized Desktop Navigation --}}
            <div class="hidden xl:flex items-center gap-8">
                
                {{-- Dynamic SubCategories for Video Production --}}
                @foreach($videoSubCategories as $sub)
                    <div x-data="{ isOpen: false }" @mouseenter="isOpen = true" @mouseleave="isOpen = false" class="relative">
                        <a href="{{ $sub->has_details ? route('graphics.service-detail', $sub->slug) : '#' }}" 
                           class="studio-nav-link flex items-center gap-1 cursor-pointer" :class="isOpen ? 'text-blue-400' : ''">
                            {{ $sub->name }}
                            @if($sub->services->count()) <i class="ri-arrow-down-s-line text-[14px]"></i> @endif
                        </a>

                        @if($sub->services->count())
                        <div x-show="isOpen" x-cloak class="absolute top-full left-0 pt-6 z-[60]" x-transition>
                            <div class="bg-white rounded-xl shadow-2xl border border-slate-100 py-6 px-8 min-w-[240px]">
                                <ul class="space-y-3">
                                    @foreach($sub->services as $svc)
                                        <li>
                                            <a href="{{ route('graphics.service-detail', $svc->slug) }}" class="text-[12px] font-bold text-slate-500 hover:text-blue-600 flex items-center gap-3 transition-colors">
                                                <span class="w-1 h-1 rounded-full bg-blue-500"></span>
                                                {{ $svc->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                @endforeach

                <div class="w-px h-6 bg-white/10 mx-2"></div>

                <a href="{{ route('graphics.pricing') }}" class="studio-nav-link" :class="activeSection === 'pricing' ? 'text-yellow-400' : ''">Price</a>
                <a href="{{ route('graphics.payment') }}" class="studio-nav-link" :class="activeSection === 'payment' ? 'text-yellow-400' : ''">Payment</a>
                <a href="{{ route('graphics.offers') }}" class="studio-nav-link" :class="activeSection === 'offers' ? 'text-yellow-400' : ''">Offers</a>
                
                <a href="{{ route('graphics.get-quote') }}" class="px-8 py-3 bg-blue-600 hover:bg-white hover:text-blue-600 text-white font-black uppercase text-[10px] tracking-widest rounded-full transition-all shadow-xl shadow-blue-500/20 active:scale-95">
                    Get a Quote
                </a>
            </div>

            <button @click="open = !open" class="xl:hidden w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 text-white">
                <i class="ri-menu-3-line text-2xl"></i>
            </button>
        </div>
    </div>
</nav>
