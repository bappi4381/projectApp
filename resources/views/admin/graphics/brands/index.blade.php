@extends('layouts.admin')
@section('title', 'Brand & Client Logos')

@section('content')
<div class="p-8">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Brand & Client Logos</h1>
            <p class="text-slate-400 font-medium text-sm italic">Manage logos displayed in the clients marquee section.</p>
        </div>
        <a href="{{ route('admin.graphics.brands.create') }}" class="group flex items-center justify-center gap-2 bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] shadow-xl shadow-indigo-600/20 hover:bg-indigo-500 transition-all active:scale-95">
            <i class="ri-add-line text-lg group-hover:rotate-90 transition-transform"></i>
            Add New Brand
        </a>
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($brands as $brand)
        <div class="glass-card rounded-[32px] border-white/5 p-8 flex flex-col items-center group/card hover:border-indigo-500/30 transition-all duration-500">
            {{-- Status Badge --}}
            <div class="self-end mb-4">
                @if($brand->is_active)
                <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[9px] font-black uppercase tracking-widest border border-emerald-500/20">Active</span>
                @else
                <span class="px-3 py-1 rounded-full bg-slate-800 text-slate-500 text-[9px] font-black uppercase tracking-widest border border-white/5">Inactive</span>
                @endif
            </div>

            {{-- Logo Preview --}}
            <div class="w-32 h-32 mb-8 relative group/logo">
                <div class="absolute inset-0 bg-white/5 rounded-3xl transform rotate-3 group-hover/logo:rotate-6 transition-transform"></div>
                <div class="absolute inset-0 bg-white/10 backdrop-blur-md rounded-3xl border border-white/10 flex items-center justify-center p-6 shadow-2xl group-hover/logo:-translate-y-2 transition-transform duration-500">
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="max-w-full max-h-full object-contain filter grayscale invert brightness-200 group-hover/logo:grayscale-0 group-hover/logo:invert-0 group-hover/logo:brightness-100 transition-all duration-700">
                </div>
            </div>

            {{-- Info --}}
            <div class="text-center mb-8">
                <h3 class="font-bold text-white text-lg mb-1 tracking-tight">{{ $brand->name }}</h3>
                @if($brand->url)
                <a href="{{ $brand->url }}" target="_blank" class="text-[11px] text-indigo-400 font-bold hover:text-indigo-300 italic transition-colors">{{ parse_url($brand->url, PHP_URL_HOST) }}</a>
                @else
                <span class="text-[11px] text-slate-600 font-bold italic">No Website Link</span>
                @endif
            </div>

            {{-- Actions --}}
            <div class="w-full pt-6 border-t border-white/5 flex items-center justify-between">
                <span class="text-[10px] text-slate-500 font-black uppercase tracking-widest">Order: {{ $brand->sort_order }}</span>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.graphics.brands.edit', $brand) }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 text-slate-400 hover:bg-indigo-600 hover:text-white transition-all">
                        <i class="ri-edit-line text-lg"></i>
                    </a>
                    <form action="{{ route('admin.graphics.brands.destroy', $brand) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this brand logo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-rose-500/10 text-rose-500 hover:bg-rose-600 hover:text-white transition-all">
                            <i class="ri-delete-bin-line text-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-24 text-center glass-card rounded-[40px] border-dashed border-white/10">
            <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6 border border-white/5">
                <i class="ri-image-line text-4xl text-slate-700"></i>
            </div>
            <h4 class="text-white font-bold text-xl mb-2 tracking-tight">No Brand Logos Found</h4>
            <p class="text-slate-500 text-sm italic max-w-sm mx-auto">Your client marquee is currently empty. Start by adding your first brand logo.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
