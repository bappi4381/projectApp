@extends('layouts.admin')
@section('title', 'Edit IT Service | Admin')

@section('content')
    <div class="p-8">
        <div class="mb-10 reveal">
            <a href="{{ route('admin.it.services.index') }}"
                class="text-sm font-bold text-cyan-400 hover:text-cyan-300 transition-colors flex items-center gap-2 mb-4">
                <i class="ri-arrow-left-line"></i> Back to IT Services
            </a>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit IT Service</h1>
            <p class="text-slate-400 font-medium text-sm italic">Modifying enterprise solution: {{ $service->name }}</p>
        </div>

        @if ($errors->any())
            <div class="bg-rose-500/10 border border-rose-500/20 text-rose-500 px-6 py-4 rounded-xl mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div x-data="{ 
                isSubmitting: false,
                hasDetails: {{ $service->has_details ? 'true' : 'false' }},
                features: {{ json_encode($service->features ?? []) }},
                faqs: {{ json_encode($service->faqs ?? []) }},
                addFeature() { this.features.push('') },
                removeFeature(index) { this.features.splice(index, 1) },
                addFaq() { this.faqs.push({ question: '', answer: '' }) },
                removeFaq(index) { this.faqs.splice(index, 1) },
            }">
            <form action="{{ route('admin.it.services.update', $service->id) }}" method="POST"
                class="space-y-10" @submit="isSubmitting = true">
                @csrf
                @method('PUT')

                {{-- 1. General Information --}}
                <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-1">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="w-8 h-8 rounded-lg bg-cyan-500/20 flex items-center justify-center text-cyan-400 font-bold text-xs">01</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">General Information</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Service Name</label>
                            <input type="text" name="name" value="{{ old('name', $service->name) }}" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 transition-all shadow-inner">
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Icon Class (Remix Icon)</label>
                            <input type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 transition-all shadow-inner">
                        </div>
                    </div>

                    <div class="mt-8">
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Short Description</label>
                        <textarea name="description" rows="3"
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 transition-all resize-none shadow-inner">{{ old('description', $service->description) }}</textarea>
                    </div>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{-- Status Toggle --}}
                        <div class="p-6 bg-emerald-500/5 rounded-3xl border border-emerald-500/10 flex items-center justify-between shadow-sm">
                            <div>
                                <h4 class="text-sm font-bold text-white mb-1">Is Active?</h4>
                                <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Enable visibility in frontend</p>
                                <label class="relative inline-flex items-center cursor-pointer mt-4">
                                    <input type="checkbox" name="is_active" class="sr-only peer" value="1" {{ $service->is_active ? 'checked' : '' }}>
                                    <div class="w-14 h-7 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                                </label>
                            </div>
                        </div>

                        {{-- Detail Toggle --}}
                        <div class="p-6 bg-cyan-500/5 rounded-3xl border border-cyan-500/10 flex items-center justify-between shadow-sm">
                            <div>
                                <h4 class="text-sm font-bold text-white mb-1">Has Details View?</h4>
                                <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Toggle for linkable detail page</p>
                                <label class="relative inline-flex items-center cursor-pointer mt-4">
                                    <input type="checkbox" name="has_details" class="sr-only peer" x-model="hasDetails" value="1">
                                    <div class="w-14 h-7 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2. Pricing & Capacity --}}
                <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-2">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xs">02</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Pricing & SLA</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="space-y-3">
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Starting Price ($)</label>
                            <input type="number" step="0.01" name="starting_price" value="{{ old('starting_price', $service->starting_price) }}"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                            <input type="text" name="price_unit" value="{{ old('price_unit', $service->price_unit ?? 'per month') }}"
                                class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400">
                        </div>
                        <div class="space-y-3">
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Support Capacity</label>
                            <input type="number" name="delivery_capacity" value="{{ old('delivery_capacity', $service->delivery_capacity) }}"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                            <input type="text" name="delivery_unit" value="{{ old('delivery_unit', $service->delivery_unit ?? 'Tickets/Month') }}"
                                class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400">
                        </div>
                        <div class="space-y-3">
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Service Discount (%)</label>
                            <input type="number" name="discount_upto" value="{{ old('discount_upto', $service->discount_upto) }}"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                            <input type="text" name="discount_tag" value="{{ old('discount_tag', $service->discount_tag ?? 'Annual Billing') }}"
                                class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400">
                        </div>
                    </div>
                </div>

                {{-- 3. Features --}}
                <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-4">
                            <span class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center text-amber-400 font-bold text-xs">03</span>
                            <h2 class="text-xl font-bold text-white tracking-tight">Key Features</h2>
                        </div>
                        <button type="button" @click="addFeature()"
                            class="px-6 py-2 bg-white/5 text-slate-400 text-[10px] font-black uppercase rounded-full border border-white/5 hover:text-white hover:bg-white/10 transition-all">+ Add Feature</button>
                    </div>
                    
                    <div class="space-y-4">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="flex gap-4 items-center">
                                <input type="text" :name="'features['+index+']'" x-model="features[index]"
                                    placeholder="e.g. 24/7 Monitoring"
                                    class="flex-1 bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-sm text-white focus:outline-none focus:border-cyan-500 transition-all">
                                <button type="button" @click="removeFeature(index)"
                                    class="w-10 h-10 rounded-xl bg-rose-500/10 text-rose-500 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all"><i class="ri-delete-bin-line"></i></button>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- 4. FAQ Builder (Conditional) --}}
                <div x-show="hasDetails" x-cloak x-transition class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-4">
                            <span class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">04</span>
                            <h2 class="text-xl font-bold text-white tracking-tight">Support FAQ</h2>
                        </div>
                        <button type="button" @click="addFaq()"
                            class="text-[10px] font-black uppercase text-cyan-400 hover:text-cyan-300 transition-colors">+ Add FAQ</button>
                    </div>
                    <div class="space-y-6">
                        <template x-for="(faq, index) in faqs" :key="index">
                            <div class="p-6 bg-white/5 border border-white/10 rounded-[2rem] relative group shadow-inner">
                                <button type="button" @click="removeFaq(index)"
                                    class="absolute -top-2 -right-2 w-8 h-8 bg-rose-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg">
                                    <i class="ri-close-line text-lg"></i>
                                </button>
                                <input type="text" :name="'faqs['+index+'][question]'" x-model="faq.question"
                                    placeholder="Support Question"
                                    class="w-full bg-transparent border-none text-sm font-bold text-white focus:ring-0 mb-2 p-0">
                                <textarea :name="'faqs['+index+'][answer]'" x-model="faq.answer"
                                    placeholder="Detailed solution or explanation..."
                                    class="w-full bg-transparent border-none text-[12px] text-slate-400 focus:ring-0 resize-none h-24 p-0 font-medium"></textarea>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('admin.it.services.index') }}"
                        class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">Cancel</a>
                    <button type="submit" :disabled="isSubmitting"
                        class="px-12 py-4 bg-cyan-600 hover:bg-cyan-500 disabled:bg-cyan-400 disabled:cursor-not-allowed text-white font-black uppercase tracking-widest text-[11px] rounded-2xl shadow-xl shadow-cyan-500/20 active:scale-95 flex items-center gap-3">
                        <template x-if="!isSubmitting"><span>Update IT Solution</span></template>
                        <template x-if="isSubmitting">
                            <div class="flex items-center gap-2">
                                <i class="ri-loader-4-line animate-spin text-lg"></i>
                                <span>Updating...</span>
                            </div>
                        </template>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
