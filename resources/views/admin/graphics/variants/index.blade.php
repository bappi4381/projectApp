@extends('layouts.admin')
@section('title', 'Detail Variants Management | Admin')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Detail Variants (Level 4)</h1>
            <p class="text-slate-400 font-medium text-sm italic">Listing variants with dedicated landing pages and rich content.</p>
        </div>
        <a href="{{ route('admin.graphics.variants.create') }}" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95 flex items-center gap-2">
            <i class="ri-add-line text-lg"></i> Create Detail Variant
        </a>
    </div>

    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl overflow-hidden reveal reveal-delay-1">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 border-b border-white/5 leading-none">Variant Hierarchy</th>
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 border-b border-white/5 leading-none">Starting Price</th>
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 border-b border-white/5 leading-none text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($variants as $v)
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-violet-500/10 border border-violet-500/20 flex items-center justify-center text-violet-400">
                                    <i class="{{ $v->icon ?? 'ri-node-tree' }} text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors mb-1">{{ $v->name }}</div>
                                    <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-slate-600">
                                        <span>{{ $v->subCategory->name ?? 'N/A' }}</span>
                                        <i class="ri-arrow-right-s-line text-[8px]"></i>
                                        <span class="text-slate-500">{{ $v->parent->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="text-sm font-black text-emerald-400 font-mono tracking-tighter">
                                ${{ number_format($v->starting_price ?? 0, 2) }}
                                <span class="text-[10px] text-slate-600 font-bold uppercase ml-1">{{ $v->price_unit }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.graphics.services.show', $v->id) }}" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all" title="Preview Details">
                                    <i class="ri-eye-line"></i>
                                </a>
                                <a href="{{ route('admin.graphics.variants.edit', $v->id) }}" class="w-9 h-9 rounded-lg bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <form action="{{ route('admin.graphics.variants.destroy', $v->id) }}" method="POST" onsubmit="return confirm('Archive this variant?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-9 h-9 rounded-lg bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-rose-500 hover:bg-rose-500 hover:text-white transition-all">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <i class="ri-bubble-chart-line text-5xl text-slate-700"></i>
                                <div class="text-lg font-bold text-slate-600">No Detail Variants Found</div>
                                <p class="text-slate-500 text-sm italic">Create your first Level 4 detail page variant using the button above.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-8">
        {{ $variants->links() }}
    </div>
</div>
@endsection
