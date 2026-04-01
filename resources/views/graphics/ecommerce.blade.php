@extends('layouts.app')
@section('title', 'Ecommerce Product Photo Editing Services | Graphics Studio')
@section('meta_description', 'High-quality ecommerce product photo editing services. Price starts from $0.49 per image.')

@section('content')
<div class="bg-[#f0f9ff] min-h-screen text-slate-800 font-sans selection:bg-[#7F2DF7] selection:text-white pb-20">

    {{-- ── HERO SECTION ────────────────────────────────── --}}
    <div class="flex items-center relative" style="background: linear-gradient(135deg, #072a44 0%, #0d4669 100%); min-height: 550px; padding-top: 150px; padding-bottom: 80px;">
        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                
                {{-- Left Side: Image Container --}}
                <div class="relative mx-auto" style="width: 350px; height: 380px;">
                    <div class="w-full h-full bg-slate-200 overflow-hidden relative shadow-2xl border border-white/5 rounded ">
                        <img src="{{ asset('images/ecommerce/Ecommerce-Product-Photo-Editing-Services-GIF.gif') }}" alt="Ecommerce Product Example" class="absolute inset-0  object-cover">
                    </div>
                </div>

                {{-- Right Side: Content --}}
                <div class="text-white text-center pt-4 flex flex-col items-center">
                    <h1 class="text-[30px] md:text-[40px] font-bold tracking-tight mb-12 leading-[1.2] text-white text-center md:text-center">
                        Ecommerce Product<br>Photo Editing Services
                    </h1>
                    
                    <div class="grid grid-cols-2 gap-8 mb-12 mx-auto md:max-w-md w-full">
                        {{-- Price Block --}}
                        <div class="text-center">
                            <h3 class="text-[16.5px] font-bold text-white mb-2">Price Starts From</h3>
                            <div class="text-[16px] text-[#4ade80] font-medium mb-0.5">$0.49</div>
                            <div class="text-[14px] text-slate-300">Per Image</div>
                            <a href="{{ route('graphics.get-quote') }}" class="inline-flex items-center justify-center px-7 py-3 mt-8 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-[13px] tracking-[0.15em] shadow-lg hover:shadow-cyan-500/30 transition-shadow">
                                GET QUOTE
                            </a>    
                        </div>
                        {{-- Deliver Block --}}
                        <div class="text-center">
                            <h3 class="text-[16.5px] font-bold text-white mb-2">We Can Deliver</h3>
                            <div class="text-[16px] text-[#4ade80] font-medium mb-0.5">5000 images/day</div>
                            <div class="text-[14px] text-slate-300">2500+ images in 12 hours</div>
                            <a href="{{ route('graphics.upload') }}" class="inline-flex items-center justify-center px-7 py-3 mt-8 rounded-full bg-white text-slate-900 font-bold text-[13px] tracking-[0.15em] shadow-lg hover:bg-slate-100 transition-colors">
                                FREE TRIAL
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        {{-- Subtle background pattern for visual depth --}}
        <div class="absolute inset-0 opacity-[0.02] pointer-events-none" style="background-image: radial-gradient(white 1.5px, transparent 1.5px); background-size: 40px 40px;"></div>
    </div>
    
    {{-- ── UPLOAD SECTION ──────────────────────────────── --}}
    <div class="bg-white py-20 relative">
        <div class="container mx-auto px-6 max-w-4xl text-center font-sans">
            {{-- Section Title --}}
            <h2 class="text-[28px] md:text-[34px] font-bold text-[#074b7c] mb-4">
                Product Photos Edited to Perfection
            </h2>
            {{-- Section Description --}}
            <p class="text-slate-500 text-[15px] md:text-[16px] leading-relaxed max-w-2xl mx-auto mb-12">
                With expert photo editing, you can showcase thumb-stopping visuals and convey quality<br class="hidden md:block"> and trust to turn your viewers into your customers.
            </p>
            
            <div class="border-t border-slate-100 w-full mb-12 relative">
                <div class="absolute inset-x-0 flex items-center justify-center -top-4">
                    <div class="bg-white px-2">
                        <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0L10 10L20 0H0Z" fill="#f1f5f9"/>
                        </svg>
                    </div>
                </div>
            </div>

            <h3 class="text-[22px] md:text-[26px] font-bold text-slate-800 mb-10">
                Get your photos edited in less than 24 hours
            </h3>

            {{-- Upload Widget Mockup --}}
            <div class="max-w-3xl mx-auto">
                <div class="bg-[#e9f7ef] rounded-lg p-6 border border-[#d1ebd8] relative shadow-sm">
                    {{-- Dotted Inner Box --}}
                    <div class="border-2 border-dashed border-[#b3dab9] rounded-lg py-12 px-6 flex flex-col items-center justify-center">
                        <p class="text-[#51855a] font-bold text-[16px] md:text-[18px] mb-2">Upload Your Files (max 500mb/file, 10 files only)</p>
                        <p class="text-[#51855a] italic text-[14px] mb-8">*No credit card required.*</p>
                        
                        <a href="{{ route('graphics.upload') }}" class="bg-[#4d86b8] hover:bg-[#3d6b94] text-white px-10 py-3.5 rounded flex items-center gap-3 transition-colors shadow-md group">
                            <i class="ri-upload-cloud-2-line text-2xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold uppercase tracking-wider text-sm">Upload Files</span>
                        </a>
                    </div>
                </div>

                {{-- Previous/Next Pagination Buttons --}}
                <div class="grid grid-cols-2 mt-4 rounded-lg overflow-hidden border border-[#d1ebd8] shadow-sm">
                    <button class="bg-[#e9f7ef] hover:bg-[#dff0e5] py-4 text-[12px] font-bold text-[#51855a] uppercase tracking-widest flex items-center justify-center transition-colors border-r border-[#d1ebd8]">
                        <i class="ri-arrow-left-s-line text-xl mr-2"></i> PREVIOUS
                    </button>
                    <button class="bg-[#e9f7ef] hover:bg-[#dff0e5] py-4 text-[12px] font-bold text-[#51855a] uppercase tracking-widest flex items-center justify-center transition-colors">
                        NEXT <i class="ri-arrow-right-s-line text-xl ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- ── AI + TRADITIONAL WORKFLOW SECTION ──────────── --}}
    <div class="bg-[#f7f9fc] py-20">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                {{-- Left: Before/After Slider --}}
                <div class="relative overflow-hidden rounded-lg shadow-xl before-after-ec-container" style="height: 380px; cursor: ew-resize;">
                    {{-- BEFORE image (background) --}}
                    <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=800&q=80" 
                         alt="Before" class="absolute inset-0 w-full h-full object-cover">

                    {{-- Manual tag overlays --}}
                    <div class="absolute top-[22%] left-[40%] z-20 flex flex-col gap-1">
                        <span class="bg-slate-800 text-white text-[10px] font-bold px-2 py-0.5 rounded-sm shadow">Manual</span>
                        <span class="bg-[#0ea5e9] text-white text-[10px] font-bold px-2 py-0.5 rounded-sm shadow">Color Correction</span>
                        <span class="bg-[#8b5cf6] text-white text-[10px] font-bold px-2 py-0.5 rounded-sm shadow">Shadow Creation</span>
                    </div>

                    {{-- AFTER image (clipped) --}}
                    <div class="absolute inset-0 before-after-ec-clip" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                        <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=800&q=80&sat=-60&brightness=120"
                             alt="After" class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    {{-- Drag Handle --}}
                    <div class="absolute top-0 bottom-0 z-30 before-after-ec-handle" style="left: 50%; transform: translateX(-50%);">
                        <div class="absolute top-0 bottom-0 w-[2px] bg-[#0ea5e9]/60" style="left: 50%; transform: translateX(-50%);"></div>
                        <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-9 h-9 rounded-full border-2 border-[#0ea5e9] bg-white shadow-lg flex items-center justify-center" style="left: 50%;">
                            <i class="ri-arrow-left-right-line text-[#0ea5e9] text-sm"></i>
                        </div>
                    </div>

                    {{-- BEFORE / AFTER Labels --}}
                    <div class="absolute bottom-0 left-0 right-0 z-20 flex">
                        <div class="flex-1 bg-slate-800/90 text-white text-[11px] font-bold uppercase tracking-wider py-2 text-center">BEFORE</div>
                        <div class="w-[2px] bg-[#0ea5e9]"></div>
                        <div class="flex-1 bg-slate-800/90 text-white text-[11px] font-bold uppercase tracking-wider py-2 text-center">AFTER</div>
                    </div>
                </div>

                {{-- Right: Content --}}
                <div class="text-center flex flex-col items-center">
                    <h2 class="text-[28px] md:text-[36px] font-bold text-slate-900 leading-tight mb-6 text-center">
                        Bridging <span class="text-[#0ea5e9]">AI</span> and <span class="text-[#22c55e]">traditional<br>post-production</span> workflow
                    </h2>
                    <p class="text-slate-600 text-[15px] leading-relaxed mb-8 text-center">
                        For faster turnaround and precision at scale. At <span class="text-[#0ea5e9] font-semibold">Color Experts International</span>, we combine AI efficiency with the precision of human craftsmanship. And every file <span class="font-bold text-slate-700">manually</span> goes through our skilled retouchers to ensure it's retouched to the <span class="text-[#22c55e] font-semibold">highest standard</span> and ready to go live.
                    </p>
                    <a href="{{ route('graphics.portfolio') }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-[13px] tracking-[0.12em] uppercase shadow-lg hover:shadow-cyan-500/30 hover:-translate-y-0.5 transition-all mx-auto">
                        WORK EXAMPLES
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const containers = document.querySelectorAll('.before-after-ec-container');
        
        containers.forEach(container => {
            const clip = container.querySelector('.before-after-ec-clip');
            const handle = container.querySelector('.before-after-ec-handle');
            let isDragging = false;

            const updatePos = (clientX) => {
                const rect = container.getBoundingClientRect();
                let x = clientX - rect.left;
                let percent = (x / rect.width) * 100;
                
                if (percent < 0) percent = 0;
                if (percent > 100) percent = 100;

                clip.style.clipPath = `polygon(0 0, ${percent}% 0, ${percent}% 100%, 0 100%)`;
                handle.style.left = `${percent}%`;
            };

            const onStart = (e) => {
                isDragging = true;
                const x = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                updatePos(x);
            };

            const onMove = (e) => {
                if (!isDragging) return;
                const x = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                updatePos(x);
            };

            const onEnd = () => {
                isDragging = false;
            };

            // Event Listeners
            container.addEventListener('mousedown', onStart);
            window.addEventListener('mousemove', onMove);
            window.addEventListener('mouseup', onEnd);

            container.addEventListener('touchstart', onStart, { passive: true });
            window.addEventListener('touchmove', onMove, { passive: true });
            window.addEventListener('touchend', onEnd);
        });
    });
    </script>

</div>
@endsection
