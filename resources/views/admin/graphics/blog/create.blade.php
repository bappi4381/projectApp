@extends('layouts.admin')
@section('title', 'Write New Story | Graphics Studio')

@section('content')
<div class="p-8 max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Create New Story</h1>
            <p class="text-slate-400 font-medium">Compose a visual journey for the PixelForge community.</p>
        </div>
        <a href="{{ route('admin.graphics.blog.index') }}" class="py-2 px-4 bg-slate-900 border border-white/5 rounded-xl hover:bg-slate-800 transition-all text-sm font-semibold flex items-center gap-2">
            <i class="ri-arrow-left-line"></i>
            <span>Back to List</span>
        </a>
    </div>

    <form action="{{ route('admin.graphics.blog.store') }}" method="POST" id="blogForm" class="space-y-8 pb-20">
        @csrf
        {{-- Hidden field to store content blocks as JSON --}}
        <input type="hidden" name="content_json" id="content_json">

        <div class="grid grid-cols-1 lg:grid-cols-[1fr_300px] gap-8 items-start">
            
            {{-- Main Editor --}}
            <div class="space-y-6">
                <div class="glass-card p-8 rounded-[24px] border-white/5 shadow-xl">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-500 mb-3 ml-1">Article Title</label>
                            <input type="text" name="title" required placeholder="Enter a catchy title..." 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-xl font-bold text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder:text-slate-600">
                        </div>

                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-500 mb-3 ml-1">Excerpt (Short Description)</label>
                            <textarea name="excerpt" rows="3" placeholder="Briefly describe the story..." 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-slate-300 focus:outline-none focus:border-indigo-500 transition-all placeholder:text-slate-600 resize-none"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Block Editor --}}
                <div class="space-y-4">
                    <div class="flex items-center justify-between px-2">
                        <h3 class="text-xs font-black uppercase tracking-widest text-slate-500">Story Composition</h3>
                        <div class="flex gap-2">
                            <button type="button" onclick="addBlock('paragraph')" class="w-8 h-8 rounded-lg bg-indigo-500/10 text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all flex items-center justify-center border border-indigo-500/10" title="Add Paragraph"><i class="ri-paragraph"></i></button>
                            <button type="button" onclick="addBlock('header')" class="w-8 h-8 rounded-lg bg-indigo-500/10 text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all flex items-center justify-center border border-indigo-500/10" title="Add Heading"><i class="ri-h-2"></i></button>
                            <button type="button" onclick="addBlock('image')" class="w-8 h-8 rounded-lg bg-indigo-500/10 text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all flex items-center justify-center border border-indigo-500/10" title="Add Image"><i class="ri-image-line"></i></button>
                            <button type="button" onclick="addBlock('quote')" class="w-8 h-8 rounded-lg bg-indigo-500/10 text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all flex items-center justify-center border border-indigo-500/10" title="Add Quote"><i class="ri-double-quotes-l"></i></button>
                        </div>
                    </div>

                    {{-- Container for blocks --}}
                    <div id="blocks-container" class="space-y-4">
                        {{-- First block is lead by default --}}
                        <div class="block-item glass-card p-6 rounded-2xl border-white/5 bg-indigo-500/5 relative group" data-type="lead">
                             <div class="flex justify-between items-center mb-3">
                                <span class="text-[9px] font-black uppercase tracking-widest text-indigo-400">Lead Block (Auto-Pin)</span>
                             </div>
                             <textarea rows="2" class="w-full bg-transparent border-none p-0 text-indigo-200 font-bold text-lg placeholder:text-indigo-900 focus:ring-0 resize-none block-content" placeholder="Enter introductory lead text..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar Settings --}}
            <div class="space-y-6 lg:sticky lg:top-8">
                <div class="glass-card p-6 rounded-[24px] border-white/5 shadow-xl space-y-6">
                    <div>
                        <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-500 mb-3 ml-1">Featured Image URL</label>
                        <input type="url" name="featured_image" required placeholder="Unsplash/Direct link..." 
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-indigo-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-500 mb-3 ml-1">Category</label>
                        <select name="category" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-slate-300 focus:outline-none focus:border-indigo-500 transition-all appearance-none cursor-pointer">
                            <option value="Photography">Photography</option>
                            <option value="Tutorial">Tutorial</option>
                            <option value="Efficiency">Efficiency</option>
                            <option value="Design">Design</option>
                            <option value="News">News</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-500 mb-3 ml-1 text-nowrap">Read Time (Min)</label>
                            <input type="number" name="read_time" value="5" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-500 mb-3 ml-1 text-nowrap">Sort Order</label>
                            <input type="number" name="sort_order" value="0" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none">
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-900/50 rounded-2xl border border-white/5">
                        <span class="text-xs font-bold text-slate-400">Publish Immediately</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_published" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>

                    <button type="submit" onclick="handleSubmit(event)" class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl transition-all shadow-lg shadow-indigo-500/20">
                        Launch Story
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Block Templates --}}
<template id="paragraph-template">
    <div class="block-item glass-card p-6 rounded-2xl border-white/5 bg-white/[0.02] relative group reveal" data-type="paragraph">
        <button type="button" onclick="this.parentElement.remove()" class="absolute -right-2 -top-2 w-6 h-6 rounded-full bg-rose-500 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all scale-75 group-hover:scale-100"><i class="ri-close-line"></i></button>
        <span class="text-[9px] font-black uppercase tracking-widest text-slate-500 block mb-3">Paragraph Block</span>
        <textarea rows="3" class="w-full bg-transparent border-none p-0 text-slate-300 text-sm leading-relaxed placeholder:text-slate-700 focus:ring-0 resize-none block-content" placeholder="Write your content here..."></textarea>
    </div>
