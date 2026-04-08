@extends('layouts.admin')
@section('title', 'Edit Service | Graphics Studio')

@section('content')
    <div class="p-8">
        <div class="mb-10 reveal">
            <a href="{{ route('admin.graphics.services.index') }}"
                class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-2 mb-4">
                <i class="ri-arrow-left-line"></i> Back to Services
            </a>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit Service</h1>
            <p class="text-slate-400 font-medium">Update design service offering: {{ $service->name }}</p>
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

        <div
            class="glass-card rounded-[32px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-1 p-10">
            <form action="{{ route('admin.graphics.services.update', $service->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-10" x-data="{ 
                features: {{ json_encode($service->features ?? []) }},
                faqs: {{ json_encode($service->faqs ?? []) }},
                methods: {{ json_encode($service->methods ?? []) }},
                complexities: {{ json_encode($service->complexities ?? []) }},
                addFeature() { this.features.push({ name: '', price: '' }) },
                removeFeature(index) { this.features.splice(index, 1) },
                addFaq() { this.faqs.push({ question: '', answer: '' }) },
                removeFaq(index) { this.faqs.splice(index, 1) },
                addMethod() { this.methods.push({ title: '', description: '' }) },
                removeMethod(index) { this.methods.splice(index, 1) },
                addComplexity() { this.complexities.push({ id: null, name: '', description: '', price: '', image_before: null, image_after: null }) },
                removeComplexity(index) { this.complexities.splice(index, 1) }
            }">

                @csrf
                @method('PUT')

                {{-- 1. Core Identity --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-4 mb-4">
                        <span
                            class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">01</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Core Identity</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Service
                                Name</label>
                            <input type="text" name="name" value="{{ old('name', $service->name) }}" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                        </div>

                        <div>
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Icon
                                Class (RemixIcon)</label>
                            <div class="relative">
                                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 pl-14 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                                <div class="absolute left-6 top-1/2 -translate-y-1/2 text-indigo-400">
                                    <i class="{{ $service->icon ?? 'ri-image-line' }} text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Primary
                                Category</label>
                            <select name="category_id" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Navigation
                                Sub-Group</label>
                            <select name="sub_category_id" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark">
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $service->sub_category_id) == $subCategory->id ? 'selected' : '' }}>
                                        {{ $subCategory->name }} ({{ $subCategory->category->name ?? 'No Parent' }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- 2. Pricing Architecture --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-4 mb-4">
                        <span
                            class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">02</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Pricing Architecture</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="space-y-3">
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Starting
                                Price ($)</label>
                            <input type="number" step="0.01" name="starting_price"
                                value="{{ old('starting_price', $service->starting_price) }}"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                            <input type="text" name="price_unit"
                                value="{{ old('price_unit', $service->price_unit ?? 'per image') }}"
                                placeholder="e.g. per image"
                                class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400 focus:outline-none focus:border-indigo-500 transition-all">
                        </div>
                        <div class="space-y-3">
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Daily
                                Capacity (Units)</label>
                            <input type="number" name="delivery_capacity"
                                value="{{ old('delivery_capacity', $service->delivery_capacity) }}" placeholder="e.g. 5000"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                            <input type="text" name="delivery_unit"
                                value="{{ old('delivery_unit', $service->delivery_unit ?? 'Images/day') }}"
                                placeholder="e.g. Images/day"
                                class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400 focus:outline-none focus:border-indigo-500 transition-all">
                        </div>
                        <div class="space-y-3">
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Bulk
                                Discount (%)</label>
                            <input type="number" name="discount_upto"
                                value="{{ old('discount_upto', $service->discount_upto) }}" placeholder="e.g. 40"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                            <input type="text" name="discount_tag"
                                value="{{ old('discount_tag', $service->discount_tag ?? 'on bulk order') }}"
                                placeholder="e.g. on bulk order"
                                class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400 focus:outline-none focus:border-indigo-500 transition-all">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label
                            class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Service
                            Variants & Features</label>
                        <div class="space-y-4">
                            <template x-for="(feature, index) in features" :key="index">
                                <div class="flex gap-4 items-center animate-in fade-in slide-in-from-left-4 duration-300">
                                    <div class="flex-1">
                                        <input type="text" :name="'features['+index+'][name]'" x-model="feature.name"
                                            placeholder="Feature Name (e.g. Complex Retouching)"
                                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-3 text-xs font-medium text-white focus:outline-none focus:border-indigo-500 transition-all">
                                    </div>
                                    <div class="w-32">
                                        <input type="text" :name="'features['+index+'][price]'" x-model="feature.price"
                                            placeholder="Price ($0.00)"
                                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-3 text-xs font-bold text-indigo-400 focus:outline-none focus:border-indigo-500 transition-all">
                                    </div>
                                    <button type="button" @click="removeFeature(index)"
                                        class="w-10 h-10 rounded-xl bg-rose-500/10 text-rose-500 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </div>
                            </template>
                            <button type="button" @click="addFeature()"
                                class="inline-flex items-center gap-2 py-3 px-6 bg-slate-900 border border-white/5 rounded-2xl hover:bg-slate-800 transition-all text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-white">
                                <i class="ri-add-line"></i> Add Pricing Variant
                            </button>
                        </div>
                    </div>

                    {{-- NEW: FAQs --}}
                    <div class="space-y-4 mt-12">
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Frequently Asked Questions</label>
                        <div class="space-y-4">
                            <template x-for="(faq, index) in faqs" :key="index">
                                <div class="p-6 bg-white/5 border border-white/10 rounded-3xl space-y-4">
                                    <input type="text" :name="'faqs['+index+'][question]'" x-model="faq.question" placeholder="Question" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-xs text-white">
                                    <textarea :name="'faqs['+index+'][answer]'" x-model="faq.answer" placeholder="Answer" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-xs text-slate-400 h-20"></textarea>
                                    <button type="button" @click="removeFaq(index)" class="text-[10px] text-rose-500 font-bold uppercase tracking-widest">Remove FAQ</button>
                                </div>
                            </template>
                            <button type="button" @click="addFaq()" class="text-[10px] font-black text-indigo-400 uppercase tracking-widest">+ Add FAQ</button>
                        </div>
                    </div>

                    {{-- NEW: Methods (How it works) --}}
                    <div class="space-y-4 mt-12">
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Workflow Methods (How to apply)</label>
                        <div class="space-y-4">
                            <template x-for="(method, index) in methods" :key="index">
                                <div class="p-6 bg-white/5 border border-white/10 rounded-3xl space-y-4">
                                    <input type="text" :name="'methods['+index+'][title]'" x-model="method.title" placeholder="Method Title" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-xs text-white">
                                    <textarea :name="'methods['+index+'][description]'" x-model="method.description" placeholder="Short Description" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-xs text-slate-400 h-20"></textarea>
                                    <button type="button" @click="removeMethod(index)" class="text-[10px] text-rose-500 font-bold uppercase tracking-widest">Remove Method</button>
                                </div>
                            </template>
                            <button type="button" @click="addMethod()" class="text-[10px] font-black text-emerald-400 uppercase tracking-widest">+ Add Method</button>
                        </div>
                    </div>
                </div>

                {{-- NEW SECTION: Professional Complexities --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">03</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Professional Complexities (Before/After Grid)</h2>
                    </div>

                    <div class="space-y-8">
                        <template x-for="(comp, index) in complexities" :key="index">
                            <div class="glass-card p-8 rounded-3xl border border-white/5 space-y-6">
                                <input type="hidden" :name="'complexities['+index+'][id]'" :value="comp.id">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <input type="text" :name="'complexities['+index+'][name]'" x-model="comp.name" placeholder="Complexity Name (e.g. Basic Clipping Path)" class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-sm text-white">
                                    <input type="text" :name="'complexities['+index+'][price]'" x-model="comp.price" placeholder="Starting Price (e.g. $0.49)" class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-sm text-indigo-400 font-bold">
                                </div>
                                <textarea :name="'complexities['+index+'][description]'" x-model="comp.description" placeholder="Detailed Description for this complexity..." class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-xs text-slate-400 h-24 resize-none"></textarea>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                                    <div class="space-y-2">
                                        <label class="text-[10px] uppercase font-black text-slate-500 ml-1">Before Image</label>
                                        <div class="flex items-center gap-4">
                                            <div class="w-16 h-16 rounded-xl bg-slate-800 shrink-0 overflow-hidden border border-white/5">
                                                <img x-show="comp.image_before" :src="comp.image_before ? '/storage/'+comp.image_before : ''" class="w-full h-full object-cover">
                                            </div>
                                            <input type="file" :name="'complexities['+index+'][image_before]'" class="text-[10px] text-slate-500">
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-[10px] uppercase font-black text-slate-500 ml-1">After Image</label>
                                        <div class="flex items-center gap-4">
                                            <div class="w-16 h-16 rounded-xl bg-slate-800 shrink-0 overflow-hidden border border-white/5">
                                                <img x-show="comp.image_after" :src="comp.image_after ? '/storage/'+comp.image_after : ''" class="w-full h-full object-cover">
                                            </div>
                                            <input type="file" :name="'complexities['+index+'][image_after]'" class="text-[10px] text-slate-500">
                                        </div>
                                    </div>
                                </div>

                                <button type="button" @click="removeComplexity(index)" class="text-[10px] text-rose-500 font-bold uppercase tracking-widest mt-4">Delete Complexity Category</button>
                            </div>
                        </template>
                        <button type="button" @click="addComplexity()" class="w-full py-6 border-2 border-dashed border-white/10 rounded-3xl text-sm font-black text-slate-500 hover:border-indigo-500 hover:text-indigo-400 transition-all">+ Add New Complexity Category</button>
                    </div>
                </div>
                </div>

                {{-- 3. Media Transformation --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-4 mb-4">
                        <span
                            class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">04</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Main Media Transformation</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div
                            x-data="{ preview: '{{ $service->image_before ? asset('storage/' . $service->image_before) : '' }}' }">
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Before
                                Transformation</label>
                            <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl">
                                <div
                                    class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5">
                                    <template x-if="preview">
                                        <img :src="preview" class="w-full h-full object-cover">
                                    </template>
                                    <template x-if="!preview">
                                        <div class="w-full h-full flex items-center justify-center text-slate-600"><i
                                                class="ri-image-2-line text-2xl"></i></div>
                                    </template>
                                </div>
                                <input type="file" name="image_before"
                                    @change="preview = URL.createObjectURL($event.target.files[0])"
                                    class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-indigo-500/10 file:text-indigo-400 hover:file:bg-indigo-500/20 transition-all">
                            </div>
                        </div>

                        <div
                            x-data="{ preview: '{{ $service->image_after ? asset('storage/' . $service->image_after) : '' }}' }">
                            <label
                                class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">After
                                Transformation</label>
                            <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl">
                                <div
                                    class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5">
                                    <template x-if="preview">
                                        <img :src="preview" class="w-full h-full object-cover">
                                    </template>
                                    <template x-if="!preview">
                                        <div class="w-full h-full flex items-center justify-center text-slate-600"><i
                                                class="ri-image-2-line text-2xl"></i></div>
                                    </template>
                                </div>
                                <input type="file" name="image_after"
                                    @change="preview = URL.createObjectURL($event.target.files[0])"
                                    class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-emerald-500/10 file:text-emerald-400 hover:file:bg-emerald-500/20 transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 4. Narrative & Status --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-4 mb-4">
                        <span
                            class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">05</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Narrative & Visibility</h2>
                    </div>

                    <div>
                        <label
                            class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Service
                            Description</label>
                        <textarea name="description" rows="5"
                            class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-indigo-500 transition-all resize-none">{{ old('description', $service->description) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between p-6 bg-slate-900/50 rounded-2xl border border-white/5">
                        <div>
                            <h4 class="text-sm font-bold text-white">Active Status</h4>
                            <p class="text-[10px] text-slate-500 font-medium">Determines if the service is visible on the
                                client-facing portal.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" class="sr-only peer" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                            <div
                                class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600">
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('admin.graphics.services.index') }}"
                        class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">Cancel</a>
                    <button type="submit"
                        class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95">
                        Commit Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection