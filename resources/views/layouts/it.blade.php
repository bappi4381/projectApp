<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IT Solutions | PixelForge Group')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-nav {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .text-gradient {
            background: linear-gradient(to right, #06b6d4, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-[#020617] text-slate-300">
    {{-- Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('it.index') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-cyan-500 flex items-center justify-center text-white shadow-lg shadow-cyan-500/20">
                    <i class="ri-terminal-window-line text-xl"></i>
                </div>
                <span class="text-xl font-bold text-white">IT Solutions</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('it.index') }}" class="text-sm font-semibold hover:text-cyan-400 transition-colors">Home</a>
                <a href="{{ route('it.about') }}" class="text-sm font-semibold hover:text-cyan-400 transition-colors">About Us</a>
                
                {{-- Services Dropdown --}}
                <div class="relative group">
                    <button class="flex items-center gap-1.5 text-sm font-semibold hover:text-cyan-400 transition-colors py-8">
                        Services
                        <i class="ri-arrow-down-s-line transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-0 w-64 bg-slate-900 border border-white/5 rounded-2xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all shadow-2xl">
                        <a href="{{ route('it.service-detail', 'custom-software-development') }}" class="block px-4 py-3 rounded-xl text-sm hover:bg-white/5 hover:text-cyan-400 transition-all">Custom Software Development</a>
                        <a href="{{ route('it.service-detail', 'web-application-development') }}" class="block px-4 py-3 rounded-xl text-sm hover:bg-white/5 hover:text-cyan-400 transition-all">Web Application Development</a>
                        <a href="{{ route('it.service-detail', 'mobile-application-development') }}" class="block px-4 py-3 rounded-xl text-sm hover:bg-white/5 hover:text-cyan-400 transition-all">Mobile Application Development</a>
                        <a href="{{ route('it.service-detail', 'quality-assurance-testing') }}" class="block px-4 py-3 rounded-xl text-sm hover:bg-white/5 hover:text-cyan-400 transition-all">Quality Assurance & Testing</a>
                    </div>
                </div>

                <a href="{{ route('it.contact') }}" class="text-sm font-semibold hover:text-cyan-400 transition-colors">Contact Us</a>
            </div>

            <a href="{{ route('it.contact') }}" class="px-6 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-cyan-600/20">
                Get a Quote
            </a>
        </div>
    </nav>

    <main class="pt-20">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-[#020617] border-t border-white/5 py-20 mt-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500 flex items-center justify-center text-white">
                        <i class="ri-terminal-window-line text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-white">IT Solutions</span>
                </div>
                <p class="text-slate-500 leading-relaxed max-w-sm">
                    Empowering businesses with enterprise-grade software solutions, digital transformation, and strategic technology consulting.
                </p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Explore</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Home</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">About Us</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Services</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Contact</h4>
                <ul class="space-y-4 text-sm font-medium text-slate-500">
                    <li class="flex items-center gap-3"><i class="ri-mail-line text-cyan-500"></i> info@pixelforge.it</li>
                    <li class="flex items-center gap-3"><i class="ri-phone-line text-cyan-500"></i> +1 (234) 567-890</li>
                    <li class="flex items-center gap-3"><i class="ri-map-pin-line text-cyan-500"></i> Silicon Valley, CA</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 pt-20 flex justify-between items-center text-[10px] uppercase font-black tracking-widest text-slate-700">
            <span>&copy; 2024 PixelForge IT Solutions. All rights reserved.</span>
            <div class="flex gap-6">
                <a href="#" class="hover:text-slate-400 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-slate-400 transition-colors">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>