</template>

<template id="header-template">
    <div class="block-item glass-card p-6 rounded-2xl border-white/5 bg-white/[0.02] relative group reveal" data-type="header">
        <button type="button" onclick="this.parentElement.remove()" class="absolute -right-2 -top-2 w-6 h-6 rounded-full bg-rose-500 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all scale-75 group-hover:scale-100"><i class="ri-close-line"></i></button>
        <span class="text-[9px] font-black uppercase tracking-widest text-indigo-400 block mb-3">Heading Block</span>
        <input type="text" class="w-full bg-transparent border-none p-0 text-white font-bold text-xl placeholder:text-slate-800 focus:ring-0 block-content" placeholder="Enter sub-heading text...">
    </div>
</template>

<template id="image-template">
    <div class="block-item glass-card p-6 rounded-2xl border-white/5 bg-white/[0.02] relative group reveal" data-type="image">
        <button type="button" onclick="this.parentElement.remove()" class="absolute -right-2 -top-2 w-6 h-6 rounded-full bg-rose-500 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all scale-75 group-hover:scale-100"><i class="ri-close-line"></i></button>
        <span class="text-[9px] font-black uppercase tracking-widest text-emerald-400 block mb-3">Image Block</span>
        <input type="url" class="w-full bg-slate-900/50 border border-white/10 rounded-xl px-4 py-2 text-xs text-white focus:outline-none mb-3 block-src" placeholder="Direct image URL...">
        <input type="text" class="w-full bg-transparent border-none p-0 text-[10px] text-slate-500 placeholder:text-slate-800 focus:ring-0 block-caption" placeholder="Optional image caption...">
    </div>
</template>

<template id="quote-template">
    <div class="block-item glass-card p-6 rounded-2xl border-white/5 bg-white/[0.02] border-l-4 border-cyan-400 relative group reveal" data-type="quote">
        <button type="button" onclick="this.parentElement.remove()" class="absolute -right-2 -top-2 w-6 h-6 rounded-full bg-rose-500 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all scale-75 group-hover:scale-100"><i class="ri-close-line"></i></button>
        <span class="text-[9px] font-black uppercase tracking-widest text-cyan-400 block mb-3">Blockquote Block</span>
        <textarea rows="2" class="w-full bg-transparent border-none p-0 text-cyan-200 italic font-medium text-base placeholder:text-cyan-950 focus:ring-0 resize-none block-content" placeholder="Enter a memorable quote..."></textarea>
    </div>
</template>

@push('scripts')
<script>
    const container = document.getElementById('blocks-container');
    
    function addBlock(type) {
        const template = document.getElementById(`${type}-template`);
        const clone = template.content.cloneNode(true);
        container.appendChild(clone);
    }

    function handleSubmit(e) {
        e.preventDefault();
        const blocks = [];
        document.querySelectorAll('.block-item').forEach(item => {
            const type = item.getAttribute('data-type');
            const block = { type };
            
            if (type === 'image') {
                block.src = item.querySelector('.block-src').value;
                block.caption = item.querySelector('.block-caption').value;
            } else {
                block.text = (type === 'header') ? item.querySelector('input').value : item.querySelector('textarea').value;
            }
            
            if (block.text || block.src) blocks.push(block);
        });

        document.getElementById('content_json').value = JSON.stringify(blocks);
        document.getElementById('blogForm').submit();
    }
</script>
@endpush
@endsection
