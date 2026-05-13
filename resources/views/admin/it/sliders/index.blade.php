@extends('layouts.admin')
@section('title', 'Hero Sliders | IT Command Center')

@section('content')
<div class="p-8 max-w-[1600px] mx-auto">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse shadow-[0_0_8px_#06b6d4]"></div>
                <span class="text-[10px] font-black text-cyan-500 uppercase tracking-[0.3em]">Module Active</span>
            </div>
            <h1 class="text-4xl font-black text-white tracking-tight">Hero Sliders</h1>
            <p class="text-slate-400 font-medium">Manage landing page banners and main call-to-actions.</p>
        </div>
        
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.it.sliders.create') }}" class="px-6 py-3 bg-cyan-600 hover:bg-cyan-500 text-white rounded-2xl flex items-center gap-2 font-black uppercase text-[11px] tracking-widest transition-all shadow-lg shadow-cyan-600/20">
                <i class="ri-add-line text-lg"></i>
                Add New Slider
            </a>
            <a href="{{ route('admin.it.dashboard') }}" class="group p-4 bg-slate-900 border border-white/5 rounded-2xl hover:bg-slate-800 transition-all shadow-xl">
                <i class="ri-arrow-left-line text-slate-400 group-hover:text-white text-xl"></i>
            </a>
        </div>
    </div>

    {{-- Sliders List --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($sliders as $slider)
        <div class="glass-card rounded-[40px] border-white/5 overflow-hidden group hover:border-cyan-500/30 transition-all duration-500 reveal">
            {{-- Preview Image --}}
            <div class="h-[240px] relative overflow-hidden">
                @if($slider->image)
                    <img src="{{ asset('storage/' . $slider->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-slate-800 flex items-center justify-center text-slate-700">
                        <i class="ri-image-2-line text-6xl"></i>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                
                <div class="absolute bottom-6 left-8 right-8">
                    <span class="text-[9px] font-black text-cyan-400 uppercase tracking-[0.2em] mb-2 block">{{ $slider->subtitle }}</span>
                    <h4 class="text-lg font-black text-white leading-tight line-clamp-2 uppercase">{{ $slider->title }}</h4>
                </div>
            </div>

            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-[9px] font-black text-slate-400 uppercase tracking-widest">
                            Order: {{ $slider->sort_order }}
                        </div>
                        @if($slider->is_active)
                            <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_#10b981]"></span>
                        @else
                            <span class="w-2 h-2 rounded-full bg-slate-700"></span>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.it.sliders.edit', $slider->id) }}" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 hover:bg-cyan-500 hover:text-white transition-all">
                            <i class="ri-edit-box-line"></i>
                        </a>
                        <form action="{{ route('admin.it.sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Remove this slider?')">
                            @csrf
                            @method('DELETE')
                            <button class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 hover:bg-rose-500 hover:text-white transition-all">
                                <i class="ri-delete-bin-7-line"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                @if($slider->btn_text)
                <div class="flex items-center gap-3 text-cyan-500 text-[10px] font-black uppercase tracking-widest">
                    <i class="ri-external-link-line"></i>
                    <span>Link: {{ $slider->btn_text }}</span>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="lg:col-span-3 py-20 glass-card rounded-[40px] border-white/5 flex flex-col items-center justify-center">
            <i class="ri-slideshow-3-line text-7xl text-slate-800 mb-6"></i>
            <p class="text-slate-500 font-bold uppercase tracking-[0.2em] text-sm">No sliders registered for IT domain.</p>
            <a href="{{ route('admin.it.sliders.create') }}" class="mt-8 px-8 py-4 bg-cyan-600 hover:bg-cyan-500 text-white rounded-2xl font-black uppercase text-xs tracking-widest transition-all shadow-xl">Deploy New Slider</a>
        </div>
        @endforelse
    </div>
</div>

<style>
    .glass-card {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(12px);
    }
</style>
@endsection
