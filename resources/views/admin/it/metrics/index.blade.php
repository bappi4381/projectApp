@extends('layouts.admin')
@section('title', 'Success Metrics | IT Command Center')

@section('content')
<div class="p-8 max-w-[1600px] mx-auto">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_#06b6d4]"></div>
                <span class="text-[10px] font-black text-cyan-500 uppercase tracking-[0.3em]">Module Active</span>
            </div>
            <h1 class="text-4xl font-black text-white tracking-tight">Success Metrics</h1>
            <p class="text-slate-400 font-medium">Manage dynamic business growth counters for the landing page.</p>
        </div>
        
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.it.metrics.create') }}" class="px-6 py-3 bg-cyan-600 hover:bg-cyan-500 text-white rounded-2xl flex items-center gap-2 font-black uppercase text-[11px] tracking-widest transition-all shadow-lg shadow-cyan-600/20">
                <i class="ri-add-line text-lg"></i>
                Add New Metric
            </a>
            <a href="{{ route('admin.it.dashboard') }}" class="group p-4 bg-slate-900 border border-white/5 rounded-2xl hover:bg-slate-800 transition-all shadow-xl">
                <i class="ri-arrow-left-line text-slate-400 group-hover:text-white text-xl"></i>
            </a>
        </div>
    </div>

    {{-- Metrics Table/List --}}
    <div class="glass-card rounded-[32px] border-white/5 overflow-hidden reveal">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/5 bg-white/[0.02]">
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest">Icon & Title</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest">Display Value</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Sort Order</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($metrics as $metric)
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-800 border border-white/10 flex items-center justify-center text-cyan-400 group-hover:border-cyan-500/50 transition-all">
                                    <i class="{{ $metric->icon ?? 'ri-bar-chart-fill' }} text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-white uppercase tracking-tight">{{ $metric->title }}</p>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-0.5">METRIC ID: #{{ $metric->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-1">
                                <span class="text-2xl font-black text-white tracking-tighter">{{ $metric->count }}</span>
                                <span class="text-cyan-500 font-black text-lg">{{ $metric->suffix }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            @if($metric->is_active)
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-[9px] font-black uppercase tracking-widest rounded-lg border border-emerald-500/20">Active</span>
                            @else
                                <span class="px-3 py-1 bg-slate-800 text-slate-500 text-[9px] font-black uppercase tracking-widest rounded-lg border border-white/5">Inactive</span>
                            @endif
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="text-sm font-black text-slate-400">{{ $metric->sort_order }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.it.metrics.edit', $metric->id) }}" class="w-10 h-10 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <form action="{{ route('admin.it.metrics.destroy', $metric->id) }}" method="POST" onsubmit="return confirm('Archive this metric?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-10 h-10 rounded-xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-rose-400 hover:bg-rose-500 hover:text-white transition-all">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="ri-bar-chart-box-line text-6xl text-slate-700 mb-4"></i>
                                <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">No success metrics defined yet.</p>
                                <a href="{{ route('admin.it.metrics.create') }}" class="mt-6 text-cyan-400 font-black uppercase text-[10px] tracking-widest hover:text-cyan-300 transition-colors underline decoration-cyan-500/30 underline-offset-8">Deploy First Metric</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .glass-card {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(12px);
    }
</style>
@endsection
