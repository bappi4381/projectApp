{{-- resources/views/partials/footer.blade.php --}}
<footer class="relative bg-slate-950 border-t border-white/10 overflow-hidden">

    {{-- Background Glow --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-indigo-900/20 blur-3xl"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-cyan-900/20 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Top Footer Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 py-16">

            {{-- Brand Column --}}
            <div class="lg:col-span-1">
                <a href="{{ url('/') }}" class="flex items-center gap-3 mb-6">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 via-purple-500 to-cyan-500 shadow-lg">
                        <i class="ri-hexagon-fill text-white text-xl"></i>
                    </div>
                    <div class="flex flex-col leading-tight">
                        <span class="text-lg font-bold text-white">PixelForge</span>
                        <span class="text-[10px] font-medium tracking-widest text-slate-400 uppercase">Group</span>
                    </div>
                </a>
                <p class="text-sm text-slate-400 leading-relaxed mb-6">
                    Where Visual Excellence Meets Digital Innovation. Two powerful divisions. One unified vision.
                </p>
                {{-- Social Links --}}
                <div class="flex items-center gap-3">
                    <a href="#" class="social-icon flex h-9 w-9 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-indigo-600/80 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-indigo-500/25">
                        <i class="ri-facebook-fill text-base"></i>
                    </a>
                    <a href="#" class="social-icon flex h-9 w-9 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-sky-500/80 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-sky-500/25">
                        <i class="ri-twitter-x-line text-base"></i>
                    </a>
                    <a href="#" class="social-icon flex h-9 w-9 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-blue-700/80 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-blue-500/25">
                        <i class="ri-linkedin-fill text-base"></i>
                    </a>
                    <a href="#" class="social-icon flex h-9 w-9 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-600 transition-all duration-300 hover:scale-110">
                        <i class="ri-instagram-line text-base"></i>
                    </a>
                    <a href="#" class="social-icon flex h-9 w-9 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-red-600/80 transition-all duration-300 hover:scale-110">
                        <i class="ri-youtube-fill text-base"></i>
                    </a>
                </div>
            </div>

            {{-- Graphics Studio Column --}}
            <div>
                <a href="{{ route('graphics.index') }}" class="group/head flex items-center gap-2 mb-6">
                    <div class="h-5 w-1 rounded-full bg-gradient-to-b from-indigo-400 to-purple-500 group-hover/head:h-7 transition-all"></div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-indigo-300 group-hover/head:text-indigo-200 transition-colors">Graphics Studio</h4>
                </a>
                <ul class="space-y-3">
                    @foreach([
                        ['Photo Retouching', 'ri-magic-line'],
                        ['Video Editing', 'ri-film-line'],
                        ['3D Modeling', 'ri-cube-line'],
                        ['Clipping Path', 'ri-scissors-cut-line'],
                        ['Product Editing', 'ri-image-edit-line'],
                        ['Background Removal', 'ri-eraser-line'],
                        ['Real Estate Editing', 'ri-home-4-line'],
                        ['Ghost Mannequin', 'ri-t-shirt-line'],
                        ['Vector Conversion', 'ri-vector-line']
                    ] as [$service, $icon])
                    <li>
                        <a href="#" class="group flex items-center gap-2.5 text-sm text-slate-400 hover:text-indigo-300 transition-colors duration-200">
                            <i class="{{ $icon }} text-indigo-500/60 group-hover:text-indigo-400 transition-colors text-xs"></i>
                            {{ $service }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- IT Solutions Column --}}
            <div>
                <a href="{{ route('it.index') }}" class="group/head flex items-center gap-2 mb-6">
                    <div class="h-5 w-1 rounded-full bg-gradient-to-b from-cyan-400 to-blue-500 group-hover/head:h-7 transition-all"></div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-cyan-300 group-hover/head:text-cyan-200 transition-colors">IT Solutions</h4>
                </a>
                <ul class="space-y-3">
                    @foreach([
                        ['Website Design & Dev', 'ri-global-line'],
                        ['Mobile App Development', 'ri-smartphone-line'],
                        ['Digital Marketing', 'ri-advertisement-line'],
                        ['Software Development', 'ri-code-s-slash-line'],
                        ['E-commerce Solutions', 'ri-shopping-cart-2-line'],
                        ['Web Hosting', 'ri-server-line'],
                    ] as [$service, $icon])
                    <li>
                        <a href="#" class="group flex items-center gap-2.5 text-sm text-slate-400 hover:text-cyan-300 transition-colors duration-200">
                            <i class="{{ $icon }} text-cyan-500/60 group-hover:text-cyan-400 transition-colors text-xs"></i>
                            {{ $service }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Column --}}
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <div class="h-5 w-1 rounded-full bg-gradient-to-b from-slate-400 to-slate-600"></div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-300">Contact Us</h4>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-0.5 h-7 w-7 rounded-lg bg-indigo-900/50 flex items-center justify-center">
                            <i class="ri-map-pin-2-line text-xs text-indigo-400"></i>
                        </div>
                        <span class="text-sm text-slate-400">Mirpur DOHS, Dhaka 1216, Bangladesh</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 h-7 w-7 rounded-lg bg-cyan-900/50 flex items-center justify-center">
                            <i class="ri-mail-line text-xs text-cyan-400"></i>
                        </div>
                        <a href="mailto:hello@pixelforgegroup.com" class="text-sm text-slate-400 hover:text-cyan-300 transition-colors">hello@pixelforgegroup.com</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 h-7 w-7 rounded-lg bg-purple-900/50 flex items-center justify-center">
                            <i class="ri-phone-line text-xs text-purple-400"></i>
                        </div>
                        <a href="tel:+8801700000000" class="text-sm text-slate-400 hover:text-purple-300 transition-colors">+880 1700-000000</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 h-7 w-7 rounded-lg bg-green-900/50 flex items-center justify-center">
                            <i class="ri-whatsapp-line text-xs text-green-400"></i>
                        </div>
                        <a href="https://wa.me/8801700000000" target="_blank" class="text-sm text-slate-400 hover:text-green-300 transition-colors">WhatsApp Chat</a>
                    </li>
                </ul>

                {{-- Request a Quote CTA --}}
                <div id="quote" class="mt-8">
                    <a href="mailto:hello@pixelforgegroup.com?subject=Quote Request"
                       class="group inline-flex items-center justify-center gap-2 w-full px-5 py-3 rounded-xl text-sm font-semibold bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white shadow-lg shadow-indigo-500/20 hover:shadow-indigo-500/40 transition-all duration-300 hover:scale-[1.02]">
                        <i class="ri-send-plane-line text-base group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300"></i>
                        Request a Quote
                    </a>
                </div>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-white/10 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-slate-500">
                &copy; {{ date('Y') }} <span class="text-slate-400 font-medium">PixelForge Group</span>. All rights reserved.
            </p>
            <div class="flex items-center gap-6">
                <a href="#" class="text-xs text-slate-500 hover:text-slate-300 transition-colors">Privacy Policy</a>
                <a href="#" class="text-xs text-slate-500 hover:text-slate-300 transition-colors">Terms of Service</a>
                <a href="#" class="text-xs text-slate-500 hover:text-slate-300 transition-colors">Sitemap</a>
            </div>
        </div>

    </div>
</footer>
