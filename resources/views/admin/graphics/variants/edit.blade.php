@extends('layouts.admin')
@section('title', 'Edit Variant Details | Admin')

@section('content')
    <div class="p-8">
        <div class="mb-10 reveal">
            <a href="{{ route('admin.graphics.variants.index') }}"
                class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-2 mb-4">
                <i class="ri-arrow-left-line"></i> Back to Variants List
            </a>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit Variant: {{ $variant->name }}</h1>
            <p class="text-slate-400 font-medium text-sm italic">Modify the dedicated landing page and details for this
                Level 4 variant.</p>
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
            hasDetails: {{ $variant->has_details ? 'true' : 'false' }},
            selectedParent: '{{ old('parent_id', $variant->parent_id) }}',
            selectedVariantName: '{{ old('name', $variant->name) }}',
            variantList: [],
            startingPrice: '{{ old('starting_price', $variant->starting_price) }}',
            priceUnit: '{{ old('price_unit', $variant->price_unit) }}',
            priceUnit: '{{ old('price_unit', $variant->price_unit) }}',
            summaryBullets: {{ json_encode($variant->summary_bullets ?? []) }},

            init() {
                this.updateVariants(true);
            },

            updateVariants(isInit = false) {
                if (!this.selectedParent) {
                    this.variantList = [];
                    return;
                }
                const service = parentData.find(s => s.id == this.selectedParent);
                if (service && service.features) {
                    this.variantList = typeof service.features === 'string' ? JSON.parse(service.features) : service.features;
                } else {
                    this.variantList = [];
                }

                if (!isInit) {
                    this.selectedVariantName = '';
                    this.startingPrice = '';
                }
            },

            autoFillDetails() {
                if (!this.selectedVariantName) return;
                const variant = this.variantList.find(v => v.name === this.selectedVariantName);
                if (variant) {
                    this.startingPrice = variant.price;
                }
            },

            handleMethodImage(index, event) {
                const file = event.target.files[0];
                if (file) {
                    this.methods[index].preview = URL.createObjectURL(file);
                }
            },
            addBullet() { this.summaryBullets.push('') },
            removeBullet(index) { this.summaryBullets.splice(index, 1) }
        }">
            <script>
                const parentData = @json($parentServices);
            </script>

            <form action="{{ route('admin.graphics.variants.update', $variant->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-10">
                @csrf
                @method('PUT')

                {{-- 1. Structural Identity --}}
                <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-1">
                    <div class="flex items-center gap-4 mb-8">
                        <span
                            class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">01</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Hierarchy Configuration</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {{-- Parent Group (SubCategory) --}}
                        <div>
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Parent
                                Group (SubCategory)</label>
                            <select name="sub_category_id" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark shadow-inner">
                                @foreach($subCategories as $sub)
                                    <option value="{{ $sub->id }}" {{ old('sub_category_id', $variant->sub_category_id) == $sub->id ? 'selected' : '' }}>
                                        {{ $sub->name }} ({{ $sub->category->name ?? 'L1' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Parent Service (L3) --}}
                        <div>
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Parent
                                Service (L3)</label>
                            <select name="parent_id" x-model="selectedParent" @change="updateVariants()" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark shadow-inner">
                                <option value="">-- Select Parent Service --</option>
                                @foreach($parentServices as $ps)
                                    <option value="{{ $ps->id }}">{{ $ps->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Variant Name Dropdown (L4) --}}
                        <div>
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Variant
                                Name (L4)</label>
                            <select name="name" x-model="selectedVariantName" @change="autoFillDetails()" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark shadow-inner">
                                <option value="">-- Select Name --</option>
                                <template x-for="v in variantList" :key="v.name">
                                    <option :value="v.name" x-text="v.name" :selected="v.name === selectedVariantName">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {{-- Status Toggle --}}
                        <div
                            class="p-6 bg-emerald-500/5 rounded-3xl border border-emerald-500/10 flex items-center justify-between shadow-sm">
                            <div x-data="{ isActive: {{ $variant->is_active ? 'true' : 'false' }} }">
                                <h4 class="text-sm font-bold text-white mb-1">Is Active?</h4>
                                <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Enable/Disable
                                    visibility</p>
                                <label class="relative inline-flex items-center cursor-pointer mt-4">
                                    <input type="checkbox" name="is_active" class="sr-only peer" x-model="isActive"
                                        value="1" {{ $variant->is_active ? 'checked' : '' }}>
                                    <div
                                        class="w-14 h-7 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600">
                                    </div>
                                    <span class="ml-3 text-xs font-black text-emerald-400"
                                        x-text="isActive ? 'YES' : 'NO'"></span>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="has_details" value="1">
                        <input type="hidden" name="icon" value="{{ $variant->icon ?? 'ri-image-line' }}">
                    </div>
                </div>

                {{-- 2. Detail Data Section (Rich Content) --}}
                <div class="space-y-10">
                    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                        <div class="flex items-center gap-4 mb-8">
                            <span
                                class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xs">02</span>
                            <h2 class="text-xl font-bold text-white tracking-tight">Variant Landing Page Content</h2>
                        </div>

                        <div class="space-y-8">
                            <div>
                                <label
                                    class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Detailed
                                    Description</label>
                                <textarea name="description" rows="5" placeholder="Short description for hero section..."
                                    class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-emerald-500 transition-all resize-none shadow-inner">{{ old('description', $variant->description) }}</textarea>
                            </div>

                            {{-- Summary Bullets --}}
                            <div class="space-y-4 p-8 bg-white/5 rounded-3xl border border-white/5">
                                <div class="flex items-center justify-between mb-4">
                                    <label
                                        class="block text-[11px] uppercase tracking-widest font-black text-slate-500">Summary
                                        Bullets (High Impact)</label>
                                    <button type="button" @click="addBullet()"
                                        class="text-[10px] font-black uppercase text-indigo-400">+ Add Bullet</button>
                                </div>
                                <div class="space-y-3">
                                    <template x-for="(bullet, index) in summaryBullets" :key="index">
                                        <div class="flex gap-4">
                                            <input type="text" :name="'summary_bullets['+index+']'"
                                                x-model="summaryBullets[index]"
                                                placeholder="e.g. Removing mannequins and adding neck joints..."
                                                class="flex-1 bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-xs text-white">
                                            <button type="button" @click="removeBullet(index)" class="text-rose-500"><i
                                                    class="ri-delete-bin-line"></i></button>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">The
                                    Necessity Text (Full Story)</label>
                                <textarea name="necessity_text" rows="5"
                                    placeholder="Explain why this service is essential for the client..."
                                    class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-blue-500 transition-all resize-none shadow-inner">{{ old('necessity_text', $variant->necessity_text) }}</textarea>
                            </div>

                            <div>
                                <label
                                    class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Features
                                    Table Heading</label>
                                <input type="text" name="features_table_heading"
                                    value="{{ old('features_table_heading', $variant->features_table_heading ?? 'Differences between Basic and other Clipping Paths') }}"
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                            </div>

                            <div>
                                <label
                                    class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">YouTube
                                    Showcase Link (Optional)</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-rose-500">
                                        <i class="ri-youtube-fill text-xl"></i></div>
                                    <input type="url" name="video_url" value="{{ old('video_url', $variant->video_url) }}"
                                        placeholder="https://www.youtube.com/watch?v=..."
                                        class="w-full bg-white/5 border border-white/10 rounded-2xl pl-16 pr-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-rose-500 transition-all shadow-inner">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div
                                    x-data="{ preview: '{{ $variant->image_before ? asset('storage/' . $variant->image_before) : '' }}' }">
                                    <label
                                        class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Before
                                        Image</label>
                                    <div
                                        class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl group hover:bg-white/[0.08] transition-all">
                                        <div
                                            class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5 shadow-xl">
                                            <template x-if="preview"><img :src="preview"
                                                    class="w-full h-full object-cover"></template>
                                            <template x-if="!preview">
                                                <div class="w-full h-full flex items-center justify-center text-slate-600">
                                                    <i class="ri-image-2-line text-2xl"></i></div>
                                            </template>
                                        </div>
                                        <input type="file" name="image_before"
                                            @change="preview = URL.createObjectURL($event.target.files[0])"
                                            class="text-xs text-slate-400">
                                    </div>
                                </div>
                                <div
                                    x-data="{ preview: '{{ $variant->image_after ? asset('storage/' . $variant->image_after) : '' }}' }">
                                    <label
                                        class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">After
                                        Image</label>
                                    <div
                                        class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl group hover:bg-white/[0.08] transition-all">
                                        <div
                                            class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5 shadow-xl">
                                            <template x-if="preview"><img :src="preview"
                                                    class="w-full h-full object-cover"></template>
                                            <template x-if="!preview">
                                                <div class="w-full h-full flex items-center justify-center text-slate-600">
                                                    <i class="ri-image-2-line text-2xl"></i></div>
                                            </template>
                                        </div>
                                        <input type="file" name="image_after"
                                            @change="preview = URL.createObjectURL($event.target.files[0])"
                                            class="text-xs text-slate-400">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div class="space-y-3">
                                    <label
                                        class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Starting
                                        Price ($)</label>
                                    <input type="number" step="0.01" name="starting_price" x-model="startingPrice"
                                        class="w-full bg-indigo-500/10 border border-indigo-500/20 rounded-2xl px-6 py-4 text-sm font-black text-indigo-400 shadow-inner">
                                </div>
                                <div class="space-y-3">
                                    <label
                                        class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Unit</label>
                                    <input type="text" name="price_unit" x-model="priceUnit"
                                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label
                                        class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Daily
                                        Delivery Capacity</label>
                                    <input type="number" name="delivery_capacity"
                                        value="{{ old('delivery_capacity', $variant->delivery_capacity) }}"
                                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                                    <input type="text" name="delivery_unit"
                                        value="{{ old('delivery_unit', $variant->delivery_unit ?? 'Images/day') }}"
                                        class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-500">
                                </div>
                                <div class="space-y-3">
                                    <label
                                        class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Discount
                                        Structure</label>
                                    <input type="number" name="discount_upto"
                                        value="{{ old('discount_upto', $variant->discount_upto) }}"
                                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                                    <input type="text" name="discount_tag"
                                        value="{{ old('discount_tag', $variant->discount_tag ?? 'on bulk order') }}"
                                        class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-500">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>

        <div class="flex justify-end gap-4 pt-6">
            <a href="{{ route('admin.graphics.variants.index') }}"
                class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">Cancel</a>
            <button type="submit"
                class="px-12 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl shadow-xl shadow-indigo-500/20 active:scale-95 transition-all">
                Update Variant Details
            </button>
        </div>
        </form>
    </div>
    </div>
@endsection