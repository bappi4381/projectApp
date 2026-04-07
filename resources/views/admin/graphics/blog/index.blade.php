@extends('layouts.admin')
@section('title', 'Content Management | Graphics Studio')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Graphics Blog</h1>
            <p class="text-slate-400 font-medium">Create and manage your studio stories and design insights.</p>
        </div>
        <a href="{{ route('admin.graphics.blog.create') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/20 flex items-center gap-2 group">
            <i class="ri-add-line transition-transform group-hover:rotate-90"></i>
            <span>Write New Story</span>
        </a>
    </div>

    {{-- Blog List Table --}}
    <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-1">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 border-b border-white/5">
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Serial</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Article Details</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Category</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none text-center">Status</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($posts as $post)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="px-6 py-5">
                            <span class="text-xs font-mono text-slate-500">{{ str_pad($post->sort_order, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-12 rounded-lg overflow-hidden border border-white/10 shrink-0">
                                    <img src="{{ $post->featured_image }}" alt="img" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold text-white tracking-tight line-clamp-1 group-hover:text-indigo-400 transition-colors">{{ $post->title }}</h4>
                                    <p class="text-[10px] text-slate-500 font-medium mt-1">Author: {{ $post->author_name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-800/50 px-2.5 py-1 rounded-md border border-white/5">{{ $post->category }}</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex justify-center">
                                @if($post->is_published)
                                    <span class="flex items-center gap-1.5 text-[9px] font-black text-emerald-400 uppercase tracking-widest px-2 py-1 bg-emerald-500/10 rounded-full">
                                        Published
                                    </span>
                                @else
                                    <span class="flex items-center gap-1.5 text-[9px] font-black text-slate-500 uppercase tracking-widest px-2 py-1 bg-slate-900 rounded-full">
                                        Draft
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-5 text-right uppercase tracking-[0.2em] font-black">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.graphics.blog.edit', $post->id) }}" class="w-9 h-9 rounded-lg bg-indigo-500/10 border border-indigo-500/10 text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all flex items-center justify-center">
                                    <i class="ri-edit-2-line text-lg"></i>
                                </a>
                                <form action="{{ route('admin.graphics.blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Archive this story permanently?');">
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
                        <td colspan="5" class="py-24 text-center">
                            <div class="flex flex-col items-center gap-4 text-slate-600">
                                <i class="ri-article-line text-5xl"></i>
                                <p class="text-sm font-medium">Ready to share your visual journey?</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="p-6 bg-white/5 border-t border-white/5 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
