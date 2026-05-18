@extends('layouts.admin')
@section('title', 'Software Catalog | Admin')

@section('content')
<div class="p-8">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Software Catalog</h1>
            <p class="text-slate-400 font-medium text-sm">Manage software products offered by the company.</p>
        </div>
        <a href="{{ route('admin.it.software.create') }}" class="group relative px-8 py-4 bg-cyan-600 rounded-2xl transition-all hover:scale-105 active:scale-95 shadow-xl shadow-cyan-500/20 overflow-hidden flex items-center gap-3 self-start">
            <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            <i class="ri-add-line text-white text-lg relative"></i>
            <span class="relative text-white font-black uppercase tracking-widest text-[11px]">Add Software</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
            <i class="ri-checkbox-circle-line text-xl"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Filter Bar --}}
    <div class="glass-card rounded-[24px] border-white/5 p-6 mb-6 flex flex-wrap gap-4 items-center reveal reveal-delay-1">
        <form action="{{ route('admin.it.software.index') }}" method="GET" class="flex flex-wrap gap-4 flex-1">
            <div class="relative flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search software..."
                    class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 pl-10 text-white text-sm focus:outline-none focus:border-cyan-500/50 transition-all" />
                <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            </div>
            <button type="submit" class="px-6 py-3 bg-cyan-600 hover:bg-cyan-500 text-white text-[11px] font-black uppercase rounded-xl transition-all">Filter</button>
            @if(request()->anyFilled(['search']))
                <a href="{{ route('admin.it.software.index') }}" class="px-6 py-3 bg-white/5 text-slate-400 hover:text-white text-[11px] font-black uppercase rounded-xl transition-all">Reset</a>
            @endif
        </form>
    </div>

    {{-- Software Table --}}
    <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-2">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/[0.02] border-b border-white/5">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Name</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Category</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($softwareList as $software)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border-cyan-500/20 text-cyan-400 flex items-center justify-center border group-hover:scale-110 group-hover:border-cyan-500/40 transition-all shadow-lg">
                                    <i class="{{ $software->icon ?? 'ri-server-line' }} text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-white text-[13px] tracking-tight group-hover:text-cyan-400 transition-colors">{{ $software->name }}</h4>
                                    <p class="text-[9px] text-slate-500 font-mono uppercase tracking-widest mt-0.5">{{ $software->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-[13px] font-black text-cyan-400 font-mono tracking-tight">{{ $software->category ?? '—' }}</span>
                        </td>
                        <td class="px-8 py-5">
                            @if($software->is_active)
                                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 w-fit">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_8px_#34d399] animate-pulse"></span>
                                    <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest">Active</span>
                                </div>
                            @else
                                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-800/50 border border-white/5 w-fit">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Draft</span>
                                </div>
                            @endif
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.it.software.edit', $software) }}"
                                    class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-emerald-400 hover:bg-emerald-500/10 transition-all" title="Edit">
                                    <i class="ri-edit-2-line"></i>
                                </a>
                                <form action="{{ route('admin.it.software.destroy', $software) }}" method="POST"
                                    onsubmit="return confirm('Delete this software?')">
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
                            No software entries found. <a href="{{ route('admin.it.software.create') }}" class="text-cyan-400 font-bold hover:underline">Add the first one.</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($softwareList->hasPages())
            <div class="px-8 py-6 bg-white/[0.02] border-t border-white/5">
                {{ $softwareList->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
