@extends('layouts.app')
@section('title', 'Pricing Plan | Graphics Studio')
@section('meta_description', 'Professional Photo Editing, Retouching Services Price/Rates — Start from 25c/image at PixelForge Graphics Studio.')

@section('content')

@php
$services = [
    [
        'name'       => 'Clipping Path Services',
        'img_before' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
        'price'      => '0.49',
        'deliver'    => '5000',
        'discount'   => '40',
        'features'   => [
            ['Basic Clipping Path', '$0.49'],
            ['Clipping Path With Shadows', '$0.99'],
            ['Simple Clipping Path', '$0.99'],
            ['Medium Clipping Path', '$1.99'],
            ['Complex Clipping Path', '$3.99'],
            ['Super Complex Clipping Path', '$7.99'],
            ['Clipping Path Flatness', '$0.49'],
            ['Extra Super Complex Clipping Path', '$14.99'],
            ['Remove Unwanted Objects', '$1.25'],
        ]
    ],
    [
        'name'       => 'Image Retouching Services',
        'img_before' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
        'price'      => '1.49',
        'deliver'    => '2500',
        'discount'   => '40',
        'features'   => [
            ['Headshots & Face Retouching', '$4.49'],
            ['Beauty & Glamor Retouching', '$8.99'],
            ['Body Retouching & Reshaping', '$8.99'],
            ['Modeling Portrait Retouching', '$6.49'],
            ['Digital Airbrushing', '$7.49'],
            ['Portrait Cleaning & Enhancement', '$8.49'],
        ]
    ],
    [
        'name'       => 'Product Photo Editing Services',
        'img_before' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&q=80',
        'price'      => '0.49',
        'deliver'    => '5000',
        'discount'   => '40',
        'features'   => [
            ['Clipping Path', '$0.49'],
            ['Bulk Photo Editing (Cropping & Resizing)', '$0.25'],
            ['Product Photo Background Remove', '$0.49'],
            ['Color Correction & Editing', '$0.99'],
            ['Photoshop Shadow Effect', '$0.49'],
            ['Ghost Mannequin Effect', '$1.99'],
            ['Product Photo Cleaning', '$0.49'],
            ['Product Photo Retouching & Enhancement', '$1.49'],
            ['Amazon Requirements Fulfilment Photo Editing', '$0.49'],
            ['3D/360° Packshot Retouching(5 images)', '$0.99'],
        ]
    ],
    [
        'name'       => 'Ghost Mannequin Effects',
        'img_before' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
        'price'      => '1.99',
        'deliver'    => '2000',
        'discount'   => '40',
        'features'   => [
            ['Neck Joint On Ghost Mannequin', '$1.99'],
            ['Bottom Joint On Ghost Mannequin', '$2.49'],
            ['Sleeves Joint On Ghost Mannequin', '$2.49'],
            ['3D/360° Packshot Ghost Mannequin Effects', '$2.99'],
        ]
    ],
    [
        'name'       => 'Image Masking Services',
        'img_before' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=600&q=80',
        'price'      => '1.49',
        'deliver'    => '2000',
        'discount'   => '40',
        'features'   => [
            ['Layer Masking', '$1.49'],
            ['Alpha Channel Masking', '$1.99'],
            ['Fur & Hair Masking', '$2.99'],
            ['Refine Edge Masking', '$2.99'],
            ['Transparent Image Masking', '$2.49'],
            ['Translucent Image Masking', '$2.99'],
            ['Object Image Masking', '$2.49'],
            ['Color Masking', '$2.49'],
        ]
    ],
    [
        'name'       => 'Vector Conversion Services',
        'img_before' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=600&q=80',
        'price'      => '4.49',
        'deliver'    => '500',
        'discount'   => '40',
        'features'   => [
            ['Raster to Vector Conversion', '$4.99'],
            ['Vector Line Drawing and Artwork (Sketching)', '$4.49'],
            ['Vector Logo Design', '$50.00'],
            ['Vector Character Drawing for Animation', '$20.99'],
            ['2D CAD Design', '$9.99'],
            ['3D Vector Conversion (line drawing to 3D effects)', '$19.99'],
            ['Product to Vector', '$14.99'],
            ['3D Product Modeling', '$30.00'],
        ]
    ],
    [
        'name'       => 'Photoshop Shadow Services',
        'img_before' => 'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?w=600&q=80',
        'price'      => '0.25',
        'deliver'    => '4000',
        'discount'   => '40',
        'features'   => [
            ['Drop Shadow Creation', '$0.25'],
            ['Reflection Shadow Creation', '$0.99'],
            ['Realistic Shadow Creation', '$1.49'],
            ['Retain Original Shadow', '$0.49'],
            ['Shadow Removal Service', '$0.99'],
            ['Highlight & Shadow on Portrait', '$4.49'],
        ]
    ],
    [
        'name'       => 'Color Correction Services',
        'img_before' => 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=600&q=80',
        'price'      => '0.99',
        'deliver'    => '5000',
        'discount'   => '40',
        'features'   => [
            ['Color Correction', '$1.45'],
            ['Exposure Correction', '$1.45'],
            ['Color Conversion/Editing', '$6.99'],
            ['Color Restoration For Damaged Photos', '$19.99'],
            ['Product Photography Color Editing', '$4.49'],
            ['Multi Path & Color Editing', '$1.49'],
            ['Color Restoration', '$2.25'],
            ['Black & White Photo Colorize', '$9.99'],
            ['HDR Blending & Exposure Correction', '$4.49'],
            ['Fashion Photography Color Editing', '$2.25'],
            ['Product Photography Color Editing', '$0.99'],
            ['Wedding Photography Color Editing', '$4.49'],
            ['Real Estate Photography Photo Editing', '$4.49'],
            ['Photoshop Lightroom Photo Editing', '$4.49'],
        ]
    ],
    [
        'name'       => 'High End Retouching',
        'img_before' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80',
        'price'      => '4.49',
        'deliver'    => '1000',
        'discount'   => '40',
        'features'   => [
            ['High End Retouching', '$4.49'],
            ['High End Photo Restoration', '$11.99'],
            ['High End Beauty Retouching', '$11.99'],
            ['Digital Airbrushing (Wacom)', '$4.49'],
            ['Pen Tablet Retouching', '$14.99'],
            ['High Dynamic Range (HDR) Blending & Retouching', '$11.99'],
            ['Focus Stacking, Z-stacking, Focus Blending', '$11.99'],
            ['Color Masking', '$9.99'],
        ]
    ],
    [
        'name'       => 'Image Restoration Services',
        'img_before' => 'https://images.unsplash.com/photo-1587595350732-bc5584eb63cf?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1587595350732-bc5584eb63cf?w=600&q=80',
        'price'      => '4.49',
        'deliver'    => '500',
        'discount'   => '40',
        'features'   => [
            ['Color Cast Restoration', '$4.49'],
            ['Black & White Photo Restoration', '$19.99'],
            ['Vintage Photo Restoration', '$19.99'],
            ['Damaged Photo Restoration', '$19.99'],
            ['Faded & Blur Photo Restoration', '$19.99'],
            ['Black & White Photo Colorize', '$19.99'],
            ['Image Color Restore', '$24.99'],
        ]
    ],
    [
        'name'       => 'Video Editing Services',
        'img_before' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80',
        'price'      => '100',
        'deliver'    => '10',
        'discount'   => '40',
        'features'   => [
            ['Basic Video Editing', '$100.00'],
            ['Advance Video Editing', '$300.00'],
            ['Complex Video Editing', '$500.00'],
            ['Extreme Video Editing', '$2000.00'],
        ]
    ],
    [
        'name'       => '3D Modeling Services',
        'img_before' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=600&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=600&q=80',
        'price'      => '30',
        'deliver'    => '50',
        'discount'   => '40',
        'features'   => [
            ['3D Product Modeling', '$30.00'],
            ['Architectural 3D Modeling', '$150.00'],
            ['Industrial 3D Modeling', '$250.00'],
            ['Advance Level 3D Modeling', '$250.00'],
        ]
    ]
];
@endphp

