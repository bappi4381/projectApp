{{-- resources/views/partials/graphics-navbar.blade.php --}}
<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-700 ease-in-out"
     x-data="{ 
        open: false, 
        servicesOpen: false, 
        offersOpen: false,
        scrolled: false,
        activeSection: '{{ Request::routeIs('home') || Request::routeIs('graphics.index') ? 'home' : (Request::routeIs('graphics.services') ? 'services' : (Request::routeIs('graphics.portfolio') ? 'portfolio' : (Request::routeIs('graphics.blog') || Request::routeIs('graphics.blog.single') ? 'blog' : (Request::routeIs('graphics.pricing') ? 'pricing' : (Request::routeIs('graphics.offers') ? 'offers' : (Request::routeIs('graphics.payment') ? 'payment' : (Request::routeIs('graphics.get-quote') ? 'quote' : ''))))))) }}',
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 40;
                const nav = document.getElementById('main-navbar');
                const inner = document.getElementById('studio-nav-inner');
                
                if (this.scrolled) {
                    nav.classList.add('nav-scrolled');
                    if(inner) inner.style.height = '85px';
                } else {
                    nav.classList.remove('nav-scrolled');
                    if(inner) inner.style.height = '110px';
                }
            });
        }
     }">

    {{-- Top Bar (Main Header Row - Fixed) --}}
    <div class="hidden lg:block w-full border-b border-white/10 py-3 shadow-lg" style="background-color: #1072C2;">
        <div class="max-w-[1500px] mx-auto px-12 flex items-center justify-between">
            <div class="flex items-center gap-10 text-white font-bold text-[11px] tracking-[0.1em]">
                <a href="tel:+17575405884" class="flex items-center gap-2 hover:text-yellow-400 transition-colors">
                    <i class="ri-phone-fill text-yellow-400 text-sm"></i> USA: +1 757 540-5884 (Toll Free)
                </a>
                <a href="tel:+971502036939" class="flex items-center gap-2 hover:text-yellow-400 transition-colors border-l border-white/20 pl-10">
                    <i class="ri-phone-fill text-yellow-400 text-sm"></i> UAE: +97150 2036 939
                </a>
                <a href="mailto:info@colorexpertsbd.com" class="flex items-center gap-2 hover:text-yellow-400 transition-colors border-l border-white/20 pl-10">
                    <i class="ri-mail-fill text-yellow-400 text-sm"></i> info@colorexpertsbd.com
                </a>
            </div>
            <div class="flex items-center gap-8 text-white/90 font-bold text-[11px] uppercase tracking-widest">
                <a href="{{ route('graphics.blog') }}" class="hover:text-yellow-400 transition-all">Blog</a>
                <a href="#" class="hover:text-yellow-400 transition-all">Glossary</a>
                <a href="#" class="hover:text-yellow-400 transition-all">About Us</a>
                <a href="#" class="hover:text-yellow-400 transition-all">Contact Us</a>
                <a href="#" class="hover:text-yellow-400 transition-all">FAQ</a>
            </div>
        </div>
    </div>

    <style>
        #main-navbar { 
            background: transparent; 
            border-bottom: none;
            padding: 0;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #main-navbar.nav-scrolled {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-bottom: none;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
            padding: 0;
        }

        /* Color Transitions */
        .nav-text { color: white; transition: color 0.4s ease; }
        .nav-scrolled .nav-text { color: #0f172a; } /* slate-900 */
        
        .studio-nav-link {
            position: relative;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: white;
            transition: all 0.3s ease;
        }
        .nav-scrolled .studio-nav-link { color: #334155; } /* slate-700 */
        .nav-scrolled .studio-nav-link:hover { color: #facc15; }

        .studio-link-dot {
            position: absolute; bottom: -6px; left: 50%; width: 4px; height: 4px;
            background: #facc15; border-radius: 50%; opacity: 0;
            transform: translateX(-50%) scale(0); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .studio-nav-link:hover .studio-link-dot { opacity: 1; transform: translateX(-50%) scale(1); }
        .active-dot { opacity: 1 !important; transform: translateX(-50%) scale(1.5) !important; }
        
        /* Logo Transitions */
        .logo-text-primary { color: white; transition: color 0.4s ease; }
        .logo-text-secondary { color: rgba(255,255,255,0.4); transition: color 0.4s ease; }
        .nav-scrolled .logo-text-primary { color: #0f172a; }
        .nav-scrolled .logo-text-secondary { color: #64748b; }

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow { animation: spin-slow 15s linear infinite; }
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
                    <span class="logo-text-primary font-black text-2xl leading-none tracking-tighter uppercase transition-colors">Color <span class="transition-colors">Experts</span></span>
                    <span class="logo-text-secondary text-[9px] font-bold tracking-[0.3em] uppercase mt-1">International Studio</span>
                </div>
            </a>

            {{-- Desktop Hub Navigation --}}
            <div class="hidden xl:flex items-center gap-10">
                @if(Request::routeIs('graphics.get-quote'))
                    <a href="{{ route('graphics.index') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'home' ? 'text-yellow-400' : 'text-white hover:text-white/80'">
                        Home
                        <span class="studio-link-dot" :class="activeSection === 'home' ? 'active-dot' : ''"></span>
                    </a>
                    <a href="{{ route('graphics.payment') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'payment' ? 'text-yellow-400' : ''">
                        Payment
                        <span class="studio-link-dot" :class="activeSection === 'payment' ? 'active-dot' : ''"></span>
                    </a>
                    <a href="#" class="studio-nav-link transition-colors">
                        Contact Us
                        <span class="studio-link-dot"></span>
                    </a>
                @else
                    <a href="{{ route('graphics.index') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'home' ? 'text-yellow-400' : 'text-white hover:text-white/80'">
                        Home
                        <span class="studio-link-dot" :class="activeSection === 'home' ? 'active-dot' : ''"></span>
                    </a>
                    
                    {{-- Services Mega Menu --}}
                    @php
                    $mega_services = [
                        ['name'=>'Clipping Path',       'slug'=>'clipping-path',       'icon'=>'ri-scissors-cut-line',    'img'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=200&q=70',  'desc'=>'Precise path &amp; isolation'],
                        ['name'=>'Background Removal',  'slug'=>'background-removal',  'icon'=>'ri-eraser-line',           'img'=>'https://images.unsplash.com/photo-1584771145729-0bd5095b9d41?w=200&q=70', 'desc'=>'Clean, transparent output'],
                        ['name'=>'Photo Retouching',    'slug'=>'photo-retouching',    'icon'=>'ri-magic-line',            'img'=>'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=200&q=70', 'desc'=>'Skin, portrait &amp; beauty'],
                        ['name'=>'Ghost Mannequin',     'slug'=>'ghost-mannequin',     'icon'=>'ri-shirt-line',            'img'=>'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=200&q=70', 'desc'=>'Invisible mannequin effect'],
                        ['name'=>'Color Correction',    'slug'=>'color-correction',    'icon'=>'ri-palette-line',          'img'=>'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=200&q=70', 'desc'=>'Tone, balance &amp; grade'],
                        ['name'=>'Shadow Services',     'slug'=>'shadow-services',     'icon'=>'ri-contrast-2-line',       'img'=>'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=200&q=70', 'desc'=>'Drop, natural &amp; reflection'],
                        ['name'=>'Image Masking',       'slug'=>'image-masking',       'icon'=>'ri-crop-line',             'img'=>'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=200&q=70', 'desc'=>'Hair, fur &amp; complex edges'],
                        ['name'=>'Real Estate Editing', 'slug'=>'real-estate-editing', 'icon'=>'ri-home-4-line',           'img'=>'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=200&q=70', 'desc'=>'Sky replace, HDR &amp; staging'],
                        ['name'=>'Jewellery Editing',   'slug'=>'jewellery-editing',   'icon'=>'ri-gem-line',              'img'=>'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?w=200&q=70', 'desc'=>'Polish, sparkle &amp; dust'],
                        ['name'=>'Video Editing',       'slug'=>'video-editing',       'icon'=>'ri-video-line',            'img'=>'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=200&q=70', 'desc'=>'Grade, cut &amp; export'],
                    ];
                    $studio_services = $mega_services; // keep mobile menu working
                    @endphp

                    <div @mouseenter="servicesOpen = true" @mouseleave="servicesOpen = false" class="relative">
                        <a href="{{ route('graphics.services') }}" class="studio-nav-link transition-colors flex items-center gap-1 cursor-pointer"
                           :class="activeSection === 'services' || request()->is('services*') ? 'text-yellow-400' : ''">
                            Services
                            <i class="ri-arrow-down-s-line text-[14px] transition-transform duration-300" :class="servicesOpen ? 'rotate-180' : ''"></i>
                            <span class="studio-link-dot" :class="activeSection === 'services' || request()->is('services*') ? 'active-dot' : ''"></span>
                        </a>

                        <div x-show="servicesOpen" x-cloak
                             class="absolute top-full -translate-x-1/2 left-1/2 pt-6 w-[250px] z-[60]"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2">
                            <div class="bg-white rounded shadow-xl border border-[#eee] flex flex-col py-1 max-h-[70vh] overflow-y-auto custom-scrollbar">
                                @foreach($mega_services as $svc)
                                <a href="{{ route('graphics.service-detail', $svc['slug']) }}" class="px-5 py-3 text-[14px] font-normal text-[#555] hover:text-[#1072C2] hover:bg-slate-50 transition-colors {{ !$loop->last ? 'border-b border-[#f5f5f5]' : '' }}">
                                    {{ $svc['name'] }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('graphics.portfolio') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'portfolio' ? 'text-yellow-400' : ''">
                        Our Work
                        <span class="studio-link-dot" :class="activeSection === 'portfolio' ? 'active-dot' : ''"></span>
                    </a>

                    <a href="{{ route('graphics.blog') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'blog' ? 'text-yellow-400' : ''">
                        Blog
                        <span class="studio-link-dot" :class="activeSection === 'blog' ? 'active-dot' : ''"></span>
                    </a>

                    <a href="{{ route('graphics.pricing') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'pricing' ? 'text-yellow-400' : ''">
                        Pricing
                        <span class="studio-link-dot" :class="activeSection === 'pricing' ? 'active-dot' : ''"></span>
                    </a>

                    {{-- Offers Menu --}}
                    <div @mouseenter="offersOpen = true" @mouseleave="offersOpen = false" class="relative">
                        <a href="{{ url('/offers') }}" class="studio-nav-link transition-colors flex items-center gap-1 cursor-pointer"
                           :class="activeSection === 'offers' || request()->is('offers*') ? 'text-yellow-400' : ''">
                            Offers
                            <i class="ri-arrow-down-s-line text-[14px] transition-transform duration-300" :class="offersOpen ? 'rotate-180' : ''"></i>
                            <span class="studio-link-dot" :class="activeSection === 'offers' || request()->is('offers*') ? 'active-dot' : ''"></span>
                        </a>

                        <div x-show="offersOpen" x-cloak
                             class="absolute top-full -translate-x-1/2 left-1/2 pt-6 w-[230px] z-[60]"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2">
                            <div class="bg-white rounded shadow-xl border border-[#eee] flex flex-col py-1">
                                <a href="{{ url('/offers/first-order-free') }}" class="px-5 py-3 text-[14px] font-normal text-[#555] hover:text-[#1072C2] hover:bg-slate-50 transition-colors border-b border-[#f5f5f5]">First Order Free</a>
                                <a href="{{ url('/offers/comeback-campaign') }}" class="px-5 py-3 text-[14px] font-normal text-[#555] hover:text-[#1072C2] hover:bg-slate-50 transition-colors border-b border-[#f5f5f5]">Comeback Campaign</a>
                                <a href="{{ url('/offers/40-percent-off') }}" class="px-5 py-3 text-[14px] font-normal text-[#555] hover:text-[#1072C2] hover:bg-slate-50 transition-colors border-b border-[#f5f5f5]">Get Up to 40% Off</a>
                                <a href="{{ url('/offers/christmas-photo-editing') }}" class="px-5 py-3 text-[14px] font-normal text-[#555] hover:text-[#1072C2] hover:bg-slate-50 transition-colors">Christmas Photo Editing</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('graphics.payment') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'payment' ? 'text-yellow-400' : ''">
                        Payment
                        <span class="studio-link-dot" :class="activeSection === 'payment' ? 'active-dot' : ''"></span>
                    </a>

                    <a href="{{ route('graphics.get-quote') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'quote' ? 'text-yellow-400' : ''">
                        Get Quote
                        <span class="studio-link-dot" :class="activeSection === 'quote' ? 'active-dot' : ''"></span>
                    </a>
                @endif
            </div>

            {{-- Action Group --}}
            @if(!Request::routeIs('graphics.get-quote'))
            <div class="hidden lg:flex items-center gap-6">
                <a href="{{ route('graphics.get-quote') }}" class="relative group overflow-hidden px-10 py-4 rounded-full font-black text-[11px] uppercase tracking-[0.2em] transition-all hover:scale-105 active:scale-95 shadow-2xl shadow-yellow-400/20">
                    <div class="absolute inset-0 bg-yellow-400"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    <span class="relative text-slate-900 flex items-center gap-2">
                        Upload Files
                        <i class="ri-upload-cloud-2-line text-lg"></i>
                    </span>
                </a>
            </div>
            @endif

            {{-- Mobile Trigger --}}
            <button @click="open = !open" class="xl:hidden w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 border border-white/5 text-white nav-text">
                <i class="ri-menu-right-line text-2xl" x-show="!open"></i>
                <i class="ri-close-line text-2xl" x-show="open" x-cloak></i>
            </button>
        </div>

        {{-- Mobile Hub Overlay --}}
        <div x-show="open" x-cloak 
             class="xl:hidden fixed inset-x-0 top-0 h-screen bg-slate-950/98 backdrop-blur-3xl z-[100] overflow-y-auto">
            
            {{-- Mobile Header --}}
            <div class="flex items-center justify-between px-6 h-20 border-b border-white/5">
                <span class="text-white font-black uppercase tracking-widest text-sm">Navigation</span>
                <button @click="open = false" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 text-white">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>

            <div class="py-10 space-y-6 px-8">
                @if(Request::routeIs('graphics.get-quote'))
                    <a href="{{ route('graphics.index') }}" @click="open = false" 
                       class="block text-2xl font-black tracking-tighter transition-colors"
                       :class="activeSection === 'home' || '{{ Request::routeIs('graphics.index') }}' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">HOME</a>
                    
                    <a href="{{ route('graphics.payment') }}" @click="open = false" 
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'payment' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">PAYMENT</a>

                    <a href="#" @click="open = false" 
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors text-white hover:text-yellow-400">CONTACT US</a>
                @else
                    <a href="{{ route('graphics.index') }}" @click="open = false" 
                       class="block text-2xl font-black tracking-tighter transition-colors"
                       :class="activeSection === 'home' || '{{ Request::routeIs('graphics.index') }}' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">HOME</a>
                    
                    <div x-data="{ sub: false }">
                        <button @click="sub = !sub" 
                                class="flex items-center justify-between w-full text-2xl font-black tracking-tighter transition-colors"
                                :class="activeSection === 'services' || '{{ Request::routeIs('graphics.services') }}' ? 'text-yellow-400' : 'text-white/70'">
                            SERVICE <i :class="sub ? 'ri-subtract-line' : 'ri-arrow-right-down-line'"></i>
                        </button>
                        <div x-show="sub" class="mt-4 grid grid-cols-2 gap-3">
                            @foreach($studio_services as $svc)
                                <a href="{{ route('graphics.service-detail', $svc['slug']) }}" @click="open = false"
                                   class="flex items-center gap-2 text-sm font-bold text-white/60 hover:text-white">
                                    <i class="{{ $svc['icon'] }} text-yellow-400/70 text-xs"></i> {{ $svc['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('graphics.portfolio') }}" @click="open = false" 
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'portfolio' || '{{ Request::routeIs('graphics.portfolio') }}' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">OUR WORK</a>

                    <a href="{{ route('graphics.blog') }}" @click="open = false" 
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'blog' || '{{ Request::routeIs('graphics.blog') }}' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">BLOG</a>

                    <a href="{{ route('graphics.pricing') }}" @click="open = false"
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'pricing' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">PRICING</a>

                    <div x-data="{ offerSub: false }">
                        <button @click="offerSub = !offerSub" 
                                class="flex items-center justify-between w-full text-2xl font-black tracking-tighter transition-colors"
                                :class="activeSection === 'offers' || request()->is('offers*') ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                            OFFERS <i :class="offerSub ? 'ri-subtract-line' : 'ri-arrow-right-down-line'"></i>
                        </button>
                        <div x-show="offerSub" class="mt-4 flex flex-col gap-3 pl-4 border-l border-white/10" x-collapse>
                            <a href="{{ url('/offers/first-order-free') }}" @click="open = false" class="text-lg font-bold text-white/60 hover:text-white transition-colors">First Order Free</a>
                            <a href="{{ url('/offers/comeback-campaign') }}" @click="open = false" class="text-lg font-bold text-white/60 hover:text-white transition-colors">Comeback Campaign</a>
                            <a href="{{ url('/offers/40-percent-off') }}" @click="open = false" class="text-lg font-bold text-white/60 hover:text-white transition-colors">Get Up to 40% Off</a>
                            <a href="{{ url('/offers/christmas-photo-editing') }}" @click="open = false" class="text-lg font-bold text-white/60 hover:text-white transition-colors">Christmas Photo Editing</a>
                        </div>
                    </div>

                    <a href="{{ route('graphics.get-quote') }}" @click="open = false"
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'quote' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">GET QUOTE</a>

                    <a href="{{ route('graphics.payment') }}" @click="open = false"
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'payment' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">PAYMENT</a>

                    <div class="pt-8">
                        <a href="#" class="block w-full py-5 rounded-3xl bg-yellow-400 text-slate-900 font-black text-center text-sm uppercase tracking-widest hover:scale-[1.02] transition-transform">
                            UPLOAD FILES
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>


