@extends('layouts.app')
@section('title', 'Pricing Plan | Graphics Studio')
@section('meta_description', 'Professional Photo Editing, Retouching Services Price/Rates — Start from 25c/image at PixelForge Graphics Studio.')

@section('content')

@php
$services = [
    [
        'name'   => 'Clipping Path Services',
        'tag'    => 'Most Popular',
        'img_before' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Simple Clipping','$0.49'],['Compound Path','$0.79'],['Complex Path','$1.59'],['Super Complex','$3.99'], ['Delivery','24h'],['Volume','Up to 50']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Simple Clipping','$0.39'],['Compound Path','$0.69'],['Complex Path','$1.29'],['Super Complex','$2.99'], ['Delivery','48h'],['Volume','Up to 200']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Simple Clipping','$0.25'],['Compound Path','$0.49'],['Complex Path','$0.99'],['Super Complex','$1.99'], ['Delivery','72h'],['Volume','Unlimited']] ],
        ]
    ],
    [
        'name'   => 'Image Masking Services',
        'tag'    => null,
        'img_before' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Layer Masking','$0.89'],['Hair Masking','$2.49'],['Complex Masking','$3.99'],['Transparency','$1.99'],  ['Delivery','24h'],['Volume','Up to 50']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Layer Masking','$0.69'],['Hair Masking','$1.99'],['Complex Masking','$2.99'],['Transparency','$1.49'],  ['Delivery','48h'],['Volume','Up to 200']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Layer Masking','$0.49'],['Hair Masking','$1.49'],['Complex Masking','$1.99'],['Transparency','$0.99'],  ['Delivery','72h'],['Volume','Unlimited']] ],
        ]
    ],
    [
        'name'   => 'Photo Retouching Services',
        'tag'    => null,
        'img_before' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Basic Retouch','$1.99'],['Skin Smooth','$2.99'],  ['Portrait Edit','$4.99'],['Full Body','$6.99'],      ['Delivery','24h'],['Volume','Up to 50']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Basic Retouch','$1.49'],['Skin Smooth','$2.49'],  ['Portrait Edit','$3.99'],['Full Body','$5.49'],      ['Delivery','48h'],['Volume','Up to 200']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Basic Retouch','$0.99'],['Skin Smooth','$1.99'],  ['Portrait Edit','$2.99'],['Full Body','$3.99'],      ['Delivery','72h'],['Volume','Unlimited']] ],
        ]
    ],
    [
        'name'   => 'Ghost Mannequin Effect',
        'tag'    => null,
        'img_before' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Neck Joint','$1.49'],   ['Full Body','$2.49'],   ['3D Effect','$3.49'],    ['Sleeve Joint','$2.99'],   ['Delivery','24h'],['Volume','Up to 50']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Neck Joint','$0.99'],   ['Full Body','$1.99'],   ['3D Effect','$2.49'],    ['Sleeve Joint','$1.99'],   ['Delivery','48h'],['Volume','Up to 200']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Neck Joint','$0.75'],   ['Full Body','$1.49'],   ['3D Effect','$1.99'],    ['Sleeve Joint','$1.49'],   ['Delivery','72h'],['Volume','Unlimited']] ],
        ]
    ],
    [
        'name'   => 'Color Correction Services',
        'tag'    => null,
        'img_before' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Basic CC','$0.49'],     ['Advanced CC','$0.99'], ['White Balance','$0.79'],['Skin Tone','$1.49'],       ['Delivery','24h'],['Volume','Up to 50']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Basic CC','$0.39'],     ['Advanced CC','$0.79'], ['White Balance','$0.59'],['Skin Tone','$1.19'],       ['Delivery','48h'],['Volume','Up to 200']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Basic CC','$0.25'],     ['Advanced CC','$0.49'], ['White Balance','$0.39'],['Skin Tone','$0.79'],       ['Delivery','72h'],['Volume','Unlimited']] ],
        ]
    ],
    [
        'name'   => 'Jewellery Photo Services',
        'tag'    => null,
        'img_before' => 'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Basic Edit','$1.99'],   ['Reflection','$2.49'],  ['Dust Remove','$1.49'],  ['Color Fix','$2.99'],      ['Delivery','24h'],['Volume','Up to 50']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Basic Edit','$1.49'],   ['Reflection','$1.99'],  ['Dust Remove','$1.19'],  ['Color Fix','$2.49'],      ['Delivery','48h'],['Volume','Up to 200']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Basic Edit','$0.99'],   ['Reflection','$1.49'],  ['Dust Remove','$0.79'],  ['Color Fix','$1.79'],      ['Delivery','72h'],['Volume','Unlimited']] ],
        ]
    ],
    [
        'name'   => 'Real Estate Photo Services',
        'tag'    => null,
        'img_before' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Basic Edit','$0.99'],   ['Sky Replace','$1.99'], ['Virtual Staging','$9.99'],['HDR Merge','$1.49'],     ['Delivery','24h'],['Volume','Up to 50']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Basic Edit','$0.79'],   ['Sky Replace','$1.49'], ['Virtual Staging','$7.99'],['HDR Merge','$1.19'],     ['Delivery','48h'],['Volume','Up to 200']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Basic Edit','$0.49'],   ['Sky Replace','$0.99'], ['Virtual Staging','$5.99'],['HDR Merge','$0.89'],     ['Delivery','72h'],['Volume','Unlimited']] ],
        ]
    ],
    [
        'name'   => 'Video Editing Service',
        'tag'    => null,
        'img_before' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=500&q=80',
        'img_after'  => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=500&q=80',
        'plans' => [
            ['label'=>'Basic',    'color'=>'sky',     'prices'=>[['Up to 5 min','$14.99'], ['Color Grade','$9.99'], ['Audio Mix','$7.99'],    ['Thumbnails','$4.99'],     ['Delivery','48h'],['Volume','1 Project']] ],
            ['label'=>'Standard', 'color'=>'indigo',  'prices'=>[['Up to 15 min','$24.99'],['Color Grade','$14.99'],['Audio Mix','$12.99'],   ['Thumbnails','$2.99'],     ['Delivery','72h'],['Volume','3 Projects']] ],
            ['label'=>'Business', 'color'=>'dark',    'prices'=>[['Up to 30 min','$39.99'],['Color Grade','$19.99'],['Audio Mix','$17.99'],   ['Thumbnails','$1.99'],     ['Delivery','96h'],['Volume','Unlimited']] ],
        ]
    ],
];
@endphp

