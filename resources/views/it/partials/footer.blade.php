{{-- resources/views/it/partials/footer.blade.php --}}

{{-- Contact Strip --}}
<section class="bg-cyan-600">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-stretch text-white text-[11px] font-black uppercase tracking-[0.1em]">
            <div class="flex-1 flex items-center justify-center gap-4 py-8 lg:py-10 border-b lg:border-b-0 lg:border-r border-white/10 hover:bg-white/5 transition-all">
                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                    <i class="ri-mail-line text-lg"></i>
                </div>
                <a href="mailto:futureitlimited@gmail.com" class="hover:text-cyan-200">futureitlimited@gmail.com</a>
            </div>
            <div class="flex-1 flex items-center justify-center gap-4 py-8 lg:py-10 border-b lg:border-b-0 lg:border-r border-white/10 hover:bg-white/5 transition-all">
                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                    <i class="ri-phone-line text-lg"></i>
                </div>
                <a href="tel:+8801971111209" class="hover:text-cyan-200">+8801971111209</a>
            </div>
            <div class="flex-1 flex items-center justify-center gap-4 py-8 lg:py-10 border-b lg:border-b-0 lg:border-r border-white/10 hover:bg-white/5 transition-all">
                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                    <i class="ri-map-pin-line text-lg"></i>
                </div>
                <span>Dhaka, Bangladesh</span>
            </div>
            <div class="flex-1 flex items-center justify-center gap-4 py-8 lg:py-10 hover:bg-white/5 transition-all">
                <div class="flex items-center gap-3">
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white hover:text-cyan-600 transition-all"><i class="ri-facebook-fill"></i></a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white hover:text-cyan-600 transition-all"><i class="ri-twitter-fill"></i></a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white hover:text-cyan-600 transition-all"><i class="ri-linkedin-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="pt-24 pb-10 relative bg-[#0a192f] text-white overflow-hidden">
    {{-- Background overlay texture --}}
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('https://www.transparenttextures.com/patterns/maze-white.png');"></div>
    <div class="absolute inset-0 bg-gradient-to-tr from-[#020817]/90 to-transparent pointer-events-none"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-20">
            
            {{-- Column 1 --}}
            <div class="reveal">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500 flex items-center justify-center text-white">
                        <i class="ri-terminal-window-line text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-white">PixelForge IT</span>
                </div>
                <p class="text-[12px] font-medium text-slate-400 leading-[1.8] mb-8 pr-4 text-justify uppercase tracking-wide">
                    PixelForge IT. is a reputed software development company with 9+ years of experience. Our services include Customized Web-based Software Development, eCommerce Development, News Portals, and Advanced Digital Engineering.
                </p>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 flex items-center justify-between text-white lg:mr-4 group hover:border-cyan-500/50 transition-all">
                    <div>
                        <div class="font-black text-[14px] mb-1 uppercase tracking-tight">Talk To Support</div>
                        <div class="text-[12px] font-bold text-cyan-400">+8801971111209</div>
                    </div>
                    <div class="w-12 h-12 bg-cyan-600 rounded-full flex items-center justify-center text-white text-[20px] shadow-lg shadow-cyan-600/20 group-hover:scale-110 transition-transform cursor-pointer">
                        <i class="ri-phone-fill"></i>
                    </div>
                </div>
            </div>

            {{-- Column 2 --}}
            <div class="reveal" style="animation-delay: 0.1s">
                <h4 class="text-sm font-black uppercase mb-8 tracking-[0.2em] text-cyan-500">Our Services</h4>
                <ul class="space-y-4 text-[11px] font-black uppercase tracking-widest text-slate-400">
                    <li><a href="{{ route('it.service-detail', 'custom-software-development') }}" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> Custom Software</a></li>
                    <li><a href="{{ route('it.service-detail', 'web-application-development') }}" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> Web Development</a></li>
                    <li><a href="{{ route('it.service-detail', 'mobile-application-development') }}" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> Mobile Apps</a></li>
                    <li><a href="{{ route('it.service-detail', 'quality-assurance-testing') }}" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> QA & Testing</a></li>
                    <li><a href="#" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> IT Consulting</a></li>
                </ul>
            </div>

            {{-- Column 3 --}}
            <div class="reveal" style="animation-delay: 0.2s">
                <h4 class="text-sm font-black uppercase mb-8 tracking-[0.2em] text-cyan-500">Company</h4>
                <ul class="space-y-4 text-[11px] font-black uppercase tracking-widest text-slate-400">
                    <li><a href="{{ route('it.about') }}" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> About Our Studio</a></li>
                    <li><a href="#" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> Meet The Experts</a></li>
                    <li><a href="#" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> Success Stories</a></li>
                    <li><a href="{{ route('it.contact') }}" class="flex items-center gap-2 hover:text-cyan-400 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i> Career Portal</a></li>
                </ul>
            </div>

            {{-- Column 4 --}}
            <div class="reveal" style="animation-delay: 0.3s">
                <h4 class="text-sm font-black uppercase mb-8 tracking-[0.2em] text-cyan-500">Newsletter</h4>
                <p class="text-[11px] font-bold text-slate-400 mb-6 leading-[1.6]">Sign up today for hints, tips and the latest product news</p>
                <div class="flex border border-white/10 rounded-xl bg-white/5 overflow-hidden p-1.5 h-14">
                    <input type="email" placeholder="Email address" class="w-full px-4 text-[12px] text-white focus:outline-none bg-transparent">
                    <button class="bg-cyan-600 hover:bg-cyan-500 text-white px-5 rounded-lg transition-colors"><i class="ri-send-plane-fill"></i></button>
                </div>
                <div class="flex items-center gap-4 mt-8">
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-cyan-400 hover:border-cyan-400 transition-all"><i class="ri-facebook-fill"></i></a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-cyan-400 hover:border-cyan-400 transition-all"><i class="ri-linkedin-fill"></i></a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-cyan-400 hover:border-cyan-400 transition-all"><i class="ri-youtube-fill"></i></a>
                </div>
            </div>

        </div>

        <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-[10px] font-black uppercase tracking-widest text-slate-500">
            <p>Copyright © 2026 PixelForge IT, All Rights Reserved.</p>
            <div class="flex flex-wrap gap-7">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>
