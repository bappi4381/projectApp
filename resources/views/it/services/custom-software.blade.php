@extends('it.layouts.master')
@section('title', 'Custom Software Development | Enterprise Solutions | PixelForge IT')

@section('content')
    {{-- ══════════════════════════════════════════
         HERO SECTION
    ══════════════════════════════════════════ --}}
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/images/it/it_service_hero_bg.png') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-[#020817]/70 backdrop-blur-[2px]"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter mb-4 reveal">
                OUR SERVICES
            </h1>
            <p class="text-xl md:text-2xl text-cyan-400 font-bold uppercase tracking-widest reveal" style="animation-delay: 0.2s">
                Custom Software Development
            </p>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
         INTRODUCTION SECTION
    ══════════════════════════════════════════ --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="reveal">
                    <h2 class="text-3xl md:text-4xl font-black text-cyan-500 mb-8 leading-tight">
                        Custom Software Development
                    </h2>
                    <div class="space-y-6 text-slate-600 font-medium leading-relaxed">
                        <p>
                            We offer an enormous depth of software expertise with more than 300+ professionals whose expertise is ready to be put to work for you. Our maintenance and support services are specifically designed carefully for your business. Our team works immensely but maintains a strong performance integrity.
                        </p>
                        <p>
                            We help you get the qualities of low-cost and perfect service every time.
                        </p>
                    </div>
                </div>
                <div class="reveal" style="animation-delay: 0.2s">
                    <img src="{{ asset('storage/images/it/programming.png') }}" alt="Software Development" class="w-full max-w-lg mx-auto">
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
         WHY WORK WITH PIXELFORGE
    ══════════════════════════════════════════ --}}
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-black text-cyan-500 mb-16 reveal">
                Why Work With PixelForge
            </h2>

            <div class="grid md:grid-cols-2 gap-x-16 gap-y-12">
                {{-- Experience --}}
                <div class="flex gap-6 reveal">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-history-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Experience</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            A decade of experience in custom software development. We are committed to giving our best service in each and every one of our successful completed projects.
                        </p>
                    </div>
                </div>

                {{-- Full-Cycle Development --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.1s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-refresh-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Full-Cycle Development Services</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            From ideation to maintenance and upgrades, we are here as your partner for continuous software development and support.
                        </p>
                    </div>
                </div>

                {{-- Agile Methodology --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.2s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-rocket-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Agile Methodology</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            We maintain high transparency and effective communication to help you monitor progress and keep moving your target.
                        </p>
                    </div>
                </div>

                {{-- Transparent Process --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.3s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-eye-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Transparent Process</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            We ensure that our product works smoothly at every level, ensuring optimal satisfaction through high-end service.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
         ENGAGEMENT MODEL
    ══════════════════════════════════════════ --}}
    <section class="py-24 bg-white text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-black text-slate-800 uppercase tracking-widest mb-4 reveal">
                OUR ENGAGEMENT MODEL
            </h2>
            <div class="w-24 h-1 bg-cyan-500 mx-auto mb-8 reveal"></div>
            <p class="max-w-3xl mx-auto text-slate-500 font-medium mb-20 reveal">
                Customer satisfaction is our first priority. We focus on the priorities of our clients' needs as the key to our success. We follow highly agile development methodologies.
            </p>

            <div class="space-y-24 text-left">
                {{-- Full Time Engagement --}}
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="reveal">
                        <h4 class="text-2xl font-black text-cyan-500 mb-6">Full Time Engagement Model</h4>
                        <div class="space-y-4 text-slate-600 font-medium">
                            <p>For large projects, we can dedicate a team of professionals exclusively for your projects. The team size can be expanded based on your workload and skill requirements.</p>
                            <p>We take time to understand your requirement in order to reach out for business.</p>
                        </div>
                    </div>
                    <div class="reveal lg:order-last" style="animation-delay: 0.2s">
                        <img src="{{ asset('storage/images/it/laptop.png') }}" class="w-full max-w-sm mx-auto">
                    </div>
                </div>

                {{-- Project Based Model --}}
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="reveal lg:order-last">
                        <h4 class="text-2xl font-black text-cyan-500 mb-6">Project Based Model</h4>
                        <div class="space-y-4 text-slate-600 font-medium">
                            <p>For fixed scope projects, we provide time and cost estimates after thoroughly analyzing your requirements. A detailed project plan is prepared outlining the understanding of delivery milestones. We help it.</p>
                            <p>The necessary resources are assigned based on the time and complexity requirements of the project. We are fully committed to quality in delivering within target time lines.</p>
                        </div>
                    </div>
                    <div class="reveal" style="animation-delay: 0.2s">
                        <img src="{{ asset('storage/images/it/design-software.png') }}" class="w-full max-w-sm mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
         EVALUATION SECTION
    ══════════════════════════════════════════ --}}
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="reveal lg:w-1/2">
                    <img src="{{ asset('storage/images/it/digital-painting.png') }}" class="w-full max-w-sm mx-auto">
                </div>
                <div class="reveal lg:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-black text-slate-800 leading-tight">
                        We provide the opportunity to <span class="text-cyan-500">evaluate</span> our services before any formal engagement.
                    </h2>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
         CONTACT FORM SECTION
    ══════════════════════════════════════════ --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-20">
                <div class="reveal">
                    <h2 class="text-6xl md:text-8xl font-black text-slate-900 leading-[0.9] tracking-tighter uppercase mb-10">
                        WANT US <br> TO <span class="text-cyan-500">CALL</span> <br> YOU?
                    </h2>
                    <div class="w-24 h-2 bg-cyan-500"></div>
                </div>

                <div class="reveal" style="animation-delay: 0.2s">
                    <form action="#" class="space-y-4">
                        <input type="text" placeholder="Name" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:border-cyan-500 transition-all">
                        <input type="text" placeholder="Company" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:border-cyan-500 transition-all">
                        <input type="email" placeholder="Email" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:border-cyan-500 transition-all">
                        <input type="tel" placeholder="Phone" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:border-cyan-500 transition-all">
                        <textarea placeholder="Message" rows="4" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:border-cyan-500 transition-all"></textarea>
                        <button type="submit" class="w-32 py-4 bg-cyan-500 text-white font-black uppercase tracking-widest text-xs rounded-lg hover:bg-cyan-600 transition-all shadow-xl shadow-cyan-500/20">
                            SEND
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
