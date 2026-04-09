@extends('layouts.admin')
@section('title', 'Service Groups | Graphics Studio')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Architecture Groups (Level 1)</h1>
            <p class="text-slate-400 font-medium text-sm">Manage primary architectural groupings and their linkable landing pages.</p>
        </div>
        <a href="{{ route('admin.graphics.subcategories.create') }}" class="group relative px-8 py-4 bg-indigo-600 rounded-2xl transition-all hover:scale-105 active:scale-95 shadow-xl shadow-indigo-500/20 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            <span class="relative text-white font-black uppercase tracking-widest text-[11px] flex items-center gap-2">
                <i class="ri-add-line text-lg"></i> Create New Group
            </span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3 animate-in fade-in slide-in-from-top-4">
            <i class="ri-checkbox-circle-line text-xl"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-1">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/5 bg-white/[0.02]">
                        <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest">Icon</th>
                        <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest">Group Name</th>
                        <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest">Vertical</th>
                        <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest">Services</th>
                        <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest">Linkable</th>
                        <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($subCategories as $group)
                        <tr class="group hover:bg-white/[0.02] transition-colors">
                            <td class="px-8 py-6">
                                <div class="w-12 h-12 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 border border-indigo-500/20 group-hover:scale-110 transition-transform">
                                    <i class="{{ $group->icon ?? 'ri-stack-line' }} text-xl"></i>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-white mb-1">{{ $group->name }}</span>
                                    <span class="text-[10px] text-slate-500 font-medium tracking-wider">{{ $group->slug }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-white/5 rounded-full text-[10px] font-black text-slate-400 uppercase tracking-widest border border-white/5 italic">
                                    {{ $group->category->name }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-sm font-bold text-slate-400">
                                {{ $group->services_count }} Services
                            </td>
                            <td class="px-8 py-6">
                                @if($group->has_details)
                                    <span class="flex items-center gap-1.5 text-[10px] font-black text-emerald-400 uppercase tracking-widest">
                                        <i class="ri-checkbox-circle-fill text-[14px]"></i> Yes
                                    </span>
                                @else
                                    <span class="flex items-center gap-1.5 text-[10px] font-black text-slate-600 uppercase tracking-widest">
                                        <i class="ri-close-circle-fill text-[14px]"></i> No
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    @if($group->has_details)
                                        <a href="{{ route('graphics.service-detail', $group->slug) }}" target="_blank" class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-indigo-400 hover:bg-indigo-500/10 transition-all" title="View Detail Page">
                                            <i class="ri-external-link-line"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.graphics.subcategories.edit', $group) }}" class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-emerald-400 hover:bg-emerald-500/10 transition-all" title="Edit Group">
                                        <i class="ri-edit-2-line"></i>
                                    </a>
                                    <form action="{{ route('admin.graphics.subcategories.destroy', $group) }}" method="POST" onsubmit="return confirm('Archive this architectural grouping? All associated services will remain but links will break.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-rose-500 hover:bg-rose-500/10 transition-all" title="Delete Group">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-20 text-center text-slate-500 font-medium">
                                <i class="ri-inbox-line text-4xl mb-4 block opacity-20"></i>
                                No architectural groups found. Get started by creating one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($subCategories->hasPages())
            <div class="px-8 py-6 bg-white/[0.01] border-t border-white/5">
                {{ $subCategories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
