@extends('layouts.app')

@php
    $services_data = [
        'clipping-path' => [
            'name' => 'Clipping Path',
            'title' => 'Precise Image Isolation with Clipping Path',
            'hero_img' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1600&q=80',
            'desc' => 'Hand-drawn, multi-layered clipping paths for perfect product isolation. Ideal for complex shapes and high-end e-commerce.',
            'icon' => 'ri-scissors-cut-line',
            'features' => ['100% Hand-Drawn Paths', 'Multi-Layer Support', 'Alpha Channel Masking', 'Clean & Sharp Edges'],
            'price_start' => '0.39'
        ],
        'background-removal' => [
            'name' => 'Background Removal',
            'title' => 'Professional Background Removal Services',
            'hero_img' => 'https://images.unsplash.com/photo-1584771145729-0bd5095b9d41?w=1600&q=80',
            'desc' => 'Remove distracting backgrounds and replace them with pure white, transparent, or custom colors to make your products pop.',
            'icon' => 'ri-eraser-line',
            'features' => ['White/Transparent BG', 'Bulk Image Processing', 'Natural Shadow Preservation', 'Optimized for Web'],
            'price_start' => '0.29'
        ],
        'photo-retouching' => [
            'name' => 'Photo Retouching',
            'title' => 'Premium Photo Retouching & Restoration',
            'hero_img' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=1600&q=80',
            'desc' => 'High-end portrait and product retouching. We remove blemishes, smooth skin, and enhance details while keeping it natural.',
            'icon' => 'ri-magic-line',
            'features' => ['High-End Skin Retouching', 'Product Polishing', 'Dust & Scratch Removal', 'Detail Enhancement'],
            'price_start' => '0.99'
        ],
        'ghost-mannequin' => [
            'name' => 'Ghost Mannequin',
            'title' => 'Invisible Mannequin & Neck Joint Effect',
            'hero_img' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=1600&q=80',
            'desc' => 'Create a 3D, hollow-man effect for your apparel photography. Perfect for clothing brands and online catalogs.',
            'icon' => 'ri-shirt-line',
            'features' => ['Neck Joint Service', '3D Ghost Effect', 'Wrinkle Removal', 'Symmetry Adjustment'],
            'price_start' => '0.75'
        ],
        'color-correction' => [
            'name' => 'Color Correction',
            'title' => 'Accurate Color Correction & Grading',
            'hero_img' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=1600&q=80',
            'desc' => 'Adjust exposure, white balance, and saturation to ensure your images look vibrant and consistent across your entire brand.',
            'icon' => 'ri-palette-line',
            'features' => ['White Balance Fix', 'Exposure Correction', 'Color Matching', 'Creative Grading'],
            'price_start' => '0.45'
        ],
        'shadow-services' => [
            'name' => 'Shadow Services',
            'title' => 'Natural & Drop Shadow Creation',
            'hero_img' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=1600&q=80',
            'desc' => 'Add depth and realism to your product images with natural, drop, or reflection shadows that make products look grounded.',
            'icon' => 'ri-contrast-2-line',
            'features' => ['Natural Shadows', 'Drop Shadows', 'Mirror Reflections', 'Grounding Effects'],
            'price_start' => '0.35'
        ],
        'image-masking' => [
            'name' => 'Image Masking',
            'title' => 'Complex Image Masking for Hair & Fur',
            'hero_img' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=1600&q=80',
            'desc' => 'Advanced masking techniques for images with fine details like hair, fur, or transparent objects where clipping paths fail.',
            'icon' => 'ri-crop-line',
            'features' => ['Alpha Channel Masking', 'Hair & Fur Masking', 'Object Isolation', 'Soft Edge Preservation'],
            'price_start' => '0.65'
        ],
        'real-estate-editing' => [
            'name' => 'Real Estate Editing',
            'title' => 'High-Quality Real Estate Photo Editing',
            'hero_img' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1600&q=80',
            'desc' => 'Stunning real estate photography enhancement. Sky replacement, HDR blending, and virtual staging to help sell properties faster.',
            'icon' => 'ri-home-4-line',
            'features' => ['Sky Replacement', 'HDR Blending', 'Vertical Straightening', 'Window Color Masking'],
            'price_start' => '1.20'
        ],
        'jewellery-editing' => [
            'name' => 'Jewellery Editing',
            'title' => 'Exclusive Jewellery Photo Retouching',
            'hero_img' => 'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?w=1600&q=80',
            'desc' => 'Diamond polishing, metal smoothing, and dust removal for premium jewellery brands. We make every piece sparkle.',
            'icon' => 'ri-gem-line',
            'features' => ['Diamond Polishing', 'Metal Shine Enhancement', 'Dust & Scratch Removal', 'Stone Color Correction'],
            'price_start' => '1.50'
        ],
        'video-editing' => [
            'name' => 'Video Editing',
            'title' => 'Professional Video Editing & Grading',
            'hero_img' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=1600&q=80',
            'desc' => 'Dynamic video editing for social media, commercials, and brand stories. Color grading, sound design, and motion graphics.',
            'icon' => 'ri-video-line',
            'features' => ['Color Grading', 'Sound Design', 'Motion Graphics', 'Cinematic Cuts'],
            'price_start' => '15.00'
        ],
    ];

    $service = $services_data[$slug] ?? $services_data['clipping-path'];
