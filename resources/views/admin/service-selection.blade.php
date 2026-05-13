@extends('layouts.admin')
@section('title', 'Select Service Panel')
@php $no_sidebar = true; @endphp

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center p-6 sm:p-12 relative overflow-hidden">
    
    {{-- Background Decorative elements --}}
    <div class="absolute top-1/4 -left-32 w-80 h-80 bg-indigo-500/10 blur-[130px] rounded-full"></div>
    <div class="absolute bottom-1/4 -right-32 w-80 h-80 bg-cyan-400/10 blur-[130px] rounded-full"></div>

    <div class="w-full max-w-4xl relative z-10">
        <div class="text-center mb-16 reveal">
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4 bg-gradient-to-b from-white to-slate-400 bg-clip-text text-transparent">Hello, Admin</h1>
            <p class="text-slate-400 text-lg font-medium">Select a service vertical to manage your digital assets.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Graphics Studio Card --}}
            <div class="group relative reveal flex flex-col reveal-delay-1">
                <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500/20 to-purple-500/20 rounded-[40px] blur-2xl opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
                <div class="glass-card rounded-[32px] p-10 flex flex-col h-full border-white/5 shadow-2xl relative overflow-hidden group-hover:translate-y-[-8px] transition-all duration-500 group-hover:border-indigo-500/30">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-16 h-16 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-3xl text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-500 shadow-inner">
                            <i class="ri-brush-star-line"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-[0.2em] text-slate-600 bg-slate-900/50 px-4 py-2 rounded-full border border-white/5">Visual Studio</div>
                    </div>

                    <h2 class="text-2xl font-bold text-white mb-4">Graphics Studio</h2>
                    <p class="text-slate-400 leading-relaxed mb-10 flex-grow font-medium">Design management, portfolio updates, client assets, and visual campaign orchestration.</p>

                    <a href="{{ route('admin.graphics.dashboard') }}" 
                        class="w-full py-4 px-6 bg-slate-900/80 hover:bg-indigo-600 text-white font-bold rounded-2xl border border-white/5 transition-all text-center group/btn flex items-center justify-center gap-2 group-hover:shadow-[0_0_30px_rgba(79,70,229,0.3)] active:scale-[0.98]">
                        <span>Launch Workspace</span>
                        <i class="ri-arrow-right-up-line transition-transform group-hover/btn:translate-x-0.5 group-hover/btn:-translate-y-0.5"></i>
                    </a>

                    {{-- Card Decoration --}}
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-indigo-500/5 blur-3xl rounded-full transition-all group-hover:bg-indigo-500/20 duration-700"></div>
                </div>
            </div>

            {{-- IT Services Card --}}
            <div class="group relative reveal flex flex-col reveal-delay-2">
                <div class="absolute -inset-2 bg-gradient-to-tr from-cyan-500/20 to-blue-500/20 rounded-[40px] blur-2xl opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
                <div class="glass-card rounded-[32px] p-10 flex flex-col h-full border-white/5 shadow-2xl relative overflow-hidden group-hover:translate-y-[-8px] transition-all duration-500 group-hover:border-cyan-500/30">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-3xl text-cyan-400 group-hover:bg-cyan-500 group-hover:text-white transition-all duration-500 shadow-inner">
                            <i class="ri-terminal-window-line"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-[0.2em] text-slate-600 bg-slate-900/50 px-4 py-2 rounded-full border border-white/5">Core Platforms</div>
                    </div>

                    <h2 class="text-2xl font-bold text-white mb-4">IT Services</h2>
                    <p class="text-slate-400 leading-relaxed mb-10 flex-grow font-medium">Software deployment, infrastructure monitoring, cloud solutions, and technical support ticketing.</p>

                    <a href="{{ route('admin.it.dashboard') }}" 
                        class="w-full py-4 px-6 bg-slate-900/80 hover:bg-cyan-600 text-white font-bold rounded-2xl border border-white/5 transition-all text-center group/btn flex items-center justify-center gap-2 group-hover:shadow-[0_0_30px_rgba(6,182,212,0.3)] active:scale-[0.98]">
                        <span>Launch Workspace</span>
                        <i class="ri-arrow-right-up-line transition-transform group-hover/btn:translate-x-0.5 group-hover/btn:-translate-y-0.5"></i>
                    </a>

                    {{-- Card Decoration --}}
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-cyan-500/5 blur-3xl rounded-full transition-all group-hover:bg-cyan-500/20 duration-700"></div>
                </div>
            </div>
        </div>

        <div class="mt-20 flex flex-col items-center gap-6 reveal reveal-delay-3">
             <div class="flex items-center gap-8">
                 <a href="{{ route('home') }}" class="text-slate-500 hover:text-white transition-all text-sm font-semibold flex items-center gap-2 group">
                     <i class="ri-home-4-line transition-transform group-hover:-translate-y-0.5"></i>
                     <span>Client Portal</span>
                 </a>
                 
                 <div class="h-4 w-px bg-white/10"></div>

                 <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                     @csrf
                     <button type="submit" class="text-slate-500 hover:text-rose-400 transition-all text-sm font-semibold flex items-center gap-2 group">
                         <i class="ri-logout-circle-r-line transition-transform group-hover:translate-x-0.5"></i>
                         <span>Secure Logout</span>
                     </button>
                 </form>
             </div>
             
             <p class="text-[10px] text-slate-700 uppercase tracking-[0.3em] font-bold">Session Active • Encryption AES-256</p>
        </div>
    </div>
</div>
@endsection
