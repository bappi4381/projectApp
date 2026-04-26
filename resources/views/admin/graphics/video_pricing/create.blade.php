@extends('layouts.admin')
@section('title', 'Add Video Pricing | Graphics Studio')

@section('content')
<div class="p-8 max-w-7xl mx-auto" x-data="{
    service_name: '',
    pricing_tiers: [
        { title: 'Basic', price: '15', unit: 'per hour', highlight: false, features: [''] },
        { title: 'Medium', price: '20', unit: 'per hour', highlight: true, features: [''] },
        { title: 'Advanced', price: '25', unit: 'per hour', highlight: false, features: [''] }
    ],
    addPricingTier() { this.pricing_tiers.push({ title: '', price: '', unit: 'per hour', highlight: false, features: [''] }) },
    removePricingTier(index) { this.pricing_tiers.splice(index, 1) },
    addTierFeature(tierIndex) { this.pricing_tiers[tierIndex].features.push('') },
    removeTierFeature(tierIndex, featIndex) { this.pricing_tiers[tierIndex].features.splice(featIndex, 1) }
}">

    <div class="flex items-center gap-4 mb-10">
        <a href="{{ route('admin.graphics.video-pricing.index') }}" class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-400 hover:text-white transition-all border border-white/5">
            <i class="ri-arrow-left-line"></i>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Create Video Pricing</h1>
            <p class="text-slate-500 text-sm font-medium">Add a new pricing group for video production.</p>
        </div>
    </div>

    <form action="{{ route('admin.graphics.video-pricing.store') }}" method="POST" class="space-y-10">
        @csrf

        {{-- Basic Info --}}
        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-[10px] uppercase font-black text-slate-500 mb-3 ml-1 tracking-widest">Service Name (e.g. Video Editing)</label>
                    <input type="text" name="service_name" x-model="service_name" required placeholder="Enter service name..." class="w-full bg-slate-900 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all shadow-inner">
                </div>
                <div class="flex items-end pb-4">
                    <label class="flex items-center gap-4 cursor-pointer group">
                        <div class="relative">
                            <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                            <div class="w-14 h-8 bg-slate-800 rounded-full peer peer-checked:bg-emerald-500 transition-all border border-white/10"></div>
                            <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-all peer-checked:translate-x-6 shadow-lg"></div>
                        </div>
                        <span class="text-sm font-bold text-slate-400 group-hover:text-white transition-colors">Visible on Website</span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Pricing Tiers Builder --}}
        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-500/20 flex items-center justify-center border border-indigo-500/20">
                        <i class="ri-price-tag-3-line text-xl text-indigo-400"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white tracking-tight">Pricing Strategy</h3>
                        <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mt-1">Define Basic, Standard & Premium tiers</p>
                    </div>
                </div>
                <button type="button" @click="addPricingTier()"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase tracking-widest rounded-2xl transition-all shadow-xl shadow-indigo-500/20 flex items-center gap-2">
                    <i class="ri-add-line text-lg"></i> Add Pricing Tier
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                <template x-for="(tier, tIndex) in pricing_tiers" :key="tIndex">
                    <div class="p-8 bg-white/5 border border-white/10 rounded-[2.5rem] relative group transition-all hover:bg-white/[0.08]" :class="tier.highlight ? 'border-indigo-500/50 shadow-2xl shadow-indigo-500/10' : ''">
                        <button type="button" @click="removePricingTier(tIndex)"
                            class="absolute -top-3 -right-3 w-10 h-10 bg-slate-900 border border-white/10 text-rose-500 rounded-2xl flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all shadow-2xl z-10 hover:bg-rose-500 hover:text-white">
                            <i class="ri-delete-bin-7-line text-lg"></i>
                        </button>

                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="checkbox" :name="'pricing_tiers['+tIndex+'][highlight]'" x-model="tier.highlight" class="w-5 h-5 rounded-lg bg-slate-800 border-white/10 text-indigo-600 focus:ring-0">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Highlight Tier</span>
                                </label>
                            </div>

                            <div class="space-y-4">
                                <input type="text" :name="'pricing_tiers['+tIndex+'][title]'" x-model="tier.title" placeholder="Tier Name (e.g. Basic)" class="w-full bg-slate-900 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] uppercase font-black text-slate-500 mb-2 ml-1">Price ($)</label>
                                        <input type="text" :name="'pricing_tiers['+tIndex+'][price]'" x-model="tier.price" placeholder="50.00" class="w-full bg-slate-900 border border-white/10 rounded-2xl px-6 py-3 text-sm font-bold text-indigo-400 focus:outline-none focus:border-indigo-500 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] uppercase font-black text-slate-500 mb-2 ml-1">Unit</label>
                                        <input type="text" :name="'pricing_tiers['+tIndex+'][unit]'" x-model="tier.unit" placeholder="per hour" class="w-full bg-slate-900 border border-white/10 rounded-2xl px-6 py-3 text-sm font-bold text-slate-400 focus:outline-none focus:border-indigo-500 transition-all">
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 pt-4 border-t border-white/5">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-500">Features</h4>
                                    <button type="button" @click="addTierFeature(tIndex)" class="w-7 h-7 rounded-lg bg-indigo-500/10 text-indigo-400 flex items-center justify-center hover:bg-indigo-500 hover:text-white transition-all">
                                        <i class="ri-add-line"></i>
                                    </button>
                                </div>
                                <div class="space-y-3">
                                    <template x-for="(feat, fIndex) in tier.features" :key="fIndex">
                                        <div class="flex items-center gap-3 group/feat">
                                            <input type="text" :name="'pricing_tiers['+tIndex+'][features]['+fIndex+']'" x-model="tier.features[fIndex]" placeholder="Feature description..." class="flex-1 bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-[11px] text-white focus:outline-none focus:border-indigo-500 transition-all">
                                            <button type="button" @click="removeTierFeature(tIndex, fIndex)" class="w-8 h-8 rounded-xl bg-rose-500/10 text-rose-500 opacity-0 group-hover/feat:opacity-100 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <div class="flex justify-end gap-4 pt-6">
            <a href="{{ route('admin.graphics.video-pricing.index') }}" class="px-8 py-4 bg-white/5 text-slate-400 hover:text-white text-[11px] font-black uppercase tracking-widest rounded-2xl transition-all border border-white/5">Cancel</a>
            <button type="submit" class="px-12 py-4 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase tracking-widest rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95">Save Pricing Table</button>
        </div>
    </form>
</div>
@endsection
