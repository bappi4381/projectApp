{{-- resources/views/graphics/partials/testimonials.blade.php --}}
<section id="testimonials" class="relative py-24 md:py-32 bg-gradient-to-b from-slate-900 to-slate-950 overflow-hidden">

    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-px bg-gradient-to-r from-transparent via-purple-500/15 to-transparent"></div>
        <div class="absolute top-10 right-10 w-64 h-64 rounded-full bg-purple-950/40 blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-64 h-64 rounded-full bg-indigo-950/40 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-pink-900/30 border border-pink-500/25 text-xs font-semibold text-pink-300 uppercase tracking-wider mb-5">
                <i class="ri-heart-3-line"></i> Client Stories
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                Loved by <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400">Brands Worldwide</span>
            </h2>
            <p class="text-slate-400 max-w-xl mx-auto">Real feedback from real clients — from solo photographers to enterprise e-commerce teams.</p>
        </div>

        {{-- Stars overview --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-8 mb-14 reveal">
            <div class="text-center">
                <div class="text-5xl font-black text-white mb-1">4.9</div>
                <div class="flex justify-center gap-0.5 mb-1">
                    @for($s = 0; $s < 5; $s++)
                    <i class="ri-star-fill text-amber-400 text-lg"></i>
                    @endfor
                </div>
                <div class="text-xs text-slate-500">Average Rating</div>
            </div>
            <div class="hidden sm:block h-16 w-px bg-white/10"></div>
            <div class="flex flex-wrap justify-center gap-6 text-center">
                @foreach([['500+','Happy Clients'],['2M+','Images Edited'],['98%','Would Recommend'],['4.9★','Trustpilot Score']] as [$v,$l])
                <div>
                    <div class="text-xl font-extrabold text-white">{{ $v }}</div>
                    <div class="text-xs text-slate-500">{{ $l }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Testimonial Cards --}}
        @php
        $testimonials = [
            [
                'name'    => 'Sarah Johnson',
                'role'    => 'E-Commerce Director',
                'company' => 'StyleHive London',
                'avatar'  => 'SJ',
                'color'   => 'indigo',
                'rating'  => 5,
                'quote'   => '"Our product photography used to take weeks to post-process. Since partnering with this studio, we\'ve cut our time-to-market by 60%. The clipping path quality is absolutely flawless."',
                'tag'     => 'Clipping Path',
            ],
            [
                'name'    => 'Marcus Chen',
                'role'    => 'Creative Director',
                'company' => 'Luxe Jewels NYC',
                'avatar'  => 'MC',
                'color'   => 'amber',
                'rating'  => 5,
                'quote'   => '"Jewelry retouching is notoriously difficult to outsource — but these guys nailed it from the first batch. Every diamond sparkles exactly the way it should. Genuinely impressed."',
                'tag'     => 'Jewelry Retouching',
            ],
            [
                'name'    => 'Priya Nair',
                'role'    => 'Head of Digital Marketing',
                'company' => 'Urban Threads India',
                'avatar'  => 'PN',
                'color'   => 'purple',
                'rating'  => 5,
                'quote'   => '"Ghost mannequin service has completely transformed our product listings. Our conversion rate went up by 34% after switching to these clean, professional product images."',
                'tag'     => 'Ghost Mannequin',
            ],
            [
                'name'    => 'David Williams',
                'role'    => 'Senior Photographer',
                'company' => 'DW Studios, Berlin',
                'avatar'  => 'DW',
                'color'   => 'cyan',
                'rating'  => 5,
                'quote'   => '"Fast turnaround, excellent communication, and results that match exactly what I describe in my briefs. I\'ve tried six other services — this is the only one I\'ve kept coming back to."',
                'tag'     => 'Photo Retouching',
            ],
            [
                'name'    => 'Emma Rodriguez',
                'role'    => 'Founder & CEO',
                'company' => 'FashionForward AU',
                'avatar'  => 'ER',
                'color'   => 'pink',
                'rating'  => 5,
                'quote'   => '"We ship 3,000+ images per month and this team handles every single one. Their consistency across large batch orders is remarkable — every image looks like it was individually hand-crafted."',
                'tag'     => 'Batch Processing',
            ],
            [
                'name'    => 'Alex Thompson',
                'role'    => 'Product Manager',
                'company' => 'NovaMart Global',
                'avatar'  => 'AT',
                'color'   => 'emerald',
                'rating'  => 5,
                'quote'   => '"The 24-hour turnaround is real. I sent 200 images at 9 PM and had perfect results ready by morning. That kind of reliability is what a high-volume operation needs. Highly recommended."',
                'tag'     => 'Fast Delivery',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($testimonials as $i => $t)
            <div class="group bg-slate-900/60 border border-white/[0.06] rounded-2xl p-6 hover:border-{{ $t['color'] }}-500/30 hover:shadow-lg hover:shadow-{{ $t['color'] }}-500/5 transition-all duration-400 hover:-translate-y-1 reveal"
                 style="animation-delay:{{ $i * 0.08 }}s">

                {{-- Quote --}}
                <div class="mb-5">
                    <i class="ri-double-quotes-l text-3xl text-{{ $t['color'] }}-500/30 block mb-2"></i>
                    <p class="text-slate-300 text-sm leading-relaxed italic">{{ $t['quote'] }}</p>
                </div>

                {{-- Service tag --}}
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-{{ $t['color'] }}-900/40 border border-{{ $t['color'] }}-500/20 text-[10px] font-bold text-{{ $t['color'] }}-300 uppercase tracking-wider mb-5">
                    <i class="ri-service-line text-xs"></i>
                    {{ $t['tag'] }}
                </span>

                {{-- Stars --}}
                <div class="flex gap-0.5 mb-4">
                    @for($s = 0; $s < $t['rating']; $s++)
                    <i class="ri-star-fill text-amber-400 text-sm"></i>
                    @endfor
                </div>

                {{-- Author --}}
                <div class="flex items-center gap-3 pt-4 border-t border-white/[0.06]">
                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-{{ $t['color'] }}-500 to-{{ $t['color'] }}-700 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <span class="text-xs font-bold text-white">{{ $t['avatar'] }}</span>
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-white">{{ $t['name'] }}</div>
                        <div class="text-xs text-slate-500">{{ $t['role'] }} · {{ $t['company'] }}</div>
                    </div>
                    <i class="ri-check-badge-fill text-emerald-400 ml-auto text-lg" title="Verified Client"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
