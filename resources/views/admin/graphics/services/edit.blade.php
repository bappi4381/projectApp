@extends('layouts.admin')
@section('title', 'Edit Service | Graphics Studio')

@section('content')
    <div class="p-8">
        <div class="mb-10 reveal">
            <a href="{{ route('admin.graphics.services.index') }}"
                class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-2 mb-4">
                <i class="ri-arrow-left-line"></i> Back to Services
            </a>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit Service: {{ $service->name }}</h1>
            <p class="text-slate-400 font-medium text-sm italic">Manage service details and hierarchical relationships.</p>
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
                hasDetails: {{ $service->has_details ? 'true' : 'false' }},
                serviceType: '{{ old('service_type', $service->service_type ?? 'image') }}',
                features: {{ json_encode($service->features ?? []) }},
                faqs: {{ json_encode($service->faqs ?? []) }},
                methods: {{ json_encode($service->methods ?? []) }}.map(m => ({ ...m, preview: m.image ? '{{ asset("storage") }}/' + m.image : null })),
                work_samples: {{ json_encode($service->work_samples ?? []) }}.map(s => ({ ...s, preview: (s.type === 'image' && s.file) ? '{{ asset("storage") }}/' + s.file : null, old_file: s.file })),
                addFaq() { this.faqs.push({ question: '', answer: '' }) },
                removeFaq(index) { this.faqs.splice(index, 1) },
                addMethod() { this.methods.push({ title: '', description: '', image: null, preview: null }) },
                removeMethod(index) { this.methods.splice(index, 1) },
                addWorkSample() { this.work_samples.push({ type: 'video', title: '', file: null, url: '', preview: null }) },
                removeWorkSample(index) { this.work_samples.splice(index, 1) },
                handleMethodImage(index, event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.methods[index].preview = URL.createObjectURL(file);
                    }
                },
                handleWorkSampleFile(index, event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.work_samples[index].preview = URL.createObjectURL(file);
                    }
                }
            }">
                <form action="{{ route('admin.graphics.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @method('PUT')

                    {{-- 1. Structural Identity --}}
                    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-1">
                        <div class="flex items-center gap-4 mb-8">
                            <span class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">01</span>
                            <h2 class="text-xl font-bold text-white tracking-tight">Structural Identity</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Parent Group (Level 2)</label>
                                <select name="sub_category_id" required @change="serviceType = $event.target.options[$event.target.selectedIndex].dataset.type || 'image'" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark shadow-inner">
                                    @foreach($subCategories as $sub)
                                        @php
                                            $subType = 'image';
                                            $nameStr = strtolower($sub->name . ' ' . ($sub->category->name ?? ''));
                                            if (str_contains($nameStr, 'video')) $subType = 'video';
                                            elseif (str_contains($nameStr, 'audio')) $subType = 'audio';
                                        @endphp
                                        <option value="{{ $sub->id }}" data-type="{{ $subType }}" {{ old('sub_category_id', $service->sub_category_id) == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Service Name</label>
                                <input type="text" name="name" value="{{ old('name', $service->name) }}" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all shadow-inner">
                            </div>
                        </div>
                        <input type="hidden" name="service_type" x-model="serviceType">

                        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Icon Class</label>
                                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                            </div>
                            {{-- Detail Toggle --}}
                            <div class="p-6 bg-indigo-500/5 rounded-3xl border border-indigo-500/10 flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-bold text-white mb-1">Has Dedicated Details?</h4>
                                    <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Enable to manage Rich Landing Page Content</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="has_details" class="sr-only peer" x-model="hasDetails" value="1">
                                    <div class="w-14 h-7 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                    <span class="ml-3 text-xs font-black text-indigo-400" x-text="hasDetails ? 'YES' : 'NO'"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Rich Content --}}
                    <div x-show="hasDetails" x-cloak x-transition class="space-y-10">

                        {{-- Global Content --}}
                        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xs">02</span>
                                <h2 class="text-xl font-bold text-white tracking-tight">Landing Page Design & Media</h2>
                            </div>
                            <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-xs leading-relaxed">
                                <i class="ri-information-line"></i> <strong>Pro Tip for Services:</strong><br>
                                - For <strong>Image Editing</strong>: Use <em>Before Image</em> & <em>After Image</em> to show the clipping path slider.<br>
                                - For <strong>Video Production</strong>: Use <em>YouTube Showcase Link</em> for the main video, and use <em>After Image</em> as the Video Cover/Thumbnail.
                            </div>

                            <div class="space-y-8">
                                 <div>
                                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Service Description</label>
                                    <textarea name="description" rows="5" class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-emerald-500 transition-all resize-none">{{ old('description', $service->description) }}</textarea>
                                </div>

                                <div x-show="serviceType === 'video'" x-cloak x-transition>
                                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">YouTube Showcase Link (For Video Production)</label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-rose-500"><i class="ri-youtube-fill text-xl"></i></div>
                                        <input type="url" name="video_url" value="{{ old('video_url', $service->video_url) }}" placeholder="https://www.youtube.com/watch?v=..." class="w-full bg-white/5 border border-white/10 rounded-2xl pl-16 pr-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-rose-500 transition-all shadow-inner">
                                    </div>
                                </div>
                                
                                <div x-show="serviceType === 'audio'" x-cloak x-transition>
                                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Audio Sample (For Audio Editing)</label>
                                    <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl shadow-inner group">
                                        <div class="w-16 h-16 rounded-xl bg-slate-800 flex items-center justify-center text-slate-600 border border-white/5 shrink-0">
                                            <i class="ri-mic-line text-2xl"></i>
                                        </div>
                                        <div class="flex flex-col gap-2 w-full">
                                            @if($service->audio_file)
                                                <div class="flex items-center justify-between bg-slate-900 px-3 py-2 rounded-lg border border-white/5">
                                                    <span class="text-[10px] text-slate-400 font-medium truncate w-32">Current File</span>
                                                    <audio controls class="h-6 w-48 custom-audio-player">
                                                        <source src="{{ asset('storage/' . $service->audio_file) }}" type="audio/mpeg">
                                                    </audio>
                                                </div>
                                            @endif
                                            <input type="file" name="audio_file" accept="audio/*" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-rose-500/10 file:text-rose-400 hover:file:bg-rose-500/20">
                                        </div>
                                    </div>
                                </div>

                                <div x-show="serviceType === 'image'" x-cloak x-transition>
                                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Cinematic Narrative (The Story / Why Us)</label>
                                    <textarea name="necessity_text" rows="5" placeholder="Describe the impact and narrative of this service..." class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-indigo-500 transition-all resize-none shadow-inner">{{ old('necessity_text', $service->necessity_text) }}</textarea>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div x-data="{ preview: '{{ $service->image_before ? asset('storage/' . $service->image_before) : '' }}' }" x-show="serviceType === 'image'">
                                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">
                                            Before Image (For Slider)
                                        </label>
                                        <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl shadow-inner group">
                                            <div class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5 shadow-2xl">
                                                <template x-if="preview"><img :src="preview" class="w-full h-full object-cover"></template>
                                                <template x-if="!preview"><div class="w-full h-full flex items-center justify-center text-slate-600"><i class="ri-image-2-line text-2xl"></i></div></template>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <input type="file" name="image_before" @change="preview = URL.createObjectURL($event.target.files[0])" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-indigo-500/10 file:text-indigo-400 hover:file:bg-indigo-500/20">
                                                <p class="text-[9px] text-slate-600 font-bold uppercase tracking-tight">Recommended: 800x800px</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-data="{ preview: '{{ $service->image_after ? asset('storage/' . $service->image_after) : '' }}' }">
                                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">
                                            After Image <span x-text="serviceType === 'image' ? '(For Slider)' : '(Cover/Thumbnail)'"></span>
                                        </label>
                                        <div class="flex items-center gap-6 p-4 bg-white/5 border border-white/10 rounded-2xl shadow-inner group">
                                            <div class="w-24 h-24 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-white/5 shadow-2xl">
                                                <template x-if="preview"><img :src="preview" class="w-full h-full object-cover"></template>
                                                <template x-if="!preview"><div class="w-full h-full flex items-center justify-center text-slate-600"><i class="ri-image-2-line text-2xl"></i></div></template>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <input type="file" name="image_after" @change="preview = URL.createObjectURL($event.target.files[0])" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-emerald-500/10 file:text-emerald-400 hover:file:bg-emerald-500/20">
                                                <p class="text-[9px] text-slate-600 font-bold uppercase tracking-tight">Recommended: 800x800px</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Stats & Pricing --}}
                                 <div class="grid grid-cols-1 md:grid-cols-3 gap-8" x-show="serviceType === 'image'" x-cloak x-transition>
                                    <div class="space-y-3">
                                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Starting Price ($)</label>
                                        <input type="number" step="0.01" name="starting_price" value="{{ old('starting_price', $service->starting_price) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white">
                                        <input type="text" name="price_unit" value="{{ old('price_unit', $service->price_unit) }}" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400">
                                    </div>
                                    <div class="space-y-3">
                                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Daily Capacity</label>
                                        <input type="number" name="delivery_capacity" value="{{ old('delivery_capacity', $service->delivery_capacity) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white">
                                        <input type="text" name="delivery_unit" value="{{ old('delivery_unit', $service->delivery_unit) }}" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400">
                                    </div>
                                    <div class="space-y-3">
                                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 ml-1">Discount (%)</label>
                                        <input type="number" name="discount_upto" value="{{ old('discount_upto', $service->discount_upto) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white">
                                        <input type="text" name="discount_tag" value="{{ old('discount_tag', $service->discount_tag) }}" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-2 text-[10px] font-medium text-slate-400">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Feature Grid (For Image) --}}
                        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10" x-show="serviceType === 'image'" x-cloak x-transition>
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-lg font-bold text-white tracking-tight">Complexity Tiers & Features</h3>
                                <button type="button" @click="addFeature()" class="px-6 py-2 bg-indigo-500/10 text-indigo-400 text-[10px] font-black uppercase rounded-full border border-indigo-500/20">+ Add Variant</button>
                            </div>
                            <div class="space-y-4">
                                <template x-for="(f, i) in features" :key="i">
                                    <div class="flex gap-4 items-center">
                                        <input type="text" :name="'features['+i+'][name]'" x-model="f.name" placeholder="Feature Name" class="flex-1 bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-xs text-white">
                                        <input type="text" :name="'features['+i+'][price]'" x-model="f.price" placeholder="Price ($)" class="w-32 bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-xs text-indigo-400 font-bold text-center">
                                        <button type="button" @click="removeFeature(i)" class="w-10 h-10 rounded-xl bg-rose-500/10 text-rose-500 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all"><i class="ri-delete-bin-line"></i></button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10" x-show="hasDetails && serviceType === 'image'" x-cloak x-transition>
                            {{-- FAQ Builder --}}
                            <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                                <div class="flex items-center justify-between mb-8">
                                    <h3 class="text-lg font-bold text-white tracking-tight">FAQ Builder</h3>
                                    <button type="button" @click="addFaq()" class="text-[10px] font-black uppercase text-indigo-400">+ Add FAQ</button>
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

                            {{-- Method Builder --}}
                            <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10">
                                <div class="flex items-center justify-between mb-8">
                                    <h3 class="text-lg font-bold text-white tracking-tight">Work Methods</h3>
                                    <button type="button" @click="addMethod()" class="text-[10px] font-black uppercase text-emerald-400">+ Add Step</button>
                                </div>
                                <div class="space-y-6">
                                    <template x-for="(method, index) in methods" :key="index">
                                        <div class="p-6 bg-white/5 border border-white/10 rounded-3xl relative group transition-all hover:bg-white/[0.08]">
                                            <button type="button" @click="removeMethod(index)" class="absolute -top-3 -right-3 w-8 h-8 bg-rose-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg z-10">
                                                <i class="ri-close-line text-lg"></i>
                                            </button>

                                            <div class="flex flex-col md:flex-row gap-6">
                                                {{-- Image Part --}}
                                                <div class="w-full md:w-32 shrink-0">
                                                    <div class="aspect-square rounded-2xl bg-slate-800 border-2 border-dashed border-white/10 overflow-hidden relative group/img cursor-pointer flex items-center justify-center">
                                                        <template x-if="method.preview">
                                                            <img :src="method.preview" class="w-full h-full object-cover">
                                                        </template>
                                                        <template x-if="!method.preview">
                                                            <div class="text-center">
                                                                <i class="ri-image-add-line text-2xl text-slate-600"></i>
                                                                <p class="text-[8px] text-slate-500 uppercase font-black tracking-tighter mt-1 px-1 leading-none">Step Image</p>
                                                            </div>
                                                        </template>
                                                        <input type="file" :name="'methods['+index+'][image]'" @change="handleMethodImage(index, $event)" class="absolute inset-0 opacity-0 cursor-pointer">
                                                    </div>
                                                    {{-- Keep the old image path if not changed --}}
                                                    <template x-if="method.image && !method.preview.startsWith('blob:')">
                                                        <input type="hidden" :name="'methods['+index+'][old_image]'" :value="method.image">
                                                    </template>
                                                </div>

                                                {{-- Content Part --}}
                                                <div class="flex-1 space-y-3">
                                                    <input type="text" :name="'methods['+index+'][title]'" x-model="method.title" placeholder="Step Title" class="w-full bg-transparent border-none text-sm font-bold text-white focus:ring-0 p-0 placeholder:text-slate-600">
                                                    <textarea :name="'methods['+index+'][description]'" x-model="method.description" placeholder="Describe the process..." class="w-full bg-transparent border-none text-[12px] text-slate-400 focus:ring-0 resize-none h-24 p-0 placeholder:text-slate-700 font-medium"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    {{-- Work Sample Builder (For Video/Audio) --}}
                    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 mt-10 overflow-hidden relative" x-show="hasDetails && serviceType !== 'image'" x-cloak x-transition>
                        {{-- Background Decor --}}
                        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/5 blur-[100px] -mr-32 -mt-32"></div>

                        <div class="flex items-center justify-between mb-10 relative z-10">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500/20 to-purple-500/20 flex items-center justify-center border border-indigo-500/20 shadow-lg">
                                    <i class="ri-gallery-line text-xl text-indigo-400"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white tracking-tight">Portfolio Showcase</h3>
                                    <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mt-1">Manage Video, Audio or Image samples</p>
                                </div>
                            </div>
                            <button type="button" @click="addWorkSample()"
                                class="group px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase tracking-widest rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95 flex items-center gap-2">
                                <i class="ri-add-line text-lg"></i> Add New Sample
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                            <template x-for="(sample, index) in work_samples" :key="index">
                                <div class="p-8 bg-white/5 border border-white/10 rounded-[2.5rem] relative group transition-all hover:bg-white/[0.08] hover:border-white/20 hover:shadow-2xl">
                                    {{-- Delete Button --}}
                                    <button type="button" @click="removeWorkSample(index)"
                                        class="absolute -top-3 -right-3 w-10 h-10 bg-slate-900 border border-white/10 text-rose-500 rounded-2xl flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all shadow-2xl z-10 hover:bg-rose-500 hover:text-white hover:scale-110">
                                        <i class="ri-delete-bin-7-line text-lg"></i>
                                    </button>

                                    <div class="space-y-6">
                                        {{-- Header: Type & Title --}}
                                        <div class="flex flex-col gap-4">
                                            <div class="flex items-center gap-3">
                                                <div class="shrink-0">
                                                    <div class="w-10 h-10 rounded-xl bg-slate-900/80 flex items-center justify-center border border-white/5 shadow-inner">
                                                        <template x-if="sample.type === 'video'"><i class="ri-video-line text-rose-400"></i></template>
                                                        <template x-if="sample.type === 'image'"><i class="ri-image-line text-emerald-400"></i></template>
                                                        <template x-if="sample.type === 'audio'"><i class="ri-mic-line text-amber-400"></i></template>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <select :name="'work_samples['+index+'][type]'" x-model="sample.type" 
                                                        class="w-full bg-transparent border-none text-[11px] font-black uppercase tracking-widest text-indigo-400 focus:ring-0 p-0 cursor-pointer">
                                                        <option value="video" class="bg-slate-900">Video Production</option>
                                                        <option value="image" class="bg-slate-900">Image Showcase</option>
                                                        <option value="audio" class="bg-slate-900">Audio Sample</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="text" :name="'work_samples['+index+'][title]'" x-model="sample.title" 
                                                placeholder="Project Title (e.g. Nike Commercial 2024)" 
                                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white placeholder:text-slate-600 focus:outline-none focus:border-indigo-500 transition-all shadow-inner">
                                        </div>

                                        {{-- Media Content Area --}}
                                        <div class="p-6 bg-slate-900/40 rounded-3xl border border-white/5 shadow-inner min-h-[120px] flex items-center">
                                            {{-- Video URL Input --}}
                                            <template x-if="sample.type === 'video'">
                                                <div class="w-full">
                                                    <label class="block text-[9px] uppercase font-black text-slate-500 mb-3 ml-1 tracking-widest">YouTube / Vimeo Link</label>
                                                    <div class="relative group/input">
                                                        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-rose-500/50 group-focus-within/input:text-rose-500 transition-colors">
                                                            <i class="ri-youtube-fill text-xl"></i>
                                                        </div>
                                                        <input type="url" :name="'work_samples['+index+'][url]'" x-model="sample.url" 
                                                            placeholder="https://www.youtube.com/watch?v=..." 
                                                            class="w-full bg-slate-900 border border-white/10 rounded-2xl pl-16 pr-6 py-4 text-xs font-bold text-white focus:outline-none focus:border-rose-500 transition-all shadow-2xl">
                                                    </div>
                                                </div>
                                            </template>

                                            {{-- File Upload Area --}}
                                            <template x-if="sample.type === 'image' || sample.type === 'audio'">
                                                <div class="flex items-center gap-6 w-full">
                                                    <div class="w-20 h-20 rounded-2xl bg-slate-800 border border-white/10 flex items-center justify-center overflow-hidden shadow-2xl shrink-0 group/preview relative">
                                                        <template x-if="sample.type === 'image' && sample.preview">
                                                            <img :src="sample.preview" class="w-full h-full object-cover group-hover/preview:scale-110 transition-transform duration-500">
                                                        </template>
                                                        <template x-if="sample.type === 'image' && !sample.preview">
                                                            <i class="ri-image-2-fill text-2xl text-slate-700"></i>
                                                        </template>
                                                        <template x-if="sample.type === 'audio'">
                                                            <div class="relative">
                                                                <i class="ri-volume-up-fill text-2xl text-amber-500/40 animate-pulse"></i>
                                                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-amber-500 rounded-full flex items-center justify-center border-2 border-slate-800">
                                                                    <i class="ri-mic-fill text-[8px] text-white"></i>
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                    <div class="flex-1 space-y-3">
                                                        <label class="block text-[9px] uppercase font-black text-slate-500 ml-1 tracking-widest">
                                                            <span x-text="sample.type === 'image' ? 'Upload Preview' : 'Audio File'"></span>
                                                        </label>
                                                        <div class="relative">
                                                            <input type="hidden" :name="'work_samples['+index+'][old_file]'" x-model="sample.old_file">
                                                            <input type="file" :name="'work_samples['+index+'][file]'" @change="handleWorkSampleFile(index, $event)" 
                                                                class="absolute inset-0 opacity-0 cursor-pointer z-10">
                                                            <div class="bg-indigo-500/5 border border-indigo-500/20 rounded-xl px-4 py-3 flex items-center justify-between group-hover:bg-indigo-500/10 transition-all cursor-pointer">
                                                                <span class="text-[10px] font-black uppercase text-indigo-400" x-text="sample.old_file ? 'Change File' : 'Choose File'"></span>
                                                                <i class="ri-upload-cloud-2-line text-indigo-500"></i>
                                                            </div>
                                                        </div>
                                                        <template x-if="sample.old_file">
                                                            <p class="text-[8px] text-emerald-500 font-bold ml-1 uppercase tracking-widest flex items-center gap-1">
                                                                <i class="ri-checkbox-circle-fill"></i> Current file preserved
                                                            </p>
                                                        </template>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            
                            {{-- Empty State --}}
                            <template x-if="work_samples.length === 0">
                                <div class="col-span-full py-20 border-2 border-dashed border-white/5 rounded-[3rem] flex flex-col items-center justify-center text-center group/empty cursor-pointer hover:bg-white/5 transition-all" @click="addWorkSample()">
                                    <div class="w-16 h-16 rounded-full bg-slate-900 border border-white/5 flex items-center justify-center mb-4 group-hover/empty:scale-110 transition-all duration-500">
                                        <i class="ri-add-line text-3xl text-slate-700 group-hover/empty:text-indigo-500 transition-colors"></i>
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-600 group-hover/empty:text-slate-400 transition-colors">Your Portfolio is Empty</h4>
                                    <p class="text-[10px] text-slate-700 uppercase font-black tracking-widest mt-1">Click to add your first work sample</p>
                                </div>
                            </template>
                        </div>
                    </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-6">
                         <div class="flex items-center gap-4 mr-auto">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer" value="1" {{ $service->is_active ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-emerald-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                <span class="ml-3 text-[10px] font-black uppercase tracking-widest text-slate-500">Live Status</span>
                            </label>
                        </div>

                        <a href="{{ route('admin.graphics.services.index') }}" class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">Cancel</a>
                        <button type="submit" class="px-12 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl shadow-xl shadow-indigo-500/20 active:scale-95">
                            Commit Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
@endsection