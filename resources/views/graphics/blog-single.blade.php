@extends('layouts.app')
@section('title', 'Read Story | Graphics Studio Blog')
@section('meta_description', 'Explore our latest insights on e-commerce photography, photo editing techniques, and design industry trends from PixelForge Graphics Studio.')

@@section('content')
<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-[#6366f1] selection:text-white">

    {{-- ── HERO BANNER ──────────────────────────────────────────── --}}
    <div class="relative h-[65vh] min-h-[550px] flex items-end overflow-hidden pt-32 md:pt-40 lg:pt-44 pb-0">
        {{-- BG image --}}
        <div class="absolute inset-0">
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-slate-950/10"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 container mx-auto px-6 max-w-4xl pb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-[#6366f1]/20 text-[#818cf8] text-[10px] font-bold tracking-widest uppercase border border-[#6366f1]/30 mb-5">
                {{ $post->category }}
            </span>
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black leading-[1.12] text-white mb-6">
                {{ $post->title }}
            </h1>
            {{-- Meta --}}
            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-400 font-medium">
                <div class="flex items-center gap-3">
                    <img src="{{ $post->author_avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($post->author_name) }}" alt="{{ $post->author_name }}" class="w-9 h-9 rounded-full object-cover border-2 border-[#6366f1]">
                    <span class="text-white font-bold">{{ $post->author_name }}</span>
                </div>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <span class="flex items-center gap-1.5"><i class="ri-calendar-line text-[#818cf8]"></i> {{ $post->published_at->format('M d, Y') }}</span>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <span class="flex items-center gap-1.5"><i class="ri-time-line text-[#818cf8]"></i> {{ $post->read_time }} min read</span>
            </div>
        </div>
    </div>

    {{-- ── ARTICLE BODY ─────────────────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-4xl py-20">
        <div class="grid lg:grid-cols-[1fr_260px] gap-16">

            {{-- Main Content --}}
            <article class="min-w-0 prose-article">
                @foreach($post->content as $block)
                    @if($block['type'] === 'lead')
                        <p class="text-xl md:text-2xl text-slate-300 leading-relaxed font-medium mb-10 border-l-4 border-[#6366f1] pl-6">
                            {{ $block['text'] }}
                        </p>
                    @elseif($block['type'] === 'h2' || $block['type'] === 'header')
                        <h2 class="text-2xl md:text-3xl font-black text-white mt-14 mb-5">{{ $block['text'] }}</h2>
                    @elseif($block['type'] === 'p' || $block['type'] === 'paragraph')
                        <p class="text-slate-400 text-base leading-[1.9] mb-6">{{ $block['text'] }}</p>
                    @elseif($block['type'] === 'blockquote' || $block['type'] === 'quote')
                        <blockquote class="my-10 relative pl-8 border-l-4 border-[#22d3ee]">
                            <div class="absolute -left-[18px] top-0 w-8 h-8 bg-[#22d3ee] rounded-full flex items-center justify-center text-slate-950 text-sm">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <p class="text-lg text-[#22d3ee] font-semibold italic leading-relaxed">{{ $block['text'] }}</p>
                        </blockquote>
                    @elseif($block['type'] === 'image')
                        <figure class="my-12 rounded-2xl overflow-hidden">
                            <img src="{{ $block['src'] }}" alt="{{ $block['alt'] ?? $post->title }}" class="w-full object-cover max-h-[450px]">
                            @isset($block['caption'])
                                <figcaption class="mt-3 text-center text-xs text-slate-500 font-medium">{{ $block['caption'] }}</figcaption>
                            @endisset
                        </figure>
                    @endif
                @endforeach

                {{-- Share + Tags --}}
                <div class="mt-16 pt-10 border-t border-white/10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                    <div>
                        <span class="text-xs text-slate-500 uppercase tracking-widest font-bold block mb-3">Tags</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-1.5 rounded-full bg-white/5 border border-white/5 text-slate-300 text-xs font-medium hover:bg-[#6366f1]/20 hover:text-[#818cf8] transition-colors cursor-pointer text-nowrap">{{ $post->category }}</span>
                        </div>
                    </div>
                </div>

                {{-- Author Card --}}
                <div class="mt-12 p-8 rounded-3xl border border-white/10 bg-white/[0.03] flex flex-col sm:flex-row gap-6 items-center sm:items-start">
                    <img src="{{ $post->author_avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($post->author_name) }}" alt="{{ $post->author_name }}" class="w-20 h-20 rounded-2xl object-cover border-2 border-[#6366f1] shrink-0">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold text-[#818cf8] block mb-1">Written by</span>
                        <h4 class="text-xl font-black text-white mb-2">{{ $post->author_name }}</h4>
                        <p class="text-slate-400 text-sm leading-relaxed">Administrator and creative contributor at PixelForge Graphics Studio. Expert in visual design and digital orchestration.</p>
                    </div>
                </div>
            </article>

            {{-- Sticky Sidebar --}}
            <aside class="hidden lg:block">
                <div class="sticky top-28 flex flex-col gap-8">
                    {{-- Table of Contents --}}
                    <div class="p-6 rounded-2xl border border-white/10 bg-white/[0.03]">
                        <h5 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-5">In this article</h5>
                        <ul class="space-y-3">
                            @foreach($post->content as $block)
                                @if($block['type'] === 'h2' || $block['type'] === 'header')
                                <li class="flex items-start gap-3 text-slate-400 text-sm hover:text-[#818cf8] transition-colors cursor-pointer">
                                    <span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#6366f1] shrink-0"></span>
                                    <span class="leading-tight">{{ $block['text'] }}</span>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>

        {{-- ── RELATED POSTS ─────────────────────────────────────── --}}
        @if($otherPosts->count())
        <div class="mt-28">
            <h3 class="text-2xl font-black text-white mb-10">You might also like</h3>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($otherPosts as $related)
                <a href="{{ route('graphics.blog.single', $related->slug) }}" 
                   class="group flex gap-5 p-5 rounded-2xl border border-white/[0.06] hover:border-[#6366f1]/40 bg-white/[0.02] hover:bg-white/[0.05] transition-all">
                    <div class="w-28 h-24 rounded-xl overflow-hidden shrink-0">
                        <img src="{{ $related->featured_image }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="min-w-0">
                        <span class="text-[10px] uppercase tracking-widest font-bold text-[#818cf8] block mb-2">{{ $related->category }}</span>
                        <h4 class="text-sm font-bold text-white group-hover:text-[#818cf8] transition-colors leading-snug line-clamp-2">{{ $related->title }}</h4>
                        <span class="text-xs text-slate-500 mt-2 block">{{ $related->published_at->format('M d') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
related['title'] }}</h4>
                        <span class="text-xs text-slate-500 mt-2 block">{{ $related['date'] }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>

</div>
@endsection
