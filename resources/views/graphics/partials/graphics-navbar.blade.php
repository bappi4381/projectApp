{{-- resources/views/partials/graphics-navbar.blade.php --}}
<nav id="graphics-navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-700 ease-in-out"
     x-data="{ open: false, servicesOpen: false, offersOpen: false }">

    <style>
        #graphics-navbar { 
            background: rgba(1, 68, 87, 0.4); 
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            padding: 0.5rem 0;
        }
        #graphics-navbar.nav-scrolled {
            background: rgba(1, 44, 55, 0.85);
            backdrop-filter: blur(32px) saturate(150%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 50px -15px rgba(0, 0, 0, 0.6);
            padding: 0;
        }
        .studio-nav-link {
            position: relative;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        .studio-link-dot {
            position: absolute; bottom: -6px; left: 50%; width: 3px; height: 3px;
            background: #facc15; border-radius: 50%; opacity: 0;
            transform: translateX(-50%) scale(0); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .studio-nav-link:hover .studio-link-dot { opacity: 1; transform: translateX(-50%) scale(1); }
    </style>

    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-12">
        <div class="flex items-center justify-between h-20 md:h-24 transition-all duration-500" id="studio-nav-inner">

            {{-- refined Studio Logo --}}
            <a href="{{ route('graphics.index') }}" class="flex items-center gap-5 group">
                <div class="relative w-14 h-14 flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-yellow-400/10 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <svg viewBox="0 0 100 100" class="w-full h-full text-yellow-400 drop-shadow-[0_0_8px_rgba(250,204,21,0.4)]">
                        <circle cx="50" cy="50" r="42" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10 6" class="animate-spin-slow" />
                        <path d="M30,50 Q30,30 50,30 T70,50 T50,70 T30,50" fill="none" stroke="currentColor" stroke-width="5" stroke-linecap="round" />
                        <circle cx="50" cy="50" r="10" fill="currentColor" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-black text-2xl leading-none tracking-tighter uppercase group-hover:text-yellow-400 transition-colors">Color <span class="text-white">Experts</span></span>
                    <span class="text-white/40 text-[9px] font-bold tracking-[0.3em] uppercase mt-1">International Studio</span>
                </div>
            </a>

            {{-- Desktop Hub Navigation --}}
            <div class="hidden xl:flex items-center gap-10">
                <a href="{{ route('graphics.index') }}" class="studio-nav-link text-white hover:text-yellow-400">
                    Home
                    <span class="studio-link-dot"></span>
                </a>
                
                {{-- Refinement: Services Mega-style --}}
                <div class="relative group" @mouseenter="servicesOpen = true" @mouseleave="servicesOpen = false">
                    <button class="studio-nav-link text-yellow-400 flex items-center gap-2">
                        Services
                        <i class="ri-arrow-down-s-line text-sm transition-transform" :class="servicesOpen ? 'rotate-180' : ''"></i>
                        <span class="studio-link-dot !bg-white"></span>
                    </button>
                    <div x-show="servicesOpen" x-cloak
                         class="absolute top-full left-1/2 -translate-x-1/2 w-[480px] bg-slate-900/95 backdrop-blur-3xl rounded-3xl shadow-[0_30px_100px_rgba(0,0,0,0.8)] p-8 mt-4 grid grid-cols-2 gap-x-8 gap-y-3 border border-white/10"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        @php
                            $studio_services = [
                                ['Clipping Path', 'ri-scissors-cut-line'],
                                ['Ghost Mannequin', 'ri-user-smile-line'],
                                ['Multi-Clipping', 'ri-layout-grid-line'],
                                ['Photo Retouching', 'ri-magic-line'],
                                ['Jewelry Edit', 'ri-sparkling-fill'],
                                ['Color Correction', 'ri-palette-line'],
                                ['Shadow Work', 'ri-contrast-drop-2-line'],
                                ['E-com Optimize', 'ri-shopping-bag-3-line'],
                            ];
                        @endphp
                        @foreach($studio_services as [$name, $icon])
                            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/5 group/link transition-all">
                                <i class="{{ $icon }} text-yellow-400 text-lg"></i>
                                <span class="text-[13px] font-bold text-slate-300 group-hover/link:text-white">{{ $name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                @php
                    $studioLinks = [
                        ['Our Work', '#portfolio'],
                        ['Price', '#pricing'],
                        ['Payment', '#payment'],
                        ['Offers', '#offers'],
                        ['Get Quote', '#quote'],
                    ];
                @endphp
                @foreach($studioLinks as [$label, $url])
                <a href="{{ $url }}" class="studio-nav-link text-white/70 hover:text-white">
                    {{ $label }}
                    <span class="studio-link-dot"></span>
                </a>
                @endforeach
            </div>

            {{-- Action Group --}}
            <div class="hidden lg:flex items-center gap-6">
                <a href="#" class="relative group overflow-hidden px-10 py-4 rounded-full font-black text-[11px] uppercase tracking-[0.2em] transition-all hover:scale-105 active:scale-95 shadow-2xl shadow-yellow-400/20">
                    <div class="absolute inset-0 bg-yellow-400"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    <span class="relative text-slate-900 flex items-center gap-2">
                        Upload Files
                        <i class="ri-upload-cloud-2-line text-lg"></i>
                    </span>
                </a>
            </div>

            {{-- Mobile Trigger --}}
            <button @click="open = !open" class="xl:hidden w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 border border-white/5 text-white">
                <i class="ri-menu-right-line text-2xl" x-show="!open"></i>
                <i class="ri-close-line text-2xl" x-show="open" x-cloak></i>
            </button>
        </div>

        {{-- Mobile Hub Overlay --}}
        <div x-show="open" x-cloak class="xl:hidden bg-slate-900/98 backdrop-blur-3xl border-t border-white/5 py-10 space-y-6 px-6 overflow-y-auto max-h-[85vh] rounded-b-[40px]">
            <a href="#" class="block text-2xl font-black text-white hover:text-yellow-400 tracking-tighter">HOME</a>
            <div x-data="{ sub: false }">
                <button @click="sub = !sub" class="flex items-center justify-between w-full text-2xl font-black text-yellow-400 tracking-tighter">
                    SERVICES <i :class="sub ? 'ri-subtract-line' : 'ri-arrow-right-down-line'"></i>
                </button>
                <div x-show="sub" class="mt-4 grid grid-cols-2 gap-4">
                    @foreach($studio_services as [$name, $icon])
                        <a href="#" class="text-sm font-bold text-white/60 hover:text-white uppercase tracking-widest">{{ $name }}</a>
                    @endforeach
                </div>
            </div>
            @foreach($studioLinks as [$label, $url])
            <a href="{{ $url }}" class="block text-2xl font-black text-white hover:text-yellow-400 tracking-tighter uppercase">{{ $label }}</a>
            @endforeach
            <div class="pt-8">
                <a href="#" class="block w-full py-5 rounded-3xl bg-yellow-400 text-slate-900 font-black text-center text-sm uppercase tracking-widest">
                    UPLOAD FILES
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('graphics-navbar');
        const inner = document.getElementById('studio-nav-inner');
        if (window.scrollY > 40) {
            nav.classList.add('nav-scrolled');
            if(inner) inner.style.height = '76px';
        } else {
            nav.classList.remove('nav-scrolled');
            if(inner) inner.style.height = '100px';
        }
    });
</script>

<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow { animation: spin-slow 15s linear infinite; }
</style>
