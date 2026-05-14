@extends('it.layouts.master')
@section('title', 'Quality Assurance & Testing | Enterprise Solutions | PixelForge IT')

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
                Quality Assurance & Testing
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
                        Quality Assurance & Testing
                    </h2>
                    <div class="space-y-6 text-slate-600 font-medium leading-relaxed">
                        <p>
                            QA management ensures high performance with high-quality software. We have a dedicated testing department to ensure high-quality software with robust functionality. 
                        </p>
                        <p>
                            At PixelForge IT, we focus on the importance of quality to reach and exceed the expectation of our clients to achieve long-term reliable results through comprehensive software validation.
                        </p>
                    </div>
                </div>
                <div class="reveal" style="animation-delay: 0.2s">
                    <img src="{{ asset('storage/images/it/programming.png') }}" alt="QA & Testing" class="w-full max-w-lg mx-auto">
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════
         OUR QA & TESTING EXPERTISE
    ══════════════════════════════════════════ --}}
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-black text-cyan-500 mb-16 reveal">
                Our QA & Testing Expertise
            </h2>

            <div class="grid md:grid-cols-2 gap-x-16 gap-y-12">
                {{-- Independent QA --}}
                <div class="flex gap-6 reveal">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-shield-star-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Independent QA</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            PixelForge IT offers independent QA services for software products that are engineered with modern technology, agility and technical expertise.
                        </p>
                    </div>
                </div>

                {{-- Integrated Testing --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.1s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-git-merge-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Integrated Testing</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            As your partner, the PixelForge IT team of engineers ensures high-quality software and provides quality-of-life improvements throughout the development process.
                        </p>
                    </div>
                </div>

                {{-- QA Consulting --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.2s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-discuss-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">QA Consulting</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            Professional assessment and analysis of your professional projects' technical and experimental requirements to achieve a better outcome.
                        </p>
                    </div>
                </div>

                {{-- Full-Cycle Testing --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.3s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-loop-left-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Full-Cycle Testing</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            Our QA team renders quality assurance services through a cycle of life spanning development and maintenance phase.
                        </p>
                    </div>
                </div>

                {{-- Custom Testing --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.4s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-tools-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Custom Testing</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            PixelForge IT is capable of building custom software solutions for your testing needs and providing you with a high-end service.
                        </p>
                    </div>
                </div>

                {{-- Test Automation --}}
                <div class="flex gap-6 reveal" style="animation-delay: 0.5s">
                    <div class="flex-shrink-0 w-12 h-12 text-cyan-500">
                        <i class="ri-robot-line text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-cyan-500 mb-3">Test Automation</h4>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            Efficiency is the key to software development, and we focus on automated test strategies to replace manual repetitive tasks.
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
                            <p>Weekly time sheets and status reports give you full control over your project timeline.</p>
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
                            <p>For fixed scope projects, we provide time and cost estimates after thoroughly analyzing your requirements. A detailed project plan is prepared outlining delivery milestones.</p>
                            <p>The necessary resources are assigned based on the time and complexity requirements of the project. We are fully committed to quality in delivering within target timelines.</p>
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