@endphp

@section('title', $service['name'] . ' | Graphics Studio')

@section('content')
<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-yellow-400 selection:text-slate-900">

    {{-- ── HERO SECTION ────────────────────────────────── --}}
    <div class="relative pt-32 pb-24 overflow-hidden bg-[#001c3d]">
        {{-- Background Effects --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c3d] via-[#002855] to-[#001c3d]"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                
                {{-- Left: Text Content --}}
                <div class="lg:w-1/2 text-center lg:text-left flex flex-col items-center lg:items-start">
                    <h1 class="text-4xl md:text-[56px] font-black text-white leading-none uppercase mb-6 tracking-tight reveal">
                        {{ $service['name'] }}<br>
                        <span class="text-white">Services</span>
                    </h1>
                    
                    <p class="text-white/90 text-lg md:text-xl font-medium leading-relaxed mb-10 max-w-xl reveal">
                        Bring your images to life with expert {{ strtolower($service['name']) }} and let every detail tell its story.
                    </p>
                    
                    <div class="flex flex-col items-center lg:items-start gap-8 reveal">
                        <a href="{{ route('graphics.get-quote') }}" class="px-10 py-4 rounded-full bg-gradient-to-r from-[#0082c3] to-[#00d084] text-white font-bold text-sm uppercase tracking-widest transition-all hover:scale-105 hover:shadow-[0_10px_30px_rgba(0,208,132,0.3)] active:scale-95">
                            Get A Quote
                        </a>
                        
                        {{-- Pagination Dots from Image --}}
                        <div class="flex gap-2">
                            <span class="w-2.5 h-2.5 bg-white rounded-sm"></span>
                            <span class="w-2.5 h-2.5 bg-white rounded-sm opacity-50"></span>
                            <span class="w-2.5 h-2.5 bg-white rounded-sm opacity-50"></span>
                            <span class="w-2.5 h-2.5 bg-white rounded-sm opacity-50"></span>
                        </div>
                    </div>
                </div>

                {{-- Right: Hero Visual (Video/Image Type) --}}
                <div class="lg:w-1/2 relative reveal">
                    <div class="relative bg-[#333333] p-0.5 rounded-lg shadow-2xl overflow-hidden group">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="{{ $service['hero_img'] }}" alt="{{ $service['name'] }}" class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105">
                            
                            {{-- Image Retouching overlay (Circles like in the image) --}}
                            @if($slug === 'photo-retouching')
                            <div class="absolute inset-0">
                                <div class="absolute top-1/4 left-1/3 w-16 h-16 border-2 border-orange-400/60 rounded-full"></div>
                                <div class="absolute top-1/2 right-1/4 w-12 h-12 border-2 border-orange-400/60 rounded-full"></div>
                                <div class="absolute bottom-1/4 left-1/2 w-20 h-20 border-2 border-orange-400/60 rounded-full"></div>
                            </div>
                            @endif

                            {{-- Play Button Overlay --}}
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/10 transition-colors">
                                <div class="w-20 h-20 rounded-full border-4 border-white/80 flex items-center justify-center bg-white/10 backdrop-blur-sm group-hover:scale-110 transition-transform cursor-pointer">
                                    <i class="ri-play-fill text-white text-4xl ml-1"></i>
                                </div>
                            </div>

                            {{-- Footer Label inside image --}}
                            <div class="absolute bottom-6 right-6 text-right">
                                <div class="text-[10px] text-white font-bold uppercase tracking-widest opacity-80">Image</div>
                                <div class="text-lg font-black text-white leading-none uppercase tracking-tighter">
                                    {{ $service['name'] }}
                                </div>
                                <div class="text-[9px] text-[#00d084] font-serif italic italic mt-0.5 tracking-widest">Service</div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Graphic Glow --}}
                    <div class="absolute -inset-10 bg-blue-500/10 blur-[100px] -z-10"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── FEATURES GRID ──────────────────────────────── --}}
    <div class="py-20 bg-white/[0.02]">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($service['features'] as $feature)
                <div class="p-8 rounded-[32px] bg-white/5 border border-white/10 hover:border-yellow-400/30 transition-all group reveal">
                    <div class="w-12 h-12 rounded-2xl bg-yellow-400/10 flex items-center justify-center mb-6 group-hover:bg-yellow-400/20 transition-colors">
                        <i class="ri-checkbox-circle-line text-2xl text-yellow-400"></i>
                    </div>
                    <h3 class="text-lg font-black text-white mb-2">{{ $feature }}</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Tailored solutions handled by our expert team of professional retouchers.</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── BEFORE/AFTER SHOWCASE ───────────────────────── --}}
    <div class="py-32">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-20 reveal">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6">See the <span class="text-yellow-400">Difference</span></h2>
                <p class="text-slate-400 text-lg">Compare our professional editing with original shots. Hover over the sliders to see our precision.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-6xl mx-auto">
                {{-- Comparison Item 1 --}}
                <div class="space-y-6 reveal">
                    <div class="relative rounded-[40px] overflow-hidden border border-white/10 shadow-2xl aspect-video group" 
                         x-data="{ position: 50 }" @mousemove="position = ($event.offsetX / $event.target.closest('.group').clientWidth) * 100">
                        {{-- Before Image --}}
                        <div class="absolute inset-0">
                            <img src="{{ $service['hero_img'] }}" class="w-full h-full object-cover grayscale" alt="Original">
                            <div class="absolute top-6 left-6 px-4 py-1.5 rounded-full bg-black/60 backdrop-blur-md text-[10px] font-black text-white uppercase tracking-widest border border-white/10">Original</div>
                        </div>
                        {{-- After Image --}}
                        <div class="absolute inset-0 overflow-hidden" :style="'width: ' + position + '%'">
                            <img src="{{ $service['hero_img'] }}" class="w-[100vw] h-full object-cover" style="max-width: none" alt="Edited">
                            <div class="absolute top-6 left-6 px-4 py-1.5 rounded-full bg-yellow-400 backdrop-blur-md text-[10px] font-black text-slate-900 uppercase tracking-widest">PixelForge Edited</div>
                        </div>
                        {{-- Slider Handle --}}
                        <div class="absolute top-0 bottom-0 w-1 bg-yellow-400 cursor-ew-resize transition-all" :style="'left: ' + position + '%'">
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center shadow-2xl">
                                <i class="ri-arrow-left-right-line text-slate-900 text-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-lg font-black text-white mb-1">Standard Output</h4>
                        <p class="text-sm text-slate-500">Perfect for high-traffic e-commerce platforms.</p>
                    </div>
                </div>

                {{-- Comparison Item 2 --}}
                <div class="space-y-6 reveal" style="animation-delay: 0.1s">
                    <div class="relative rounded-[40px] overflow-hidden border border-white/10 shadow-2xl aspect-video group" 
                         x-data="{ position: 50 }" @mousemove="position = ($event.offsetX / $event.target.closest('.group').clientWidth) * 100">
                        {{-- Before Image --}}
                        <div class="absolute inset-0">
                            <img src="{{ $service['hero_img'] }}" class="w-full h-full object-cover grayscale brightness-50" alt="Original">
                            <div class="absolute top-6 left-6 px-4 py-1.5 rounded-full bg-black/60 backdrop-blur-md text-[10px] font-black text-white uppercase tracking-widest border border-white/10">Original</div>
                        </div>
                        {{-- After Image --}}
                        <div class="absolute inset-0 overflow-hidden" :style="'width: ' + position + '%'">
                            <img src="{{ $service['hero_img'] }}" class="w-[100vw] h-full object-cover" style="max-width: none" alt="Edited">
                            <div class="absolute top-6 left-6 px-4 py-1.5 rounded-full bg-yellow-400 backdrop-blur-md text-[10px] font-black text-slate-900 uppercase tracking-widest">PixelForge Edited</div>
                        </div>
                        {{-- Slider Handle --}}
                        <div class="absolute top-0 bottom-0 w-1 bg-yellow-400 cursor-ew-resize transition-all" :style="'left: ' + position + '%'">
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center shadow-2xl">
                                <i class="ri-arrow-left-right-line text-slate-900 text-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-lg font-black text-white mb-1">Premium High-End</h4>
                        <p class="text-sm text-slate-500">Ideal for magazines and large scale billboards.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── CTA SECTION ────────────────────────────────── --}}
    <div class="py-32 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="max-w-4xl mx-auto p-16 rounded-[48px] bg-gradient-to-br from-white/5 to-transparent border border-white/10 relative overflow-hidden reveal">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-yellow-400/10 rounded-full blur-[100px]"></div>
                <h2 class="text-3xl md:text-5xl font-black text-white mb-8 leading-tight">
                    Ready to Transform<br>Your <span class="text-yellow-400">Project?</span>
                </h2>
                <p class="text-slate-400 text-lg mb-12 max-w-xl mx-auto">
                    Get in touch today for a free estimate or send us 3 test images to experience our world-class quality at zero cost.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <a href="{{ route('graphics.get-quote') }}" class="group relative px-12 py-5 rounded-2xl bg-yellow-400 text-slate-900 font-black text-sm uppercase tracking-[0.2em] transition-all hover:scale-105 shadow-2xl shadow-yellow-400/20">
                        Start Your Project
                    </a>
                    <a href="{{ route('graphics.portfolio') }}" class="px-12 py-5 rounded-2xl border border-white/10 hover:border-white/30 text-white font-black text-sm uppercase tracking-[0.2em] transition-all">
                        View Portfolio
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        animation: reveal 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    }
    @keyframes reveal {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
