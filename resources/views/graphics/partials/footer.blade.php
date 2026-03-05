{{-- resources/views/graphics/partials/footer.blade.php --}}
<footer class="relative bg-[#112E48] pt-24 pb-12 overflow-hidden border-t border-white/5">
    {{-- High-End Studio Ambient Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -bottom-48 -left-48 w-[600px] h-[600px] bg-indigo-600/10 rounded-full blur-[120px] opacity-50"></div>
        <div class="absolute -bottom-48 -right-48 w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[120px] opacity-40"></div>
        
        {{-- Subtle Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 z-10">
        {{-- Top Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
            
            {{-- Brand Branding --}}
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-8 group">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-xl shadow-indigo-500/20 group-hover:rotate-6 transition-transform duration-500">
                        <i class="ri-palette-line text-white text-2xl"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-black text-white tracking-tight leading-none uppercase">PixelForge</span>
                        <span class="text-[9px] font-bold tracking-[0.4em] text-indigo-400 uppercase mt-1">Graphics Studio</span>
                    </div>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed mb-8 max-w-xs">
                    Transforming product visuals with surgical precision. The global hub for high-volume, high-fidelity photo editing and creative retouching.
                </p>
                <div class="flex items-center gap-3">
                    @foreach(['facebook', 'instagram', 'linkedin', 'behance'] as $social)
                    <a href="#" class="h-10 w-10 rounded-xl bg-white/[0.03] border border-white/5 flex items-center justify-center text-slate-500 hover:text-white hover:bg-indigo-600 hover:border-indigo-500 transition-all duration-300">
                        <i class="ri-{{ $social }}-fill text-lg"></i>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Core Services --}}
            <div>
                <h4 class="text-xs font-black text-white uppercase tracking-[0.2em] mb-8 border-l-2 border-indigo-500 pl-4">Creative Services</h4>
                <ul class="space-y-4">
                    @foreach(['Photo Retouching', 'Clipping Path', 'Ghost Mannequin', 'Shadow Creation', 'Vector Conversion', '3D Modeling'] as $service)
                    <li>
                        <a href="#services" class="group flex items-center gap-2 text-slate-400 hover:text-indigo-400 text-sm font-medium transition-colors">
                            <span class="h-1 w-1 rounded-full bg-slate-700 group-hover:w-3 group-hover:bg-indigo-500 transition-all"></span>
                            {{ $service }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Quick Portal --}}
            <div>
                <h4 class="text-xs font-black text-white uppercase tracking-[0.2em] mb-8 border-l-2 border-purple-500 pl-4">Client Portal</h4>
                <ul class="space-y-4">
                    @foreach(['Get a Quote' => '#pricing', 'Free Trial' => '#pricing', 'Our Portfolio' => route('graphics.portfolio'), 'Latest Blog' => '#blog', 'Pricing Guide' => '#pricing'] as $label => $link)
                    <li>
                        <a href="{{ $link }}" class="group flex items-center gap-2 text-slate-400 hover:text-purple-400 text-sm font-medium transition-colors">
                            <i class="ri-arrow-right-s-line opacity-0 -ml-2 group-hover:opacity-100 group-hover:ml-0 transition-all"></i>
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Hub --}}
            <div>
                <h4 class="text-xs font-black text-white uppercase tracking-[0.2em] mb-8 border-l-2 border-cyan-500 pl-4">Direct Contact</h4>
                <div class="space-y-6">
                    <a href="mailto:hello@pixelforgegroup.com" class="group flex items-center gap-4">
                        <div class="h-10 w-10 rounded-xl bg-cyan-900/20 border border-cyan-500/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-500 group-hover:text-white transition-all">
                            <i class="ri-mail-send-line text-lg"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Email Us</span>
                            <span class="text-sm text-slate-300 font-medium">hello@pixelforge.studio</span>
                        </div>
                    </a>
                    <a href="https://wa.me/8801700000000" class="group flex items-center gap-4">
                        <div class="h-10 w-10 rounded-xl bg-emerald-900/20 border border-emerald-500/10 flex items-center justify-center text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            <i class="ri-whatsapp-line text-lg"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Direct Support</span>
                            <span class="text-sm text-slate-300 font-medium">+88 17XX XXX XXX</span>
                        </div>
                    </a>
                    <div class="pt-4">
                        <div class="p-4 rounded-2xl bg-white/[0.02] border border-white/5 backdrop-blur-sm">
                            <div class="text-[10px] font-bold text-indigo-400 uppercase tracking-widest mb-1">Office Location</div>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Mirpur DOHS, House 12, Road 4<br>
                                Dhaka 1216, Bangladesh
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Divider --}}
        <div class="h-px w-full bg-gradient-to-r from-transparent via-white/5 to-transparent mb-10"></div>

        {{-- Bottom Bar --}}
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <p class="text-[11px] font-bold text-slate-600 uppercase tracking-[0.2em]">
                    &copy; {{ date('Y') }} PixelForge Group. All rights reserved.
                </p>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">Privacy</a>
                    <a href="#" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">Terms</a>
                    <a href="#" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">Cookies</a>
                </div>
            </div>
            
            {{-- Trust Icons --}}
            <div class="flex items-center gap-6 opacity-30 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                <i class="ri-visa-line text-2xl text-white"></i>
                <i class="ri-mastercard-line text-2xl text-white"></i>
                <i class="ri-paypal-line text-2xl text-white"></i>
                <div class="h-8 w-px bg-white/10 hidden md:block"></div>
                <div class="flex items-center gap-2">
                    <i class="ri-shield-check-line text-emerald-400 text-xl"></i>
                    <span class="text-[10px] font-black text-white uppercase tracking-widest">Secure SSL</span>
                </div>
            </div>
        </div>
    </div>
</footer>
