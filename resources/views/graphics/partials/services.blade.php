{{-- resources/views/graphics/partials/services.blade.php --}}
<section id="services" class="relative py-24 md:py-32 bg-slate-950">

    {{-- Background decoration --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div class="absolute -top-20 left-1/4 w-72 h-72 rounded-full bg-indigo-950/50 blur-3xl"></div>
        <div class="absolute -top-20 right-1/4 w-72 h-72 rounded-full bg-purple-950/50 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-900/40 border border-indigo-500/25 text-xs font-semibold text-indigo-300 uppercase tracking-wider mb-5">
                <i class="ri-scissors-cut-line"></i> Our Services
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
                Expert <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Editing Services</span><br>for Every Need
            </h2>
            <p class="text-slate-400 max-w-2xl mx-auto text-base leading-relaxed">
                From simple clipping paths to complex creative retouching — each image is handled by a specialist with an average of 5+ years of experience.
            </p>
        </div>

        {{-- Services Grid --}}
        @php
        $services = [
            [
                'title'       => 'Clipping Path',
                'icon'        => 'ri-scissors-cut-line',
                'color'       => 'indigo',
                'from'        => 'from-indigo-500',
                'to'          => 'to-purple-600',
                'shadow'      => 'shadow-indigo-500/25',
                'border'      => 'border-indigo-500/20',
                'badge'       => 'From $0.29/img',
                'desc'        => 'Precise, hand-drawn vector paths for product isolation on any background — essential for e-commerce, catalogues, and advertising.',
                'features'    => ['Simple to Complex Paths', 'Multi-path Support', 'Vector & Raster Output', 'Same-day Delivery'],
                'before_hint' => 'Product on cluttered background',
                'after_hint'  => 'Clean isolated product',
            ],
            [
                'title'       => 'Ghost Mannequin',
                'icon'        => 'ri-t-shirt-line',
                'color'       => 'purple',
                'from'        => 'from-purple-500',
                'to'          => 'to-pink-600',
                'shadow'      => 'shadow-purple-500/25',
                'border'      => 'border-purple-500/20',
                'badge'       => 'From $0.80/img',
                'desc'        => 'Invisible mannequin / neck joint service that gives apparel a professional 3D look without a physical model — perfect for fashion e-commerce.',
                'features'    => ['Neck Joint Service', 'Sleeve & Body Join', 'Shape Restoration', 'Collar Editing'],
                'before_hint' => 'Garment on mannequin',
                'after_hint'  => 'Hollow mannequin effect',
            ],
            [
                'title'       => 'Photo Retouching',
                'icon'        => 'ri-magic-line',
                'color'       => 'cyan',
                'from'        => 'from-cyan-500',
                'to'          => 'to-blue-600',
                'shadow'      => 'shadow-cyan-500/25',
                'border'      => 'border-cyan-500/20',
                'badge'       => 'From $0.50/img',
                'desc'        => 'Portrait, product, and commercial image retouching — skin smoothing, blemish removal, dodge & burn — for flawless professional results.',
                'features'    => ['Skin Retouching', 'Blemish & Wrinkle Removal', 'Dodge & Burn', 'Natural Look Preserved'],
                'before_hint' => 'Unedited portrait / product',
                'after_hint'  => 'Professionally retouched',
            ],
            [
                'title'       => 'Video Editing',
                'icon'        => 'ri-film-line',
                'color'       => 'blue',
                'from'        => 'from-blue-500',
                'to'          => 'to-indigo-600',
                'shadow'      => 'shadow-blue-500/25',
                'border'      => 'border-blue-500/20',
                'badge'       => 'From $15/vid',
                'desc'        => 'Professional post-production for e-commerce, social media, and advertising videos to boost engagement and storytelling.',
                'features'    => ['Cutting & Splicing', 'Color Grading', 'Sound Design', 'Motion Graphics'],
                'before_hint' => 'Raw footage shots',
                'after_hint'  => 'Cinematic final cut',
            ],
            [
                'title'       => '3D Modeling',
                'icon'        => 'ri-cube-line',
                'color'       => 'violet',
                'from'        => 'from-violet-500',
                'to'          => 'to-purple-600',
                'shadow'      => 'shadow-violet-500/25',
                'border'      => 'border-violet-500/20',
                'badge'       => 'From $45/obj',
                'desc'        => 'High-fidelity 3D modeling and photorealistic rendering for product visualization and architectural presentations.',
                'features'    => ['Texturing & Lighting', 'Photorealistic Renders', '360° Product Views', 'CAD Conversion'],
                'before_hint' => 'Wireframe / Blueprints',
                'after_hint'  => 'Hyper-realistic render',
            ],
            [
                'title'       => 'Real Estate Editing',
                'icon'        => 'ri-home-4-line',
                'color'       => 'emerald',
                'from'        => 'from-emerald-500',
                'to'          => 'to-teal-600',
                'shadow'      => 'shadow-emerald-500/25',
                'border'      => 'border-emerald-500/20',
                'badge'       => 'From $1.50/img',
                'desc'        => 'HDR blending, sky replacement, and architectural retouching to make property listings stand out and sell faster.',
                'features'    => ['HDR Blending', 'Sky Replacement', 'Virtual Staging', 'Perspective Correction'],
                'before_hint' => 'Dull indoor / outdoor shot',
                'after_hint'  => 'Bright inviting listing',
            ],
            [
                'title'       => 'Jewelry Retouching',
                'icon'        => 'ri-sparkling-2-line',
                'color'       => 'amber',
                'from'        => 'from-amber-500',
                'to'          => 'to-orange-600',
                'shadow'      => 'shadow-amber-500/25',
                'border'      => 'border-amber-500/20',
                'badge'       => 'From $1.20/img',
                'desc'        => 'High-end jewellery photo retouching: dust removal, refections, colour enhancement and shine restoration to make every piece look flawless.',
                'features'    => ['Dust & Scratch Removal', 'Metal Shine Enhancement', 'Stone Colour Correction', 'Background Perfection'],
                'before_hint' => 'Raw jewellery shot',
                'after_hint'  => 'Magazine-ready jewellery',
            ],
            [
                'title'       => 'Background Removal',
                'icon'        => 'ri-eraser-line',
                'color'       => 'rose',
                'from'        => 'from-rose-500',
                'to'          => 'to-pink-600',
                'shadow'      => 'shadow-rose-500/25',
                'border'      => 'border-rose-500/20',
                'badge'       => 'From $0.25/img',
                'desc'        => 'Batch background removal with ultra-smooth edges. Perfect for cleaning up huge inventories for Amazon, eBay, and Shopify.',
                'features'    => ['Perfectly Smooth Edges', 'Shadow Preservation', 'White/Clean Backgrounds', 'Batch Processing'],
                'before_hint' => 'Busy studio background',
                'after_hint'  => 'Pure white background',
            ],
            [
                'title'       => 'Vector Conversion',
                'icon'        => 'ri-vector-line',
                'color'       => 'orange',
                'from'        => 'from-orange-500',
                'to'          => 'to-yellow-600',
                'shadow'      => 'shadow-orange-500/25',
                'border'      => 'border-orange-500/20',
                'badge'       => 'From $5/logo',
                'desc'        => 'Converting low-res raster logos and illustrations into infinitely scalable vector files for print and large-scale media.',
                'features'    => ['Manual Redrawing', 'Scalable AI/SVG/EPS', 'Color Separation', 'High-Detail Pathing'],
                'before_hint' => 'Pixelated low-res logo',
                'after_hint'  => 'Sharp vector graphics',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $i => $svc)
            <div class="group relative bg-slate-900/60 backdrop-blur-sm border {{ $svc['border'] }} rounded-3xl overflow-hidden hover:border-{{ $svc['color'] }}-400/40 hover:shadow-xl hover:{{ $svc['shadow'] }} transition-all duration-500 hover:-translate-y-2 reveal"
                 style="animation-delay: {{ $i * 0.08 }}s">

                {{-- Before / After image comparison area --}}
                <div class="relative h-52 bg-slate-800 overflow-hidden">

                    {{-- Gradient placeholder simulating before/after --}}
                    <div class="absolute inset-0 flex">
                        {{-- Before side --}}
                        <div class="flex-1 relative flex items-center justify-center bg-slate-700/60">
                            <div class="text-center px-3">
                                <div class="inline-flex h-8 w-8 rounded-full bg-slate-600 items-center justify-center mb-2 mx-auto">
                                    <i class="ri-image-line text-slate-400 text-sm"></i>
                                </div>
                                <p class="text-[10px] text-slate-500 leading-tight">{{ $svc['before_hint'] }}</p>
                            </div>
                            <span class="absolute bottom-2 left-2 text-[9px] font-bold text-slate-500 uppercase tracking-widest bg-slate-800/80 px-1.5 py-0.5 rounded">Before</span>
                        </div>

                        {{-- Divider --}}
                        <div class="relative flex items-center justify-center w-8 flex-shrink-0 bg-transparent z-10">
                            <div class="absolute inset-y-0 left-1/2 w-px bg-white/20"></div>
                            <div class="relative z-10 h-7 w-7 rounded-full bg-gradient-to-br {{ $svc['from'] }} {{ $svc['to'] }} flex items-center justify-center shadow-lg">
                                <i class="ri-arrow-left-right-line text-white text-xs"></i>
                            </div>
                        </div>

                        {{-- After side --}}
                        <div class="flex-1 relative flex items-center justify-center bg-gradient-to-br {{ $svc['from'] }}/5 {{ $svc['to'] }}/10">
                            <div class="text-center px-3">
                                <div class="inline-flex h-8 w-8 rounded-full bg-gradient-to-br {{ $svc['from'] }} {{ $svc['to'] }} items-center justify-center mb-2 mx-auto shadow-lg">
                                    <i class="ri-check-line text-white text-sm"></i>
                                </div>
                                <p class="text-[10px] text-slate-400 leading-tight">{{ $svc['after_hint'] }}</p>
                            </div>
                            <span class="absolute bottom-2 right-2 text-[9px] font-bold text-slate-300 uppercase tracking-widest bg-slate-800/80 px-1.5 py-0.5 rounded">After</span>
                        </div>
                    </div>

                    {{-- Price badge --}}
                    <div class="absolute top-3 right-3 px-2.5 py-1 rounded-lg bg-slate-950/80 backdrop-blur-sm border border-white/10">
                        <span class="text-xs font-bold text-white">{{ $svc['badge'] }}</span>
                    </div>
                </div>

                {{-- Card body --}}
                <div class="p-6">

                    {{-- Icon + Title --}}
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-10 w-10 rounded-xl bg-gradient-to-br {{ $svc['from'] }} {{ $svc['to'] }} flex items-center justify-center shadow-lg flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <i class="{{ $svc['icon'] }} text-white text-base"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white group-hover:text-{{ $svc['color'] }}-300 transition-colors duration-300">{{ $svc['title'] }}</h3>
                    </div>

                    <p class="text-slate-400 text-sm leading-relaxed mb-5">{{ $svc['desc'] }}</p>

                    {{-- Feature list --}}
                    <ul class="space-y-2 mb-5">
                        @foreach($svc['features'] as $feat)
                        <li class="flex items-center gap-2 text-sm text-slate-300">
                            <i class="ri-check-double-line text-{{ $svc['color'] }}-400 flex-shrink-0 text-base"></i>
                            {{ $feat }}
                        </li>
                        @endforeach
                    </ul>

                    {{-- CTA link --}}
                    <a href="#pricing" class="group/link inline-flex items-center gap-1.5 text-sm font-semibold text-{{ $svc['color'] }}-400 hover:text-{{ $svc['color'] }}-300 transition-colors duration-200">
                        Get a Quote
                        <i class="ri-arrow-right-line group-hover/link:translate-x-1 transition-transform duration-200"></i>
                    </a>
                </div>

                {{-- Bottom glow line --}}
                <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-{{ $svc['color'] }}-500/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>
            @endforeach
        </div>

        {{-- Bottom CTA --}}
        <div class="mt-14 text-center reveal">
            <a href="#pricing" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-sm bg-indigo-600/20 hover:bg-indigo-600/35 text-indigo-300 border border-indigo-500/30 hover:border-indigo-400/50 transition-all duration-300 hover:scale-105">
                <i class="ri-price-tag-3-line"></i>
                View Full Pricing →
            </a>
        </div>
    </div>
</section>
