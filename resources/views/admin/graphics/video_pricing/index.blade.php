@extends('layouts.admin')
@section('title', 'Video Pricing Management | Graphics Studio')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Video Pricing Module</h1>
            <p class="text-slate-400 font-medium text-sm">Manage dedicated pricing tables for Video Production services.</p>
        </div>
        <a href="{{ route('admin.graphics.video-pricing.create') }}" class="group relative px-8 py-4 bg-indigo-600 rounded-2xl transition-all hover:scale-105 active:scale-95 shadow-xl shadow-indigo-500/20 overflow-hidden flex items-center gap-3 self-start">
            <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            <i class="ri-add-line text-white text-lg relative"></i>
            <span class="relative text-white font-black uppercase tracking-widest text-[11px]">Add New Pricing</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
            <i class="ri-checkbox-circle-line text-xl"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    {{-- List --}}
    <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-2">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/[0.02] border-b border-white/5">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Service Name</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Tiers</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($pricings as $pricing)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-11 h-11 rounded-xl bg-indigo-500/10 border-indigo-500/20 text-indigo-400 flex items-center justify-center border group-hover:scale-110 transition-transform">
                                    <i class="ri-video-line"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white text-sm tracking-tight">{{ $pricing->service_name }}</h4>
                                    <p class="text-[10px] text-slate-500 font-mono">{{ $pricing->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex gap-2">
                                @php $tiers = $pricing->pricing_tiers ?? []; @endphp
                                @foreach($tiers as $tier)
                                    <span class="px-2.5 py-1 rounded-lg bg-white/5 border border-white/5 text-[10px] font-bold {{ $tier['highlight'] ?? false ? 'text-indigo-400 border-indigo-500/30' : 'text-slate-400' }}">
                                        {{ $tier['title'] ?? 'Tier' }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            @if($pricing->is_active)
                                <span class="flex items-center gap-1.5 text-[10px] font-black text-emerald-400 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Active
                                </span>
                            @else
                                <span class="flex items-center gap-1.5 text-[10px] font-black text-slate-600 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-600"></span> Inactive
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.graphics.video-pricing.edit', $pricing) }}"
                                    class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-emerald-400 hover:bg-emerald-500/10 transition-all" title="Edit">
                                    <i class="ri-edit-2-line"></i>
                                </a>
                                <form action="{{ route('admin.graphics.video-pricing.destroy', $pricing) }}" method="POST"
                                    onsubmit="return confirm('Delete this pricing table?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-rose-500 hover:bg-rose-500/10 transition-all" title="Delete">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center text-slate-500 font-medium">
                            <i class="ri-inbox-line text-4xl mb-4 block opacity-20"></i>
                            No video pricing found. <a href="{{ route('admin.graphics.video-pricing.create') }}" class="text-indigo-400 font-bold hover:underline">Add the first one.</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pricings->hasPages())
            <div class="px-8 py-6 bg-white/[0.02] border-t border-white/5">
                {{ $pricings->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
