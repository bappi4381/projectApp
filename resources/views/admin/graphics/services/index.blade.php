@extends('layouts.admin')
@section('title', 'Services & Variants | Graphics Studio')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Main Services</h1>
            <p class="text-slate-400 font-medium text-sm">Manage Level 3 (Primary Services). Variants are managed in their dedicated section.</p>
        </div>
        <a href="{{ route('admin.graphics.services.create') }}" class="group relative px-8 py-4 bg-indigo-600 rounded-2xl transition-all hover:scale-105 active:scale-95 shadow-xl shadow-indigo-500/20 overflow-hidden flex items-center gap-3 self-start">
            <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            <i class="ri-add-line text-white text-lg relative"></i>
            <span class="relative text-white font-black uppercase tracking-widest text-[11px]">Add Service / Variant</span>
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
        <form action="{{ route('admin.graphics.services.index') }}" method="GET" class="flex flex-wrap gap-4 flex-1">
            <div class="relative flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search services..."
                    class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 pl-10 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            </div>

            <select name="sub_category" class="bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-sm text-slate-400 focus:outline-none focus:border-indigo-500/50 transition-all select-dark">
                <option value="">All Groups</option>
                @foreach($subCategories as $sub)
                    <option value="{{ $sub->id }}" {{ request('sub_category') == $sub->id ? 'selected' : '' }}>
                        {{ $sub->category->name ?? '' }} → {{ $sub->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase rounded-xl transition-all">Filter</button>
            @if(request()->anyFilled(['search', 'sub_category']))
                <a href="{{ route('admin.graphics.services.index') }}" class="px-6 py-3 bg-white/5 text-slate-400 hover:text-white text-[11px] font-black uppercase rounded-xl transition-all">Reset</a>
            @endif
        </form>
    </div>

    {{-- Services Table --}}
    <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-2">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/[0.02] border-b border-white/5">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Service Identity</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Architecture Path</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Price Point</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Visibility</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Lifecycle</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Operations</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($services as $service)
                    <tr class="hover:bg-white/[0.02] transition-all group {{ $service->parent_id ? 'opacity-80' : '' }}">

                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                {{-- Indent visual for variants --}}
                                @if($service->parent_id)
                                    <div class="w-6 h-px bg-slate-800 relative -mr-2">
                                        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1.5 h-1.5 rounded-full bg-slate-700"></div>
                                    </div>
                                @endif
                                <div class="w-12 h-12 rounded-2xl {{ $service->parent_id ? 'bg-violet-500/10 border-violet-500/20 text-violet-400' : 'bg-indigo-500/10 border-indigo-500/20 text-indigo-400' }} flex items-center justify-center border group-hover:scale-110 group-hover:border-indigo-500/40 transition-all shadow-lg group-hover:shadow-indigo-500/10">
                                    <i class="{{ $service->icon ?? 'ri-image-line' }} text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-white text-[13px] tracking-tight group-hover:text-indigo-400 transition-colors">{{ $service->name }}</h4>
                                    <p class="text-[9px] text-slate-500 font-mono uppercase tracking-widest mt-0.5">{{ $service->slug }}</p>
                                </div>
                            </div>
                        </td>

                        {{-- Hierarchy / Group --}}
                        <td class="px-8 py-5">
                            <div class="flex flex-col gap-1.5">
                                <span class="px-2 py-0.5 rounded-md bg-white/5 border border-white/5 text-[9px] font-black text-slate-500 uppercase tracking-[0.1em] w-fit">
                                    {{ $service->subCategory->category->name ?? 'Standalone' }}
                                </span>
                                <span class="text-[11px] font-bold text-slate-400 flex items-center gap-1.5">
                                    <i class="ri-arrow-right-s-line text-indigo-500 opacity-50"></i>
                                    {{ $service->subCategory->name ?? 'General' }}
                                </span>
                            </div>
                        </td>

                        {{-- Pricing --}}
                        <td class="px-8 py-5">
                            @if($service->starting_price)
                                <div class="flex flex-col">
                                    <span class="text-[13px] font-black text-emerald-400 font-mono tracking-tight">${{ number_format($service->starting_price, 2) }}</span>
                                    <span class="text-[9px] text-slate-600 font-black uppercase tracking-widest">{{ $service->price_unit }}</span>
                                </div>
                            @else
                                <span class="text-slate-700 text-[10px] font-black uppercase tracking-widest italic">— No Rate —</span>
                            @endif
                        </td>

                        {{-- Has Details Page --}}
                        <td class="px-8 py-5">
                            @if($service->has_details)
                                <div class="flex flex-col gap-2">
                                    <span class="flex items-center gap-1.5 text-[9px] font-black text-indigo-400 uppercase tracking-[0.15em] bg-indigo-500/10 px-2 py-0.5 rounded-full w-fit border border-indigo-500/20">
                                        <i class="ri-pages-line"></i> Detailed
                                    </span>
                                    <a href="{{ route('graphics.service-detail', $service->slug) }}" target="_blank" class="text-[10px] text-slate-500 hover:text-white font-bold flex items-center gap-1.5 group/prev transition-colors">
                                        <i class="ri-external-link-line opacity-50 group-hover/prev:opacity-100"></i> View Page
                                    </a>
                                </div>
                            @else
                                <span class="text-[9px] font-black text-slate-600 uppercase tracking-[0.15em] bg-white/5 px-2 py-0.5 rounded-full w-fit border border-white/5">
                                    Simple
                                </span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td class="px-8 py-5">
                            @if($service->is_active)
                                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 w-fit">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.6)] animate-pulse"></span>
                                    <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest">Published</span>
                                </div>
                            @else
                                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-800/50 border border-white/5 w-fit">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Draft</span>
                                </div>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.graphics.services.edit', $service) }}"
                                    class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-emerald-400 hover:bg-emerald-500/10 transition-all" title="Edit">
                                    <i class="ri-edit-2-line"></i>
                                </a>
                                <form action="{{ route('admin.graphics.services.destroy', $service) }}" method="POST"
                                    onsubmit="return confirm('Delete \'{{ $service->name }}\'? Its variants will also be affected.')">
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
                        <td colspan="7" class="px-8 py-20 text-center text-slate-500 font-medium">
                            <i class="ri-inbox-line text-4xl mb-4 block opacity-20"></i>
                            No services found. <a href="{{ route('admin.graphics.services.create') }}" class="text-indigo-400 font-bold hover:underline">Create the first one.</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($services->hasPages())
            <div class="px-8 py-6 bg-white/[0.02] border-t border-white/5">
                {{ $services->links() }}
            </div>
        @endif
    </div>

    {{-- Quick Architecture Legend --}}
    <div class="mt-8 p-6 glass-card rounded-[24px] border-white/5 flex flex-wrap gap-6 items-center reveal">
        <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">Architecture Legend:</span>
        <div class="flex items-center gap-2">
            <span class="px-2.5 py-1 rounded-full bg-slate-700/50 border border-white/5 text-slate-500 text-[9px] font-black uppercase">L1</span>
            <span class="text-xs text-slate-500">Primary Vertical <span class="text-slate-700">(Category)</span></span>
        </div>
        <span class="text-slate-700">→</span>
        <div class="flex items-center gap-2">
            <span class="px-2.5 py-1 rounded-full bg-slate-700/50 border border-white/5 text-slate-500 text-[9px] font-black uppercase">L2</span>
            <span class="text-xs text-slate-500">Service Group <span class="text-slate-700">(SubCategory)</span></span>
        </div>
        <span class="text-slate-700">→</span>
        <div class="flex items-center gap-2">
            <span class="px-2.5 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-[9px] font-black uppercase">L3</span>
            <span class="text-xs text-slate-500">Primary Service</span>
        </div>
        <span class="text-slate-700">→</span>
        <div class="flex items-center gap-2">
            <span class="px-2.5 py-1 rounded-full bg-violet-500/10 border border-violet-500/20 text-violet-400 text-[9px] font-black uppercase">L4</span>
            <span class="text-xs text-slate-500">Variant <span class="text-slate-700">(child of L3)</span></span>
        </div>
    </div>

</div>
@endsection