{{-- ── PREMIUM PAGE HEADER ──────────────────────────── --}}
<div class="relative pt-36 pb-24 md:pt-44 md:pb-32 overflow-hidden">
    {{-- Dark Corporate Gradient Background --}}
    <div class="absolute inset-0 bg-gradient-to-br from-[#0e1726] via-[#112a46] to-[#0a4a82]"></div>
    {{-- Subtle overlay image for texture --}}
    <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center mix-blend-overlay"></div>
    {{-- Dot Grid overlay --}}
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-widest mb-4 drop-shadow-lg">Pricing Plans & Rates</h1>
        <p class="text-white/80 text-lg md:text-xl font-light mb-8 max-w-3xl mx-auto whitespace-normal">
            Professional Photo Editing & Retouching Services — Start from <span class="text-yellow-400 font-bold whitespace-nowrap">25¢/image</span>
        </p>
        <div class="flex justify-center gap-1.5">
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
        </div>
    </div>
</div>

<div class="bg-slate-50 min-h-screen text-[#333] font-sans pb-24 relative">

    {{-- ── PRICING TABLE ROWS ───────────────────────── --}}
    <div class="container mx-auto pt-4 px-4 max-w-[1200px] space-y-8 relative z-20 -mt-16">

        @foreach($services as $s => $service)
        <div class="bg-white border border-[#e5e5e5] rounded-sm overflow-hidden shadow-sm">

            {{-- Row Title Bar --}}
            <div class="bg-[#f5f5f5] px-5 py-3 border-b border-[#e5e5e5]">
                <h3 class="font-bold text-[14px] text-[#333] tracking-wide">{{ $service['name'] }}</h3>
            </div>

            <div class="flex flex-col md:flex-row">

                {{-- Before/After Slider (Large Image) --}}
                <div class="relative w-full md:w-[400px] shrink-0 h-[280px] bg-[#f9f9f9] border-r border-[#e5e5e5] overflow-hidden"
                    x-data="{ position: 50, isDragging: false,
                        update(e) {
                            if (!this.isDragging && e.type !== 'click') return;
                            const r = $el.getBoundingClientRect();
                            const x = (e.clientX || (e.touches ? e.touches[0].clientX : 0)) - r.left;
                            this.position = Math.max(0, Math.min(100, (x / r.width) * 100));
                        }
                    }"
                    @mousedown="isDragging = true; update($event)"
                    @touchstart.passive="isDragging = true"
                    @mouseup="isDragging = false"
                    @touchend="isDragging = false"
                    @mousemove="update($event)"
                    @touchmove.passive="update($event)"
                    @click="update($event)"
                    @mouseleave="isDragging = false"
                >
                    {{-- After Image --}}
                    <img src="{{ $service['img_after'] }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                    
                    {{-- Before Image --}}
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $service['img_before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-90">
                    </div>
                    
                    {{-- Handle --}}
                    <div class="absolute inset-y-0 z-20 w-[2px] bg-white pointer-events-none slider-smooth shadow-sm" :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full shadow-lg flex items-center justify-center border border-slate-200">
                            <i class="ri-arrow-left-right-line text-[12px] text-slate-600"></i>
                        </div>
                    </div>

                    {{-- Labels (Like the screenshot) --}}
                    <div class="absolute bottom-3 left-3 z-30 pointer-events-none">
                        <span class="bg-[#555] text-white text-[10px] font-bold px-3 py-1 rounded-sm shadow-sm inline-block uppercase">BEFORE</span>
                    </div>
                    <div class="absolute bottom-3 right-3 z-30 pointer-events-none">
                        <span class="bg-[#555] text-white text-[10px] font-bold px-3 py-1 rounded-sm shadow-sm inline-block uppercase">AFTER</span>
                    </div>
                </div>

                {{-- Content Container --}}
                <div class="flex-1 p-6 flex flex-col justify-between">
                    
                    {{-- Top 3 Column Stats --}}
                    <div class="grid grid-cols-3 gap-4 pb-6 border-b border-[#eee]">
                        <div class="text-center">
                            <div class="text-[12px] text-[#666] mb-1 italic">Price starts from</div>
                            <div class="text-2xl font-black text-[#5cb85c] leading-none mb-1 tabular-nums">{{ $service['price'] }}$</div>
                            <div class="text-[11px] text-[#666] italic">
                                {{ Str::contains($service['name'], 'Video') ? 'per video' : (Str::contains($service['name'], '3D Modeling') ? 'per 3D image' : 'per image') }}
                            </div>
                        </div>
                        <div class="text-center border-l border-[#eee]">
                            <div class="text-[12px] text-[#666] mb-1 italic">We can deliver</div>
                            <div class="text-2xl font-black text-[#5cb85c] leading-none mb-1 tabular-nums">{{ $service['deliver'] }}</div>
                            <div class="text-[11px] text-[#666] italic">
                                {{ Str::contains($service['name'], 'Video') ? 'projects/day' : 'Images/day' }}
                            </div>
                        </div>
                        <div class="text-center border-l border-[#eee]">
                            <div class="text-[12px] text-[#666] mb-1 italic">Discount Upto</div>
                            <div class="text-2xl font-black text-[#5cb85c] leading-none mb-1 tabular-nums">{{ $service['discount'] }}%</div>
                            <div class="text-[11px] text-[#666] italic">on bulk order</div>
                        </div>
                    </div>

                    {{-- Features List (2 Columns) --}}
                    <div class="grid grid-cols-2 gap-x-8 gap-y-3 py-6 flex-grow">
                        @foreach($service['features'] as [$feature_name, $feature_price])
                        <div class="flex justify-between items-start text-[12px]">
                            <span class="text-[#555] flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-[#5cb85c] inline-block shrink-0"></span>
                                {{ $feature_name }}
                            </span>
                            <span class="font-bold text-[#333] tabular-nums">{{ $feature_price }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex justify-center gap-3 pt-6 border-t border-[#eee]">
                        <a href="{{ route('graphics.get-quote') }}" class="px-6 py-2 bg-[#12537e] hover:bg-[#0c3e60] text-white text-[12px] font-bold rounded-sm transition-colors shadow-sm">
                            Free Trial
                        </a>
                        <a href="{{ route('graphics.get-quote') }}" class="px-6 py-2 bg-[#51a8d0] hover:bg-[#3d8fb4] text-white text-[12px] font-bold rounded-sm transition-colors shadow-sm">
                            Get A Quote
                        </a>
                        <a href="{{ route('graphics.services') }}" class="px-6 py-2 bg-[#12537e] hover:bg-[#0c3e60] text-white text-[12px] font-bold rounded-sm transition-colors shadow-sm">
                            View Details
                        </a>
                    </div>

                </div>

            </div>
        </div>
        @endforeach

    </div>
</div>

<style>
    .slider-smooth {
        transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67), 
                    left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }
    /* Ensure the navbar respects the dark header background before scrolling */
    #main-navbar:not(.nav-scrolled) .studio-nav-link { color: white; }
    #main-navbar:not(.nav-scrolled) .logo-text-primary { color: white; }
    #main-navbar:not(.nav-scrolled) .logo-text-secondary { color: rgba(255,255,255,0.6); }
    
    /* Force main body text color just in case */
    body { color: #333; }
</style>

@endsection
