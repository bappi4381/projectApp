@extends('layouts.app')
@section('title', 'Ghost Mannequin Effect Service | Graphics Studio')
@section('meta_description', 'Professional invisible mannequin effect for apparel photography. Expertly joining neck and inner bottom areas for 3D clothing look.')

@section('content')
<div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-[#0ea5e9] selection:text-white pb-20">

    {{-- ── HERO SECTION ────────────────────────────────── --}}
    @include('graphics.partials.service-hero', [
        'title' => 'GHOST MANNEQUIN <br>EFFECT',
        'description' => 'Give your apparel products a professional 3D hollow-man look by expertly joining neck and inner-bottom areas.',
        'hero_image' => 'https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&w=1200&q=80',
        'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
    ])

    {{-- ── INTRO TEXT ──────────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-4xl py-20 text-center">
        <h2 class="text-[28px] md:text-[34px] font-black text-[#074b7c] mb-6 uppercase tracking-tight">
            INVISIBLE MANNEQUIN, VISIBLE QUALITY
        </h2>
        <p class="text-slate-500 text-[16px] md:text-[18px] leading-relaxed max-w-3xl mx-auto mb-12">
            Showcasing clothing without the distraction of a mannequin provides a seamless and professional look. We flawlessly combine multiple photos (neck-joint) to create a perfect 3D hollow effect for your apparel.
        </p>

        <div class="flex justify-center gap-2 mb-12">
            <div class="w-10 h-1 bg-[#4ade80] rounded-full"></div>
            <div class="w-10 h-1 bg-[#0ea5e9] rounded-full"></div>
            <div class="w-10 h-1 bg-[#f97316] rounded-full"></div>
        </div>
    </div>

    {{-- ── BEFORE/AFTER SLIDER ────────────────────────── --}}
    <div class="bg-[#f8fafc] py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                {{-- Left: Slider --}}
                <div class="relative overflow-hidden rounded-xl shadow-2xl before-after-service-container group" style="height: 500px; cursor: ew-resize;">
                    {{-- AFTER image (Ghost Effect) --}}
                    <img src="https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&w=1200&q=80" alt="Ghost Mannequin AFTER" class="absolute inset-0 w-full h-full object-cover">
                    
                    {{-- BEFORE image (with Mannequin visible) --}}
                    <div class="absolute inset-0 before-after-service-clip z-10" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                        <img src="https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&w=1200&q=80&sepia=50" alt="With Mannequin Original" class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    {{-- Labels --}}
                    <div class="absolute bottom-6 left-6 z-20 bg-slate-900/80 text-white text-[10px] font-bold px-4 py-2 uppercase tracking-widest rounded backdrop-blur-md">WITH MANNEQUIN</div>
                    <div class="absolute bottom-6 right-6 z-20 bg-sky-500/80 text-white text-[10px] font-bold px-4 py-2 uppercase tracking-widest rounded backdrop-blur-md">GHOST EFFECT</div>

                    {{-- Handle --}}
                    <div class="absolute top-0 bottom-0 z-30 before-after-service-handle" style="left: 50%; transform: translateX(-50%);">
                        <div class="absolute top-0 bottom-0 w-[2px] bg-white/80" style="left: 50%; transform: translateX(-50%);"></div>
                        <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-10 h-10 rounded-full border-2 border-white bg-slate-900 shadow-xl flex items-center justify-center transition-transform hover:scale-110" style="left: 50%;">
                            <i class="ri-arrow-left-right-line text-white text-lg"></i>
                        </div>
                    </div>
                </div>

                {{-- Right: Content --}}
                <div class="text-left space-y-8">
                    <h2 class="text-[32px] md:text-[40px] font-black text-slate-900 leading-[1.1]">
                        NECK JOINT & <span class="text-[#0ea5e9]">3D HOLLOW</span><br>EFFECT
                    </h2>
                    <p class="text-slate-600 text-[16px] md:text-[18px] leading-relaxed">
                        Clothing photos shot on mannequins look cheap. Our "Invisible Mannequin" service removes the plastic frame and inserts the inner neck and hem details from separate shots, creating a realistic, floating 3D look.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Expert Neck Joint & Sleeves
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Natural Fabric Symmetrizing
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Crease Removal & Reshaping
                        </li>
                    </ul>
                    <div class="pt-6">
                        <a href="{{ route('graphics.get-quote') }}" class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-sm tracking-widest shadow-lg hover:brightness-105 transition-all">
                            VIEW PRICING
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ── VALUE PROPOSITION ──────────────────────────── --}}
    <div class="bg-white py-24">
        <div class="container mx-auto px-6 max-w-6xl text-center">
            <h2 class="text-[28px] md:text-[36px] font-black text-slate-900 mb-16 uppercase tracking-tight">
                THE APPAREL <span class="text-[#0ea5e9]">ADVANTAGE</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-sky-50 flex items-center justify-center mb-8 group-hover:bg-sky-500 transition-colors">
                        <i class="ri-t-shirt-2-line text-3xl text-sky-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">3D Realism</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Make your clothes look like they're being worn by an invisible person."</p>
                </div>

                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center mb-8 group-hover:bg-emerald-500 transition-colors">
                        <i class="ri-ruler-2-line text-3xl text-emerald-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">Symmetry Fix</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Balance uneven sleeves and hems for a perfectly symmetrical silhouette."</p>
                </div>

                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-amber-50 flex items-center justify-center mb-8 group-hover:bg-amber-500 transition-colors">
                        <i class="ri-flashlight-line text-3xl text-amber-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">Wrinkle Control</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Digitally steam your garments to remove distracting wrinkles and folds."</p>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const containers = document.querySelectorAll('.before-after-service-container');
        containers.forEach(container => {
            const clip = container.querySelector('.before-after-service-clip');
            const handle = container.querySelector('.before-after-service-handle');
            let isDragging = false;
            const updatePos = (clientX) => {
                const rect = container.getBoundingClientRect();
                let x = clientX - rect.left;
                let percent = (x / rect.width) * 100;
                percent = Math.max(0, Math.min(100, percent));
                clip.style.clipPath = `polygon(0 0, ${percent}% 0, ${percent}% 100%, 0 100%)`;
                handle.style.left = `${percent}%`;
            };
            const onStart = (e) => { isDragging = true; updatePos(e.type.includes('touch') ? e.touches[0].clientX : e.clientX); };
            const onMove = (e) => { if (isDragging) updatePos(e.type.includes('touch') ? e.touches[0].clientX : e.clientX); };
            const onEnd = () => { isDragging = false; };
            container.addEventListener('mousedown', onStart);
            window.addEventListener('mousemove', onMove);
            window.addEventListener('mouseup', onEnd);
            container.addEventListener('touchstart', onStart, { passive: true });
            window.addEventListener('touchmove', onMove, { passive: true });
            window.addEventListener('touchend', onEnd);
        });
    });
</script>
@endsection
