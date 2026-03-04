{{-- resources/views/graphics/partials/pricing.blade.php --}}
<section id="pricing" class="relative py-24 md:py-32 bg-gradient-to-b from-slate-950 to-slate-900">

    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0" style="background-image:linear-gradient(rgba(255,255,255,0.015) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.015) 1px,transparent 1px);background-size:48px 48px;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-900/30 border border-purple-500/25 text-xs font-semibold text-purple-300 uppercase tracking-wider mb-5">
                <i class="ri-price-tag-3-line"></i> Transparent Pricing
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                Simple, <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">Honest Pricing</span>
            </h2>
            <p class="text-slate-400 max-w-xl mx-auto text-base">No hidden fees. No surprises. Pay only for what you need — scale up or down anytime.</p>
        </div>

        {{-- Pricing Cards --}}
        @php
        $plans = [
            [
                'name'       => 'Basic',
                'icon'       => 'ri-leaf-line',
                'price'      => '$0.40',
                'unit'       => '/ image',
                'desc'       => 'Perfect for small batches and individual photographers needing fast, quality edits.',
                'from'       => 'from-slate-700',
                'to'         => 'to-slate-600',
                'btn'        => 'bg-white/10 hover:bg-white/20 text-white border border-white/20',
                'badge'      => null,
                'popular'    => false,
                'accentLine' => 'from-slate-500 to-slate-400',
                'iconBg'     => 'bg-slate-700',
                'features'   => [
                    ['Simple Clipping Path', true],
                    ['Background Removal', true],
                    ['Basic Color Correction', true],
                    ['JPEG / PNG Delivery', true],
                    ['48-Hour Turnaround', true],
                    ['Ghost Mannequin', false],
                    ['Jewelry Retouching', false],
                    ['Dedicated Account Manager', false],
                ],
                'volume'     => 'Up to 50 images/order',
            ],
            [
                'name'       => 'Standard',
                'icon'       => 'ri-star-line',
                'price'      => '$0.80',
                'unit'       => '/ image',
                'desc'       => 'Our most popular plan for e-commerce businesses and fashion brands at scale.',
                'from'       => 'from-indigo-600',
                'to'         => 'to-purple-700',
                'btn'        => 'bg-white text-indigo-700 hover:bg-indigo-50 font-extrabold',
                'badge'      => 'Most Popular',
                'popular'    => true,
                'accentLine' => 'from-indigo-400 to-purple-400',
                'iconBg'     => 'bg-white/20',
                'features'   => [
                    ['All Clipping Path Types', true],
                    ['Background Removal', true],
                    ['Advanced Color Correction', true],
                    ['Ghost Mannequin Service', true],
                    ['24-Hour Turnaround', true],
                    ['Image Retouching', true],
                    ['RAW File Processing', true],
                    ['Dedicated Account Manager', false],
                ],
                'volume'     => 'Up to 500 images/order',
            ],
            [
                'name'       => 'Premium',
                'icon'       => 'ri-vip-crown-line',
                'price'      => '$1.50',
                'unit'       => '/ image',
                'desc'       => 'Full-suite editing for jewelry brands, studios, and agencies demanding the best.',
                'from'       => 'from-amber-600',
                'to'         => 'to-orange-700',
                'btn'        => 'bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white',
                'badge'      => null,
                'popular'    => false,
                'accentLine' => 'from-amber-400 to-orange-400',
                'iconBg'     => 'bg-white/20',
                'features'   => [
                    ['All Standard Features', true],
                    ['Jewelry Retouching', true],
                    ['High-End Photo Manipulation', true],
                    ['Shadow Creation', true],
                    ['Same-Day Turnaround', true],
                    ['RAW & Tethered Workflow', true],
                    ['White Label Delivery', true],
                    ['Dedicated Account Manager', true],
                ],
                'volume'     => 'Unlimited images/order',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            @foreach($plans as $i => $plan)
            <div class="relative rounded-3xl overflow-hidden transition-all duration-500 reveal
                        {{ $plan['popular'] ? 'ring-2 ring-indigo-500/60 shadow-2xl shadow-indigo-500/20 scale-[1.02] md:scale-[1.04]' : 'hover:scale-[1.02]' }}"
                 style="animation-delay: {{ $i * 0.12 }}s">

                {{-- Popular badge --}}
                @if($plan['popular'])
                <div class="absolute top-0 left-0 right-0 text-center">
                    <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-gradient-to-r from-indigo-500 to-purple-500 text-xs font-bold text-white uppercase tracking-widest">
                        <i class="ri-star-fill text-amber-300 text-xs"></i>
                        {{ $plan['badge'] }}
                        <i class="ri-star-fill text-amber-300 text-xs"></i>
                    </span>
                </div>
                @endif

                {{-- Card --}}
                <div class="bg-slate-900 border border-white/[0.06] {{ $plan['popular'] ? 'pt-8' : '' }} h-full">

                    {{-- Header gradient --}}
                    <div class="bg-gradient-to-br {{ $plan['from'] }} {{ $plan['to'] }} p-7">
                        <div class="flex items-center justify-between mb-5">
                            <div class="h-12 w-12 rounded-2xl {{ $plan['iconBg'] }} flex items-center justify-center">
                                <i class="{{ $plan['icon'] }} text-white text-xl"></i>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-white/15 text-white text-xs font-semibold">{{ $plan['volume'] }}</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-white mb-1">{{ $plan['name'] }}</h3>
                        <p class="text-white/70 text-sm mb-5 leading-relaxed">{{ $plan['desc'] }}</p>
                        <div class="flex items-end gap-1">
                            <span class="text-sm text-white/80 font-medium mb-1">Starting at</span>
                            <span class="text-4xl font-black text-white">{{ $plan['price'] }}</span>
                            <span class="text-white/70 text-sm mb-1 ml-0.5">{{ $plan['unit'] }}</span>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div class="p-7">
                        <ul class="space-y-3 mb-8">
                            @foreach($plan['features'] as [$feat, $included])
                            <li class="flex items-center gap-3 text-sm {{ $included ? 'text-slate-200' : 'text-slate-600' }}">
                                @if($included)
                                    <i class="ri-check-circle-fill text-emerald-400 flex-shrink-0 text-base"></i>
                                @else
                                    <i class="ri-close-circle-line text-slate-700 flex-shrink-0 text-base"></i>
                                @endif
                                {{ $feat }}
                            </li>
                            @endforeach
                        </ul>

                        <a href="mailto:hello@pixelforgegroup.com?subject=Order {{ $plan['name'] }} Plan"
                           class="block text-center px-6 py-3.5 rounded-xl text-sm font-bold {{ $plan['btn'] }} transition-all duration-300 hover:scale-[1.02] hover:-translate-y-0.5 shadow-lg">
                            Order Now — {{ $plan['name'] }}
                        </a>

                        <p class="text-center text-xs text-slate-500 mt-3">
                            <i class="ri-secure-payment-line mr-1"></i>
                            Free trial available · No commitment
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Enterprise CTA --}}
        <div class="mt-12 reveal">
            <div class="relative rounded-2xl bg-gradient-to-r from-indigo-950/80 to-purple-950/80 border border-indigo-500/20 p-8 text-center overflow-hidden">
                <div class="absolute inset-0 opacity-50" style="background:radial-gradient(ellipse at center, rgba(99,102,241,0.12) 0%, transparent 70%)"></div>
                <div class="relative">
                    <i class="ri-building-4-line text-3xl text-indigo-400 mb-3 block"></i>
                    <h3 class="text-xl font-bold text-white mb-2">Need a custom volume deal?</h3>
                    <p class="text-slate-400 text-sm mb-5 max-w-lg mx-auto">Processing more than 1,000 images per month? Get a dedicated team, custom SLA, and volume discounts up to 40%.</p>
                    <a href="mailto:hello@pixelforgegroup.com?subject=Enterprise Quote"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold text-sm bg-indigo-600 hover:bg-indigo-500 text-white transition-all duration-300 hover:scale-105 shadow-lg shadow-indigo-500/25">
                        <i class="ri-mail-line"></i>
                        Request Enterprise Quote
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
