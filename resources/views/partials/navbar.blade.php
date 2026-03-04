{{-- resources/views/partials/navbar.blade.php --}}
<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-in-out"
     x-data="{ open: false }"
     :class="''">

    <style>
        #main-navbar { background: transparent; }
        #main-navbar.nav-scrolled {
            background: rgba(2,8,23,0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }
    </style>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="relative flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 via-purple-500 to-cyan-500 shadow-lg shadow-purple-500/30 transition-transform duration-300 group-hover:scale-110">
                    <i class="ri-hexagon-fill text-white text-xl"></i>
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-lg font-bold tracking-tight text-white">PixelForge</span>
                    <span class="text-[10px] font-medium tracking-widest text-slate-400 uppercase">Group</span>
                </div>
            </a>

            {{-- Desktop Nav Links --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors duration-200 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-indigo-400 hover:after:w-full after:transition-all after:duration-300">Home</a>
                <a href="{{ route('graphics.index') }}" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors duration-200 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-purple-400 hover:after:w-full after:transition-all after:duration-300">Graphics Studio</a>
                <a href="{{ url('/#it-solutions') }}" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors duration-200 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-cyan-400 hover:after:w-full after:transition-all after:duration-300">IT Solutions</a>
                <a href="{{ url('/#why-us') }}" class="nav-link text-sm font-medium text-slate-300 hover:text-white transition-colors duration-200 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-slate-400 hover:after:w-full after:transition-all after:duration-300">Why Us</a>
            </div>

            {{-- CTA Button --}}
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ url('/#quote') }}"
                   class="btn-primary inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all duration-300 hover:scale-105">
                    <i class="ri-quote-text-line text-base"></i>
                    Request a Quote
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="open = !open" class="md:hidden p-2 rounded-lg text-slate-400 hover:text-white hover:bg-white/10 transition-colors">
                <i class="ri-menu-3-line text-xl" x-show="!open"></i>
                <i class="ri-close-line text-xl" x-show="open" x-cloak></i>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden pb-6 border-t border-white/10 mt-2 pt-4 space-y-2">
            <a href="{{ url('/') }}" class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:text-white hover:bg-white/10 transition-colors">Home</a>
            <a href="{{ route('graphics.index') }}" class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:text-white hover:bg-white/10 transition-colors">Graphics Studio</a>
            <a href="{{ url('/#it-solutions') }}" class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:text-white hover:bg-white/10 transition-colors">IT Solutions</a>
            <a href="{{ url('/#why-us') }}" class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:text-white hover:bg-white/10 transition-colors">Why Us</a>
            <div class="pt-2">
                <a href="{{ url('/#quote') }}" class="block px-5 py-3 rounded-xl text-sm font-semibold text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                    Request a Quote
                </a>
            </div>
        </div>
    </div>
</nav>
