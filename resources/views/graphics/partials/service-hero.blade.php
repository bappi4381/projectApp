<div class="flex items-center relative overflow-hidden"
    style="background: linear-gradient(135deg, #072a44 0%, #0d4669 100%); min-height: 500px; padding-top: 120px; padding-bottom: 80px;">
    <div class="container mx-auto px-6 max-w-6xl relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- Left Side: Content --}}
            <div class="text-white text-center md:text-center px-4">
                <h1 class="text-[34px] md:text-[46px] font-black uppercase tracking-tight mb-6 leading-[1.1]">
                    {!! $title !!}
                </h1>
                <p class="text-slate-200 text-base md:text-lg leading-relaxed mb-10 max-w-md mx-auto">
                    {{ $description }}
                </p>

                <div class="flex flex-col items-center gap-10">
                    <a href="{{ route('graphics.get-quote') }}"
                        class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-sm tracking-[0.1em] shadow-lg hover:shadow-cyan-500/30 transition-all hover:scale-105">
                        GET A QUOTE
                    </a>

                    {{-- Simple Dots Pagination --}}
                    <div class="flex items-center gap-2">
                        <div class="w-3.5 h-1.5 bg-white rounded-full"></div>
                        <div class="w-1.5 h-1.5 bg-white/40 rounded-full"></div>
                        <div class="w-1.5 h-1.5 bg-white/40 rounded-full"></div>
                        <div class="w-1.5 h-1.5 bg-white/40 rounded-full"></div>
                    </div>
                </div>
            </div>

            {{-- Right Side: Video/Image Card Component --}}
            <div class="relative group cursor-pointer max-w-[480px] mx-auto w-full" id="service-video-container">
                <div class="relative rounded-xl overflow-hidden shadow-[0_30px_60px_-15px_rgba(0,0,0,0.5)] border border-white/10 aspect-video bg-black" id="video-box">
                    {{-- Placeholder Image --}}
                    <div id="video-placeholder" class="absolute inset-0 z-10 transition-opacity duration-500">
                        <img src="{{ $hero_image ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80' }}"
                            alt="Service Preview" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        
                        {{-- Overlay --}}
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>

                        {{-- Play Button --}}
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20" 
                             onclick="playServiceVideo('{{ $video_url ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}')">
                            <div class="w-16 h-16 rounded-full border-2 border-white/50 flex items-center justify-center bg-white/10 backdrop-blur-sm group-hover:scale-110 group-hover:bg-[#0ea5e9] transition-all shadow-2xl">
                                <i class="ri-play-fill text-3xl text-white ml-1"></i>
                            </div>
                        </div>

                        {{-- Floating Text/Label --}}
                        <div class="absolute bottom-6 left-6 text-white text-left">
                            <div class="text-[12px] font-bold uppercase tracking-widest opacity-80 mb-1">Service Preview</div>
                            <div class="text-[18px] font-black uppercase tracking-tight">{!! strip_tags($title) !!}</div>
                        </div>
                    </div>

                    {{-- Iframe Container (Initially Empty) --}}
                    <div id="iframe-container" class="absolute inset-0 z-0"></div>
                </div>

                {{-- Cartoon Character Overlay (pointing at the card) --}}
                <div class="absolute -left-12 -bottom-10 w-48 hidden lg:block pointer-events-none drop-shadow-[0_20px_20px_rgba(0,0,0,0.3)] z-20">
                    <img src="{{ asset('images/character-pointing.png') }}" alt="Character" 
                        class="w-full h-auto opacity-100 translate-y-0" 
                        onerror="this.src='https://cdntr1.img.s-msn.com/tenant/amp/entityid/AA1m1mE6.img'">
                </div>
            </div>

        </div>
    </div>

    {{-- Decorative subtle background elements --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
        style="background-image: radial-gradient(white 1.5px, transparent 1.5px); background-size: 40px 40px;">
    </div>
</div>

<script>
    function playServiceVideo(url) {
        const placeholder = document.getElementById('video-placeholder');
        const container = document.getElementById('iframe-container');
        
        // Convert YouTube URL to embed if needed
        let embedUrl = url;
        if(url.includes('youtube.com/watch?v=')) {
            embedUrl = url.replace('watch?v=', 'embed/') + '?autoplay=1';
        } else if(url.includes('youtu.be/')) {
            embedUrl = url.replace('youtu.be/', 'youtube.com/embed/') + '?autoplay=1';
        } else if (!url.includes('autoplay=')) {
            embedUrl += (url.includes('?') ? '&' : '?') + 'autoplay=1';
        }

        container.innerHTML = `<iframe class="w-full h-full" src="${embedUrl}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
        placeholder.classList.add('opacity-0', 'pointer-events-none');
        container.classList.add('z-30');
    }
</script>

<style>
@keyframes fade-in-up {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
}
</style>
