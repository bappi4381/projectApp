@extends('layouts.admin')
@section('title', 'Edit Primary Vertical | Graphics Studio')

@section('content')
<div class="p-8">
    <div class="mb-10 reveal">
        <a href="{{ route('admin.graphics.categories.index') }}" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-2 mb-4">
            <i class="ri-arrow-left-line"></i> Back to Architecture
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit Vertical: {{ $category->name }}</h1>
        <p class="text-slate-400 font-medium text-sm">Update the Level 1 architectural grouping.</p>
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
        hasDetails: {{ $category->has_details ? 'true' : 'false' }},
        features: {{ json_encode($category->features ?? []) }},
        faqs: {{ json_encode($category->faqs ?? []) }},
        methods: {{ json_encode($category->methods ?? []) }},
        addFeature() { this.features.push({ name: '', price: '' }) },
        removeFeature(index) { this.features.splice(index, 1) },
        addFaq() { this.faqs.push({ question: '', answer: '' }) },
        removeFaq(index) { this.faqs.splice(index, 1) },
        addMethod() { this.methods.push({ title: '', description: '' }) },
        removeMethod(index) { this.methods.splice(index, 1) }
    }">
        <form action="{{ route('admin.graphics.categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf
            @method('PUT')

            {{-- 1. Core Identity --}}
            <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-1">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">01</span>
                    <h2 class="text-xl font-bold text-white tracking-tight">Core Identity</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Vertical Name</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" required 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Icon Class</label>
                        <input type="text" name="icon" value="{{ old('icon', $category->icon) }}" 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                    </div>
                </div>

                {{-- Toggle: Has Details Page --}}
                <div class="mt-10 p-6 bg-indigo-500/5 rounded-3xl border border-indigo-500/10 flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Has Dedicated Landing Page?</h4>
                        <p class="text-[10px] text-slate-500 font-medium">If enabled, this vertical will have its own URL and rich content sections.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="has_details" class="sr-only peer" x-model="hasDetails" value="1">
                        <div class="w-14 h-7 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        <span class="ml-3 text-xs font-black uppercase tracking-widest" :class="hasDetails ? 'text-indigo-400' : 'text-slate-600'" x-text="hasDetails ? 'Yes' : 'No'"></span>
                    </label>
                </div>
            </div>

            {{-- 2. Rich Content Section (Conditional) --}}
            <div x-show="hasDetails" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-10">
                
                <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xs">02</span>
                        <h2 class="text-xl font-bold text-white tracking-tight">Landing Page Content</h2>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Landing Page Description</label>
                            <textarea name="description" rows="4" class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-emerald-500 transition-all resize-none">{{ old('description', $category->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div x-data="{ preview: '{{ $category->image_before ? asset('storage/'.$category->image_before) : '' }}' }">
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Before Image</label>
                                <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl">
                                    <div class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5">
                                        <template x-if="preview">
                                            <img :src="preview" class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!preview">
                                            <div class="w-full h-full flex items-center justify-center text-slate-600"><i class="ri-image-2-line text-2xl"></i></div>
                                        </template>
                                    </div>
                                    <input type="file" name="image_before" @change="preview = URL.createObjectURL($event.target.files[0])" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-emerald-500/10 file:text-emerald-400 hover:file:bg-emerald-500/20 transition-all">
                                </div>
                            </div>
                            <div x-data="{ preview: '{{ $category->image_after ? asset('storage/'.$category->image_after) : '' }}' }">
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">After Image</label>
                                <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl">
                                    <div class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5">
                                        <template x-if="preview">
                                            <img :src="preview" class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!preview">
                                            <div class="w-full h-full flex items-center justify-center text-slate-600"><i class="ri-image-2-line text-2xl"></i></div>
                                        </template>
                                    </div>
                                    <input type="file" name="image_after" @change="preview = URL.createObjectURL($event.target.files[0])" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-emerald-500/10 file:text-emerald-400 hover:file:bg-emerald-500/20 transition-all">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Starting Price ($)</label>
                                <input type="number" step="0.01" name="starting_price" value="{{ old('starting_price', $category->starting_price) }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-sm font-bold text-white focus:outline-none focus:border-emerald-500 transition-all">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Price Unit</label>
                                <input type="text" name="price_unit" value="{{ old('price_unit', $category->price_unit) }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-sm font-bold text-white focus:outline-none focus:border-emerald-500 transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold text-white tracking-tight">FAQ Builder</h3>
                            <button type="button" @click="addFaq()" class="text-[10px] font-black uppercase text-indigo-400 hover:text-indigo-300">+ Add FAQ</button>
                        </div>
                        <div class="space-y-4">
                            <template x-for="(faq, index) in faqs" :key="index">
                                <div class="p-4 bg-white/5 border border-white/10 rounded-2xl relative group">
                                    <button type="button" @click="removeFaq(index)" class="absolute -top-2 -right-2 w-6 h-6 bg-rose-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <i class="ri-close-line text-xs"></i>
                                    </button>
                                    <input type="text" :name="'faqs['+index+'][question]'" x-model="faq.question" placeholder="Question" class="w-full bg-transparent border-none text-xs font-bold text-white focus:ring-0 mb-2">
                                    <textarea :name="'faqs['+index+'][answer]'" x-model="faq.answer" placeholder="Answer..." class="w-full bg-transparent border-none text-[11px] text-slate-400 focus:ring-0 resize-none h-20"></textarea>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold text-white tracking-tight">Work Methods</h3>
                            <button type="button" @click="addMethod()" class="text-[10px] font-black uppercase text-emerald-400 hover:text-emerald-300">+ Add Step</button>
                        </div>
                        <div class="space-y-4">
                            <template x-for="(method, index) in methods" :key="index">
                                <div class="p-4 bg-white/5 border border-white/10 rounded-2xl relative group">
                                    <button type="button" @click="removeMethod(index)" class="absolute -top-2 -right-2 w-6 h-6 bg-rose-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <i class="ri-close-line text-xs"></i>
                                    </button>
                                    <input type="text" :name="'methods['+index+'][title]'" x-model="method.title" placeholder="Step Title" class="w-full bg-transparent border-none text-xs font-bold text-white focus:ring-0 mb-2">
                                    <textarea :name="'methods['+index+'][description]'" x-model="method.description" placeholder="Describe the process..." class="w-full bg-transparent border-none text-[11px] text-slate-400 focus:ring-0 resize-none h-20"></textarea>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('admin.graphics.categories.index') }}" class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">Cancel</a>
                <button type="submit" class="px-12 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95">
                    Update Primary Vertical
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
