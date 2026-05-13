@extends('layouts.admin')
@section('title', 'IT Solutions | Command Center')

@section('content')
<div class="p-8 max-w-[1600px] mx-auto">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_#06b6d4]"></div>
                <span class="text-[10px] font-black text-cyan-500 uppercase tracking-[0.3em]">System Online</span>
            </div>
            <h1 class="text-4xl font-black text-white tracking-tight">IT Command Center</h1>
            <p class="text-slate-400 font-medium">Enterprise infrastructure & technology management portal.</p>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="px-6 py-3 bg-white/5 border border-white/5 rounded-2xl flex items-center gap-4">
                <div class="text-right">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Network Load</p>
                    <p class="text-sm font-bold text-white">24.8 Gbps</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400">
                    <i class="ri-pulse-line text-xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.service-selection') }}" class="group p-4 bg-slate-900 border border-white/5 rounded-2xl hover:bg-slate-800 transition-all shadow-xl">
                <i class="ri-apps-2-line text-slate-400 group-hover:text-white text-xl"></i>
            </a>
        </div>
    </div>

    {{-- Core Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        {{-- Stat Card: Server Health --}}
        <div class="glass-card rounded-[32px] p-8 border-white/5 relative overflow-hidden group hover:border-cyan-500/30 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/5 blur-[50px] -mr-16 -mt-16 group-hover:bg-cyan-500/10 transition-all"></div>
            <div class="flex items-center justify-between mb-6">
                <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 border border-cyan-500/20">
                    <i class="ri-server-line text-2xl"></i>
                </div>
                <span class="text-[10px] font-black text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded-lg">OPERATIONAL</span>
            </div>
            <p class="text-xs font-black text-slate-500 uppercase tracking-widest mb-1">Infrastructure Uptime</p>
            <h3 class="text-4xl font-black text-white tracking-tighter mb-2">99.99<span class="text-cyan-500 text-2xl">%</span></h3>
            <div class="w-full h-1 bg-slate-800 rounded-full overflow-hidden">
                <div class="h-full bg-cyan-500 w-[99.99%] shadow-[0_0_8px_#06b6d4]"></div>
            </div>
        </div>

        {{-- Stat Card: Active Services --}}
        <div class="glass-card rounded-[32px] p-8 border-white/5 relative overflow-hidden group hover:border-indigo-500/30 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/5 blur-[50px] -mr-16 -mt-16 group-hover:bg-indigo-500/10 transition-all"></div>
            <div class="flex items-center justify-between mb-6">
                <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 border border-indigo-500/20">
                    <i class="ri-service-line text-2xl"></i>
                </div>
                <a href="{{ route('admin.it.services.index') }}" class="text-[10px] font-black text-slate-400 hover:text-white transition-colors underline decoration-indigo-500/50 underline-offset-4 uppercase tracking-widest">MANAGE ALL</a>
            </div>
            <p class="text-xs font-black text-slate-500 uppercase tracking-widest mb-1">Managed Solutions</p>
            <h3 class="text-4xl font-black text-white tracking-tighter mb-2">{{ str_pad($services_count, 2, '0', STR_PAD_LEFT) }}</h3>
            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">+02 deployments this week</p>
        </div>

        {{-- Stat Card: Tickets --}}
        <div class="glass-card rounded-[32px] p-8 border-white/5 relative overflow-hidden group hover:border-rose-500/30 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-rose-500/5 blur-[50px] -mr-16 -mt-16 group-hover:bg-rose-500/10 transition-all"></div>
            <div class="flex items-center justify-between mb-6">
                <div class="w-12 h-12 rounded-2xl bg-rose-500/10 flex items-center justify-center text-rose-400 border border-rose-500/20">
                    <i class="ri-bug-line text-2xl"></i>
                </div>
                <span class="text-[10px] font-black text-rose-400 bg-rose-500/10 px-2 py-1 rounded-lg">HIGH PRIORITY</span>
            </div>
            <p class="text-xs font-black text-slate-500 uppercase tracking-widest mb-1">Active Support Tickets</p>
            <h3 class="text-4xl font-black text-white tracking-tighter mb-2">04</h3>
            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Avg. response: 12 mins</p>
        </div>

        {{-- Stat Card: Security --}}
        <div class="glass-card rounded-[32px] p-8 border-white/5 relative overflow-hidden group hover:border-emerald-500/30 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 blur-[50px] -mr-16 -mt-16 group-hover:bg-emerald-500/10 transition-all"></div>
            <div class="flex items-center justify-between mb-6">
                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 border border-emerald-500/20">
                    <i class="ri-shield-check-line text-2xl"></i>
                </div>
                <div class="flex -space-x-2">
                    <div class="w-6 h-6 rounded-full bg-slate-800 border border-white/10 flex items-center justify-center text-[8px] font-black text-emerald-400">SSL</div>
                    <div class="w-6 h-6 rounded-full bg-slate-800 border border-white/10 flex items-center justify-center text-[8px] font-black text-emerald-400">WAF</div>
                </div>
            </div>
            <p class="text-xs font-black text-slate-500 uppercase tracking-widest mb-1">Security Posture</p>
            <h3 class="text-4xl font-black text-white tracking-tighter mb-2">SECURE</h3>
            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">0 threats detected in 24h</p>
        </div>
    </div>

    {{-- Content Management Strip --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 reveal">
        <div class="bg-gradient-to-r from-cyan-600/20 to-transparent border border-cyan-500/10 rounded-[2.5rem] p-8 flex items-center justify-between group hover:border-cyan-500/30 transition-all">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 rounded-[2rem] bg-cyan-500 shadow-[0_0_20px_rgba(6,182,212,0.4)] flex items-center justify-center text-white text-3xl">
                    <i class="ri-slideshow-line"></i>
                </div>
                <div>
                    <h4 class="text-xl font-black text-white uppercase tracking-tight">Active Banners</h4>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-widest">Manage landing page hero sliders</p>
                </div>
            </div>
            <a href="{{ route('admin.it.sliders.index') }}" class="px-6 py-3 bg-white/5 hover:bg-white/10 rounded-xl text-white font-black uppercase text-[10px] tracking-widest transition-all">Manage Sliders</a>
        </div>

        <div class="bg-gradient-to-r from-indigo-600/20 to-transparent border border-indigo-500/10 rounded-[2.5rem] p-8 flex items-center justify-between group hover:border-indigo-500/30 transition-all">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 rounded-[2rem] bg-indigo-500 shadow-[0_0_20px_rgba(99,102,241,0.4)] flex items-center justify-center text-white text-3xl">
                    <i class="ri-bar-chart-box-line"></i>
                </div>
                <div>
                    <h4 class="text-xl font-black text-white uppercase tracking-tight">Success Metrics</h4>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-widest">Global business growth counters</p>
                </div>
            </div>
            <a href="{{ route('admin.it.metrics.index') }}" class="px-6 py-3 bg-white/5 hover:bg-white/10 rounded-xl text-white font-black uppercase text-[10px] tracking-widest transition-all">Manage Stats</a>
        </div>
    </div>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Project Timeline --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between mb-4 px-2">
                <h3 class="text-xl font-bold text-white tracking-tight">Active Deployments & Projects</h3>
                <button class="text-[10px] font-black text-cyan-500 uppercase tracking-widest hover:text-cyan-400">VIEW ALL PROJECT</button>
            </div>
            
            <div class="glass-card rounded-[32px] border-white/5 overflow-hidden">
                <div class="p-8 space-y-8">
                    {{-- Project 1 --}}
                    <div class="flex flex-col md:flex-row md:items-center gap-6 p-6 bg-white/[0.02] border border-white/5 rounded-[2rem] hover:bg-white/[0.04] transition-all">
                        <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center shrink-0">
                            <i class="ri-database-2-line text-3xl text-cyan-400"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-white">AWS Cloud Migration</h4>
                                <span class="text-[10px] font-black text-cyan-400 px-2 py-0.5 bg-cyan-500/10 rounded-full">IN PROGRESS</span>
                            </div>
                            <div class="flex items-center gap-4 text-xs text-slate-500 font-medium mb-4">
                                <span class="flex items-center gap-1"><i class="ri-calendar-line"></i> Due: May 25</span>
                                <span class="flex items-center gap-1"><i class="ri-user-settings-line"></i> Team Alpha</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-cyan-500 to-indigo-500 w-[65%] shadow-[0_0_10px_rgba(6,182,212,0.3)]"></div>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <p class="text-2xl font-black text-white tracking-tighter">65%</p>
                            <p class="text-[9px] text-slate-500 uppercase font-black">Completed</p>
                        </div>
                    </div>

                    {{-- Project 2 --}}
                    <div class="flex flex-col md:flex-row md:items-center gap-6 p-6 bg-white/[0.02] border border-white/5 rounded-[2rem] hover:bg-white/[0.04] transition-all">
                        <div class="w-16 h-16 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center shrink-0">
                            <i class="ri-lock-password-line text-3xl text-indigo-400"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-white">Security Audit v2.4</h4>
                                <span class="text-[10px] font-black text-emerald-400 px-2 py-0.5 bg-emerald-500/10 rounded-full">FINAL REVIEW</span>
                            </div>
                            <div class="flex items-center gap-4 text-xs text-slate-500 font-medium mb-4">
                                <span class="flex items-center gap-1"><i class="ri-calendar-line"></i> Due: Tomorrow</span>
                                <span class="flex items-center gap-1"><i class="ri-user-settings-line"></i> CyberSec Unit</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-500 to-cyan-500 w-[92%] shadow-[0_0_10px_rgba(16,185,129,0.3)]"></div>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <p class="text-2xl font-black text-white tracking-tighter">92%</p>
                            <p class="text-[9px] text-slate-500 uppercase font-black">Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- System Log & Network --}}
        <div class="space-y-6">
            <h3 class="text-xl font-bold text-white tracking-tight px-2">Deployment Log</h3>
            <div class="glass-card rounded-[32px] border-white/5 p-8 relative overflow-hidden">
                <div class="absolute inset-x-0 top-0 h-20 bg-gradient-to-b from-cyan-500/5 to-transparent"></div>
                
                <div class="relative space-y-6">
                    <div class="flex gap-4 relative">
                        <div class="w-px bg-slate-800 absolute left-[15.5px] top-8 bottom-0"></div>
                        <div class="w-8 h-8 rounded-full bg-cyan-500/20 border border-cyan-500/30 flex items-center justify-center text-cyan-400 shrink-0 z-10">
                            <i class="ri-git-merge-line text-sm"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Main branch deployed to Production</p>
                            <p class="text-[10px] text-slate-500 mt-1">2 hours ago • Build #8842</p>
                        </div>
                    </div>

                    <div class="flex gap-4 relative">
                        <div class="w-px bg-slate-800 absolute left-[15.5px] top-8 bottom-0"></div>
                        <div class="w-8 h-8 rounded-full bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center text-indigo-400 shrink-0 z-10">
                            <i class="ri-refresh-line text-sm"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Database Backup Completed</p>
                            <p class="text-[10px] text-slate-500 mt-1">4 hours ago • Cloud Storage (US-East)</p>
                        </div>
                    </div>

                    <div class="flex gap-4 relative">
                        <div class="w-8 h-8 rounded-full bg-rose-500/20 border border-rose-500/30 flex items-center justify-center text-rose-400 shrink-0 z-10">
                            <i class="ri-error-warning-line text-sm"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">S3 Bucket Access denied</p>
                            <p class="text-[10px] text-slate-500 mt-1">6 hours ago • Unauthorized Attempt blocked</p>
                        </div>
                    </div>

                    <a href="#" class="block w-full py-4 mt-4 bg-white/5 border border-white/5 rounded-2xl text-center text-[10px] font-black text-slate-500 hover:text-white hover:bg-white/10 transition-all tracking-[0.2em] uppercase">ACCESS FULL AUDIT LOG</a>
                </div>
            </div>

            {{-- Network Viz (Mock) --}}
            <div class="glass-card rounded-[32px] border-white/5 p-8 bg-gradient-to-br from-slate-900/50 to-cyan-900/10">
                <div class="flex items-center gap-3 mb-6">
                    <i class="ri-base-station-line text-cyan-400 text-xl"></i>
                    <h4 class="font-bold text-white text-sm">Global CDN Nodes</h4>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between text-[10px] font-black tracking-widest text-slate-500 uppercase">
                        <span>NODE ID</span>
                        <span>LATENCY</span>
                        <span>STATUS</span>
                    </div>
                    <div class="flex items-center justify-between text-[11px] font-bold text-white">
                        <span class="text-slate-400">PF-DXB-01</span>
                        <span class="text-cyan-400">12ms</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <div class="flex items-center justify-between text-[11px] font-bold text-white">
                        <span class="text-slate-400">PF-SNG-04</span>
                        <span class="text-cyan-400">45ms</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <div class="flex items-center justify-between text-[11px] font-bold text-white">
                        <span class="text-slate-400">PF-LDN-02</span>
                        <span class="text-rose-400">320ms</span>
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
