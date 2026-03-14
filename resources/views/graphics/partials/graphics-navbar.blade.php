{{-- resources/views/partials/graphics-navbar.blade.php --}}
<nav id="graphics-navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-700 ease-in-out"
     x-data="{ 
        open: false, 
        servicesOpen: false, 
        offersOpen: false,
        activeSection: '{{ Request::routeIs('home') || Request::routeIs('graphics.index') ? 'home' : (Request::routeIs('graphics.services') ? 'services' : (Request::routeIs('graphics.portfolio') ? 'portfolio' : (Request::routeIs('graphics.blog') || Request::routeIs('graphics.blog.single') ? 'blog' : (Request::routeIs('graphics.pricing') ? 'pricing' : (Request::routeIs('graphics.offers') ? 'offers' : (Request::routeIs('graphics.payment') ? 'payment' : (Request::routeIs('graphics.get-quote') ? 'quote' : ''))))))) }}',
        init() {
            window.addEventListener('scroll', () => {
                const nav = document.getElementById('graphics-navbar');
                const inner = document.getElementById('studio-nav-inner');
                
                // Shrinking effect
                if (window.scrollY > 40) {
                    nav.classList.add('nav-scrolled');
                    if(inner) inner.style.height = '76px';
                } else {
                    nav.classList.remove('nav-scrolled');
                    if(inner) inner.style.height = '100px';
                }
            });
        }
     }">

    <style>
        #graphics-navbar { 
            background: rgba(1, 68, 87, 0.4); 
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            padding: 0.5rem 0;
        }
        #graphics-navbar.nav-scrolled {
            background: rgba(1, 44, 55, 0.95);
            backdrop-filter: blur(32px) saturate(150%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 80px -20px rgba(0, 0, 0, 0.8);
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
            position: absolute; bottom: -6px; left: 50%; width: 4px; height: 4px;
            background: #facc15; border-radius: 50%; opacity: 0;
            transform: translateX(-50%) scale(0); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .studio-nav-link:hover .studio-link-dot { opacity: 1; transform: translateX(-50%) scale(1); }
        .active-dot { opacity: 1 !important; transform: translateX(-50%) scale(1.5) !important; }
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
                    <span class="text-white font-black text-2xl leading-none tracking-tighter uppercase group-hover:text-yellow-400 transition-colors">Color <span class="text-white">Experts</span></span>
                    <span class="text-white/40 text-[9px] font-bold tracking-[0.3em] uppercase mt-1">International Studio</span>
                </div>
            </a>

            {{-- Desktop Hub Navigation --}}
            <div class="hidden xl:flex items-center gap-10">
                <a href="{{ route('home') }}" class="studio-nav-link transition-colors"
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

                <div @mouseenter="servicesOpen = true" @mouseleave="servicesOpen = false">
                    <button class="studio-nav-link flex items-center gap-1.5 transition-colors"
                            :class="activeSection === 'services' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                        Services
                        <i class="ri-arrow-down-s-line text-sm transition-transform duration-300" :class="servicesOpen ? 'rotate-180' : ''"></i>
                        <span class="studio-link-dot" :class="activeSection === 'services' ? 'active-dot' : ''"></span>
                    </button>

                    {{-- MEGA MENU PANEL --}}
                    <div x-show="servicesOpen" x-cloak
                         @click.away="servicesOpen = false"
                         class="absolute top-20 md:top-24 left-1/2 -translate-x-1/2 w-screen max-w-[1500px] px-8 z-[60]"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-4">

                        <div class="bg-slate-900/98 backdrop-blur-3xl border border-white/[0.08] rounded-[32px] shadow-[0_40px_120px_rgba(0,0,0,0.9)] overflow-hidden">
                            <div class="px-10 py-10 max-h-[85vh] overflow-y-auto custom-scrollbar">
                                <div class="grid grid-cols-12 gap-8">

                                    {{-- Left: Header Panel --}}
                                    <div class="col-span-3 flex flex-col justify-between">
                                        <div>
                                            <span class="text-[10px] uppercase tracking-[0.25em] font-black text-yellow-400 block mb-3">Our Services</span>
                                            <h3 class="text-2xl font-black text-white leading-tight mb-3">Professional<br>Photo Editing</h3>
                                            <p class="text-slate-400 text-xs leading-relaxed">World-class image editing for e-commerce, fashion, real estate &amp; more.</p>
                                        </div>
                                        <div class="mt-8 space-y-3">
                                            <a href="{{ route('graphics.services') }}" class="flex items-center gap-2 w-full py-3 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-300 text-slate-900 font-black text-[11px] uppercase tracking-widest transition-all">
                                                All Services <i class="ri-arrow-right-line"></i>
                                            </a>
                                            <a href="{{ route('graphics.get-quote') }}" class="flex items-center gap-2 w-full py-3 px-5 rounded-xl border border-white/10 hover:border-white/30 text-slate-300 hover:text-white font-bold text-[11px] uppercase tracking-widest transition-all">
                                                Get Free Quote <i class="ri-external-link-line"></i>
                                            </a>
                                        </div>
                                    </div>

                                    {{-- Right: Service Grid --}}
                                    <div class="col-span-9">
                                        <div class="grid grid-cols-5 gap-3">
                                            @foreach($mega_services as $svc)
                                            <a href="{{ route('graphics.service-detail', $svc['slug']) }}"
                                               class="group/svc relative flex flex-col rounded-xl overflow-hidden border border-white/[0.06] hover:border-yellow-400/40 transition-all duration-300 hover:-translate-y-1">
                                                {{-- Thumbnail --}}
                                                <div class="relative h-24 overflow-hidden bg-slate-800">
                                                    <img src="{{ $svc['img'] }}" alt="{{ $svc['name'] }}"
                                                         class="w-full h-full object-cover opacity-70 group-hover/svc:opacity-100 group-hover/svc:scale-105 transition-all duration-500">
                                                    {{-- overlay --}}
                                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent"></div>
                                                    {{-- icon badge --}}
                                                    <div class="absolute top-2 right-2 w-7 h-7 rounded-lg bg-yellow-400/20 backdrop-blur-sm flex items-center justify-center border border-yellow-400/30">
                                                        <i class="{{ $svc['icon'] }} text-yellow-400 text-[11px]"></i>
                                                    </div>
                                                </div>
                                                {{-- Text --}}
                                                <div class="p-3 bg-slate-800/60 group-hover/svc:bg-slate-800 transition-colors">
                                                    <span class="block text-[11px] font-black text-white leading-tight group-hover/svc:text-yellow-400 transition-colors">{{ $svc['name'] }}</span>
                                                    <span class="block text-[9px] text-slate-400 mt-0.5 leading-tight">{!! $svc['desc'] !!}</span>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('graphics.portfolio') }}" class="studio-nav-link transition-colors"
                   :class="activeSection === 'portfolio' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                    Our Work
                    <span class="studio-link-dot" :class="activeSection === 'portfolio' ? 'active-dot' : ''"></span>
                </a>

                <a href="{{ route('graphics.blog') }}" class="studio-nav-link transition-colors"
                   :class="activeSection === 'blog' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                    Blog
                    <span class="studio-link-dot" :class="activeSection === 'blog' ? 'active-dot' : ''"></span>
                </a>

                <a href="{{ route('graphics.pricing') }}" class="studio-nav-link transition-colors"
                   :class="activeSection === 'pricing' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                    Pricing
                    <span class="studio-link-dot" :class="activeSection === 'pricing' ? 'active-dot' : ''"></span>
                </a>

                <a href="{{ route('graphics.offers') }}" class="studio-nav-link transition-colors"
                   :class="activeSection === 'offers' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                    Offers
                    <span class="studio-link-dot" :class="activeSection === 'offers' ? 'active-dot' : ''"></span>
                </a>

                <a href="{{ route('graphics.payment') }}" class="studio-nav-link transition-colors"
                   :class="activeSection === 'payment' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                    Payment
                    <span class="studio-link-dot" :class="activeSection === 'payment' ? 'active-dot' : ''"></span>
                </a>

                <a href="{{ route('graphics.get-quote') }}" class="studio-nav-link transition-colors"
                   :class="activeSection === 'quote' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                    Get Quote
                    <span class="studio-link-dot" :class="activeSection === 'quote' ? 'active-dot' : ''"></span>
                </a>
            </div>

            {{-- Action Group --}}
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

            {{-- Mobile Trigger --}}
            <button @click="open = !open" class="xl:hidden w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 border border-white/5 text-white">
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

            <a href="{{ route('graphics.offers') }}" @click="open = false"
               class="block text-2xl font-black tracking-tighter uppercase transition-colors"
               :class="activeSection === 'offers' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">OFFERS</a>

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
        </div>
    </div>
</nav>


