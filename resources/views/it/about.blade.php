@extends('it.layouts.master')
@section('title', 'About Our Technical Vision | PixelForge IT')

@section('content')
    {{-- Hero --}}
    <section class="pt-48 pb-24 bg-[#020817] relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=2070" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[#020817]"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h5 class="text-cyan-400 font-black text-xs uppercase tracking-[0.4em] mb-6 reveal">Innovating The Future</h5>
            <h1 class="text-5xl md:text-7xl font-black text-white uppercase leading-tight mb-8 reveal" style="animation-delay: 0.1s">
                Engineering <span class="text-gradient-it">Digital</span><br>Excellence.
            </h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg font-medium leading-relaxed reveal" style="animation-delay: 0.2s">
                We are a multi-disciplinary team of engineers and strategists dedicated to building software that empowers organizations to lead.
            </p>
        </div>
    </section>

    {{-- Mission Section --}}
    <section class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="reveal">
                    <h2 class="text-4xl font-black text-slate-900 uppercase mb-8 leading-tight">
                        Our Mission is to <span class="text-cyan-500">Simplify</span> Complexity.
                    </h2>
                    <p class="text-slate-600 text-lg mb-10 leading-relaxed font-medium">
                        Since our founding, we've focused on one core principle: building technology that solves real-world problems. We don't just deliver code; we deliver value, security, and scalability.
                    </p>
                    <div class="grid grid-cols-2 gap-10">
                        <div>
                            <span class="text-4xl font-black text-slate-900 block mb-2">9+</span>
                            <span class="text-xs font-black uppercase tracking-widest text-slate-400">Years Experience</span>
                        </div>
                        <div>
                            <span class="text-4xl font-black text-slate-900 block mb-2">150+</span>
                            <span class="text-xs font-black uppercase tracking-widest text-slate-400">Experts Onboard</span>
                        </div>
                    </div>
                </div>
                <div class="relative reveal" style="animation-delay: 0.2s">
                    <div class="aspect-square rounded-[3rem] overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=2070" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-cyan-500 rounded-[2rem] flex items-center justify-center p-8 shadow-xl hidden md:flex">
                        <i class="ri-rocket-2-fill text-white text-7xl opacity-20 absolute"></i>
                        <span class="text-white font-black text-center text-sm uppercase tracking-widest relative z-10">Accelerating Your Growth</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
