@extends('layouts.admin')
@section('title', $software->name . ' | Software Catalog')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <a href="{{ route('admin.it.software.index') }}"
                class="text-sm font-bold text-cyan-400 hover:text-cyan-300 transition-colors flex items-center gap-2 mb-4">
                <i class="ri-arrow-left-line"></i> Back to Software Catalog
            </a>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">{{ $software->name }}</h1>
            <p class="text-slate-400 font-medium text-sm">{{ $software->short_desc }}</p>
        </div>
        <div class="flex items-center gap-3 self-start">
            <a href="{{ route('admin.it.software.edit', $software) }}"
                class="px-6 py-3 bg-cyan-600 hover:bg-cyan-500 text-white text-[11px] font-black uppercase tracking-widest rounded-xl transition-all flex items-center gap-2">
                <i class="ri-edit-2-line"></i> Edit
            </a>
            <form action="{{ route('admin.it.software.destroy', $software) }}" method="POST"
                onsubmit="return confirm('Delete this software permanently?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-6 py-3 bg-rose-500/10 border border-rose-500/20 text-rose-400 hover:bg-rose-500 hover:text-white text-[11px] font-black uppercase tracking-widest rounded-xl transition-all flex items-center gap-2">
                    <i class="ri-delete-bin-line"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Left: Image & Meta --}}
        <div class="space-y-6">
            {{-- Image Card --}}
            <div class="glass-card rounded-[28px] border-white/5 shadow-2xl overflow-hidden reveal reveal-delay-1">
                @if($software->image_url)
                    <img src="{{ Str::startsWith($software->image_url, 'http') ? $software->image_url : asset('storage/' . $software->image_url) }}" alt="{{ $software->name }}"
                        class="w-full h-52 object-cover">
                @else
                    <div class="w-full h-52 bg-cyan-500/10 flex items-center justify-center">
                        <i class="ri-app-store-line text-6xl text-cyan-400/30"></i>
                    </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Slug</span>
                        <span class="font-mono text-[11px] text-slate-400">{{ $software->slug }}</span>
                    </div>
                </div>
            </div>

            {{-- Meta Info --}}
            <div class="glass-card rounded-[28px] border-white/5 shadow-2xl p-6 space-y-5 reveal reveal-delay-2">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Details</p>

                <div class="flex items-center justify-between py-3 border-b border-white/5">
                    <span class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Category</span>
                    <span class="text-sm font-bold text-cyan-400">{{ $software->category ?? '—' }}</span>
                </div>

                <div class="flex items-center justify-between py-3 border-b border-white/5">
                    <span class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Status</span>
                    @if($software->is_active)
                        <span class="flex items-center gap-1.5 text-[10px] font-black text-emerald-400 bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Active
                        </span>
                    @else
                        <span class="text-[10px] font-black text-slate-500 bg-slate-800/50 px-3 py-1 rounded-full border border-white/5">Draft</span>
                    @endif
                </div>

                <div class="flex items-center justify-between py-3 border-b border-white/5">
                    <span class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Added</span>
                    <span class="text-sm font-bold text-slate-400">{{ $software->created_at->format('M d, Y') }}</span>
                </div>

                <div class="flex items-center justify-between py-3">
                    <span class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Updated</span>
                    <span class="text-sm font-bold text-slate-400">{{ $software->updated_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>

        {{-- Right: Description --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="glass-card rounded-[28px] border-white/5 shadow-2xl p-10 reveal reveal-delay-1">
                <div class="flex items-center gap-4 mb-6">
                    <span class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xs">
                        <i class="ri-file-text-line"></i>
                    </span>
                    <h2 class="text-xl font-bold text-white tracking-tight">Full Description</h2>
                </div>
                <div class="text-slate-300 text-sm leading-relaxed font-medium whitespace-pre-line">
                    {{ $software->long_desc }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
