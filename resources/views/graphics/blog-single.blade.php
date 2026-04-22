@extends('layouts.app')
@section('title', $post->title . ' | Graphics Studio Blog')
@section('meta_description', $post->excerpt ?? 'Read more about ' . $post->title . ' on PixelForge Graphics Studio.')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --accent: #6366f1;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --bg-main: #ffffff;
            --bg-alt: #f8fafc;
        }

        body {
            background-color: var(--bg-main) !important;
            color: var(--text-main) !important;
        }

        .prose-refined {
            font-family: 'Crimson Pro', serif;
            font-size: 1.25rem;
            line-height: 1.8;
            color: var(--text-main);
        }

        .prose-refined h2,
        .prose-refined h3 {
            font-family: 'Outfit', sans-serif;
            color: #0f172a;
            font-weight: 800;
            margin-top: 3.5rem;
            margin-bottom: 1.5rem;
            letter-spacing: -0.02em;
        }

        .prose-refined p {
            margin-bottom: 2rem;
        }

        .prose-refined img {
            border-radius: 1rem;
            margin: 4rem 0;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.1);
        }

        .prose-refined blockquote {
            font-family: 'Outfit', sans-serif;
            border-left: 4px solid var(--accent);
            padding: 2rem 3rem;
            background: var(--bg-alt);
            border-radius: 0 2rem 2rem 0;
            font-style: italic;
            font-weight: 600;
            font-size: 1.5rem;
            margin: 4rem 0;
            color: #0f172a;
        }

        .scroll-progress-refined {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--accent);
            z-index: 1000;
        }

        .sticky-share {
            position: sticky;
            top: 180px;
        }

        .widget-card {
            background: white;
            border: 1px solid #f1f5f9;
            border-radius: 2rem;
            padding: 2.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02);
        }

        .breadcrumb-item:not(:last-child)::after {
            content: '/';
            margin: 0 0.75rem;
            color: #cbd5e1;
        }

        .sidebar-sticky {
            position: sticky;
            top: 120px;
        }

        /* Nav Overrides */
        #main-navbar {
            background: #1e293b !important;
        }
        #main-navbar .studio-nav-link {
            color: white !important;
        }
        #main-navbar .logo-text-primary {
            color: white !important;
        }
    </style>
@endpush