<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-[#6366f1] selection:text-white">

    {{-- ── PAGE HERO ─────────────────────────────────── --}}
    <div class="pt-32 md:pt-40 lg:pt-44 pb-20 relative overflow-hidden">
        {{-- Background glow --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[500px] bg-gradient-to-b from-[#6366f1]/20 to-transparent rounded-full blur-[120px] pointer-events-none"></div>
        
        <div class="container mx-auto px-6 max-w-6xl text-center relative z-10">
            <span class="inline-block px-5 py-2 rounded-full bg-[#6366f1]/10 text-[#818cf8] text-[11px] font-bold tracking-[0.25em] uppercase border border-[#6366f1]/20 mb-6">
                Transparent Pricing
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight text-white mb-6">
                Pricing <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#6366f1] to-[#22d3ee]">Plan</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Professional Photo Editing &amp; Retouching Rates.<br>
                Start from <span class="text-[#22d3ee] font-bold">25¢/image</span> — No hidden fees.
            </p>

            {{-- Quick stats --}}
            <div class="flex flex-wrap justify-center gap-6 mt-12">
                @foreach([['24h','Fast Turnaround'],['99%','Satisfaction Rate'],['14+','Service Types'],['50K+','Images Edited']] as [$val,$lbl])
                <div class="px-6 py-4 rounded-2xl bg-white/[0.04] border border-white/[0.07] text-center min-w-[110px]">
                    <div class="text-2xl font-black text-white">{{ $val }}</div>
                    <div class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mt-0.5">{{ $lbl }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── PRICING TABLE ROWS ───────────────────────── --}}
    <div class="container mx-auto px-4 sm:px-6 max-w-7xl pb-28 space-y-6">

        @php
        $planColors = [
            'sky'   => ['header'=>'bg-sky-500',    'btn'=>'border-sky-500 text-sky-400 hover:bg-sky-500',   'badge'=>'bg-sky-500/10 text-sky-400 border-sky-500/20'],
            'indigo'=> ['header'=>'bg-indigo-600', 'btn'=>'border-indigo-500 text-indigo-400 hover:bg-indigo-500', 'badge'=>'bg-indigo-500/10 text-indigo-400 border-indigo-500/20'],
            'dark'  => ['header'=>'bg-slate-700',  'btn'=>'border-slate-500 text-slate-300 hover:bg-slate-600',   'badge'=>'bg-slate-600/20 text-slate-300 border-slate-600/30'],
        ];
        @endphp

        @foreach($services as $s => $service)
        <div class="rounded-2xl overflow-hidden border border-white/[0.07] bg-white/[0.03] backdrop-blur-sm reveal" style="animation-delay: {{ $s * 0.04 }}s">

            {{-- Row Title Bar --}}
            <div class="px-6 py-4 border-b border-white/[0.07] flex items-center justify-between flex-wrap gap-2 bg-white/[0.02]">
                <div class="flex items-center gap-3">
                    <h3 class="font-black text-[15px] text-white tracking-tight">{{ $service['name'] }}</h3>
                    @if($service['tag'])
                        <span class="px-3 py-0.5 text-[9px] font-black uppercase tracking-widest bg-yellow-400/10 text-yellow-400 border border-yellow-400/20 rounded-full">{{ $service['tag'] }}</span>
                    @endif
                </div>
                <a href="#" class="text-[11px] text-[#22d3ee] hover:text-white font-bold uppercase tracking-widest flex items-center gap-1 transition-colors">
                    Get a Quote <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <div class="grid md:grid-cols-[180px_1fr_1fr_1fr]">

                {{-- Before/After Slider --}}
                <div class="relative min-h-[220px] overflow-hidden cursor-ew-resize"
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
                    <img src="{{ $service['img_after'] }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 z-10 overflow-hidden ps-clip"
                         :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $service['img_before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.55]">
                    </div>
                    {{-- Labels --}}
                    <div class="absolute bottom-2 left-2 z-20 text-[8px] font-black uppercase tracking-widest text-white bg-black/60 px-2 py-0.5 rounded-md backdrop-blur-sm">BEFORE</div>
                    <div class="absolute bottom-2 right-2 z-20 text-[8px] font-black uppercase tracking-widest text-white bg-[#6366f1]/80 px-2 py-0.5 rounded-md backdrop-blur-sm">AFTER</div>
                    {{-- Handle --}}
                    <div class="absolute inset-y-0 z-20 w-[2px] bg-white/60 pointer-events-none ps-clip"
                         :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-7 h-7 bg-slate-950 rounded-full shadow-lg flex items-center justify-center border border-white/20">
                            <i class="ri-arrow-left-right-line text-[10px] text-[#22d3ee]"></i>
                        </div>
                    </div>
                </div>

                {{-- Three Plan Columns --}}
                @foreach($service['plans'] as $plan)
                @php $c = $planColors[$plan['color']]; @endphp
                <div class="flex flex-col border-l border-white/[0.05]">
                    {{-- Plan Header --}}
                    <div class="{{ $c['header'] }} px-5 py-3 flex items-center justify-between">
                        <span class="text-white font-black text-[11px] uppercase tracking-[0.2em]">{{ $plan['label'] }}</span>
                        <a href="#" class="text-[9px] font-bold text-white/80 hover:text-white border border-white/20 hover:border-white/60 px-3 py-1 rounded-lg transition-all">Order</a>
                    </div>

                    {{-- Pricing Rows --}}
                    <div class="p-5 flex-1 space-y-0">
                        @foreach($plan['prices'] as $idx => [$feature, $price])
                        <div class="flex justify-between items-center py-2 {{ !$loop->last ? 'border-b border-white/[0.05]' : '' }}">
                            <span class="text-[11px] text-slate-400 font-medium">{{ $feature }}</span>
                            <span class="text-[12px] font-black text-white tabular-nums">{{ $price }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Trial Button --}}
                    <div class="px-5 pb-5 pt-2">
                        <a href="#" class="block text-center border {{ $c['btn'] }} hover:text-white py-2 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                            Free Trial
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endforeach

        {{-- ── CTA Strip ────────────────────────────── --}}
        <div class="mt-10 p-10 md:p-16 rounded-3xl border border-[#6366f1]/20 bg-gradient-to-br from-[#6366f1]/10 to-[#22d3ee]/5 flex flex-col md:flex-row items-center justify-between gap-8 reveal">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Need a Custom Quote?</h2>
                <p class="text-slate-400 max-w-lg">Have a large volume project or special requirements? Contact us and we'll tailor a plan that fits your exact needs.</p>
            </div>
            <a href="#" class="shrink-0 inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-[#6366f1] hover:bg-[#4f46e5] text-white font-bold text-sm transition-all shadow-lg shadow-[#6366f1]/30 hover:-translate-y-0.5 hover:shadow-xl">
                Contact Us
                <i class="ri-arrow-right-line"></i>
            </a>
        </div>

    </div>
</div>

@endsection

@push('styles')
<style>
    [x-data] img { pointer-events: none; user-select: none; }
    .ps-clip { transition: clip-path 0.08s ease, left 0.08s ease; }
</style>
@endpush
