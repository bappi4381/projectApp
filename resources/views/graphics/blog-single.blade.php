@extends('layouts.app')
@section('title', 'Read Story | Graphics Studio Blog')
@section('meta_description', 'Explore our latest insights on e-commerce photography, photo editing techniques, and design industry trends from PixelForge Graphics Studio.')

@section('content')
@php
    // In a real app this data comes from DB. For now we use static data.
    $posts = [
        'top-10-e-commerce-photography-trends-for-2024' => [
            'title'    => 'Top 10 E-commerce Photography Trends for 2024',
            'category' => 'Photography',
            'date'     => 'May 12, 2024',
            'author'   => 'A. Ray',
            'read'     => '6 min read',
            'image'    => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=1600&q=90',
            'avatar'   => 'https://i.pravatar.cc/100?u=aray',
            'content'  => [
                ['type' => 'lead', 'text' => 'E-commerce photography has never been more crucial. As online shopping continues to dominate retail, the way you present your products can mean the difference between a conversion and a bounce. Here are the top trends shaping product photography in 2024.'],
                ['type' => 'h2', 'text' => '1. Clean White Backgrounds Are Coming Back'],
                ['type' => 'p', 'text' => 'After years of lifestyle photography domination, leading platforms like Amazon and Shopify are seeing higher conversion rates with ultra-clean, white-background product imagery. The simplicity communicates trust and reduces cognitive load for the buyer.'],
                ['type' => 'image', 'src' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=1200&q=80', 'alt' => 'Clean product shot on white', 'caption' => 'Minimalist product photography converts better on marketplaces.'],
                ['type' => 'h2', 'text' => '2. 360° Spin Photography'],
                ['type' => 'p', 'text' => 'Giving shoppers full control to rotate and inspect a product from every angle reduces return rates significantly. Tools that create automated 360° views are now affordable enough for small studios to incorporate.'],
                ['type' => 'h2', 'text' => '3. Lifestyle Context Shots'],
                ['type' => 'p', 'text' => 'Beyond clinical product shots, brands are investing in context imagery — showing the product in real-life environments. A coffee mug photographed in a cozy morning kitchen setting triggers emotional buying responses that plain studio shots cannot.'],
                ['type' => 'blockquote', 'text' => '"Customers who see a product in context are 60% more likely to complete a purchase." — Shopify Commerce Trends Report, 2024'],
                ['type' => 'h2', 'text' => '4. AI-Assisted Background Generation'],
                ['type' => 'p', 'text' => 'AI-powered tools like Adobe Firefly and LightX now allow studios to swap product backgrounds with photorealistic AI-generated scenes in seconds. What once took hours of compositing now takes minutes, dramatically lowering costs for e-commerce clients.'],
                ['type' => 'h2', 'text' => '5. Sustainable & Ethical Imagery'],
                ['type' => 'p', 'text' => 'Brands are consciously curating photography that reflects diversity, inclusivity, and environmental values. Authentic, unretouched imagery featuring real-world textures, natural lighting, and diverse models is driving stronger emotional connections with consumers.'],
            ],
        ],
        'why-ghost-mannequin-is-essential-for-fashion-retailers' => [
            'title'    => 'Why Ghost Mannequin is Essential for Fashion Retailers',
            'category' => 'Tutorial',
            'date'     => 'May 08, 2024',
            'author'   => 'J. Smith',
            'read'     => '5 min read',
            'image'    => 'https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?w=1600&q=90',
            'avatar'   => 'https://i.pravatar.cc/100?u=jsmith',
            'content'  => [
                ['type' => 'lead', 'text' => 'The ghost mannequin effect — also known as the invisible mannequin or hollow man effect — has become a staple for fashion e-commerce brands worldwide. Here\'s why your brand should be using it.'],
                ['type' => 'h2', 'text' => 'What is Ghost Mannequin?'],
                ['type' => 'p', 'text' => 'The ghost mannequin technique involves photographing a garment on a mannequin and then removing the mannequin in post-production to create the illusion that the clothing is being worn by an invisible person. This gives the garment a 3D shape and depth while keeping the focus entirely on the product.'],
                ['type' => 'h2', 'text' => 'Why It Converts Better'],
                ['type' => 'p', 'text' => 'Flat-lay photography shows the fabric but not the fit. Standard mannequin photography shows the fit but distracts the eye with the mannequin itself. The ghost mannequin combines the best of both worlds — a dimensional, fitted product presentation with zero visual distraction.'],
                ['type' => 'blockquote', 'text' => '"Products with ghost mannequin photography see an average of 35% higher CTR on category pages versus flat-lay images."'],
                ['type' => 'h2', 'text' => 'The Process, Step by Step'],
                ['type' => 'p', 'text' => 'First, the garment is photographed on an appropriate mannequin. Then, interior shots of the collar, lining, and neck area are photographed separately. In post-production, these shots are combined using layer masking in Photoshop to create the seamless hollow effect. Finally, minor retouching is applied to wrinkles, colour accuracy, and shadows.'],
            ],
        ],
        'speed-up-your-workflow-with-these-editing-hacks' => [
            'title'    => 'Speed Up Your Workflow with These Editing Hacks',
            'category' => 'Efficiency',
            'date'     => 'May 05, 2024',
            'author'   => 'M. Doe',
            'read'     => '4 min read',
            'image'    => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=1600&q=90',
            'avatar'   => 'https://i.pravatar.cc/100?u=mdoe',
            'content'  => [
                ['type' => 'lead', 'text' => 'Post-production is often the bottleneck in a high-volume photography studio. With the right habits and tools, you can dramatically cut editing time without sacrificing quality.'],
                ['type' => 'h2', 'text' => 'Batch Editing with Lightroom Presets'],
                ['type' => 'p', 'text' => 'Creating a well-calibrated set of Lightroom presets for your most common scenarios — daylight product shots, studio white backgrounds, lifestyle settings — can reduce initial culling and grading time by up to 70%.'],
                ['type' => 'h2', 'text' => 'Photoshop Actions for Repetitive Tasks'],
                ['type' => 'p', 'text' => 'Recording Photoshop actions for repetitive tasks like background removal, shadow dropping, and sharpening allows you to apply complex multi-step processes with a single keyboard shortcut. Our editors use action sets grouped by product type for maximum efficiency.'],
                ['type' => 'blockquote', 'text' => '"Automation isn\'t about cutting corners. It\'s about reserving your creative energy for the decisions that actually require human judgement."'],
                ['type' => 'h2', 'text' => 'AI Background Removal Tools'],
                ['type' => 'p', 'text' => 'Tools like Photoshop\'s AI-powered Remove Background, remove.bg, or Topaz Studio can cut background removal time from 5–10 minutes per image to under 30 seconds. These tools have reached a level of accuracy that makes them viable for 90% of commercial use cases.'],
            ],
        ],
    ];

    $post = $posts[$slug] ?? $posts[array_key_first($posts)];
    $otherPosts = collect($posts)->except($slug)->values()->take(2);
@endphp

<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-[#6366f1] selection:text-white">

    {{-- ── HERO BANNER ──────────────────────────────────────────── --}}
    <div class="relative h-[65vh] min-h-[550px] flex items-end overflow-hidden pt-32 md:pt-40 lg:pt-44 pb-0">
        {{-- BG image --}}
        <div class="absolute inset-0">
            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-slate-950/10"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 container mx-auto px-6 max-w-4xl pb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-[#6366f1]/20 text-[#818cf8] text-[10px] font-bold tracking-widest uppercase border border-[#6366f1]/30 mb-5">
                {{ $post['category'] }}
            </span>
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black leading-[1.12] text-white mb-6">
                {{ $post['title'] }}
            </h1>
            {{-- Meta --}}
            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-400 font-medium">
                <div class="flex items-center gap-3">
                    <img src="{{ $post['avatar'] }}" alt="{{ $post['author'] }}" class="w-9 h-9 rounded-full object-cover border-2 border-[#6366f1]">
                    <span class="text-white font-bold">{{ $post['author'] }}</span>
                </div>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <span class="flex items-center gap-1.5"><i class="ri-calendar-line text-[#818cf8]"></i> {{ $post['date'] }}</span>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <span class="flex items-center gap-1.5"><i class="ri-time-line text-[#818cf8]"></i> {{ $post['read'] }}</span>
            </div>
        </div>
    </div>

    {{-- ── ARTICLE BODY ─────────────────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-4xl py-20">
        <div class="grid lg:grid-cols-[1fr_260px] gap-16">

            {{-- Main Content --}}
            <article class="min-w-0 prose-article">
                @foreach($post['content'] as $block)
                    @if($block['type'] === 'lead')
                        <p class="text-xl md:text-2xl text-slate-300 leading-relaxed font-medium mb-10 border-l-4 border-[#6366f1] pl-6">
                            {{ $block['text'] }}
                        </p>
                    @elseif($block['type'] === 'h2')
                        <h2 class="text-2xl md:text-3xl font-black text-white mt-14 mb-5">{{ $block['text'] }}</h2>
                    @elseif($block['type'] === 'p')
                        <p class="text-slate-400 text-base leading-[1.9] mb-6">{{ $block['text'] }}</p>
                    @elseif($block['type'] === 'blockquote')
                        <blockquote class="my-10 relative pl-8 border-l-4 border-[#22d3ee]">
                            <div class="absolute -left-[18px] top-0 w-8 h-8 bg-[#22d3ee] rounded-full flex items-center justify-center text-slate-950 text-sm">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <p class="text-lg text-[#22d3ee] font-semibold italic leading-relaxed">{{ $block['text'] }}</p>
                        </blockquote>
                    @elseif($block['type'] === 'image')
                        <figure class="my-12 rounded-2xl overflow-hidden">
                            <img src="{{ $block['src'] }}" alt="{{ $block['alt'] }}" class="w-full object-cover max-h-[450px]">
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
                            <span class="px-4 py-1.5 rounded-full bg-white/5 border border-white/5 text-slate-300 text-xs font-medium hover:bg-[#6366f1]/20 hover:text-[#818cf8] transition-colors cursor-pointer">{{ $post['category'] }}</span>
                            <span class="px-4 py-1.5 rounded-full bg-white/5 border border-white/5 text-slate-300 text-xs font-medium hover:bg-[#6366f1]/20 hover:text-[#818cf8] transition-colors cursor-pointer">Design</span>
                            <span class="px-4 py-1.5 rounded-full bg-white/5 border border-white/5 text-slate-300 text-xs font-medium hover:bg-[#6366f1]/20 hover:text-[#818cf8] transition-colors cursor-pointer">E-commerce</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-slate-500 uppercase tracking-widest font-bold block mb-3">Share</span>
                        <div class="flex gap-2">
                            <a href="#" class="w-9 h-9 rounded-full bg-white/5 border border-white/5 flex items-center justify-center text-slate-400 hover:bg-[#6366f1] hover:text-white hover:border-[#6366f1] transition-all"><i class="ri-twitter-x-line"></i></a>
                            <a href="#" class="w-9 h-9 rounded-full bg-white/5 border border-white/5 flex items-center justify-center text-slate-400 hover:bg-[#6366f1] hover:text-white hover:border-[#6366f1] transition-all"><i class="ri-facebook-fill"></i></a>
                            <a href="#" class="w-9 h-9 rounded-full bg-white/5 border border-white/5 flex items-center justify-center text-slate-400 hover:bg-[#6366f1] hover:text-white hover:border-[#6366f1] transition-all"><i class="ri-linkedin-fill"></i></a>
                            <a href="#" class="w-9 h-9 rounded-full bg-white/5 border border-white/5 flex items-center justify-center text-slate-400 hover:bg-[#6366f1] hover:text-white hover:border-[#6366f1] transition-all"><i class="ri-link"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Author Card --}}
                <div class="mt-12 p-8 rounded-3xl border border-white/10 bg-white/[0.03] flex flex-col sm:flex-row gap-6 items-center sm:items-start">
                    <img src="{{ $post['avatar'] }}" alt="{{ $post['author'] }}" class="w-20 h-20 rounded-2xl object-cover border-2 border-[#6366f1] shrink-0">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold text-[#818cf8] block mb-1">Written by</span>
                        <h4 class="text-xl font-black text-white mb-2">{{ $post['author'] }}</h4>
                        <p class="text-slate-400 text-sm leading-relaxed">Senior visual designer and photo retouching specialist at PixelForge Graphics Studio. Passionate about elevating e-commerce imagery through technical precision and creative direction.</p>
                        <a href="/graphics-studio/blog" class="inline-flex items-center gap-1.5 text-[#818cf8] text-xs font-bold mt-3 hover:text-white transition-colors">
                            View all posts <i class="ri-arrow-right-line"></i>
                        </a>
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
                            @foreach($post['content'] as $block)
                                @if($block['type'] === 'h2')
                                <li class="flex items-start gap-3 text-slate-400 text-sm hover:text-[#818cf8] transition-colors cursor-pointer">
                                    <span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#6366f1] shrink-0"></span>
                                    <span class="leading-tight">{{ $block['text'] }}</span>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    {{-- Newsletter CTA --}}
                    <div class="p-6 rounded-2xl border border-[#6366f1]/20 bg-gradient-to-br from-[#6366f1]/10 to-[#22d3ee]/5">
                        <h5 class="text-sm font-black text-white mb-2">Get Weekly Insights</h5>
                        <p class="text-slate-400 text-xs leading-relaxed mb-5">No spam. Just actionable design tips delivered to your inbox.</p>
                        <input type="email" placeholder="Your email address" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#6366f1] mb-3 transition-colors">
                        <button class="w-full py-3 rounded-xl bg-[#6366f1] hover:bg-[#4f46e5] text-white text-sm font-bold transition-colors">Subscribe</button>
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
                <a href="/graphics-studio/blog/{{ Str::slug($related['title']) }}" 
                   class="group flex gap-5 p-5 rounded-2xl border border-white/[0.06] hover:border-[#6366f1]/40 bg-white/[0.02] hover:bg-white/[0.05] transition-all">
                    <div class="w-28 h-24 rounded-xl overflow-hidden shrink-0">
                        <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="min-w-0">
                        <span class="text-[10px] uppercase tracking-widest font-bold text-[#818cf8] block mb-2">{{ $related['category'] }}</span>
                        <h4 class="text-sm font-bold text-white group-hover:text-[#818cf8] transition-colors leading-snug line-clamp-2">{{ $related['title'] }}</h4>
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
