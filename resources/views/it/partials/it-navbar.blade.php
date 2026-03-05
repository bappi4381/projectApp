{{-- resources/views/it/partials/it-navbar.blade.php --}}
<header id="it-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" x-data="{ open: false, scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)">

    <style>
        #it-header { background: white; }
        #it-header.header-scrolled {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
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
            justify-content: center; /* Center the links */
        }

        .nav-link-it {
            color: #1e293b;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            transition: all 0.3s;
            padding: 1rem 0;
            display: inline-block;
        }
        .nav-link-it:hover, .nav-link-it.active {
            color: #3ABEF9;
        }

        .auth-link {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #64748b;
            transition: color 0.3s;
        }
        .auth-link:hover { color: #3ABEF9; }

        .support-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0 1.5rem;
        }

        .logo-it {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        @media (max-width: 1024px) {
            .top-row { height: 70px; border-bottom: none; }
            .bottom-row { display: none; }
        }
    </style>

    <div class="max-w-[1500px] mx-auto px-6">
        {{-- Row 1: Logo, Auth, Contact, CTA --}}
        <div class="top-row">
            {{-- Logo --}}
            <a href="{{ route('it.index') }}" class="logo-it">
                <img src="https://it.pixelforgegroup.com/assets/images/logo.png" alt="FUTURE IT" class="h-12 w-auto" onerror="this.outerHTML='<div class=\'flex flex-col items-center\'><div class=\'flex items-center gap-1\'><div class=\'w-10 h-10 bg-slate-400 rounded-sm skew-x-[-15deg] flex items-center justify-center text-white font-black text-xl\'>F</div><div class=\'w-10 h-10 bg-sky-500 rounded-sm skew-x-[-15deg] flex items-center justify-center text-white font-black text-xl\'>IT</div></div><span class=\'text-[10px] font-black text-slate-800 tracking-[0.2em] uppercase mt-1\'>Future IT</span></div>'">
            </a>

            {{-- Right Section --}}
            <div class="hidden lg:flex items-center divide-x divide-slate-100">
                {{-- Auth Links --}}
                <div class="px-6 flex items-center gap-4">
                    <a href="/login" class="auth-link">Login</a>
                    <span class="text-slate-200">|</span>
                    <a href="/register" class="auth-link">Registration</a>
                </div>

                {{-- Contact Block --}}
                <div class="support-card px-8">
                    <div class="w-12 h-12 rounded-full bg-sky-50 flex items-center justify-center text-sky-500">
                        <i class="ri-customer-service-2-line text-2xl"></i>
                    </div>
                    <div class="flex flex-col">
                        <a href="tel:+8809611395376" class="text-[#1e293b] font-black text-base tracking-tight leading-none mb-1">+8809611395376</a>
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-wider uppercase">Su - Th : 09:00 am to 6:00 pm</span>
                    </div>
                </div>

                {{-- Action Button --}}
                <div class="pl-8 flex items-center gap-4">
                    <button class="p-2 text-slate-400 hover:text-sky-500">
                        <i class="ri-search-line text-2xl"></i>
                    </button>
                    <a href="#" class="bg-[#3ABEF9] hover:bg-[#0078D4] text-white px-8 py-4 rounded-lg font-black text-xs tracking-[0.15em] transition-all flex items-center gap-3 shadow-xl shadow-sky-500/10">
                        GET A QUOTE
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>

            {{-- Mobile Toggle --}}
            <button @click="open = !open" class="lg:hidden text-slate-800 text-3xl">
                <i :class="open ? 'ri-close-line' : 'ri-menu-3-line'"></i>
            </button>
        </div>

        {{-- Row 2: Navigation Links (CENTERED) --}}
        <div class="bottom-row hidden lg:flex">
            <div class="flex items-center gap-10 2xl:gap-14">
                <a href="{{ route('home') }}" class="nav-link-it text-sky-500 active">Home</a>
                
                {{-- Domain Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it flex items-center gap-1 cursor-pointer">
                        Domain
                        <i class="ri-arrow-down-s-line text-lg font-normal transition-transform duration-300" :class="dropdownOpen ? 'rotate-180' : ''"></i>
                    </button>
                    
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-3"
                         class="absolute left-0 top-full mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl z-50">
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Domain Price List</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Register a Domain</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Domain Reseller</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Domain Control Panel</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Whois Search</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">.BD Domain Registration</a>
                    </div>
                </div>

                {{-- Hosting Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it flex items-center gap-1 cursor-pointer">
                        Hosting
                        <i class="ri-arrow-down-s-line text-lg font-normal transition-transform duration-300" :class="dropdownOpen ? 'rotate-180' : ''"></i>
                    </button>
                    
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-3"
                         class="absolute left-0 top-full mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl z-50">
                        {{-- Web Hosting Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Web Hosting</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Linux Shared Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Windows Shared Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">eCommerce Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">News Portal Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Business Web Hosting</a>
                            </div>
                        </div>
                        
                        {{-- Reseller Hosting Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Reseller Hosting</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Linux Reseller Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Windows Reseller Hosting</a>
                            </div>
                        </div>

                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Cloud Hosting</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">BDIX Hosting</a>

                        {{-- Professional Email Hosting Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Professional Email Hosting</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Enterprise Email Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Google Workspace</a>
                            </div>
                        </div>

                        {{-- Application Hosting Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Application Hosting</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">WordPress Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Java Hosting</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">.Net Hosting</a>
                            </div>
                        </div>

                        {{-- VPS Servers Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">VPS Servers</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Linux VPS Servers</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Windows VPS Servers</a>
                            </div>
                        </div>

                        {{-- Dedicated Servers Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Dedicated Servers</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full bottom-0 mb-0 w-64 bg-[#f8f9fa] border-b-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Linux Dedicated Servers</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Windows Dedicated Servers</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Enterprise Mail Servers</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Website Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it flex items-center gap-1">
                        Website
                        <i class="ri-arrow-down-s-line text-lg opacity-80 group-hover:-rotate-180 transition-transform duration-300"></i>
                    </button>
                    
                    {{-- Dropdown Container --}}
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-3"
                         class="absolute left-0 top-full mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl z-50">
                        
                        {{-- Web Design & Development Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Web Design & Development</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-[280px] bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">E-commerce Websites</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Corporate Websites</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Marketplace Website</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">News Portal Websites</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Portfolio Websites</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Blog Based Websites</a>
                            </div>
                        </div>

                        {{-- Mobile App Development Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Mobile App Development</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">E-commerce Apps</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">News Portal Apps</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Food Ordering Apps</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Ridesharing Apps</a>
                            </div>
                        </div>

                        {{-- Graphic Design & Animation Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Graphic Design & Animation</span>
                                </span>
                                <i class="ri-arrow-right-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-3"
                                 class="absolute left-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Logo Design</a>
                            </div>
                        </div>

                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">IP TV Solution</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Online Radio Solution</a>
                    </div>
                </div>
                {{-- Software Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it flex items-center gap-1">
                        Software
                        <i class="ri-arrow-down-s-line text-lg opacity-80 group-hover:-rotate-180 transition-transform duration-300"></i>
                    </button>
                    
                    {{-- Dropdown Container (Two Column) --}}
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-3"
                         class="absolute left-0 top-full mt-0 w-[560px] bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl z-50">
                        <div class="grid grid-cols-2">
                            <div class="flex flex-col border-r border-slate-200">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Wholesale & Retail (POS)</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Restaurant (POS)</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Hotel Management</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Pharmacy Management</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Accounting Software</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">HR & Payroll Software</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">E-commerce Management</a>
                            </div>
                            <div class="flex flex-col">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">School Management</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Hospital ERP Software</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Garments ERP Software</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Real Estate Software</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">ISP Billing Software</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Bus Ticket Booking Software</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Tour & Travel Software</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Digital Marketing Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it flex items-center gap-1">
                        Digital Marketing
                        <i class="ri-arrow-down-s-line text-lg opacity-80 group-hover:-rotate-180 transition-transform duration-300"></i>
                    </button>
                    
                    {{-- Dropdown Container --}}
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-3"
                         class="absolute left-0 top-full mt-0 w-72 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl z-50">
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">SMS Marketing</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">SMS Reseller</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">E-mail Marketing</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Facebook Marketing</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Facebook Ads Manager</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">WhatsApp Marketing</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Youtube Marketing</a>
                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">SEO (Search Engine Optimization)</a>
                    </div>
                </div>

                {{-- Company Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it flex items-center gap-1">
                        Company
                        <i class="ri-arrow-down-s-line text-lg opacity-80 group-hover:-rotate-180 transition-transform duration-300"></i>
                    </button>
                    
                    {{-- Dropdown Container --}}
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-3"
                         class="absolute right-0 top-full mt-0 w-[560px] bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl z-50">
                        <div class="grid grid-cols-2">
                            <div class="flex flex-col border-r border-slate-200">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Message From Founder</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">About Us</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Company Profile</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Our Skill</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Our Portfolio</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Our Clients</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors border-b lg:border-none border-slate-200">Career</a>
                            </div>
                            <div class="flex flex-col">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Our Experts</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Our Leadership Team</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">News & Events</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Partnerships</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">Membership & Certification</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Payment System</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Security & Backup Dropdown --}}
                <div class="relative group" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button class="nav-link-it flex items-center gap-1">
                        Security & Backup
                        <i class="ri-arrow-down-s-line text-lg opacity-80 group-hover:-rotate-180 transition-transform duration-300"></i>
                    </button>
                    
                    {{-- Dropdown Container --}}
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-3"
                         class="absolute right-0 top-full mt-0 w-[280px] bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl z-50">
                        
                        {{-- Website Security Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Website Security</span>
                                </span>
                                <i class="ri-arrow-left-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 translate-x-3"
                                 class="absolute right-full top-0 mt-0 w-64 bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white border-b border-slate-200 transition-colors">SSL Certificates</a>
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Sitelock Web Security</a>
                            </div>
                        </div>

                        {{-- Website Backup Sub-menu --}}
                        <div class="relative group/sub" x-data="{ subOpen: false }" @mouseenter="subOpen = true" @mouseleave="subOpen = false">
                            <button class="w-full text-left px-6 py-3.5 text-slate-800 text-[15px] font-medium border-b border-slate-200 transition-colors flex items-center justify-between group-hover/sub:bg-[#3ABEF9] group-hover/sub:text-white">
                                <span class="flex items-center gap-2">
                                    <span class="opacity-0 group-hover/sub:opacity-100 transition-opacity absolute left-4 border-t border-white w-2"></span>
                                    <span class="group-hover/sub:pl-4 transition-all">Website Backup</span>
                                </span>
                                <i class="ri-arrow-left-s-line text-lg opacity-0 group-hover/sub:opacity-100 transition-opacity"></i>
                            </button>
                            
                            <div x-show="subOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-x-3"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 translate-x-3"
                                 class="absolute right-full top-0 mt-0 w-[280px] bg-[#f8f9fa] border-t-[3px] border-[#3ABEF9] shadow-xl">
                                <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">CodeGuard Website Backup</a>
                            </div>
                        </div>

                        <a href="#" class="block px-6 py-3.5 text-slate-800 text-[15px] font-medium hover:text-[#3ABEF9] hover:bg-white transition-colors">Physical Security</a>
                    </div>
                </div>
                <a href="#" class="nav-link-it">Contact Us</a>
            </div>
        </div>
    </div>

    {{-- Mobile Sidebar / Menu --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden bg-white border-t border-slate-100 p-8 shadow-2xl h-screen overflow-y-auto">
        <div class="space-y-6">
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-50">
                <a href="/login" class="nav-link-it text-sm">Login</a>
                <span class="text-slate-300">|</span>
                <a href="/register" class="nav-link-it text-sm">Registration</a>
            </div>
            <a href="{{ route('home') }}" class="block nav-link-it text-sky-500 active text-lg border-b border-slate-50 pb-4">Home</a>
            
            {{-- Mobile Domain Dropdown --}}
            <div x-data="{ mobileDropdownOpen: false }">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex items-center justify-between nav-link-it text-lg border-b border-slate-50 pb-4">
                    Domain
                    <i class="ri-arrow-down-s-line transition-transform duration-300" :class="mobileDropdownOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 py-2 space-y-2 border-b border-slate-50" x-collapse>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Domain Price List</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Register a Domain</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Domain Reseller</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Domain Control Panel</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Whois Search</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">.BD Domain Registration</a>
                </div>
            </div>

            {{-- Mobile Hosting Dropdown --}}
            <div x-data="{ mobileDropdownOpen: false }">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex items-center justify-between nav-link-it text-lg border-b border-slate-50 pb-4">
                    Hosting
                    <i class="ri-arrow-down-s-line transition-transform duration-300" :class="mobileDropdownOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 py-2 space-y-2 border-b border-slate-50" x-collapse>
                    {{-- Mobile Web Hosting Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Web Hosting
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Linux Shared Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Windows Shared Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">eCommerce Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">News Portal Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Business Web Hosting</a>
                        </div>
                    </div>
                    
                    {{-- Mobile Reseller Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Reseller Hosting
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Linux Reseller Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Windows Reseller Hosting</a>
                        </div>
                    </div>

                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Cloud Hosting</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">BDIX Hosting</a>

                    {{-- Mobile Email Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Professional Email Hosting
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Enterprise Email Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Google Workspace</a>
                        </div>
                    </div>

                    {{-- Mobile Application Hosting Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Application Hosting
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">WordPress Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Java Hosting</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">.Net Hosting</a>
                        </div>
                    </div>

                    {{-- Mobile VPS Servers Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            VPS Servers
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Linux VPS Servers</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Windows VPS Servers</a>
                        </div>
                    </div>

                    {{-- Mobile Dedicated Servers Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Dedicated Servers
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Linux Dedicated Servers</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Windows Dedicated Servers</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Enterprise Mail Servers</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Mobile Website Dropdown --}}
            <div x-data="{ mobileDropdownOpen: false }">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex items-center justify-between nav-link-it text-lg border-b border-slate-50 pb-4">
                    Website
                    <i class="ri-arrow-down-s-line transition-transform duration-300" :class="mobileDropdownOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 py-2 space-y-2 border-b border-slate-50" x-collapse>
                    
                    {{-- Mobile Web Design Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Web Design & Development
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">E-commerce Websites</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Corporate Websites</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Marketplace Website</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">News Portal Websites</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Portfolio Websites</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Blog Based Websites</a>
                        </div>
                    </div>

                    {{-- Mobile App Development Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Mobile App Development
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">E-commerce Apps</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">News Portal Apps</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Food Ordering Apps</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Ridesharing Apps</a>
                        </div>
                    </div>

                    {{-- Mobile Graphic Design Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Graphic Design & Animation
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Logo Design</a>
                        </div>
                    </div>

                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">IP TV Solution</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Online Radio Solution</a>
                </div>
            </div>
            {{-- Mobile Software Dropdown --}}
            <div x-data="{ mobileDropdownOpen: false }">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex items-center justify-between nav-link-it text-lg border-b border-slate-50 pb-4">
                    Software
                    <i class="ri-arrow-down-s-line transition-transform duration-300" :class="mobileDropdownOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 py-2 space-y-2 border-b border-slate-50" x-collapse>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Wholesale & Retail (POS)</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Restaurant (POS)</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Hotel Management</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Pharmacy Management</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Accounting Software</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">HR & Payroll Software</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">E-commerce Management</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">School Management</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Hospital ERP Software</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Garments ERP Software</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Real Estate Software</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">ISP Billing Software</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Bus Ticket Booking Software</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Tour & Travel Software</a>
                </div>
            </div>
            {{-- Mobile Digital Marketing Dropdown --}}
            <div x-data="{ mobileDropdownOpen: false }">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex items-center justify-between nav-link-it text-lg border-b border-slate-50 pb-4">
                    Digital Marketing
                    <i class="ri-arrow-down-s-line transition-transform duration-300" :class="mobileDropdownOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 py-2 space-y-2 border-b border-slate-50" x-collapse>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">SMS Marketing</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">SMS Reseller</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">E-mail Marketing</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Facebook Marketing</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Facebook Ads Manager</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">WhatsApp Marketing</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Youtube Marketing</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">SEO (Search Engine Optimization)</a>
                </div>
            </div>

            {{-- Mobile Company Dropdown --}}
            <div x-data="{ mobileDropdownOpen: false }">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex items-center justify-between nav-link-it text-lg border-b border-slate-50 pb-4">
                    Company
                    <i class="ri-arrow-down-s-line transition-transform duration-300" :class="mobileDropdownOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 py-2 space-y-2 border-b border-slate-50" x-collapse>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Message From Founder</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">About Us</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Company Profile</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Our Skill</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Our Portfolio</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Our Clients</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Career</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Our Experts</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Our Leadership Team</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">News & Events</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Partnerships</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Membership & Certification</a>
                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Payment System</a>
                </div>
            </div>

            {{-- Mobile Security & Backup Dropdown --}}
            <div x-data="{ mobileDropdownOpen: false }">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex items-center justify-between nav-link-it text-lg border-b border-slate-50 pb-4">
                    Security & Backup
                    <i class="ri-arrow-down-s-line transition-transform duration-300" :class="mobileDropdownOpen ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 py-2 space-y-2 border-b border-slate-50" x-collapse>
                    
                    {{-- Mobile Website Security Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Website Security
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">SSL Certificates</a>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">Sitelock Web Security</a>
                        </div>
                    </div>

                    {{-- Mobile Website Backup Sub-menu --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full text-left py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 flex items-center justify-between">
                            Website Backup
                            <i class="ri-arrow-down-s-line transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="subOpen" class="pl-4 py-2 space-y-2 border-b border-slate-100 bg-slate-50 rounded-b-lg" x-collapse>
                            <a href="#" class="block py-2 text-sm text-slate-500 hover:text-[#3ABEF9]">CodeGuard Website Backup</a>
                        </div>
                    </div>

                    <a href="#" class="block py-2.5 text-slate-600 font-medium hover:text-[#3ABEF9] border-b border-slate-100 last:border-0">Physical Security</a>
                </div>
            </div>

            <a href="#" class="block nav-link-it text-lg border-b border-slate-50 pb-4">Contact Us</a>
            <div class="pt-6">
                <a href="tel:+8809611395376" class="flex items-center gap-4 mb-6">
                    <i class="ri-phone-fill text-sky-500 text-xl"></i>
                    <span class="font-black text-slate-800">+8809611395376</span>
                </a>
                <a href="#" class="block w-full py-5 bg-[#3ABEF9] text-center text-white font-black rounded-xl tracking-widest text-sm">GET A QUOTE</a>
            </div>
        </div>
    </div>
</header>

{{-- Spacer --}}
<div class="h-[150px] bg-white"></div>
