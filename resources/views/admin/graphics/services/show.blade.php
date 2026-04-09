@extends('layouts.admin')
@section('title', 'Service Detail Preview | Admin')

@section('content')
<div class="p-8">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-10 reveal">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <a href="{{ route('admin.graphics.services.index') }}" class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all">
                    <i class="ri-arrow-left-line"></i>
                </a>
                <h1 class="text-3xl font-bold text-white tracking-tight">{{ $service->name }}</h1>
                @if($service->parent_id)
                    <span class="px-3 py-1 rounded-full bg-violet-500/10 border border-violet-500/20 text-violet-400 text-[10px] font-black uppercase tracking-widest">Level 4 Variant</span>
                @else
                    <span class="px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-[10px] font-black uppercase tracking-widest">Level 3 Service</span>
                @endif
            </div>
            <p class="text-slate-400 font-medium text-sm">Pre-visualization of the landing page data and architectural metadata.</p>
        </div>
        <div class="flex items-center gap-3">
             @if($service->has_details)
                <a href="{{ route('graphics.service-detail', $service->slug) }}" target="_blank" class="px-6 py-3 bg-white/5 border border-white/10 text-white font-bold rounded-xl hover:bg-white/10 transition-all flex items-center gap-2">
                    <i class="ri-external-link-line"></i>
                    <span>Live Preview</span>
                </a>
            @endif
            <a href="{{ route('admin.graphics.services.edit', $service) }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/20 flex items-center gap-2">
                <i class="ri-edit-line"></i>
                <span>Edit Content</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- Left Column: Main Content Preview --}}
        <div class="lg:col-span-2 space-y-8">
            {{-- Visual Comparison --}}
            <div class="glass-card rounded-[32px] border-white/5 overflow-hidden">
                <div class="p-8 border-b border-white/5 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-white tracking-tight">Before/After Visualization</h3>
                    <div class="flex gap-2">
                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-[10px] font-black rounded-lg border border-emerald-500/20 uppercase">Interactive Slider Active</span>
                    </div>
                </div>
                <div class="relative aspect-video bg-slate-800">
                    <div class="absolute inset-0 flex items-center justify-center">
                        @if($service->image_before && $service->image_after)
                            <div class="w-full h-full grid grid-cols-2">
                                <div class="relative overflow-hidden group">
                                    <img src="{{ asset('storage/' . $service->image_before) }}" class="w-full h-full object-cover grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700">
                                    <div class="absolute bottom-4 left-4 px-3 py-1 bg-black/60 backdrop-blur-md rounded text-[10px] font-black text-white uppercase tracking-widest">Before</div>
                                </div>
                                <div class="relative overflow-hidden group">
                                    <img src="{{ asset('storage/' . $service->image_after) }}" class="w-full h-full object-cover">
                                    <div class="absolute bottom-4 right-4 px-3 py-1 bg-indigo-600 rounded text-[10px] font-black text-white uppercase tracking-widest">After</div>
                                </div>
                            </div>
                        @else
                            <div class="flex flex-col items-center gap-3 text-slate-600">
                                <i class="ri-image-2-line text-5xl"></i>
                                <span class="text-sm font-medium">No comparison images uploaded</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="p-8">
                    <h4 class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-4">Base Description</h4>
                    <p class="text-slate-300 leading-relaxed text-sm italic border-l-2 border-indigo-500/50 pl-6">
                        {{ $service->description ?? 'No description provided for this service yet.' }}
                    </p>
                </div>
            </div>

            {{-- Complexities & Features --}}
            <div class="glass-card rounded-[32px] border-white/5 p-8">
                <h3 class="text-lg font-bold text-white tracking-tight mb-8">Complexity Tiers & Pricing</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($service->features ?? [] as $feature)
                        <div class="flex items-center justify-between p-5 bg-white/5 border border-white/5 rounded-2xl hover:border-indigo-500/30 transition-all group">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 rounded-full bg-indigo-500 shadow-[0_0_10px_rgba(99,102,241,0.5)]"></div>
                                <span class="text-sm font-bold text-white">{{ $feature['name'] }}</span>
                            </div>
                            <span class="text-sm font-black text-emerald-400 font-mono tracking-tighter">{{ $feature['price'] }}</span>
                        </div>
                    @empty
                        <div class="col-span-2 py-10 flex flex-col items-center text-slate-600 border-2 border-dashed border-white/5 rounded-3xl">
                            <i class="ri-price-tag-3-line text-3xl mb-2"></i>
                            <span class="text-xs font-bold uppercase tracking-widest text-slate-500">No Pricing Tiers Defined</span>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Methods & FAQ --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                 {{-- Methods --}}
                <div class="glass-card rounded-[32px] border-white/5 p-8">
                    <h3 class="text-lg font-bold text-white tracking-tight mb-6">Workflow Methods</h3>
                    <div class="space-y-6">
                        @forelse($service->methods ?? [] as $index => $method)
                            <div class="relative pl-8 border-l border-white/10 pb-2">
                                <div class="absolute -left-[5px] top-0 w-[9px] h-[9px] rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                                <h4 class="text-[13px] font-bold text-white mb-2 uppercase tracking-wide">{{ $method['title'] }}</h4>
                                <p class="text-[11px] text-slate-500 leading-relaxed">{{ $method['description'] }}</p>
                            </div>
                        @empty
                             <p class="text-xs text-slate-600 italic">No workflow methods defined.</p>
                        @endforelse
                    </div>
                </div>

                {{-- FAQ --}}
                <div class="glass-card rounded-[32px] border-white/5 p-8">
                    <h3 class="text-lg font-bold text-white tracking-tight mb-6">Frequently Queried</h3>
                    <div class="space-y-4">
                        @forelse($service->faqs ?? [] as $faq)
                            <div class="p-4 bg-white/5 border border-white/5 rounded-2xl">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                                    <h5 class="text-[11px] font-black text-white uppercase">{{ $faq['question'] }}</h5>
                                </div>
                                <p class="text-[11px] text-slate-500 leading-relaxed pl-3 border-l border-indigo-500/20">{{ $faq['answer'] }}</p>
                            </div>
                        @empty
                            <p class="text-xs text-slate-600 italic">No FAQ items defined.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column: Metadata & Sidebar --}}
        <div class="space-y-8">
            {{-- Live Status --}}
            <div class="glass-card rounded-[32px] border-white/5 p-8 text-center bg-white/[0.02]">
                <div class="w-16 h-16 rounded-3xl mx-auto mb-6 flex items-center justify-center {{ $service->is_active ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-slate-800 text-slate-600 border-white/5' }} border text-3xl">
                    <i class="{{ $service->is_active ? 'ri-broadcast-line' : 'ri-eye-off-line' }}"></i>
                </div>
                <h4 class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Current Status</h4>
                <div class="text-2xl font-black {{ $service->is_active ? 'text-emerald-400' : 'text-slate-600' }} tracking-tight mb-6">
                    {{ $service->is_active ? 'LIVE & ACTIVE' : 'DRAFT MODE' }}
                </div>
                <div class="p-4 bg-indigo-500/5 rounded-2xl border border-indigo-500/10 mb-8">
                     <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest block mb-1">Details Page Status</span>
                     <span class="text-xl font-bold text-white tracking-tight">{{ $service->has_details ? 'ENABLED' : 'DISABLED' }}</span>
                </div>
            </div>

            {{-- Hierarchy Card --}}
            <div class="glass-card rounded-[32px] border-white/5 p-8">
                <h3 class="text-sm font-black text-slate-500 uppercase tracking-widest mb-6 border-b border-white/5 pb-4">Internal Hierarchy</h3>
                <div class="space-y-6">
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] font-bold text-slate-600 uppercase">Vertical (L1)</span>
                        <div class="bg-white/5 p-3 rounded-xl border border-white/5 text-sm font-bold text-slate-400">
                             {{ $service->subCategory->category->name ?? 'None' }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] font-bold text-slate-600 uppercase">Service Group (L2)</span>
                        <div class="bg-white/5 p-3 rounded-xl border border-white/5 text-sm font-bold text-slate-400">
                             {{ $service->subCategory->name ?? 'None' }}
                        </div>
                    </div>
                    @if($service->parent)
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] font-bold text-violet-500 uppercase">Primary Service (L3)</span>
                            <div class="bg-violet-500/10 p-3 rounded-xl border border-violet-500/20 text-sm font-bold text-violet-400">
                                {{ $service->parent->name }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sales Intelligence --}}
            <div class="glass-card rounded-[32px] border-white/5 p-8 bg-indigo-600/5">
                <h3 class="text-sm font-black text-slate-500 uppercase tracking-widest mb-6">Operational Stats</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-400">Starting At</span>
                        <span class="text-lg font-black text-white font-mono">${{ number_format($service->starting_price ?? 0, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-400">Capacity</span>
                        <span class="text-sm font-bold text-slate-300">{{ $service->delivery_capacity ?? 'N/A' }} / day</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-400">Discount</span>
                        <span class="text-sm font-black text-emerald-400">{{ $service->discount_upto ?? 0 }}% Max</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