@section('content')
    <div class="scroll-progress-refined" id="scrollProgress"></div>

    <div class="pt-32 pb-32">
        <div class="container mx-auto px-6 max-w-7xl">

            {{-- ── ARTICLE HEADER ────────────────────────────────────────── --}}
            <header class="max-w-4xl mx-auto text-center mb-16 lg:mb-24 reveal">
                <nav class="flex items-center justify-center text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-10">
                    <a href="/" class="hover:text-indigo-600 transition-colors">Home</a>
                    <span class="breadcrumb-item"></span>
                    <a href="{{ route('graphics.blog') }}" class="hover:text-indigo-600 transition-colors">Editorial</a>
                    <span class="breadcrumb-item"></span>
                    <span class="text-indigo-600 truncate max-w-[150px]">{{ explode(' -> ', $post->category)[0] }}</span>
                </nav>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-[#0f172a] leading-[1.1] tracking-tight mb-12">
                    {{ $post->title }}
                </h1>

                <div class="flex flex-col items-center gap-6">
                    <div class="flex items-center gap-4">
                        <img src="{{ $post->author_avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($post->author_name) }}"
                            alt="{{ $post->author_name }}"
                            class="w-14 h-14 rounded-2xl object-cover shadow-lg border-2 border-white">
                        <div class="text-left">
                            <span class="block text-slate-900 font-bold text-lg leading-none mb-1">{{ $post->author_name }}</span>
                            <span class="text-slate-500 text-xs font-semibold uppercase tracking-widest">Visual Strategist</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 text-slate-400 text-xs font-bold uppercase tracking-widest">
                        <span>{{ $post->published_at->format('M d, Y') }}</span>
                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                        <span>{{ $post->read_time ?? '5' }} Min Read</span>
                    </div>
                </div>
            </header>

            {{-- ── FEATURED IMAGE ────────────────────────────────────────── --}}
            <div class="relative w-full max-w-6xl mx-auto aspect-[16/9] mb-24 reveal">
                <div class="absolute inset-x-12 -bottom-12 h-24 bg-indigo-600/10 blur-[60px] rounded-full"></div>
                <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}"
                    alt="{{ $post->title }}"
                    class="relative w-full h-full object-cover rounded-[3rem] shadow-2xl border-4 border-white">
            </div>

            {{-- ── MAIN CONTENT GRID ───────────────────────────────────── --}}
            <div class="grid lg:grid-cols-[1fr_350px] gap-20 xl:gap-32 items-start">

                {{-- Article Side --}}
                <div class="relative">
                    {{-- Share Vertical --}}
                    <div class="hidden xl:block absolute -left-24 h-full">
                        <div class="sticky-share flex flex-col gap-4 text-slate-300">
                            <a href="#"
                                class="w-12 h-12 rounded-2xl border border-slate-100 flex items-center justify-center hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all shadow-sm"><i
                                    class="ri-facebook-fill"></i></a>
                            <a href="#"
                                class="w-12 h-12 rounded-2xl border border-slate-100 flex items-center justify-center hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all shadow-sm"><i
                                    class="ri-twitter-x-fill"></i></a>
                            <a href="#"
                                class="w-12 h-12 rounded-2xl border border-slate-100 flex items-center justify-center hover:bg-indigo-700 hover:text-white hover:border-indigo-700 transition-all shadow-sm"><i
                                    class="ri-linkedin-fill"></i></a>
                        </div>
                    </div>

                    <article class="prose-refined">
                        @if(is_array($post->content))
                            @foreach($post->content as $block)
                                @if(isset($block['type']) && $block['type'] == 'text')
                                    <p>{!! $block['data'] !!}</p>
                                @endif
                                {{-- Add more block types if they existed --}}
                            @endforeach
                        @else
                            {!! $post->content !!}
                        @endif
                    </article>

                    {{-- Author Bio Card --}}
                    <div class="mt-28 p-12 rounded-[2.5rem] bg-[#f8fafc] border border-slate-100 flex flex-col md:flex-row gap-10 items-center md:items-start text-center md:text-left">
                        <img src="{{ $post->author_avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($post->author_name) }}"
                            class="w-32 h-32 rounded-[2rem] object-cover shadow-xl grayscale hover:grayscale-0 transition-all duration-700 border-4 border-white">
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 text-[9px] font-black uppercase tracking-widest rounded-lg mb-4">Original Contributor</span>
                            <h4 class="text-3xl font-black text-slate-900 mb-4">{{ $post->author_name }}</h4>
                            <p class="text-slate-500 text-base leading-relaxed mb-6 font-medium">
                                I'm a digital storyteller and lead editor at Graphics Studio. I specialize in uncovering the
                                nexus between high-end product photography and consumer psychology.
                            </p>
                            <div class="flex items-center justify-center md:justify-start gap-6">
                                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors font-bold text-sm">Follow on X</a>
                                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors font-bold text-sm">Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar Side --}}
                <aside class="sidebar-sticky hidden lg:block space-y-12">

                    {{-- Newsletter Widget --}}
                    <div class="widget-card bg-slate-900 !border-none text-white relative overflow-hidden">
                        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-3xl"></div>
                        <h5 class="text-xl font-black mb-4 relative z-10">Get the best <br> of editorial.</h5>
                        <p class="text-slate-400 text-xs mb-8 relative z-10 leading-relaxed font-medium">Join 2,400+ creatives getting our curated design insights every Sunday.</p>
                        <form class="space-y-3 relative z-10">
                            <input type="email" placeholder="Your email..."
                                class="w-full bg-white/10 border border-white/10 rounded-xl px-5 py-3.5 text-xs text-white placeholder:text-slate-500 outline-none focus:bg-white/20 transition-all">
                            <button class="w-full bg-indigo-600 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-indigo-600 transition-all shadow-lg">Join Elite List</button>
                        </form>
                    </div>

                    {{-- Related Posts Widget --}}
                    @if($otherPosts->count())
                        <div class="space-y-8">
                            <h5 class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 pl-2">Similar Stories</h5>
                            @foreach($otherPosts as $related)
                                <a href="{{ route('graphics.blog.single', $related->slug) }}" class="group flex items-center gap-5">
                                    <div class="w-20 h-20 rounded-2xl overflow-hidden shrink-0 shadow-sm border border-slate-100">
                                        <img src="{{ Str::startsWith($related->featured_image, 'http') ? $related->featured_image : asset('storage/' . $related->featured_image) }}"
                                            alt="{{ $related->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    </div>
                                    <div>
                                        <span class="text-[8px] font-black text-indigo-500 uppercase tracking-widest block mb-1">{{ explode(' -> ', $related->category)[0] }}</span>
                                        <h6 class="text-xs font-bold text-slate-900 group-hover:text-indigo-600 transition-colors leading-snug line-clamp-2">
                                            {{ $related->title }}
                                        </h6>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    {{-- Used Disciplines Cloud --}}
                    <div class="pt-10">
                        <h5 class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 mb-6 pl-2">Disciplines</h5>
                        <div class="flex flex-wrap gap-2">
                            @foreach($disciplines as $name)
                                <a href="#" class="px-4 py-2 bg-slate-50 border border-slate-100 rounded-xl text-[9px] font-bold text-slate-500 hover:bg-white hover:text-indigo-600 hover:border-indigo-600 transition-all uppercase tracking-widest">{{ $name }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            {{-- ── FOOTER NEWSLETTER / CTA ──────────────────────────────── --}}
            <section class="mt-40 pt-24 border-t border-slate-100 text-center reveal">
                <h2 class="text-4xl md:text-5xl font-black text-slate-950 mb-8 tracking-tighter">Stay Ahead of the Curve.</h2>
                <p class="text-slate-500 max-w-xl mx-auto mb-12 font-medium leading-relaxed italic">"Design is not just what it looks like and feels like. Design is how it works." — Read our best work every week.</p>
                <div class="flex justify-center">
                    <a href="{{ route('graphics.blog') }}" class="group flex items-center gap-4 text-indigo-600 font-black uppercase tracking-[0.3em] text-[10px] hover:gap-6 transition-all">
                        Back to Editorial <i class="ri-arrow-right-line text-lg"></i>
                    </a>
                </div>
            </section>
        </div>
    </div>

    @push('scripts')
        <script>
            window.onscroll = function () {
                let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                let scrolled = (winScroll / height) * 100;
                document.getElementById("scrollProgress").style.width = scrolled + "%";
            };
        </script>
    @endpush
@endsection