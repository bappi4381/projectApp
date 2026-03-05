{{-- resources/views/graphics/partials/process.blade.php --}}
<section id="payment" class="relative py-24 md:py-32 bg-slate-950 overflow-hidden">

    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/2 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-500/15 to-transparent"></div>
        <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-[600px] h-[300px] rounded-full bg-indigo-950/60 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-900/30 border border-cyan-500/25 text-xs font-semibold text-cyan-300 uppercase tracking-wider mb-5">
                <i class="ri-route-line"></i> How It Works
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                4 Simple Steps to <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-indigo-400">Perfect Images</span>
            </h2>
            <p class="text-slate-400 max-w-xl mx-auto text-base">Our streamlined workflow means less back-and-forth for you and faster delivery without compromising quality.</p>
        </div>

        {{-- Steps --}}
        @php
        $steps = [
            [
                'num'   => '01',
                'icon'  => 'ri-upload-cloud-2-line',
                'title' => 'Upload Your Images',
                'desc'  => 'Send us your raw images via our secure upload portal, WeTransfer, Dropbox, or Google Drive. Any format accepted — JPEG, PNG, TIFF, PSD, RAW.',
                'from'  => 'from-indigo-500',
                'to'    => 'to-blue-600',
                'glow'  => 'indigo',
                'tips'  => ['Secure 256-bit Transfer', 'Any File Format', 'Batch Upload Support'],
            ],
            [
                'num'   => '02',
                'icon'  => 'ri-magic-line',
                'title' => 'Our Experts Edit',
                'desc'  => 'Your dedicated editing team processes each image by hand — no AI shortcuts. Every pixel is crafted to meet your exact specifications and brand standards.',
                'from'  => 'from-purple-500',
                'to'    => 'to-pink-600',
                'glow'  => 'purple',
                'tips'  => ['Hand-edited by Experts', 'Quality-checked Twice', 'Follows Your Brand Guide'],
            ],
            [
                'num'   => '03',
                'icon'  => 'ri-eye-line',
                'title' => 'Review & Feedback',
                'desc'  => 'We deliver a preview batch first. Review, leave comments, and request free revisions. We iterate until you are 100% satisfied — guaranteed.',
                'from'  => 'from-amber-500',
                'to'    => 'to-orange-600',
                'glow'  => 'amber',
                'tips'  => ['Preview Before Full Delivery', 'Unlimited Revisions', '100% Satisfaction Guarantee'],
            ],
            [
                'num'   => '04',
                'icon'  => 'ri-download-cloud-2-line',
                'title' => 'Download & Deliver',
                'desc'  => 'Approved files are delivered to your preferred destination in your chosen format. Direct download, cloud sync, or FTP — whatever works for your workflow.',
                'from'  => 'from-emerald-500',
                'to'    => 'to-teal-600',
                'glow'  => 'emerald',
                'tips'  => ['All Major Formats', 'Cloud Sync Available', 'Direct FTP Delivery'],
            ],
        ];
        @endphp

        {{-- Desktop: horizontal with connector arrows --}}
        <div class="hidden lg:grid grid-cols-4 gap-0 relative mb-16">
            {{-- Connector line --}}
            <div class="absolute top-16 left-[12.5%] right-[12.5%] h-px bg-gradient-to-r from-indigo-500/30 via-purple-500/30 to-emerald-500/30 z-0"></div>

            @foreach($steps as $i => $step)
            <div class="relative flex flex-col items-center text-center px-4 reveal" style="animation-delay:{{ $i * 0.15 }}s">

                {{-- Step circle --}}
                <div class="relative z-10 mb-6">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br {{ $step['from'] }} {{ $step['to'] }} flex items-center justify-center shadow-xl shadow-{{ $step['glow'] }}-500/30 mx-auto">
                        <i class="{{ $step['icon'] }} text-white text-2xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 h-6 w-6 rounded-full bg-slate-900 border-2 border-{{ $step['glow'] }}-400/60 flex items-center justify-center">
                        <span class="text-[10px] font-black text-{{ $step['glow'] }}-400">{{ $step['num'] }}</span>
                    </div>
                </div>

                <h3 class="text-base font-bold text-white mb-2">{{ $step['title'] }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ $step['desc'] }}</p>

                {{-- Tips --}}
                <ul class="space-y-1.5 w-full">
                    @foreach($step['tips'] as $tip)
                    <li class="flex items-center gap-2 justify-center text-xs text-slate-500">
                        <i class="ri-check-line text-{{ $step['glow'] }}-400 text-xs flex-shrink-0"></i>
                        {{ $tip }}
                    </li>
                    @endforeach
                </ul>

                {{-- Arrow (not on last) --}}
                @if($i < 3)
                <div class="absolute top-8 right-0 z-20 translate-x-1/2">
                    <div class="h-8 w-8 rounded-full bg-slate-800 border border-white/10 flex items-center justify-center">
                        <i class="ri-arrow-right-line text-slate-400 text-sm"></i>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Mobile: vertical timeline --}}
        <div class="lg:hidden space-y-6">
            @foreach($steps as $i => $step)
            <div class="flex gap-5 reveal" style="animation-delay:{{ $i * 0.12 }}s">
                <div class="flex flex-col items-center flex-shrink-0">
                    <div class="h-12 w-12 rounded-xl bg-gradient-to-br {{ $step['from'] }} {{ $step['to'] }} flex items-center justify-center shadow-lg">
                        <i class="{{ $step['icon'] }} text-white text-lg"></i>
                    </div>
                    @if($i < 3)
                    <div class="flex-1 w-px bg-gradient-to-b {{ $step['from'] }}/30 {{ $step['to'] }}/10 mt-3 min-h-[40px]"></div>
                    @endif
                </div>
                <div class="pb-6">
                    <div class="text-xs font-bold text-{{ $step['glow'] }}-400 mb-1 uppercase tracking-widest">Step {{ $step['num'] }}</div>
                    <h3 class="text-base font-bold text-white mb-1.5">{{ $step['title'] }}</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="text-center mt-6 reveal">
            <a href="mailto:hello@pixelforgegroup.com?subject=Free Trial Request"
               class="inline-flex items-center gap-2.5 px-8 py-4 rounded-xl font-bold text-base bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white shadow-xl shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all duration-300 hover:scale-105">
                <i class="ri-gift-line text-lg"></i>
                Start Your Free Trial Now
            </a>
        </div>
    </div>
</section>
