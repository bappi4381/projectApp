@extends('layouts.admin')
@section('title', 'Portfolio Items | Graphics Studio')

@section('content')
<div class="p-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Portfolio Items</h1>
            <p class="text-slate-400 font-medium text-sm">Manage individual gallery items for the portfolio page</p>
        </div>
        <a href="{{ route('admin.graphics.portfolios.create') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg flex items-center gap-2 w-fit">
            <i class="ri-add-line"></i> Add New Item
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
            <i class="ri-checkbox-circle-line text-xl"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="glass-card rounded-[24px] border-white/5 p-4 overflow-x-auto shadow-2xl">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="border-b border-white/5">
                    <th class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest">Preview</th>
                    <th class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest">Title</th>
                    <th class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest">Category</th>
                    <th class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest text-center">Home</th>
                    <th class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest text-center">Order</th>
                    <th class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($portfolios as $item)
                <tr class="group hover:bg-white/[0.02] transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                             @if($item->before_image)
                                <img src="{{ asset('storage/' . $item->before_image) }}" class="w-12 h-12 rounded-lg object-cover border border-white/10" title="Before">
                             @endif
                             @if($item->after_image)
                                <img src="{{ asset('storage/' . $item->after_image) }}" class="w-12 h-12 rounded-lg object-cover border border-white/10" title="After">
                             @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 font-bold text-white text-sm">{{ $item->title }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-indigo-500/10 text-indigo-400 text-[10px] font-black uppercase rounded-lg border border-indigo-500/20">
                            {{ $item->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($item->show_on_home)
                            <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-500 text-[9px] font-black uppercase rounded border border-emerald-500/20">Yes</span>
                        @else
                            <span class="px-2 py-0.5 bg-slate-500/10 text-slate-500 text-[9px] font-black uppercase rounded border border-slate-500/20">No</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center text-slate-400 font-mono text-sm">{{ $item->order }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-3 text-slate-400">
                            <a href="{{ route('admin.graphics.portfolios.edit', $item) }}" class="p-2 hover:bg-white/5 hover:text-white rounded-lg transition-all" title="Edit">
                                <i class="ri-edit-line"></i>
                            </a>
                            <form action="{{ route('admin.graphics.portfolios.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 hover:bg-rose-500/10 hover:text-rose-400 rounded-lg transition-all" title="Delete">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-500 text-sm italic">
                        No portfolio items found. Click "Add New Item" to start.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if($portfolios->hasPages())
            <div class="px-6 py-4 bg-white/5 border-t border-white/5">
                {{ $portfolios->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
