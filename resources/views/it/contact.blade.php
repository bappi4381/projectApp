@extends('it.layouts.master')
@section('title', 'Connect With Our Technical Team | PixelForge IT')

@section('content')
    <section class="pt-48 pb-32 bg-[#020817] relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-cyan-500/10 blur-[150px] rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-500/10 blur-[150px] rounded-full"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-24 items-center">
                <div class="reveal">
                    <h5 class="text-cyan-400 font-black text-xs uppercase tracking-[0.4em] mb-6">Contact Engineering</h5>
                    <h1 class="text-5xl md:text-6xl font-black text-white uppercase leading-tight mb-8">
                        Let's build the <span class="text-gradient-it">Future</span> together.
                    </h1>
                    <p class="text-slate-400 text-lg mb-12 font-medium leading-relaxed">
                        Have a complex project? Our senior architects are ready to discuss your requirements and provide a technical roadmap.
                    </p>

                    <div class="space-y-10">
                        <div class="flex items-center gap-6 group">
                            <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-cyan-400 text-2xl transition-all group-hover:bg-cyan-500 group-hover:text-white group-hover:border-cyan-500">
                                <i class="ri-mail-send-line"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 block mb-1">Send an Email</span>
                                <a href="mailto:info@pixelforge.it" class="text-white font-bold text-lg hover:text-cyan-400 transition-colors">info@pixelforge.it</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group">
                            <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-cyan-400 text-2xl transition-all group-hover:bg-cyan-500 group-hover:text-white group-hover:border-cyan-500">
                                <i class="ri-phone-fill"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 block mb-1">Call Our Office</span>
                                <a href="tel:+8801971111209" class="text-white font-bold text-lg hover:text-cyan-400 transition-colors">+8801971111209</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reveal" style="animation-delay: 0.2s">
                    <div class="bg-white rounded-[3rem] p-10 md:p-16 shadow-2xl shadow-cyan-500/10">
                        <h3 class="text-2xl font-black text-slate-900 uppercase mb-10 tracking-tight">Project Inquiry</h3>
                        <form action="#" class="space-y-8">
                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Full Name</label>
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-slate-900 font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Email Address</label>
                                    <input type="email" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-slate-900 font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white transition-all">
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Inquiry Type</label>
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-slate-900 font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white transition-all appearance-none">
                                    <option>Custom Software Development</option>
                                    <option>Web Application</option>
                                    <option>Mobile App</option>
                                    <option>QA & Testing</option>
                                </select>
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Message</label>
                                <textarea rows="4" class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-8 py-6 text-slate-900 font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white transition-all resize-none"></textarea>
                            </div>
                            <button class="w-full py-5 bg-slate-900 text-white font-black uppercase tracking-[0.2em] text-xs rounded-2xl hover:bg-cyan-600 transition-all shadow-xl shadow-slate-900/10 hover:shadow-cyan-500/20">
                                Send Inquiry
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
