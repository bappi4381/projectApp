<div class="flex items-center relative overflow-hidden"
    style="background: linear-gradient(135deg, #062238 0%, #0a3d5c 100%); min-height: 580px; padding-top: 140px; padding-bottom: 100px;">
    <div class="container mx-auto px-6 max-w-6xl relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">

            {{-- Left Side: Content --}}
            <div class="text-white text-center w-full animate-fade-in-up flex flex-col items-center">
                <h1
                    class="text-[24px] md:text-[34px] font-black uppercase tracking-[0.08em] mb-8 leading-none w-full text-center">
                    {!! $title !!}
                </h1>
                <p class="text-slate-200 text-base md:text-lg leading-relaxed mb-12 max-w-lg mx-auto text-center">
                    {{ $description }}
                </p>

                <div class="flex flex-col items-center gap-10 w-full text-center">
                    <a href="{{ route('graphics.get-quote') }}"
                        class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-sm tracking-[0.1em] shadow-lg hover:shadow-cyan-500/30 transition-all hover:scale-105">
                        GET A QUOTE
                    </a>

                    {{-- Simple Square Dots Pagination (Centered like Example 1) --}}
                    <div class="flex items-center justify-center gap-2">
                        <div class="w-3.5 h-3.5 bg-white"></div>
                        <div class="w-3.5 h-3.5 bg-white/40 border border-white/20 hover:bg-white/60 transition-colors">
                        </div>
                        <div class="w-3.5 h-3.5 bg-white/40 border border-white/20 hover:bg-white/60 transition-colors">
                        </div>
                        <div class="w-3.5 h-3.5 bg-white/40 border border-white/20 hover:bg-white/60 transition-colors">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Side: Video/Image Card Component --}}
            <div class="relative group cursor-pointer w-full max-w-[580px] ml-auto" id="service-video-container">
                <div class="relative overflow-hidden w-full aspect-[16/9] bg-[#212123] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.6)]"
                    id="video-box">

                    {{-- Iframe Container (Initially Empty) --}}
                    <div id="iframe-container" class="absolute inset-0 z-0 bg-black"></div>

                    {{-- Placeholder --}}
                    <div id="video-placeholder"
                        class="absolute inset-0 z-10 transition-opacity duration-500 flex items-center justify-center">

                        {{-- Toolbar Icons Top Right --}}
                        <div
                            class="absolute top-4 right-4 bg-black/30 rounded px-3 py-2 flex items-center gap-4 z-40 backdrop-blur-md border border-white/10 group-hover:bg-black/50 transition-colors">
                            <i class="ri-crop-2-line text-white/50 text-[14px] hover:text-white transition-colors"></i>
                            <i class="ri-focus-3-line text-white/50 text-[14px] hover:text-white transition-colors"></i>
                            <i
                                class="ri-paint-brush-line text-white/50 text-[14px] hover:text-white transition-colors"></i>
                        </div>

                        {{-- Service/Background Image --}}
                        <div
                            class="absolute inset-0 p-8 flex justify-end items-center opacity-70 group-hover:opacity-100 transition-opacity duration-700">
                            <img src="{{ $hero_image ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80' }}"
                                alt="Service Preview"
                                class="h-full w-auto object-contain drop-shadow-2xl scale-110 group-hover:scale-105 transition-transform duration-700">
                        </div>

                        {{-- Hover Overlay --}}
                        <div
                            class="absolute inset-0 bg-black/5 group-hover:bg-black/20 transition-colors pointer-events-none">
                        </div>

                        {{-- Play Button --}}
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-40 ml-12 md:ml-16"
                            onclick="playServiceVideo('{{ $video_url ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}')">
                            <div
                                class="w-16 h-16 md:w-20 md:h-20 rounded-full border-[2.5px] border-white flex items-center justify-center bg-white/10 backdrop-blur-sm group-hover:scale-110 group-hover:bg-white/30 transition-all shadow-2xl">
                                <i class="ri-play-fill text-3xl md:text-5xl text-white ml-1.5"></i>
                            </div>
                        </div>

                        {{-- Cartoon Character --}}
                        <div
                            class="absolute left-6 bottom-0 w-[42%] md:w-[38%] z-30 pointer-events-none drop-shadow-[0_20px_30px_rgba(0,0,0,0.5)] transform group-hover:translate-y-1 transition-transform">
                            <img src="{{ asset('images/character-pointing.png') }}" alt="Character"
                                class="w-full h-auto"
                                onerror="this.src='https://cdntr1.img.s-msn.com/tenant/amp/entityid/AA1m1mE6.img'">
                        </div>

                        {{-- Floating Text/Label Bottom Right --}}
                        <div class="absolute bottom-6 right-8 z-30 text-right pointer-events-none select-none">
                            @php
                                // Clean the title and split for the two-tone look
                                $cl_text = trim(strip_tags(str_replace('<br>', ' ', $title)));
                                $parts = array_filter(explode(' ', $cl_text));
                                $first = array_shift($parts) ?? 'CLIPPING';
                                $last = implode(' ', $parts) ?? 'PATH';
                            @endphp
                            <div
                                class="font-black text-[24px] md:text-[32px] uppercase tracking-tighter leading-[0.9] drop-shadow-md">
                                <div class="text-[#ff4721]">{{ $first }}</div>
                                <div class="text-white">{{ $last }}</div>
                            </div>
                            <div class="text-white mt-1 relative -right-1 text-[22px] md:text-[26px] tracking-wide"
                                style="font-family: 'Brush Script MT', 'Comic Sans MS', cursive; transform: rotate(-6deg); text-shadow: 2px 4px 10px rgba(0,0,0,0.5);">
                                Service
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Decorative subtle background elements --}}
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
        style="background-image: radial-gradient(white 1.5px, transparent 1.5px); background-size: 50px 50px;">
    </div>
</div>

<script>
    function playServiceVideo(url) {
        const placeholder = document.getElementById('video-placeholder');
        const container = document.getElementById('iframe-container');

        let embedUrl = url;
        if (url.includes('youtube.com/watch?v=')) {
            embedUrl = url.replace('watch?v=', 'embed/') + '?autoplay=1';
        } else if (url.includes('youtu.be/')) {
            embedUrl = url.replace('youtu.be/', 'youtube.com/embed/') + '?autoplay=1';
        } else if (!url.includes('autoplay=')) {
            embedUrl += (url.includes('?') ? '&' : '?') + 'autoplay=1';
        }

        container.innerHTML = `<iframe class="w-full h-full" src="${embedUrl}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
        placeholder.classList.add('opacity-0', 'pointer-events-none');
        container.classList.add('z-50');
    }
</script>
<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>