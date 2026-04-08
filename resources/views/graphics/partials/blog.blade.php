{{-- resources/views/graphics/partials/blog.blade.php --}}
<section id="offers" class="relative py-24 md:py-32 bg-slate-900/50">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-900/30 border border-blue-500/25 text-xs font-semibold text-blue-300 uppercase tracking-wider mb-5">
                <i class="ri-article-line"></i> Latest News
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                From Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Design Blog</span>
            </h2>
            <p class="text-slate-400 max-w-xl mx-auto">Stay updated with the latest trends in e-commerce photography, photo editing techniques, and industry insights.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $i => $post)
            <div class="group bg-slate-950 border border-white/[0.06] rounded-3xl overflow-hidden hover:border-blue-500/30 transition-all duration-500 reveal" style="animation-delay:{{ $i * 0.15 }}s">
                {{-- Image --}}
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-60"></div>
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-blue-600/80 backdrop-blur-sm text-[10px] font-bold text-white uppercase tracking-widest">
                        {{ $post->category }}
                    </span>
                </div>

                {{-- Content --}}
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4 text-xs text-slate-500 font-medium">
                        <span class="flex items-center gap-1.5"><i class="ri-calendar-line"></i> {{ $post->published_at->format('M d, Y') }}</span>
                        <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                        <span class="flex items-center gap-1.5"><i class="ri-user-line"></i> {{ $post->author_name }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors duration-300">
                        {{ $post->title }}
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">
                        {{ $post->excerpt }}
                    </p>
                    <a href="{{ route('graphics.blog.single', $post->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-blue-400 hover:text-blue-300 transition-colors group/btn">
                        Read Story
                        <i class="ri-arrow-right-line group-hover/btn:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 pb-32">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-white/5 text-slate-600 text-4xl mb-6">
                    <i class="ri-article-line"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">No Stories Published Yet</h3>
                <p class="text-slate-500">Check back soon for latest design insights and industry trends.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
