@extends('layouts.admin')
@section('title', 'Edit Variant Details | Admin')

@section('content')
<div class="p-8">
    <div class="mb-10 reveal">
        <a href="{{ route('admin.graphics.variants.index') }}" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-2 mb-4">
            <i class="ri-arrow-left-line"></i> Back to Variants List
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit Variant: {{ $variant->name }}</h1>
        <p class="text-slate-400 font-medium text-sm italic">Modify the dedicated landing page and details for this Level 4 variant.</p>
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
        hasDetails: true,
        selectedParent: '{{ old('parent_id', $variant->parent_id) }}',
        selectedVariantName: '{{ old('name', $variant->name) }}',
        variantList: [],
        startingPrice: '{{ old('starting_price', $variant->starting_price) }}',
        priceUnit: '{{ old('price_unit', $variant->price_unit) }}',
        faqs: {{ json_encode($variant->faqs ?? []) }},
        methods: {{ json_encode($variant->methods ?? []) }}.map(m => ({ ...m, preview: m.image ? '{{ asset("storage") }}/' + m.image : null })),
        
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

        addFaq() { this.faqs.push({ question: '', answer: '' }) },
        removeFaq(index) { this.faqs.splice(index, 1) },
        
        addMethod() { this.methods.push({ title: '', description: '', image: null, preview: null }) },
        removeMethod(index) { this.methods.splice(index, 1) },
        handleMethodImage(index, event) {
            const file = event.target.files[0];
            if (file) {
                this.methods[index].preview = URL.createObjectURL(file);
            }
        }
    }">
        <script>
            const parentData = @json($parentServices);
        </script>

        <form action="{{ route('admin.graphics.variants.update', $variant->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf
            @method('PUT')

            {{-- 1. Structural Identity --}}
            <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-1">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">01</span>
                    <h2 class="text-xl font-bold text-white tracking-tight">Hierarchy Configuration</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Parent Group (SubCategory) --}}
                    <div>
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Parent Group (SubCategory)</label>
                        <select name="sub_category_id" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark shadow-inner">
                            @foreach($subCategories as $sub)
                                <option value="{{ $sub->id }}" {{ old('sub_category_id', $variant->sub_category_id) == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->name }} ({{ $sub->category->name ?? 'L1' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Parent Service (L3) --}}
                    <div>
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Parent Service (L3)</label>
                        <select name="parent_id" x-model="selectedParent" @change="updateVariants()" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark shadow-inner">
                            <option value="">-- Select Parent Service --</option>
                            @foreach($parentServices as $ps)
                                <option value="{{ $ps->id }}">{{ $ps->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Variant Name Dropdown (L4) --}}
                    <div>
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Variant Name (L4)</label>
                        <select name="name" x-model="selectedVariantName" @change="autoFillDetails()" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark shadow-inner">
                            <option value="">-- Select Name --</option>
                            <template x-for="v in variantList" :key="v.name">
                                <option :value="v.name" x-text="v.name" :selected="v.name === selectedVariantName"></option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Icon Class</label>
                        <input type="text" name="icon" value="{{ old('icon', $variant->icon) }}" 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all shadow-inner">
                    </div>
                    <div class="p-6 bg-emerald-500/5 rounded-3xl border border-emerald-500/10 flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-bold text-white mb-1">Status & Details</h4>
                            <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Always enabled for dedicated variants</p>
                        </div>
                         <div class="flex items-center gap-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer" value="1" {{ $variant->is_active ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-emerald-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                <span class="ml-3 text-[10px] font-black uppercase text-slate-500">Active</span>
                            </label>
                            <input type="hidden" name="has_details" value="1">
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. Detail Data Section (Rich Content) --}}
            <div class="space-y-10">
                <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xs">02</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Variant Landing Page Content</h2>
                    </div>

                    <div class="space-y-8">
                         <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Detailed Description</label>
                            <textarea name="description" rows="5" placeholder="Explain this specific variant in detail..." 
                                class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-emerald-500 transition-all resize-none shadow-inner">{{ old('description', $variant->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div x-data="{ preview: '{{ $variant->image_before ? asset('storage/'.$variant->image_before) : '' }}' }">
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Before Image</label>
                                <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl group hover:bg-white/[0.08] transition-all">
                                    <div class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5 shadow-xl">
                                        <template x-if="preview"><img :src="preview" class="w-full h-full object-cover"></template>
                                        <template x-if="!preview"><div class="w-full h-full flex items-center justify-center text-slate-600"><i class="ri-image-2-line text-2xl"></i></div></template>
                                    </div>
                                    <input type="file" name="image_before" @change="preview = URL.createObjectURL($event.target.files[0])" class="text-xs text-slate-400">
                                </div>
                            </div>
                            <div x-data="{ preview: '{{ $variant->image_after ? asset('storage/'.$variant->image_after) : '' }}' }">
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">After Image</label>
                                <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl group hover:bg-white/[0.08] transition-all">
                                    <div class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5 shadow-xl">
                                        <template x-if="preview"><img :src="preview" class="w-full h-full object-cover"></template>
                                        <template x-if="!preview"><div class="w-full h-full flex items-center justify-center text-slate-600"><i class="ri-image-2-line text-2xl"></i></div></template>
                                    </div>
                                    <input type="file" name="image_after" @change="preview = URL.createObjectURL($event.target.files[0])" class="text-xs text-slate-400">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="space-y-3">
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Starting Price ($)</label>
                                <input type="number" step="0.01" name="starting_price" x-model="startingPrice" class="w-full bg-indigo-500/10 border border-indigo-500/20 rounded-2xl px-6 py-4 text-sm font-black text-indigo-400 shadow-inner">
                            </div>
                            <div class="space-y-3">
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Unit</label>
                                <input type="text" name="price_unit" x-model="priceUnit" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-inner">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    {{-- FAQ Builder --}}
                    <div class="glass-card rounded-[32px] border-white/5 p-10">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold text-white tracking-tight">Variant Specific FAQs</h3>
                            <button type="button" @click="addFaq()" class="text-[10px] font-black uppercase text-indigo-400 transition-colors hover:text-indigo-300">+ Add FAQ</button>
                        </div>
                        <div class="space-y-4">
                            <template x-for="(faq, index) in faqs" :key="index">
                                <div class="p-4 bg-white/5 border border-white/10 rounded-2xl relative group">
                                    <button type="button" @click="removeFaq(index)" class="absolute -top-2 -right-2 w-6 h-6 bg-rose-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg">
                                        <i class="ri-close-line text-xs"></i>
                                    </button>
                                    <input type="text" :name="'faqs['+index+'][question]'" x-model="faq.question" placeholder="Question" class="w-full bg-transparent border-none text-xs font-bold text-white focus:ring-0 mb-2">
                                    <textarea :name="'faqs['+index+'][answer]'" x-model="faq.answer" placeholder="Answer..." class="w-full bg-transparent border-none text-[11px] text-slate-400 focus:ring-0 resize-none h-20"></textarea>
                                </div>
                            </template>
                        </div>
                    </div>

                    {{-- Method Builder --}}
                    <div class="glass-card rounded-[32px] border-white/5 p-10">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold text-white tracking-tight">Work Methods</h3>
                            <button type="button" @click="addMethod()" class="text-[10px] font-black uppercase text-emerald-400 transition-colors hover:text-emerald-300">+ Add Step</button>
                        </div>
                        <div class="space-y-6">
                            <template x-for="(method, index) in methods" :key="index">
                                <div class="p-6 bg-white/5 border border-white/10 rounded-[2rem] relative group transition-all hover:bg-white/[0.08]">
                                    <button type="button" @click="removeMethod(index)" class="absolute -top-3 -right-3 w-8 h-8 bg-rose-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg z-10">
                                        <i class="ri-close-line text-lg"></i>
                                    </button>
                                    
                                    <div class="flex flex-col md:flex-row gap-6">
                                        <div class="w-full md:w-28 shrink-0">
                                            <div class="aspect-square rounded-2xl bg-slate-800 border-2 border-dashed border-white/10 overflow-hidden relative group/img cursor-pointer flex items-center justify-center">
                                                <template x-if="method.preview">
                                                    <img :src="method.preview" class="w-full h-full object-cover">
                                                </template>
                                                <template x-if="!method.preview">
                                                    <div class="text-center">
                                                        <i class="ri-image-add-line text-xl text-slate-600"></i>
                                                        <p class="text-[7px] text-slate-500 uppercase font-black tracking-tighter mt-1 px-1 leading-none">Step Image</p>
                                                    </div>
                                                </template>
                                                <input type="file" :name="'methods['+index+'][image]'" @change="handleMethodImage(index, $event)" class="absolute inset-0 opacity-0 cursor-pointer">
                                            </div>
                                            <template x-if="method.image && !method.preview.startsWith('blob:')">
                                                <input type="hidden" :name="'methods['+index+'][old_image]'" :value="method.image">
                                            </template>
                                        </div>

                                        <div class="flex-1 space-y-2">
                                            <input type="text" :name="'methods['+index+'][title]'" x-model="method.title" placeholder="Step Title" class="w-full bg-transparent border-none text-[13px] font-bold text-white focus:ring-0 p-0 placeholder:text-slate-600">
                                            <textarea :name="'methods['+index+'][description]'" x-model="method.description" placeholder="Describe the process..." class="w-full bg-transparent border-none text-[11px] text-slate-400 focus:ring-0 resize-none h-20 p-0 placeholder:text-slate-700 font-medium"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('admin.graphics.variants.index') }}" class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">Cancel</a>
                <button type="submit" class="px-12 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl shadow-xl shadow-indigo-500/20 active:scale-95 transition-all">
                    Update Variant Details
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
