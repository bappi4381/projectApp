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

                    <div x-data="{ imageEditOpen: false }" @mouseenter="imageEditOpen = true" @mouseleave="imageEditOpen = false" class="relative group">
                        <a href="{{ route('graphics.services') }}" class="studio-nav-link transition-colors flex items-center gap-1 cursor-pointer"
                           :class="activeSection === 'services' || request()->is('services*') ? 'text-yellow-400' : ''">
                            IMAGE EDITING
                            <i class="ri-arrow-down-s-line text-[14px] transition-transform duration-300" :class="imageEditOpen ? 'rotate-180' : ''"></i>
                            <span class="studio-link-dot" :class="activeSection === 'services' || request()->is('services*') ? 'active-dot' : ''"></span>
                        </a>

                        <div x-show="imageEditOpen" x-cloak
                             class="fixed left-0 right-0 pt-6 z-[60]" style="top: auto;"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2">
                            <div class="bg-white rounded shadow-xl border border-[#eee] py-8 px-6 flex justify-between gap-6">
                                {{-- Col 1 --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Remove Background From Images</h4>
                                    <ul class="space-y-3">
                                        <li><a href="{{ route('graphics.service-detail', 'clipping-path') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Clipping Path Service</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'ghost-mannequin') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Ghost Mannequin Effect</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'image-masking') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Photoshop Image Masking</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'shadow-services') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Photoshop Shadow Service</a></li>
                                    </ul>
                                </div>
                                {{-- Col 2 --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Professional Photo Retouching</h4>
                                    <ul class="space-y-3">
                                        <li><a href="{{ route('graphics.service-detail', 'photo-restoration') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Photo Restoration Service</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'color-correction') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Photoshop Color Correction</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'photo-retouching') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Photography Retouching</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'high-end-retouching') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">High End Photo Retouching</a></li>
                                    </ul>
                                </div>
                                {{-- Col 3 --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Photography Post Production</h4>
                                    <ul class="space-y-3">
                                        <li><a href="{{ route('graphics.service-detail', 'product-photo-editing') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Product Photo Editing</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'wedding-photo-editing') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Wedding Photo Retouching</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'real-estate-editing') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Real Estate Photo Editing</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'image-blending') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Image Blending Service</a></li>
                                    </ul>
                                </div>
                                {{-- Col 4 --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Creative Editing Services</h4>
                                    <ul class="space-y-3">
                                        <li><a href="{{ route('graphics.service-detail', 'photo-manipulation') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Creative Photo Manipulation</a></li>
                                        <li><a href="{{ route('graphics.service-detail', '3d-modeling') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">3D Modeling Services</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'desktop-publishing') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Desktop Publishing</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'video-editing') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Video Editing and Post Production Services</a></li>
                                    </ul>
                                </div>
                                {{-- Col 5 --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Vector Illustration & Conversion</h4>
                                    <ul class="space-y-3">
                                        <li><a href="{{ route('graphics.service-detail', 'raster-to-vector') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Raster to Vector Conversion</a></li>
                                        <li><a href="{{ route('graphics.service-detail', 'vector-line-drawing') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Vector Line Drawing & Artwork</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ videoProdOpen: false }" @mouseenter="videoProdOpen = true" @mouseleave="videoProdOpen = false" class="relative group">
                        <a href="#" class="studio-nav-link transition-colors flex items-center gap-1 cursor-pointer">
                            VIDEO PRODUCTION
                            <i class="ri-arrow-down-s-line text-[14px] transition-transform duration-300" :class="videoProdOpen ? 'rotate-180' : ''"></i>
                            <span class="studio-link-dot"></span>
                        </a>

                        <div x-show="videoProdOpen" x-cloak
                             class="fixed left-0 right-0 pt-6 z-[60]" style="top: auto;"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2">
                            <div class="bg-white rounded shadow-xl border border-[#eee] py-8 px-6 flex justify-between gap-6">
                                {{-- Col 1: Video Editing Services --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Video Editing Services</h4>
                                    <ul class="space-y-3">
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">E-Commerce Video Editing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Video Background Removal Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Video Object Removal Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Rotoscoping Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Video Resizing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Subtitling Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Video Ad Creation Service</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Vlog Editing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Video Masking</a></li>
                                    </ul>
                                </div>
                                {{-- Col 2: Video Post Production Services --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Video Post Production Services</h4>
                                    <ul class="space-y-3">
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Video Color Grading Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Film Editing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Drone Video Editing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Wedding Video Editing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Music Video Editing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Corporate Video Editing Services</a></li>
                                    </ul>
                                </div>
                                {{-- Col 3: Audio Editing --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Audio Editing</h4>
                                    <ul class="space-y-3">
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Audio Enhancement Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Audio Mixing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Audio Noise Reduction Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Dialogue Editing</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Artificial Voice Over Editing Service</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Podcast Audio Editing</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Voice Over Editing</a></li>
                                    </ul>
                                </div>
                                {{-- Col 4: Story Boarding --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Story Boarding</h4>
                                    <ul class="space-y-3">
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Script Writing Services</a></li>
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Explanatory Video</a></li>
                                    </ul>
                                </div>
                                {{-- Col 5: Animation Services --}}
                                <div class="flex-1">
                                    <h4 class="text-[#0c5a9e] font-bold text-[13px] mb-4 leading-snug">Animation Services</h4>
                                    <ul class="space-y-3">
                                        <li><a href="#" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Web Animation Service</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('graphics.pricing') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'pricing' ? 'text-yellow-400' : ''">
                        Price
                        <span class="studio-link-dot" :class="activeSection === 'pricing' ? 'active-dot' : ''"></span>
                    </a>

                    <a href="{{ route('graphics.payment') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'payment' ? 'text-yellow-400' : ''">
                        Payment
                        <span class="studio-link-dot" :class="activeSection === 'payment' ? 'active-dot' : ''"></span>
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
                             class="absolute top-full -translate-x-1/2 left-1/2 pt-6 w-[300px] z-[60]"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2">
                            <div class="bg-white rounded shadow-xl border border-[#eee] py-5 px-6 flex flex-col gap-4">
                                <a href="{{ url('/offers/first-order-free') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">First Order Free</a>
                                <a href="{{ url('/offers/comeback-campaign') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Comeback Campaign</a>
                                <a href="{{ url('/offers/40-percent-off') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Get Up to 40% Off</a>
                                <a href="{{ url('/offers/christmas-photo-editing') }}" class="text-[13px] text-[#666] hover:text-[#0c5a9e] transition-colors block">Christmas Photo Editing</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('graphics.get-quote') }}" class="studio-nav-link transition-colors"
                       :class="activeSection === 'quote' ? 'text-yellow-400' : ''">
                        Get a Quote
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
                    
                    <div x-data="{ imageEditSub: false }">
                        <button @click="imageEditSub = !imageEditSub" 
                                class="flex items-center justify-between w-full text-2xl font-black tracking-tighter uppercase transition-colors"
                                :class="activeSection === 'services' || '{{ Request::routeIs('graphics.services') }}' ? 'text-yellow-400' : 'text-white/70 hover:text-white'">
                            IMAGE EDITING <i :class="imageEditSub ? 'ri-subtract-line' : 'ri-arrow-right-down-line'"></i>
                        </button>
                        <div x-show="imageEditSub" class="mt-4 flex flex-col gap-6 pl-4 border-l border-white/10" x-collapse>
                            
                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Remove Background From Images</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="{{ route('graphics.service-detail', 'clipping-path') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Clipping Path Service</a>
                                    <a href="{{ route('graphics.service-detail', 'ghost-mannequin') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Ghost Mannequin Effect</a>
                                    <a href="{{ route('graphics.service-detail', 'image-masking') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Photoshop Image Masking</a>
                                    <a href="{{ route('graphics.service-detail', 'shadow-services') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Photoshop Shadow Service</a>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Professional Photo Retouching</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="{{ route('graphics.service-detail', 'photo-restoration') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Photo Restoration Service</a>
                                    <a href="{{ route('graphics.service-detail', 'color-correction') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Photoshop Color Correction</a>
                                    <a href="{{ route('graphics.service-detail', 'photo-retouching') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Photography Retouching</a>
                                    <a href="{{ route('graphics.service-detail', 'high-end-retouching') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">High End Photo Retouching</a>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Photography Post Production</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="{{ route('graphics.service-detail', 'product-photo-editing') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Product Photo Editing</a>
                                    <a href="{{ route('graphics.service-detail', 'wedding-photo-editing') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Wedding Photo Retouching</a>
                                    <a href="{{ route('graphics.service-detail', 'real-estate-editing') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Real Estate Photo Editing</a>
                                    <a href="{{ route('graphics.service-detail', 'image-blending') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Image Blending Service</a>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Creative Editing Services</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="{{ route('graphics.service-detail', 'photo-manipulation') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Creative Photo Manipulation</a>
                                    <a href="{{ route('graphics.service-detail', '3d-modeling') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">3D Modeling Services</a>
                                    <a href="{{ route('graphics.service-detail', 'desktop-publishing') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Desktop Publishing</a>
                                    <a href="{{ route('graphics.service-detail', 'video-editing') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Video Editing and Post Production Services</a>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Vector Illustration & Conversion</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="{{ route('graphics.service-detail', 'raster-to-vector') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Raster to Vector Conversion</a>
                                    <a href="{{ route('graphics.service-detail', 'vector-line-drawing') }}" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Vector Line Drawing & Artwork</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div x-data="{ videoProdSub: false }">
                        <button @click="videoProdSub = !videoProdSub" 
                                class="flex items-center justify-between w-full text-2xl font-black tracking-tighter uppercase transition-colors text-white/70 hover:text-white">
                            VIDEO PRODUCTION <i :class="videoProdSub ? 'ri-subtract-line' : 'ri-arrow-right-down-line'"></i>
                        </button>
                        <div x-show="videoProdSub" class="mt-4 flex flex-col gap-6 pl-4 border-l border-white/10" x-collapse>
                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Video Editing Services</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">E-Commerce Video Editing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Video Background Removal Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Video Object Removal Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Rotoscoping Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Video Resizing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Subtitling Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Video Ad Creation Service</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Vlog Editing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Video Masking</a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Video Post Production Services</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Video Color Grading Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Film Editing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Drone Video Editing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Wedding Video Editing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Music Video Editing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Corporate Video Editing Services</a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Audio Editing</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Audio Enhancement Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Audio Mixing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Audio Noise Reduction Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Dialogue Editing</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Artificial Voice Over Editing Service</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Podcast Audio Editing</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Voice Over Editing</a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Story Boarding</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Script Writing Services</a>
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Explanatory Video</a>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-[14px] mb-2">Animation Services</h4>
                                <div class="flex flex-col gap-2 pl-2 border-l border-white/10">
                                    <a href="#" @click="open = false" class="text-[13px] font-normal text-white/60 hover:text-white transition-colors">Web Animation Service</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('graphics.pricing') }}" @click="open = false"
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'pricing' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">PRICE</a>

                    <a href="{{ route('graphics.payment') }}" @click="open = false"
                       class="block text-2xl font-black tracking-tighter uppercase transition-colors"
                       :class="activeSection === 'payment' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">PAYMENT</a>

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
                       :class="activeSection === 'quote' ? 'text-yellow-400' : 'text-white hover:text-yellow-400'">GET A QUOTE</a>

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


