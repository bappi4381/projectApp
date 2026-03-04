{{-- resources/views/it/partials/services.blade.php --}}
<section id="services" class="relative py-24 md:py-32 bg-slate-950 overflow-hidden">

    {{-- Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-px bg-gradient-to-r from-transparent via-cyan-500/20 to-transparent"></div>
        <div class="absolute -top-20 right-1/4 w-72 h-72 rounded-full bg-cyan-950/40 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-900/30 border border-cyan-500/25 text-xs font-semibold text-cyan-300 uppercase tracking-wider mb-5">
                <i class="ri-terminal-box-line"></i> Full Stack Solutions
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
                Our Core <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400">Expertise</span>
            </h2>
            <p class="text-slate-400 max-w-2xl mx-auto text-base">We provide end-to-end technology services to help you build, launch, and scale your digital presence.</p>
        </div>

        {{-- IT Services Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $itServices = [
                [
                    'title'    => 'Website Design & Dev',
                    'icon'     => 'ri-global-line',
                    'color'    => 'cyan',
                    'tag'      => 'Modern Stack',
                    'desc'     => 'Responsive, high-performance websites built with the latest technologies like React, Vue, and Laravel. We focus on speed, SEO, and UX.',
                    'features' => ['Custom UI/UX Design', 'SEO Optimization', 'Mobile Responsive', 'CMS Integration'],
                ],
                [
                    'title'    => 'Mobile App Development',
                    'icon'     => 'ri-smartphone-line',
                    'color'    => 'blue',
                    'tag'      => 'iOS & Android',
                    'desc'     => 'Stunning native and cross-platform mobile applications that provide seamless user experiences on any device.',
                    'features' => ['Flutter/React Native', 'Custom Backend API', 'App Store Deployment', 'Real-time Features'],
                ],
                [
                    'title'    => 'Digital Marketing',
                    'icon'     => 'ri-advertisement-line',
                    'color'    => 'indigo',
                    'tag'      => 'Growth Focused',
                    'desc'     => 'Data-driven marketing strategies that boost your brand visibility and drive conversions through SEO, SEM, and social media.',
                    'features' => ['Search Engine Optimization', 'Social Media Ads', 'Content Strategy', 'Email Marketing'],
                ],
                [
                    'title'    => 'Software Development',
                    'icon'     => 'ri-code-s-slash-line',
                    'color'    => 'emerald',
                    'tag'      => 'Custom Solutions',
                    'desc'     => 'Full-cycle enterprise software development tailored to your specific business needs, from CRM to ERP systems.',
                    'features' => ['Microservices Architecture', 'SaaS Development', 'Cloud Migration', 'Bug-free Code'],
                ],
                [
                    'title'    => 'E-commerce Solutions',
                    'icon'     => 'ri-shopping-cart-2-line',
                    'color'    => 'orange',
                    'tag'      => 'Sales Driven',
                    'desc'     => 'Building robust online stores with secure payment gateways, inventory management, and high conversion optimization.',
                    'features' => ['Shopify/WooCommerce', 'Custom Storefronts', 'Payment Gateway Integration', 'Sales Analytics'],
                ],
                [
                    'title'    => 'Web Hosting',
                    'icon'     => 'ri-server-line',
                    'color'    => 'rose',
                    'tag'      => 'Fast & Secure',
                    'desc'     => 'Reliable 24/7 managed hosting solutions with 99.9% uptime guarantee, automated backups, and advanced security.',
                    'features' => ['AWS/Vultr Managed', '24/7 Server Monitoring', 'SSL & CDN Setup', 'Free Daily Backups'],
                ],
            ];
            @endphp

            @foreach($itServices as $i => $it)
            <div class="group bg-slate-900/60 backdrop-blur-sm border border-white/[0.08] rounded-3xl p-8 hover:border-{{ $it['color'] }}-500/40 hover:bg-slate-900/80 transition-all duration-500 hover:-translate-y-2 reveal"
                 style="animation-delay: {{ $i * 0.1 }}s">

                {{-- Icon --}}
                <div class="h-14 w-14 rounded-2xl bg-{{ $it['color'] }}-500/10 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-{{ $it['color'] }}-500 transition-all duration-500">
                    <i class="{{ $it['icon'] }} text-{{ $it['color'] }}-400 text-2xl group-hover:text-white transition-colors duration-500"></i>
                </div>

                {{-- Tag --}}
                <span class="inline-flex px-2 py-0.5 rounded-lg bg-{{ $it['color'] }}-900/30 border border-{{ $it['color'] }}-500/20 text-[10px] font-bold text-{{ $it['color'] }}-300 uppercase tracking-widest mb-4">
                    {{ $it['tag'] }}
                </span>

                {{-- Content --}}
                <h3 class="text-xl font-bold text-white mb-3 group-hover:text-{{ $it['color'] }}-300 transition-colors duration-300">{{ $it['title'] }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">{{ $it['desc'] }}</p>

                {{-- Feature List --}}
                <ul class="space-y-2.5 mb-8">
                    @foreach($it['features'] as $feat)
                    <li class="flex items-center gap-2.5 text-xs text-slate-300">
                        <i class="ri-checkbox-circle-fill text-{{ $it['color'] }}-500"></i>
                        {{ $feat }}
                    </li>
                    @endforeach
                </ul>

                {{-- Primary CTA --}}
                <a href="mailto:it@pixelforge.com?subject=Inquiry: {{ $it['title'] }}"
                   class="inline-flex items-center gap-2 text-sm font-bold text-white hover:text-{{ $it['color'] }}-400 transition-colors group/btn">
                    Get Started
                    <i class="ri-arrow-right-line group-hover/btn:translate-x-1 transition-transform"></i>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
