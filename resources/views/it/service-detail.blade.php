@extends('it.layouts.master')
@section('title', $service->name . ' | Enterprise Solutions | PixelForge IT')

@section('content')
    {{-- Header --}}
    <section class="pt-48 pb-20 bg-[#020817] relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-cyan-500/10 blur-[150px] rounded-full"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <nav class="flex items-center gap-3 text-[10px] font-black uppercase tracking-[0.3em] text-slate-500 mb-12 reveal">
                <a href="{{ route('it.index') }}" class="hover:text-cyan-400 transition-colors">IT Solutions</a>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <span class="text-cyan-500">Service Portfolio</span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="reveal">
                    <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-3xl text-cyan-400 mb-8">
                        <i class="{{ $service->icon ?? 'ri-terminal-window-line' }}"></i>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-white uppercase leading-[0.95] tracking-tighter mb-10">
                        {{ $service->name }}
                    </h1>
                    <p class="text-xl text-slate-400 font-medium leading-relaxed">
                        {{ $service->description }}
                    </p>
                </div>
                <div class="relative reveal" style="animation-delay: 0.2s">
                    <div class="aspect-video bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden group shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500/10 via-transparent to-blue-500/10"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="{{ $service->icon ?? 'ri-terminal-window-line' }} text-[12rem] text-white/5 group-hover:scale-110 transition-transform duration-700"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Details --}}
    <section class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-20">
                <div class="lg:col-span-2 space-y-12 reveal">
                    <h2 class="text-3xl font-black text-slate-900 uppercase leading-tight">Advanced Engineering For <br><span class="text-cyan-500">Modern Enterprises.</span></h2>
                    <div class="prose prose-lg max-w-none text-slate-600 font-medium leading-[1.8]">
                        <p>Our approach to <strong>{{ $service->name }}</strong> is built on three pillars: performance, security, and scalability. We utilize enterprise-grade technologies to ensure your digital infrastructure doesn't just meet current demands but is prepared for future growth.</p>
                        
                        <p>We combine strategic consulting with rapid execution. Our team of senior developers ensures that every line of code follows best practices and is optimized for the cloud-native era.</p>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-8 pt-10">
                        <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:border-cyan-500/30 transition-all group">
                            <i class="ri-shield-check-fill text-3xl text-cyan-500 mb-6 block group-hover:scale-110 transition-transform"></i>
                            <h4 class="text-slate-900 font-black uppercase text-sm mb-3 tracking-widest">Built-In Security</h4>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed">Advanced security protocols integrated from the very first line of code.</p>
                        </div>
                        <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:border-cyan-500/30 transition-all group">
                            <i class="ri-speed-up-fill text-3xl text-cyan-500 mb-6 block group-hover:scale-110 transition-transform"></i>
                            <h4 class="text-slate-900 font-black uppercase text-sm mb-3 tracking-widest">Cloud Native</h4>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed">Scalable infrastructure designed for high-availability environments.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-10 reveal" style="animation-delay: 0.2s">
                    <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/10 blur-3xl -mr-16 -mt-16"></div>
                        <h3 class="text-xl font-black uppercase mb-6 tracking-tight relative z-10">Get Expert Advice</h3>
                        <p class="text-slate-400 text-sm mb-8 font-medium leading-relaxed relative z-10">Ready to transform your technical vision? Schedule a session with our senior architects today.</p>
                        <a href="{{ route('it.contact') }}" class="w-full py-4 bg-cyan-500 text-white text-center font-black rounded-xl block hover:bg-cyan-400 transition-all uppercase tracking-widest text-[10px] relative z-10 shadow-lg shadow-cyan-500/20">
                            Book Consultation
                        </a>
                    </div>

                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100">
                        <h4 class="text-slate-900 font-black uppercase text-xs tracking-widest mb-8 border-b border-slate-200 pb-4">Other Expertise</h4>
                        <ul class="space-y-6">
                            <li><a href="{{ route('it.service-detail', 'web-application-development') }}" class="text-slate-500 hover:text-cyan-500 font-bold text-xs uppercase tracking-wider flex items-center justify-between group">Web Apps <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i></a></li>
                            <li><a href="{{ route('it.service-detail', 'mobile-application-development') }}" class="text-slate-500 hover:text-cyan-400 font-bold text-xs uppercase tracking-wider flex items-center justify-between group">Mobile Apps <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i></a></li>
                            <li><a href="{{ route('it.service-detail', 'quality-assurance-testing') }}" class="text-slate-500 hover:text-emerald-500 font-bold text-xs uppercase tracking-wider flex items-center justify-between group">QA & Testing <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
