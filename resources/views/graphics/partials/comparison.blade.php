{{-- resources/views/graphics/partials/comparison.blade.php --}}
<section id="comparison" class="relative py-24 bg-[#DEF5F3] overflow-hidden">
    {{-- High-End Studio Background --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        {{-- Soft Mesh Glows --}}
        <div class="absolute -top-24 -left-24 w-[600px] h-[600px] bg-indigo-100/30 rounded-full blur-[120px] opacity-70 animate-pulse-glow"></div>
        <div class="absolute -bottom-24 -right-24 w-[600px] h-[600px] bg-cyan-100/30 rounded-full blur-[120px] opacity-70" style="animation-delay: 1.5s"></div>
        
        {{-- Refined Noise Texture --}}
        <div class="absolute inset-0 opacity-[0.015] mix-blend-multiply" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\"0 0 200 200\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cfilter id=\"noise\"%3E%3CfeTurbulence type=\"fractalNoise\" baseFrequency=\"0.65\" numOctaves=\"3\" stitchTiles=\"stitch\"/%3E%3C/filter%3E%3Crect width=\"100%25\" height=\"100%25\" filter=\"url(%23noise)\"/%3E%3C/svg%3E')"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
        {{-- 3-Column Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 xl:gap-14">
            @php
            $showcaseItems = [
                [
                    'title' => 'Shoe Photo Editing',
                    'desc' => 'Shoe photo editing always requires an extra bit of attention due to the complex designs most of the shoes contain. Our experienced editors scan your images, figure out the flaws, and take necessary actions to remove them.',
                    'before' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80', // Replace with edited version if available
                ],
                [
                    'title' => 'Apparel/ Clothing Photo Editing',
                    'desc' => 'If you start up an apparel online store, we can help you to upgrade your product photos to fascinate your audience. We do color correction, brightness & contrast adjustments, and ghost mannequin effects for a clean look.',
                    'before' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                ],
                [
                    'title' => 'Cosmetics Photo Editing',
                    'desc' => 'Are you failing to attract customers in your cosmetics e-commerce store due to low-quality product photos? We specialize in cosmetics photo editing regardless of their size, shape, and appearance.',
                    'before' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                ]
            ];
            @endphp

            @foreach($showcaseItems as $i => $item)
            <div class="group flex flex-col reveal" style="animation-delay: {{ $i * 0.15 }}s">
                {{-- Comparison Slider --}}
                <div class="relative w-full aspect-[4/5] overflow-hidden rounded-3xl shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] mb-8 bg-slate-200"
                    x-data="{ 
                        position: 50, 
                        isDragging: false,
                        updatePosition(e) {
                            if (!this.isDragging && e.type !== 'mousemove' && e.type !== 'click') return;
                            const rect = $el.getBoundingClientRect();
                            const x = (e.clientX || (e.touches ? e.touches[0].clientX : 0)) - rect.left;
                            this.position = Math.max(0, Math.min(100, (x / rect.width) * 100));
                        }
                    }"
                    @mousedown="isDragging = true; updatePosition($event)"
                    @touchstart.passive="isDragging = true"
                    @mouseup="isDragging = false"
                    @touchend="isDragging = false"
                    @mousemove="updatePosition($event)"
                    @touchmove.passive="updatePosition($event)"
                    @click="updatePosition($event)"
                    @mouseleave="isDragging = false"
                >
                    {{-- After Image (Full background) --}}
                    <div class="absolute inset-0">
                        <img src="{{ $item['after'] }}" alt="After" class="w-full h-full object-cover">
                        <div class="absolute bottom-6 right-6 px-4 py-1.5 bg-indigo-600/90 backdrop-blur-md rounded-lg text-[11px] font-black text-white uppercase tracking-widest z-10 shadow-lg">AFTER</div>
                    </div>

                    {{-- Before Image (Clipped) --}}
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" 
                         :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $item['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-75 contrast-75">
                        <div class="absolute bottom-6 left-6 px-4 py-1.5 bg-slate-800/80 backdrop-blur-md rounded-lg text-[11px] font-black text-white uppercase tracking-widest z-10 shadow-lg">BEFORE</div>
                    </div>

                    {{-- Slider Handle --}}
                    <div class="absolute inset-y-0 z-20 w-1 bg-white/80 backdrop-blur-md shadow-[0_0_20px_rgba(0,0,0,0.2)] cursor-ew-resize pointer-events-none slider-smooth" 
                         :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-[0_10px_30px_rgba(0,0,0,0.3)] flex items-center justify-center border-4 border-white">
                            <i class="ri-arrow-left-right-line text-indigo-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div class="text-center">
                    <h4 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors uppercase tracking-tight">{{ $item['title'] }}</h4>
                    <p class="text-slate-500 text-base leading-relaxed px-2">
                        {{ $item['desc'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Prevent image stretching and selection */
    [x-data] img {
        pointer-events: none;
        user-select: none;
    }

    /* Smoothing the slider movement */
    .slider-smooth {
        transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67), 
                    left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }
</style>
