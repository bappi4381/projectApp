{{-- resources/views/it/partials/it-navbar.blade.php --}}
<header id="it-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" x-data="{ open: false, scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)">

    <style>
        #it-header { 
            background: white; 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #it-header.header-scrolled {
            box-shadow: 0 10px 40px rgba(15, 23, 42, 0.08);
        }
        
        .top-row {
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #f1f5f9;
        }

        .bottom-row {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link-it {
            color: #1e293b;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            transition: all 0.3s;
            padding: 1.25rem 0;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
        }
        .nav-link-it::after {
            content: '';
            position: absolute;
            bottom: 0.75rem;
            left: 0;
            width: 0;
            height: 2px;
            background: #3ABEF9;
            transition: width 0.3s;
        }
        .nav-link-it:hover::after, .nav-link-it.active::after {
            width: 100%;
        }
        .nav-link-it:hover, .nav-link-it.active {
            color: #3ABEF9;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .cta-button-it {
            background: linear-gradient(135deg, #3ABEF9 0%, #0078D4 100%);
            color: white;
            padding: 0.85rem 1.75rem;
            border-radius: 0.75rem;
            font-weight: 900;
            font-size: 0.7rem;
            letter-spacing: 0.15em;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(58, 190, 249, 0.2);
        }
        .cta-button-it:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(58, 190, 249, 0.4);
        }

        @media (max-width: 1024px) {
            .top-row { height: 75px; border-bottom: none; }
            .bottom-row { display: none; }
        }
    </style>

    <div class="max-w-[1500px] mx-auto px-6">
        {{-- Row 1: Logo & Actions --}}
        <div class="top-row">
            {{-- Logo --}}
            <a href="{{ route('it.index') }}" class="logo-box group">
                <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center text-white transition-transform group-hover:scale-110 duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <i class="ri-terminal-window-line text-2xl relative z-10"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-black text-slate-900 tracking-tighter leading-none">PixelForge</span>
                    <span class="text-[9px] font-black uppercase tracking-[0.3em] text-cyan-500 mt-1">IT Solutions</span>
                </div>
            </a>

            {{-- Right Section --}}
            <div class="hidden lg:flex items-center gap-10">
                {{-- Support Info --}}
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-cyan-500 border border-slate-100">
                        <i class="ri-customer-service-2-line text-lg"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-slate-400 text-[9px] font-black uppercase tracking-widest leading-none mb-1">Global Support</span>
                        <a href="tel:+8809611395376" class="text-slate-900 font-black text-sm tracking-tight">+8809611395376</a>
                    </div>
                </div>

                {{-- Action Button --}}
                <div class="flex items-center gap-4">
                    <button class="p-2 text-slate-400 hover:text-cyan-500 transition-colors">
                        <i class="ri-search-line text-xl"></i>
                    </button>
                    <a href="{{ route('it.contact') }}" class="cta-button-it flex items-center gap-2 uppercase">
                        Get A Quote
                        <i class="ri-arrow-right-line text-lg"></i>
                    </a>
                </div>
            </div>

            {{-- Mobile Toggle --}}
            <button @click="open = !open" class="lg:hidden w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center text-slate-900 transition-all active:scale-95">
                <i :class="open ? 'ri-close-line' : 'ri-menu-4-fill'" class="text-2xl"></i>
            </button>
        </div>

        {{-- Row 2: Main Navigation Links --}}
        <div class="bottom-row hidden lg:flex">
            <div class="flex items-center gap-12">
                <a href="{{ route('it.index') }}" class="nav-link-it {{ request()->routeIs('it.index') ? 'active' : '' }}">Home</a>
                <a href="{{ route('it.about') }}" class="nav-link-it {{ request()->routeIs('it.about') ? 'active' : '' }}">About Us</a>
                
                {{-- Services Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it {{ request()->routeIs('it.service-detail') ? 'active' : '' }}">
                        Services
                        <i class="ri-arrow-down-s-line transition-transform duration-300" :class="dropdownOpen ? 'rotate-180' : ''"></i>
                    </button>
                    
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-4"
                         class="absolute left-1/2 -translate-x-1/2 top-full w-[280px] bg-white border-t-2 border-cyan-500 shadow-2xl rounded-b-2xl overflow-hidden py-2">
                        
                        <a href="{{ route('it.service-detail', 'custom-software-development') }}" class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50 transition-all group/item">
                            <div class="w-8 h-8 rounded-lg bg-cyan-50 flex items-center justify-center text-cyan-600 group-hover/item:bg-cyan-500 group-hover/item:text-white transition-colors">
                                <i class="ri-code-s-slash-line"></i>
                            </div>
                            <span class="text-[13px] font-bold text-slate-700">Custom Software</span>
                        </a>

                        <a href="{{ route('it.service-detail', 'web-application-development') }}" class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50 transition-all group/item border-t border-slate-50">
                            <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 group-hover/item:bg-blue-500 group-hover/item:text-white transition-colors">
                                <i class="ri-window-line"></i>
                            </div>
                            <span class="text-[13px] font-bold text-slate-700">Web Development</span>
                        </a>

                        <a href="{{ route('it.service-detail', 'mobile-application-development') }}" class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50 transition-all group/item border-t border-slate-50">
                            <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center text-purple-600 group-hover/item:bg-purple-500 group-hover/item:text-white transition-colors">
                                <i class="ri-smartphone-line"></i>
                            </div>
                            <span class="text-[13px] font-bold text-slate-700">Mobile Applications</span>
                        </a>

                        <a href="{{ route('it.service-detail', 'quality-assurance-testing') }}" class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50 transition-all group/item border-t border-slate-50">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover/item:bg-emerald-500 group-hover/item:text-white transition-colors">
                                <i class="ri-shield-check-line"></i>
                            </div>
                            <span class="text-[13px] font-bold text-slate-700">QA & Testing</span>
                        </a>
                    </div>
                </div>

                <a href="{{ route('it.contact') }}" class="nav-link-it {{ request()->routeIs('it.contact') ? 'active' : '' }}">Contact Us</a>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Overlay --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden bg-white border-t border-slate-100 p-8 shadow-2xl h-screen overflow-y-auto">
        
        <div class="space-y-4">
            <a href="{{ route('it.index') }}" class="block p-4 rounded-2xl bg-slate-50 text-slate-900 font-black uppercase text-sm">Home</a>
            <a href="{{ route('it.about') }}" class="block p-4 rounded-2xl bg-slate-50 text-slate-900 font-black uppercase text-sm">About Us</a>
            
            <div x-data="{ subOpen: false }">
                <button @click="subOpen = !subOpen" class="w-full flex items-center justify-between p-4 rounded-2xl bg-slate-50 text-slate-900 font-black uppercase text-sm">
                    Services
                    <i class="ri-arrow-down-s-line transition-transform" :class="subOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="subOpen" class="pl-4 py-2 space-y-2 mt-2" x-collapse>
                    <a href="{{ route('it.service-detail', 'custom-software-development') }}" class="block p-4 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">Custom Software</a>
                    <a href="{{ route('it.service-detail', 'web-application-development') }}" class="block p-4 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">Web Development</a>
                    <a href="{{ route('it.service-detail', 'mobile-application-development') }}" class="block p-4 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">Mobile Apps</a>
                    <a href="{{ route('it.service-detail', 'quality-assurance-testing') }}" class="block p-4 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">QA & Testing</a>
                </div>
            </div>

            <a href="{{ route('it.contact') }}" class="block p-4 rounded-2xl bg-slate-50 text-slate-900 font-black uppercase text-sm">Contact Us</a>

            <div class="pt-8 border-t border-slate-100">
                <a href="{{ route('it.contact') }}" class="w-full py-5 bg-cyan-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl flex items-center justify-center gap-3">
                    Launch Project <i class="ri-rocket-2-fill"></i>
                </a>
            </div>
        </div>
    </div>
</header>
