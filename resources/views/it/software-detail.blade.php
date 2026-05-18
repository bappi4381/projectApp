@extends('it.layouts.master')
@section('title', $software->name . ' | Enterprise Software | PixelForge IT')

@section('content')
    {{-- Header --}}
    <section class="pt-48 pb-20 bg-[#020817] relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-cyan-500/10 blur-[150px] rounded-full"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <nav class="flex items-center gap-3 text-[10px] font-black uppercase tracking-[0.3em] text-slate-500 mb-12 reveal">
                <a href="{{ route('it.index') }}" class="hover:text-cyan-400 transition-colors">IT Solutions</a>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <span class="text-slate-500">Software</span>
                <i class="ri-arrow-right-s-line text-lg"></i>
                <span class="text-cyan-500">{{ Str::limit($software->name, 20) }}</span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="reveal">
                    @if($software->category)
                        <div class="inline-block px-4 py-1.5 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-[10px] font-black uppercase tracking-widest mb-6">
                            {{ $software->category }}
                        </div>
                    @endif
                    <h1 class="text-5xl md:text-7xl font-black text-white uppercase leading-[0.95] tracking-tighter mb-10">
                        {{ $software->name }}
                    </h1>
                    <p class="text-xl text-slate-400 font-medium leading-relaxed">
                        {{ $software->short_desc }}
                    </p>
                </div>
                <div class="relative reveal" style="animation-delay: 0.2s">
                    <div class="aspect-video bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden group shadow-2xl relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500/10 via-transparent to-blue-500/10 z-0"></div>
                         @if($software->image_url)
                            <img src="{{ Str::startsWith($software->image_url, 'http') ? $software->image_url : asset('storage/' . $software->image_url) }}" alt="{{ $software->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 relative z-10" />
                        @else
                            <div class="absolute inset-0 flex items-center justify-center relative z-10">
                                <i class="ri-app-store-line text-[10rem] text-white/5 group-hover:scale-110 transition-transform duration-700"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Details --}}
    <section class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-20">
                <div class="lg:col-span-2 space-y-12 reveal">
                    <h2 class="text-3xl font-black text-slate-900 uppercase leading-tight">Software <br><span class="text-cyan-500">Overview.</span></h2>
                    
                    <div class="prose prose-lg max-w-none text-slate-600 font-medium leading-[1.8] whitespace-pre-line">
                        {{ $software->long_desc }}
                    </div>

                    <div class="grid sm:grid-cols-2 gap-8 pt-10 border-t border-slate-100 mt-12">
                        <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:border-cyan-500/30 transition-all group">
                            <i class="ri-rocket-fill text-3xl text-cyan-500 mb-6 block group-hover:scale-110 transition-transform"></i>
                            <h4 class="text-slate-900 font-black uppercase text-sm mb-3 tracking-widest">Enterprise Ready</h4>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed">Built and structured for scalable, high-performance enterprise usage.</p>
                        </div>
                        <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:border-cyan-500/30 transition-all group">
                            <i class="ri-customer-service-2-fill text-3xl text-cyan-500 mb-6 block group-hover:scale-110 transition-transform"></i>
                            <h4 class="text-slate-900 font-black uppercase text-sm mb-3 tracking-widest">Dedicated Support</h4>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed">Backed by PixelForge's dedicated IT support and integration engineers.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-10 reveal" style="animation-delay: 0.2s">
                    <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/10 blur-3xl -mr-16 -mt-16"></div>
                        <h3 class="text-xl font-black uppercase mb-6 tracking-tight relative z-10">Request a Demo</h3>
                        <p class="text-slate-400 text-sm mb-8 font-medium leading-relaxed relative z-10">Interested in integrating {{ $software->name }}? Reach out to our IT team.</p>
                        <a href="{{ route('it.contact') }}" class="w-full py-4 bg-cyan-500 text-white text-center font-black rounded-xl block hover:bg-cyan-400 transition-all uppercase tracking-widest text-[10px] relative z-10 shadow-lg shadow-cyan-500/20">
                            Contact IT Sales
                        </a>
                    </div>

                    <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100">
                        <h4 class="text-slate-900 font-black uppercase text-xs tracking-widest mb-8 border-b border-slate-200 pb-4">More IT Solutions</h4>
                        <ul class="space-y-6">
                            <li><a href="{{ route('it.index') }}" class="text-slate-500 hover:text-cyan-500 font-bold text-xs uppercase tracking-wider flex items-center justify-between group">Command Center <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i></a></li>
                            <li><a href="{{ route('it.about') }}" class="text-slate-500 hover:text-cyan-400 font-bold text-xs uppercase tracking-wider flex items-center justify-between group">About Our Tech <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Interactive Showcase Section (Suite of Solutions) --}}
    @if(!empty($software->solutions) && count($software->solutions) > 0)
    <section class="py-32 bg-slate-50 border-t border-slate-100 overflow-hidden" 
             x-data="{
                 activeTab: 0,
                 tabs: {{ json_encode($software->solutions) }}
             }">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-16 items-start">
                
                {{-- Left: Suite of Solutions List + Interactive Testimonial Quote --}}
                <div class="lg:col-span-5 space-y-12">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-2 uppercase">Suite of Solutions</h2>
                        <div class="w-16 h-1 bg-cyan-500 mt-4"></div>
                    </div>

                    {{-- Dynamic Tabs List --}}
                    <div class="divide-y divide-slate-200 border-y border-slate-200">
                        <template x-for="(tab, index) in tabs" :key="index">
                            <button @click="activeTab = index" 
                                    class="w-full text-left py-5 px-6 flex items-center justify-between group transition-all duration-300 rounded-xl"
                                    :class="activeTab === index ? 'bg-cyan-600 text-white font-bold shadow-lg my-1' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900'">
                                <span class="text-sm font-semibold uppercase tracking-wider transition-transform" 
                                      :class="activeTab === index ? 'translate-x-2' : ''"
                                      x-text="tab.title"></span>
                                <i class="ri-arrow-right-line text-lg transition-transform duration-300"
                                   :class="activeTab === index ? 'translate-x-0 opacity-100 text-white' : 'opacity-60 group-hover:translate-x-1 group-hover:opacity-100'"></i>
                            </button>
                        </template>
                    </div>

                    {{-- Interactive Testimonial Quote Box --}}
                    <div class="bg-gradient-to-br from-cyan-950 via-[#0B1E36] to-slate-950 rounded-3xl p-8 text-white relative shadow-xl overflow-hidden transition-all duration-500 border border-cyan-500/10" 
                         style="box-shadow: 0 20px 40px rgba(6, 182, 212, 0.15)">
                        <div class="absolute -top-6 -right-6 text-[10rem] text-white/5 font-serif pointer-events-none select-none">“</div>
                        <p class="text-md italic font-medium leading-relaxed relative z-10 mb-6" 
                           x-text="'“' + tabs[activeTab].quote + '”'"></p>
                        <div class="border-t border-white/10 pt-4 flex items-center gap-3 relative z-10">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center font-bold text-sm text-cyan-300">
                                <i class="ri-user-star-line"></i>
                            </div>
                            <div>
                                <h5 class="text-xs font-bold uppercase tracking-wider" x-text="tabs[activeTab].author.split(',')[0]"></h5>
                                <span class="text-[9px] uppercase tracking-widest text-slate-300" x-text="tabs[activeTab].author.split(',').slice(1).join(',')"></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: High-Fidelity Active Solution View Card --}}
                <div class="lg:col-span-7 bg-gradient-to-br from-cyan-950 via-[#0B1E36] to-slate-950 rounded-[2.5rem] p-10 md:p-14 text-white shadow-2xl relative overflow-hidden transition-all duration-500 flex flex-col justify-between min-h-[720px] border border-cyan-500/10"
                     style="box-shadow: 0 30px 60px rgba(6, 182, 212, 0.25)">
                    {{-- Decorative Background Glow --}}
                    <div class="absolute -top-40 -right-40 w-96 h-96 bg-cyan-400/20 blur-[120px] rounded-full"></div>
                    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-teal-400/10 blur-[120px] rounded-full"></div>

                    <div class="space-y-8 relative z-10">
                        {{-- Solution Logo Indicator --}}
                        <div class="flex items-center gap-2 text-cyan-300 font-black text-xs uppercase tracking-[0.3em]">
                            <i class="ri-sparkling-fill text-lg"></i>
                            <span x-text="tabs[activeTab].logoText"></span>
                        </div>

                        {{-- Active Content Headers --}}
                        <h3 class="text-3xl md:text-4xl font-black uppercase tracking-tight leading-tight" 
                            x-text="tabs[activeTab].header"></h3>

                        <p class="text-slate-200 text-sm md:text-base font-medium leading-relaxed opacity-90" 
                           x-text="tabs[activeTab].desc"></p>

                        {{-- Action Button --}}
                        <div class="pt-4">
                            <a :href="tabs[activeTab].link ? tabs[activeTab].link : '{{ route('it.contact') }}'" 
                               class="inline-block px-8 py-4 bg-cyan-500 hover:bg-cyan-400 text-white font-black uppercase tracking-widest text-xs rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0"
                               x-text="tabs[activeTab].btnText"></a>
                        </div>
                    </div>

                    {{-- Live CSS Rendered Laptop Mockup Frame --}}
                    <div class="mt-12 relative z-10 select-none">
                        {{-- Laptop Screen --}}
                        <div class="w-full bg-[#1e293b] rounded-t-2xl p-2 md:p-3 pb-0 border-t border-x border-[#334155] relative shadow-2xl">
                            <div class="bg-black p-1 md:p-1.5 rounded-t-xl overflow-hidden">
                                {{-- Custom Image Mockup --}}
                                <template x-if="tabs[activeTab].image">
                                    <div class="aspect-[16/10] w-full bg-slate-900 rounded-md overflow-hidden relative shadow-inner flex items-center justify-center">
                                        <img :src="tabs[activeTab].image.startsWith('http') ? tabs[activeTab].image : '{{ asset('storage') }}/' + tabs[activeTab].image" class="w-full h-full object-cover">
                                    </div>
                                </template>
                                
                                {{-- Dynamic HTML Mockup (Fallback) --}}
                                <template x-if="!tabs[activeTab].image">
                                    <div class="bg-[#f8fafc] aspect-[16/10] w-full rounded-md overflow-hidden relative flex flex-col text-[7px] md:text-[9px] text-slate-800 font-sans shadow-inner">
                                        {{-- Mini Dashboard Header --}}
                                        <div class="bg-white border-b border-slate-200 py-1.5 px-3 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                                <div class="h-3 w-px bg-slate-200 mx-1"></div>
                                                <span class="font-bold text-slate-600 uppercase text-[5px] md:text-[7px]" x-text="tabs[activeTab].logoText"></span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <div class="w-16 h-3 bg-slate-100 rounded flex items-center px-1 text-[4px] md:text-[6px] text-slate-400">
                                                    <i class="ri-search-line mr-0.5"></i> Search...
                                                </div>
                                                <div class="w-3 h-3 rounded-full bg-slate-200 flex items-center justify-center font-bold text-[5px]">US</div>
                                            </div>
                                        </div>

                                        {{-- Mini Dashboard Grid Body --}}
                                        <div class="flex-1 p-2 md:p-3 grid grid-cols-12 gap-2 bg-slate-50">
                                            {{-- Mini Sidebar --}}
                                            <div class="col-span-3 space-y-1.5 bg-white border border-slate-100 p-1.5 rounded-lg flex flex-col justify-between">
                                                <div class="space-y-1">
                                                    <div class="bg-cyan-50 text-cyan-600 p-1 rounded flex items-center gap-1 font-bold">
                                                        <i class="ri-dashboard-line"></i> Dashboard
                                                    </div>
                                                    <div class="text-slate-400 p-1 rounded flex items-center gap-1 hover:bg-slate-50 hover:text-slate-600 transition-colors">
                                                        <i class="ri-mail-line"></i> Messages
                                                    </div>
                                                    <div class="text-slate-400 p-1 rounded flex items-center gap-1 hover:bg-slate-50 hover:text-slate-600 transition-colors">
                                                        <i class="ri-contacts-line"></i> Directory
                                                    </div>
                                                    <div class="text-slate-400 p-1 rounded flex items-center gap-1 hover:bg-slate-50 hover:text-slate-600 transition-colors">
                                                        <i class="ri-settings-4-line"></i> Settings
                                                    </div>
                                                </div>
                                                <div class="bg-emerald-50 text-emerald-700 p-1 rounded text-[5px] md:text-[6px] font-bold text-center">
                                                    System Online
                                                </div>
                                            </div>

                                            {{-- Mini Dashboard Analytics --}}
                                            <div class="col-span-9 grid grid-cols-12 gap-2">
                                                {{-- Top Card: Profile --}}
                                                <div class="col-span-12 bg-white border border-slate-100 p-2 rounded-lg flex items-center gap-2 relative overflow-hidden shadow-sm">
                                                    <div class="absolute -top-6 -right-6 w-16 h-16 bg-cyan-500/5 blur-[12px] rounded-full"></div>
                                                    <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-slate-200 overflow-hidden shrink-0 border border-slate-100">
                                                        <img src="https://i.pravatar.cc/100?img=49" class="w-full h-full object-cover">
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <span class="block font-bold text-slate-800 text-[6px] md:text-[8px] truncate">Kayla Gibson</span>
                                                        <span class="block text-slate-400 text-[5px] md:text-[6px] truncate">9th Grade Homeroom Teacher</span>
                                                    </div>
                                                </div>

                                                {{-- Lower Cards --}}
                                                <div class="col-span-7 bg-[#0B1E36] p-2 rounded-lg text-white shadow-sm flex flex-col justify-between min-h-[60px] md:min-h-[80px]">
                                                    <div>
                                                        <span class="text-[5px] md:text-[7px] uppercase font-black text-cyan-300 tracking-wider">Active Workspace</span>
                                                        <h5 class="font-bold text-[8px] md:text-[10px] mt-0.5" x-text="tabs[activeTab].logoText"></h5>
                                                    </div>
                                                    <div class="flex items-center gap-1 py-0.5 px-1 bg-white/10 rounded max-w-fit">
                                                        <span class="w-1 h-1 rounded-full bg-emerald-400 animate-pulse"></span>
                                                        <span class="text-[4px] md:text-[5px] font-bold">100% Synced</span>
                                                    </div>
                                                </div>

                                                <div class="col-span-5 bg-white border border-slate-100 p-2 rounded-lg shadow-sm flex flex-col justify-between min-h-[60px] md:min-h-[80px]">
                                                    <span class="text-slate-400 font-bold uppercase text-[5px] md:text-[7px]">Overview Stats</span>
                                                    <div class="space-y-1">
                                                        <div class="flex items-center justify-between text-[5px] md:text-[7px]">
                                                            <span>Deliveries</span>
                                                            <span class="font-bold text-slate-800">12,482</span>
                                                        </div>
                                                        <div class="w-full bg-slate-100 h-1 rounded-full overflow-hidden">
                                                            <div class="bg-cyan-500 h-full rounded-full" style="width: 82%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        {{-- Laptop Keyboard base --}}
                        <div class="w-[104%] -ml-[2%] bg-slate-400 h-2 md:h-3 rounded-b-2xl border-t border-slate-300 shadow-2xl relative z-20 flex justify-center">
                            {{-- Base recess --}}
                            <div class="w-16 md:w-24 h-[1px] md:h-0.5 bg-slate-500/50 rounded-b"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif
@endsection
