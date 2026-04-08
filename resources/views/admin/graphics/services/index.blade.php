@extends('layouts.admin')
@section('title', 'Project Services | Graphics Studio')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Graphics Services</h1>
            <p class="text-slate-400 font-medium">Manage your design offerings and pricing models.</p>
        </div>
        <div class="flex items-center gap-4">
            <form action="{{ route('admin.graphics.services.index') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search services..." class="bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 pl-10 text-white text-sm focus:outline-none focus:border-indigo-500/50 focus:ring-1 focus:ring-indigo-500/50 transition-all w-64">
                <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                @if(request('search'))
                    <a href="{{ route('admin.graphics.services.index') }}" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-white">
                        <i class="ri-close-line"></i>
                    </a>
                @endif
            </form>
            <a href="{{ route('admin.graphics.services.create') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/20 flex items-center gap-2 group">
                <i class="ri-add-line transition-transform group-hover:rotate-90"></i>
                <span>Add New Service</span>
            </a>
        </div>
    </div>

    {{-- Services Table --}}
    <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-1">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 border-b border-white/5">
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Service Identity</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Base Category</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Starting Rate</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Status</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none text-right">Orchestration</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($services as $service)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 text-xl border border-indigo-500/10 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-300 shadow-inner">
                                    <i class="{{ $service->icon ?? 'ri-image-line' }}"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white tracking-tight">{{ $service->name }}</h4>
                                    <p class="text-xs text-slate-500 font-medium truncate max-w-[200px]">{{ $service->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-xs font-bold text-slate-400 bg-slate-800/50 px-3 py-1.5 rounded-lg border border-white/5">{{ $service->category->name ?? 'N/A' }} 
                                @if($service->subCategory) > {{ $service->subCategory->name }} @endif
                            </span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-sm font-bold text-indigo-400 font-mono tracking-tighter">${{ number_format($service->starting_price, 2) }}</span>
                        </td>
                        <td class="px-6 py-5">
                            @if($service->is_active)
                                <span class="flex items-center gap-1.5 text-[10px] font-black text-emerald-400 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    Published
                                </span>
                            @else
                                <span class="flex items-center gap-1.5 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.graphics.services.edit', $service) }}" class="w-9 h-9 rounded-lg bg-white/5 border border-white/5 text-slate-400 hover:text-white hover:bg-white/10 transition-all flex items-center justify-center">
                                    <i class="ri-edit-line text-lg"></i>
                                </a>
                                <form action="{{ route('admin.graphics.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-lg bg-rose-500/5 border border-rose-500/10 text-rose-500/50 hover:text-rose-400 hover:bg-rose-500/10 transition-all flex items-center justify-center">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center">
                             <div class="flex flex-col items-center gap-4">
                                 <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center text-3xl text-slate-600">
                                     <i class="ri-inbox-line"></i>
                                 </div>
                                 <p class="text-slate-500 font-medium">No design services synchronized in the cloud.</p>
                             </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-8">
        {{ $services->links('pagination::tailwind') }}
    </div>
</div>
@endsection
