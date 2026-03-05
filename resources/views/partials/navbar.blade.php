{{-- resources/views/partials/navbar.blade.php --}}
<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-700 ease-in-out"
     x-data="{ open: false }"
     :class="''">

    <style>
        #main-navbar { background: transparent; padding: 0.5rem 0; }
        #main-navbar.nav-scrolled {
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5);
            padding: 0;
        }
        .nav-link-indicator {
            position: absolute; bottom: -4px; left: 50%; height: 4px; width: 4px;
            background: currentColor; border-radius: 50%; opacity: 0;
            transform: translateX(-50%) scale(0); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .nav-link:hover .nav-link-indicator { opacity: 1; transform: translateX(-50%) scale(1); bottom: -8px; }
    </style>

    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10">
        <div class="flex items-center justify-between h-20 md:h-24 transition-all duration-500" id="nav-inner">

            {{-- refined Luxury Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-4 group relative">
                <div class="absolute -inset-2 bg-indigo-500/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity rounded-full"></div>
                <div class="relative flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 via-purple-600 to-cyan-500 shadow-2xl shadow-indigo-500/20 transition-all duration-500 group-hover:rotate-[10deg] group-hover:scale-110">
                    <i class="ri-hexagon-fill text-white text-2xl group-hover:animate-pulse"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-black tracking-tighter text-white uppercase group-hover:text-indigo-400 transition-colors">PixelForge</span>
                    <div class="flex items-center gap-1.5 overflow-hidden">
                        <span class="h-[1px] w-4 bg-slate-700"></span>
                        <span class="text-[9px] font-bold tracking-[0.4em] text-slate-500 uppercase">Group</span>
                    </div>
                </div>
            </a>

            {{-- Elite Desktop Nav --}}
            <div class="hidden md:flex items-center gap-10">
                @php
                    $navItems = [
                        ['Home', url('/'), 'indigo-400', false],
                        ['Graphics Studio', route('graphics.index'), 'purple-400', true],
                        ['IT Solutions', url('/#it-solutions'), 'cyan-400', false],
                        ['Why Us', url('/#why-us'), 'slate-400', false],
                    ];
                @endphp

                @foreach($navItems as [$label, $url, $color, $newTab])
                <a href="{{ $url }}" {{ isset($newTab) ? 'target="_blank"' : '' }}
                   class="nav-link relative text-[13px] font-bold text-slate-400 uppercase tracking-widest hover:text-white transition-all duration-300">
                    {{ $label }}
                    <span class="nav-link-indicator text-{{ $color }}"></span>
                </a>
                @endforeach
            </div>

            {{-- Action Group --}}
            <div class="hidden md:flex items-center gap-6">
                {{-- Search Placeholder --}}
                <button class="p-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition-all">
                    <i class="ri-search-2-line text-lg"></i>
                </button>

                <a href="{{ url('/#quote') }}"
                   class="relative group overflow-hidden px-8 py-3.5 rounded-2xl text-[13px] font-black uppercase tracking-widest text-white transition-all active:scale-95">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600 bg-[length:200%_100%] animate-shimmer"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 bg-white/10 transition-opacity"></div>
                    <span class="relative flex items-center gap-2">
                        Get Estimate
                        <i class="ri-arrow-right-up-line text-base transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                    </span>
                </a>
            </div>

            {{-- Precise Mobile Trigger --}}
            <button @click="open = !open" 
                    class="md:hidden relative w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 border border-white/10 text-white transition-all active:scale-90">
                <div class="flex flex-col gap-1.5">
                    <span class="w-5 h-0.5 bg-current transition-all" :class="open ? 'rotate-45 translate-y-2' : ''"></span>
                    <span class="w-3 h-0.5 bg-current transition-all" :class="open ? 'opacity-0' : ''"></span>
                    <span class="w-5 h-0.5 bg-current transition-all" :class="open ? '-rotate-45 -translate-y-2' : ''"></span>
                </div>
            </button>
        </div>

        {{-- Luxury Mobile Overlay --}}
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             class="md:hidden absolute left-4 right-4 top-24 bg-slate-900/95 backdrop-blur-2xl rounded-3xl border border-white/10 shadow-3xl p-8 space-y-6 z-50 overflow-hidden">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/10 blur-[80px]"></div>
            
            <div class="space-y-4">
                @foreach($navItems as [$label, $url, $color, $newTab])
                <a href="{{ $url }}" {{ isset($newTab) ? 'target="_blank"' : '' }}
                   class="block text-lg font-bold text-slate-300 hover:text-white transition-colors" @click="open = false">
                   {{ $label }}
                </a>
                @endforeach
            </div>

            <div class="pt-6 border-t border-white/5">
                <a href="{{ url('/#quote') }}" class="block w-full py-4 text-center rounded-2xl bg-indigo-600 font-bold text-white shadow-xl shadow-indigo-600/30" @click="open = false">
                    Request Quality Quote
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('main-navbar');
        const inner = document.getElementById('nav-inner');
        if (window.scrollY > 50) {
            nav.classList.add('nav-scrolled');
            if(inner) inner.style.height = '70px';
        } else {
            nav.classList.remove('nav-scrolled');
            if(inner) inner.style.height = '96px';
        }
    });
</script>

<style>
    @keyframes shimmer {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
    .animate-shimmer { animation: shimmer 6s linear infinite; }
</style>
