@extends('layouts.admin')
@section('title', 'Create Success Metric | IT Command Center')

@section('content')
<div class="p-8 max-w-[1000px] mx-auto">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_#06b6d4]"></div>
                <span class="text-[10px] font-black text-cyan-500 uppercase tracking-[0.3em]">New Configuration</span>
            </div>
            <h1 class="text-4xl font-black text-white tracking-tight">Add Success Metric</h1>
        </div>
        
        <a href="{{ route('admin.it.metrics.index') }}" class="group p-4 bg-slate-900 border border-white/5 rounded-2xl hover:bg-slate-800 transition-all shadow-xl">
            <i class="ri-arrow-left-line text-slate-400 group-hover:text-white text-xl"></i>
        </a>
    </div>

    {{-- Form Section --}}
    <div class="glass-card rounded-[32px] border-white/5 p-10 reveal">
        <form action="{{ route('admin.it.metrics.store') }}" method="POST">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Metric Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Projects Completed"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white/10 transition-all">
                </div>
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Display Icon (Remix Icon Class)</label>
                    <input type="text" name="icon" value="{{ old('icon', 'ri-bar-chart-fill') }}" required placeholder="ri-macbook-line"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white/10 transition-all">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Counter Value</label>
                    <input type="text" name="count" value="{{ old('count') }}" required placeholder="e.g. 7000"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white/10 transition-all">
                </div>
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Value Suffix (Optional)</label>
                    <input type="text" name="suffix" value="{{ old('suffix') }}" placeholder="e.g. +"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white/10 transition-all">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-10">
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-bold text-sm focus:outline-none focus:border-cyan-500 focus:bg-white/10 transition-all">
                </div>
                <div class="flex items-center gap-4 pt-10">
                    <label class="relative inline-flex items-center cursor-pointer group">
                        <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                        <div class="w-14 h-7 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-slate-400 after:border-slate-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-cyan-500 shadow-inner"></div>
                        <span class="ml-4 text-[10px] font-black uppercase tracking-widest text-slate-500 group-hover:text-cyan-400 transition-colors">Visible on Landing Page</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="px-12 py-5 bg-cyan-600 hover:bg-cyan-500 text-white rounded-2xl font-black uppercase text-xs tracking-[0.2em] transition-all shadow-xl shadow-cyan-600/20 active:scale-95">
                    Register Metric
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .glass-card {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(12px);
    }
</style>
@endsection
