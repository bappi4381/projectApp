@extends('layouts.app')

@section('title', 'Editorial | Graphics Studio')

@section('content')
<div class="bg-white min-h-screen pt-32 pb-24 font-outfit">
    <div class="container mx-auto px-6 max-w-7xl">
        
        {{-- ── HEADER & SEARCH ── --}}
        <div class="relative mb-24">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-12">
                <div class="max-w-3xl">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-12 h-[2px] bg-indigo-600 rounded-full"></span>
                        <span class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.4em]">Editorial & Insights</span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-[#0f172a] tracking-tight leading-[1.05] mb-8">
                        @if($search)
                            Results for <span class="text-indigo-600">"{{ $search }}"</span>
                        @elseif($category)
                            <span class="text-indigo-600">{{ $category }}</span> Stories
                        @else
                            Discover Our <span class="text-indigo-600">Vision.</span>
                        @endif
                    </h1>
                    <p class="text-slate-500 text-lg md:text-xl font-medium leading-relaxed max-w-2xl opacity-80">
                        A curated collection of industry deep-dives, creative strategies, and technical mastery in modern visual production.
                    </p>
                </div>

                {{-- Search & Filters --}}
                <div class="w-full lg:w-[400px] space-y-6">
                    <form action="{{ route('graphics.blog') }}" method="GET" class="relative group">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Search the archive..." 
                               class="w-full bg-slate-50 border border-slate-100 rounded-[2rem] px-8 py-5 text-sm font-semibold outline-none focus:border-indigo-600/30 focus:bg-white transition-all shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
                        <button type="submit" class="absolute right-6 top-1/2 -translate-y-1/2 w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center text-white shadow-lg shadow-indigo-600/20 hover:scale-110 transition-transform">
                            <i class="ri-search-2-line text-lg"></i>
                        </button>
                        @if($category)
                            <input type="hidden" name="category" value="{{ $category }}">
                        @endif
                    </form>
                    
                    {{-- Quick Filter Chips --}}
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Image Editing', 'Video Production', 'Clipping Path'] as $cat)
                            <a href="{{ route('graphics.blog', ['category' => $cat]) }}" 
                               class="px-4 py-2 rounded-full text-[9px] font-black uppercase tracking-widest transition-all {{ $category == $cat ? 'bg-[#0f172a] text-white' : 'bg-slate-50 text-slate-400 hover:bg-slate-100 hover:text-[#0f172a]' }}">
                                {{ $cat }}
                            </a>
                        @endforeach
                        @if($search || $category)
                            <a href="{{ route('graphics.blog') }}" class="px-4 py-2 rounded-full bg-red-50 text-red-500 text-[9px] font-black uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all">
                                <i class="ri-close-line"></i> Clear
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ── FEATURED SECTION (Latest Image Editing) ── --}}
        @if(!$search && !$category && $latestImageEditingPosts->count() > 0)
        <div class="mb-32 reveal">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <h2 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-4">Editor's Pick</h2>
                    <h3 class="text-3xl font-black text-[#0f172a] tracking-tight">Mastering <span class="text-indigo-600">Image Editing.</span></h3>
                </div>
                <a href="{{ route('graphics.blog', ['category' => 'Image Editing']) }}" class="group flex items-center gap-3 text-[10px] font-black text-[#0f172a] uppercase tracking-widest hover:text-indigo-600 transition-colors">
                    The Collection <span class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white group-hover:border-indigo-600 transition-all"><i class="ri-arrow-right-line"></i></span>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                {{-- Main Featured Card --}}
                @php $featured = $latestImageEditingPosts[0]; @endphp
                <div class="lg:col-span-8 group relative aspect-[16/9] lg:aspect-auto lg:h-[600px] rounded-[3rem] overflow-hidden shadow-2xl">
                    <img src="{{ Str::startsWith($featured->featured_image, 'http') ? $featured->featured_image : asset('storage/' . $featured->featured_image) }}" 
                         class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-[#0f172a]/20 to-transparent"></div>
                    <div class="absolute bottom-12 left-12 right-12">
                        <span class="px-4 py-1.5 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest rounded-xl mb-6 inline-block shadow-lg shadow-indigo-600/20">Lead Story</span>
                        <h4 class="text-3xl md:text-5xl font-black text-white leading-tight mb-6 max-w-2xl group-hover:text-indigo-300 transition-colors">
                            <a href="{{ route('graphics.blog.single', $featured->slug) }}">{{ $featured->title }}</a>
                        </h4>
                        <div class="flex items-center gap-6 text-white/60 text-[10px] font-bold uppercase tracking-widest">
                            <span class="flex items-center gap-2"><i class="ri-calendar-line"></i> {{ $featured->published_at->format('M d, Y') }}</span>
                            <span class="flex items-center gap-2"><i class="ri-user-3-line"></i> {{ $featured->author_name }}</span>
                        </div>
                    </div>
                </div>

                {{-- Side Cards --}}
                <div class="lg:col-span-4 flex flex-col gap-8">
                    @foreach($latestImageEditingPosts->skip(1) as $post)
                    <div class="flex-1 group bg-slate-50 rounded-[2.5rem] p-8 border border-transparent hover:border-slate-200 hover:bg-white hover:shadow-xl transition-all duration-500">
                        <span class="text-[9px] font-black text-indigo-600 uppercase tracking-widest block mb-4">{{ explode(' -> ', $post->category)[0] }}</span>
                        <h4 class="text-xl font-black text-[#0f172a] leading-tight mb-6 group-hover:text-indigo-600 transition-colors">
                            <a href="{{ route('graphics.blog.single', $post->slug) }}">{{ $post->title }}</a>
                        </h4>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $post->published_at->format('M d, Y') }}</span>
                            <a href="{{ route('graphics.blog.single', $post->slug) }}" class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-[#0f172a] group-hover:text-white group-hover:border-[#0f172a] transition-all">
                                <i class="ri-arrow-right-up-line"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        {{-- ── ALL STORIES ── --}}
        <div class="reveal">
            <div class="flex items-center justify-between mb-16 pb-8 border-b border-slate-100">
                <div class="flex items-center gap-4">
                    <h2 class="text-3xl font-black text-[#0f172a] tracking-tight">
                        @if($search || $category)
                            Results.
                        @else
                            The <span class="text-indigo-600">Library.</span>
                        @endif
                    </h2>
                    @if(method_exists($posts, 'total'))
                        <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">{{ $posts->total() }} Articles</span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">
                @forelse($posts as $i => $post)
                <article class="group reveal" style="animation-delay:{{ ($i % 3) * 0.1 }}s">
                    <a href="{{ route('graphics.blog.single', $post->slug) }}" class="block">
                        <div class="aspect-[4/3] rounded-[3rem] overflow-hidden mb-10 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-50 relative bg-slate-50">
                            <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" 
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute inset-0 bg-[#0f172a]/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-8 left-8">
                                <span class="px-4 py-2 bg-white/95 backdrop-blur text-[#0f172a] text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-sm">
                                    {{ explode(' -> ', $post->category)[0] }}
                                </span>
                            </div>
                        </div>

                        <div class="px-4">
                            <div class="flex items-center gap-4 text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">
                                <span class="text-indigo-600">{{ $post->published_at->format('F d, Y') }}</span>
                                <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                                <span>{{ $post->author_name }}</span>
                            </div>
                            <h3 class="text-2xl font-black text-[#0f172a] leading-[1.25] mb-6 group-hover:text-indigo-600 transition-colors">
                                {{ $post->title }}
                            </h3>
                            <p class="text-slate-500 text-base leading-relaxed line-clamp-2 font-medium opacity-80 mb-8">
                                {{ $post->excerpt }}
                            </p>
                            <div class="inline-flex items-center gap-2 text-[11px] font-black text-[#0f172a] uppercase tracking-widest group-hover:gap-4 transition-all">
                                Full Article <i class="ri-arrow-right-line text-indigo-600"></i>
                            </div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>

            {{-- ── PAGINATION ── --}}
            @if(method_exists($posts, 'links'))
            <div class="mt-32 pt-20 border-t border-slate-100 flex justify-center">
                {{ $posts->appends(request()->input())->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <style>
        .font-outfit { font-family: 'Outfit', sans-serif !important; }
        
        #main-navbar {
            background-color: rgba(255, 255, 255, 0) !important;
            box-shadow: none !important;
        }

        #main-navbar .logo-text-primary,
        #main-navbar .logo-text-secondary {
            color: #0f172a !important;
        }

        #main-navbar .nav-text,
        #main-navbar .studio-nav-link {
            color: #0f172a !important;
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;
                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                }
            }
        }
        window.addEventListener("scroll", reveal);
        window.addEventListener("load", reveal);
    </script>
@endpush