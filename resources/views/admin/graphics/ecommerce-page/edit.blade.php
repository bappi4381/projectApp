@extends('layouts.admin')
@section('title', 'Ecommerce Page Settings | Graphics Studio')

@section('content')
    <div class="p-8" x-data="ecommercePageManager()">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Ecommerce Page Settings</h1>
                <p class="text-slate-400 font-medium text-sm">Manage dynamic content for the Ecommerce Services page</p>
            </div>
        </div>

        {{-- ── TAB NAVIGATION ────────────────────────── --}}
        <div
            class="sticky top-0 z-40 -mx-8 px-8 py-4 bg-slate-950/80 backdrop-blur-xl border-b border-slate-800/50 mb-10 overflow-x-auto no-scrollbar">
            <div class="flex items-center gap-2 min-w-max">
                <button type="button" @click="activeTab = 'hero'"
                    :class="activeTab === 'hero' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-slate-200 hover:bg-white/5'"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">
                    <i class="ri-layout-top-line text-sm"></i>
                    Hero
                </button>
                <button type="button" @click="activeTab = 'workflows'"
                    :class="activeTab === 'workflows' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-slate-200 hover:bg-white/5'"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">
                    <i class="ri-loop-left-line text-sm"></i>
                    Workflows
                </button>
                <button type="button" @click="activeTab = 'categories'"
                    :class="activeTab === 'categories' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-slate-200 hover:bg-white/5'"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">
                    <i class="ri-shapes-line text-sm"></i>
                    Categories
                </button>
                <button type="button" @click="activeTab = 'links'"
                    :class="activeTab === 'links' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-slate-200 hover:bg-white/5'"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">
                    <i class="ri-external-link-line text-sm"></i>
                    Links
                </button>
                <button type="button" @click="activeTab = 'value'"
                    :class="activeTab === 'value' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-slate-200 hover:bg-white/5'"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">
                    <i class="ri-chat-quote-line text-sm"></i>
                    Value
                </button>
                <button type="button" @click="activeTab = 'tour'"
                    :class="activeTab === 'tour' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-slate-200 hover:bg-white/5'"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">
                    <i class="ri-play-circle-line text-sm"></i>
                    Tour
                </button>
                <button type="button" @click="activeTab = 'faq'"
                    :class="activeTab === 'faq' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:text-slate-200 hover:bg-white/5'"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">
                    <i class="ri-questionnaire-line text-sm"></i>
                    FAQ
                </button>
            </div>
        </div>

        @if (session('success'))
            <div
                class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
                <i class="ri-checkbox-circle-line text-xl"></i>
                <span class="text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.graphics.ecommerce-page.update') }}" method="POST" enctype="multipart/form-data"
            class="pb-24">
            @csrf
            @method('PUT')

            {{-- ── HERO SECTION ──────────────────────────── --}}
            <div x-show="activeTab === 'hero'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-8">
                <div class="glass-card rounded-[24px] p-8 relative overflow-hidden transition-all duration-300">
                    <div class="absolute top-0 right-0 p-8 opacity-10">
                        <i class="ri-layout-top-line text-8xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center">
                            <i class="ri-layout-top-line text-indigo-400"></i>
                        </span>
                        Hero Section
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-400 mb-2">Main Title</label>
                            <textarea name="hero_title" rows="2"
                                class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-lg font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all placeholder:text-slate-500"
                                placeholder="Enter hero title...">{{ old('hero_title', $page->hero_title) }}</textarea>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Price Starts From</label>
                                <div class="relative group">
                                    <span
                                        class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-indigo-400 transition-colors">$</span>
                                    <input type="number" step="0.01" name="hero_price_from"
                                        value="{{ old('hero_price_from', $page->hero_price_from) }}"
                                        class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl pl-10 pr-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Price Unit</label>
                                <input type="text" name="hero_price_unit"
                                    value="{{ old('hero_price_unit', $page->hero_price_unit) }}"
                                    class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder:text-slate-500"
                                    placeholder="e.g. Per Image">
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Delivery Capacity</label>
                                <input type="text" name="hero_delivery_capacity"
                                    value="{{ old('hero_delivery_capacity', $page->hero_delivery_capacity) }}"
                                    class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder:text-slate-500"
                                    placeholder="e.g. 5000 images/day">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Delivery Subtitle</label>
                                <input type="text" name="hero_delivery_subtitle"
                                    value="{{ old('hero_delivery_subtitle', $page->hero_delivery_subtitle) }}"
                                    class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder:text-slate-500"
                                    placeholder="e.g. 2500+ images in 12 hours">
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Hero GIF /
                                Showcase Image</label>
                            <div
                                class="relative group h-64 w-full bg-slate-950 rounded-[32px] border border-slate-700/50 overflow-hidden shadow-2xl transition-all duration-500 hover:border-indigo-500/30">
                                <template x-if="heroPreview || '{{ $page->hero_gif }}'">
                                    <img :src="heroPreview || '{{ asset('storage/' . $page->hero_gif) }}'"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </template>
                                <template x-if="!heroPreview && !'{{ $page->hero_gif }}'">
                                    <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-600">
                                        <i class="ri-image-line text-5xl mb-2"></i>
                                        <span class="text-xs font-bold uppercase tracking-widest">No Image Uploaded</span>
                                    </div>
                                </template>
                                <div
                                    class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-all duration-500 backdrop-blur-md">
                                    <div
                                        class="px-8 py-3 rounded-full border border-white/20 bg-white/10 text-white text-[10px] font-black uppercase tracking-[0.2em] shadow-2xl transform translate-y-4 group-hover:translate-y-0 transition-all duration-500">
                                        Replace Image
                                    </div>
                                </div>
                                <input type="file" name="hero_gif" accept="image/gif,image/jpeg,image/png"
                                    @change="previewHeroImage($event)"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── WORKFLOW SECTIONS ────────────────────────── --}}
            <div x-show="activeTab === 'workflows'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-8">
                <div class="glass-card rounded-[24px] p-8 relative overflow-hidden transition-all duration-300">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center">
                            <i class="ri-loop-left-line text-emerald-400"></i>
                        </span>
                        Comparison Workflows
                    </h3>

                    <div class="space-y-12">
                        <template x-for="(wf, index) in workflows" :key="index">
                            <div
                                class="relative bg-slate-900/40 border border-slate-700/50 rounded-3xl p-8 group transition-all duration-300 hover:border-slate-600">
                                <div class="absolute -top-3 -left-3 bg-indigo-500 text-white text-[10px] font-black px-3 py-1 rounded-full shadow-lg"
                                    x-text="'STEP ' + (index + 1)"></div>
                                <button type="button" @click="removeWorkflow(index)"
                                    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-white w-8 h-8 rounded-full flex items-center justify-center shadow-lg transition-transform hover:rotate-90">
                                    <i class="ri-close-line"></i>
                                </button>

                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-400 mb-2">Workflow
                                                Title</label>
                                            <input type="text" :name="'workflow_sections['+index+'][title]'"
                                                x-model="wf.title"
                                                class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                                        </div>
                                        <div>
                                            <label class="flex justify-between text-xs font-bold text-slate-400 mb-2">
                                                Highlight Words
                                                <span class="text-slate-500 normal-case italic font-medium">Separate with
                                                    commas</span>
                                            </label>
                                            <input type="text" :name="'workflow_sections['+index+'][highlight_words]'"
                                                x-model="wf.highlight_words"
                                                class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-emerald-400 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition-all placeholder:text-slate-500"
                                                placeholder="e.g. Ghost, Mannequin">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-400 mb-2">Description</label>
                                            <textarea :name="'workflow_sections['+index+'][description]'"
                                                x-model="wf.description" rows="3"
                                                class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all"></textarea>
                                        </div>
                                        <div class="flex items-end gap-6 pt-2">
                                            <div class="flex items-center gap-3 pb-3">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox"
                                                        :name="'workflow_sections['+index+'][reverse_layout]'"
                                                        x-model="wf.reverse_layout" class="sr-only peer">
                                                    <div
                                                        class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500">
                                                    </div>
                                                </label>
                                                <span class="text-xs font-bold text-slate-400">Reverse Layout</span>
                                            </div>
                                            <div class="flex-1">
                                                <label class="block text-xs font-bold text-slate-400 mb-2">CTA Label</label>
                                                <input type="text" :name="'workflow_sections['+index+'][cta_label]'"
                                                    x-model="wf.cta_label"
                                                    class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Before
                                                Image</label>
                                            <div
                                                class="relative h-48 bg-slate-900 rounded-2xl border border-white/10 flex items-center justify-center overflow-hidden group/img shadow-2xl">
                                                <template x-if="wf.before_image_preview || wf.before_image">
                                                    <img :src="wf.before_image_preview || ('{{ asset('storage') }}/' + wf.before_image)"
                                                        class="w-full h-full object-cover">
                                                </template>
                                                <template x-if="!wf.before_image_preview && !wf.before_image">
                                                    <div class="text-center">
                                                        <i class="ri-image-line text-3xl text-slate-700"></i>
                                                        <p
                                                            class="text-[9px] text-slate-600 mt-1 uppercase font-bold tracking-widest">
                                                            No Image</p>
                                                    </div>
                                                </template>
                                                <input type="file" :name="'workflow_sections['+index+'][before_image]'"
                                                    @change="previewImage($event, index, 'before')"
                                                    class="absolute inset-0 opacity-0 cursor-pointer z-10">
                                                <div
                                                    class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover/img:opacity-100 flex items-center justify-center transition-opacity backdrop-blur-sm">
                                                    <span
                                                        class="text-[10px] text-white font-bold uppercase tracking-widest bg-white/10 px-4 py-2 rounded-full border border-white/20">Replace</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">After
                                                Image</label>
                                            <div
                                                class="relative h-48 bg-slate-900 rounded-2xl border border-white/10 flex items-center justify-center overflow-hidden group/img shadow-2xl">
                                                <template x-if="wf.after_image_preview || wf.after_image">
                                                    <img :src="wf.after_image_preview || ('{{ asset('storage') }}/' + wf.after_image)"
                                                        class="w-full h-full object-cover">
                                                </template>
                                                <template x-if="!wf.after_image_preview && !wf.after_image">
                                                    <div class="text-center">
                                                        <i class="ri-image-line text-3xl text-slate-700"></i>
                                                        <p
                                                            class="text-[9px] text-slate-600 mt-1 uppercase font-bold tracking-widest">
                                                            No Image</p>
                                                    </div>
                                                </template>
                                                <input type="file" :name="'workflow_sections['+index+'][after_image]'"
                                                    @change="previewImage($event, index, 'after')"
                                                    class="absolute inset-0 opacity-0 cursor-pointer z-10">
                                                <div
                                                    class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover/img:opacity-100 flex items-center justify-center transition-opacity backdrop-blur-sm">
                                                    <span
                                                        class="text-[10px] text-white font-bold uppercase tracking-widest bg-white/10 px-4 py-2 rounded-full border border-white/20">Replace</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <button type="button" @click="addWorkflow()"
                        class="mt-8 w-full py-4 border-2 border-dashed border-white/10 rounded-2xl text-slate-500 hover:text-white hover:border-emerald-500/50 hover:bg-emerald-500/5 transition-all flex items-center justify-center gap-2 group font-bold">
                        <i class="ri-add-circle-line text-xl group-hover:scale-110 transition-transform"></i>
                        Add New Comparison Section
                    </button>
                </div>
            </div>

            {{-- ── CATEGORIES SECTION ────────────────────────── --}}
            <div x-show="activeTab === 'categories'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-8">
                <div class="glass-card rounded-[24px] p-8 relative overflow-hidden transition-all duration-300">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-orange-500/20 flex items-center justify-center">
                            <i class="ri-shapes-line text-orange-400"></i>
                        </span>
                        Service Categories
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <template x-for="(cat, index) in categories" :key="index">
                            <div
                                class="bg-slate-900/40 border border-slate-700/50 rounded-3xl p-6 relative group transition-all duration-300 hover:border-slate-600">
                                <button type="button" @click="removeCategory(index)"
                                    class="absolute top-4 right-4 bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white w-8 h-8 rounded-full flex items-center justify-center transition-all opacity-0 group-hover:opacity-100">
                                    <i class="ri-delete-bin-line"></i>
                                </button>

                                <div class="flex flex-col gap-6">
                                    <div
                                        class="relative h-40 bg-slate-900 rounded-2xl overflow-hidden shadow-inner group/catimg">
                                        <template x-if="cat.preview || cat.image_path || cat.image_url">
                                            <img :src="cat.preview || (cat.image_path ? '{{ asset('storage') }}/' + cat.image_path : cat.image_url)"
                                                class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!cat.preview && !cat.image_path && !cat.image_url">
                                            <div class="flex items-center justify-center h-full text-slate-700">
                                                <i class="ri-image-add-line text-4xl"></i>
                                            </div>
                                        </template>
                                        <input type="file" :name="'categories['+index+'][image_path]'"
                                            @change="previewCatImage($event, index)"
                                            class="absolute inset-0 opacity-0 cursor-pointer z-10">
                                        <div
                                            class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover/catimg:opacity-100 flex items-center justify-center transition-opacity pointer-events-none backdrop-blur-sm">
                                            <span
                                                class="text-[10px] text-white font-bold uppercase tracking-widest bg-white/10 px-4 py-2 rounded-full border border-white/20">Replace
                                                Image</span>
                                        </div>
                                    </div>

                                    <div class="space-y-4">
                                        <input type="text" :name="'categories['+index+'][title]'" x-model="cat.title"
                                            class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder:text-slate-500"
                                            placeholder="Category Title">
                                        <textarea :name="'categories['+index+'][description]'" x-model="cat.description"
                                            rows="2"
                                            class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder:text-slate-500"
                                            placeholder="Short description..."></textarea>
                                        <input type="hidden" :name="'categories['+index+'][image_url]'"
                                            x-model="cat.image_url">
                                    </div>
                                </div>
                            </div>
                        </template>

                        <button type="button" @click="addCategory()"
                            class="border-2 border-dashed border-white/10 rounded-3xl flex flex-col items-center justify-center p-8 text-slate-500 hover:text-orange-400 hover:border-orange-500/30 hover:bg-orange-500/5 transition-all group">
                            <i class="ri-add-line text-3xl mb-2 group-hover:scale-125 transition-transform"></i>
                            <span class="font-black text-xs uppercase tracking-widest">Add New Category</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- ── SERVICE LINKS SECTION ──────────────────────── --}}
            <div x-show="activeTab === 'links'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-8">
                <div class="glass-card rounded-[24px] p-8 relative overflow-hidden transition-all duration-300">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center">
                            <i class="ri-external-link-line text-purple-400"></i>
                        </span>
                        Related Service Links
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <template x-for="(link, index) in serviceLinks" :key="index">
                            <div
                                class="bg-slate-900/40 border border-slate-700/50 rounded-2xl p-4 flex gap-4 group relative transition-all duration-300 hover:border-slate-600">
                                <div
                                    class="w-16 h-16 rounded-xl bg-slate-950 overflow-hidden shrink-0 shadow-lg border border-slate-700/50">
                                    <img :src="link.image_url" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0 flex flex-col justify-center space-y-1.5">
                                    <input type="text" :name="'service_links['+index+'][name]'" x-model="link.name"
                                        class="w-full bg-slate-800/50 border border-slate-700/50 rounded-lg px-3 py-1.5 text-slate-200 text-sm font-bold focus:border-indigo-500/50 focus:ring-1 focus:ring-indigo-500/50 focus:outline-none transition-colors"
                                        placeholder="Link Name">
                                    <input type="text" :name="'service_links['+index+'][url]'" x-model="link.url"
                                        class="w-full bg-slate-800/50 border border-slate-700/50 rounded-lg px-3 py-1.5 text-indigo-400 text-xs focus:border-indigo-500/50 focus:ring-1 focus:ring-indigo-500/50 focus:outline-none transition-colors"
                                        placeholder="URL (e.g. /services)">
                                </div>
                                <input type="hidden" :name="'service_links['+index+'][image_url]'" x-model="link.image_url">
                                <button type="button" @click="removeLink(index)"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                        </template>

                        <button type="button" @click="addLink()"
                            class="border border-dashed border-white/10 rounded-2xl p-4 flex items-center justify-center gap-3 text-slate-500 hover:text-purple-400 hover:border-purple-500/30 transition-all font-bold text-xs uppercase tracking-widest">
                            <i class="ri-add-line"></i> Add Link
                        </button>
                    </div>
                </div>
            </div>

            {{-- ── VALUE PROPOSITION ──────────────────── --}}
            <div x-show="activeTab === 'value'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-8">
                <div class="glass-card rounded-[24px] p-8 relative overflow-hidden transition-all duration-300">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-cyan-500/20 flex items-center justify-center">
                            <i class="ri-chat-quote-line text-cyan-400"></i>
                        </span>
                        Value Proposition
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Quote Text</label>
                                <textarea name="value_quote" rows="5"
                                    class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm italic focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">{{ old('value_quote', $page->value_quote) }}</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 mb-2">Author Name</label>
                                    <input type="text" name="value_quote_author"
                                        value="{{ old('value_quote_author', $page->value_quote_author) }}"
                                        class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 mb-2">Role/Company</label>
                                    <input type="text" name="value_quote_role"
                                        value="{{ old('value_quote_role', $page->value_quote_role) }}"
                                        class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 mb-2">Retouched Product Example</label>
                            <div
                                class="relative h-full min-h-[200px] bg-slate-900 rounded-3xl border border-slate-700 flex items-center justify-center overflow-hidden group/val shadow-xl">
                                @if ($page->value_image)
                                    <img src="{{ asset('storage/' . $page->value_image) }}"
                                        class="max-h-full w-auto object-contain p-8 group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div class="text-slate-600"><i class="ri-image-line text-4xl"></i></div>
                                @endif
                                <input type="file" name="value_image" accept="image/*"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10">
                                <div
                                    class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover/val:opacity-100 flex items-center justify-center transition-opacity pointer-events-none backdrop-blur-sm">
                                    <span
                                        class="text-[10px] text-white font-bold uppercase tracking-widest bg-white/10 px-4 py-2 rounded-full border border-white/20">Replace
                                        Image</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── TOUR SECTION ──────────────────────────── --}}
            <div x-show="activeTab === 'tour'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-8">
                <div class="glass-card rounded-[24px] p-8 relative overflow-hidden transition-all duration-300">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-red-500/20 flex items-center justify-center">
                            <i class="ri-play-circle-line text-red-400"></i>
                        </span>
                        Video Tour
                    </h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Tour Title</label>
                                <input type="text" name="tour_title" value="{{ old('tour_title', $page->tour_title) }}"
                                    class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Tour Subtitle</label>
                                <textarea name="tour_subtitle" rows="3"
                                    class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">{{ old('tour_subtitle', $page->tour_subtitle) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 mb-2">Video Link</label>
                                <div class="relative">
                                    <i class="ri-video-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                                    <input type="url" name="tour_video_url"
                                        value="{{ old('tour_video_url', $page->tour_video_url) }}"
                                        class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl pl-11 pr-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder:text-slate-500"
                                        placeholder="https://...">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 mb-2">Video Thumbnail</label>
                            <div
                                class="relative aspect-video bg-slate-900 rounded-3xl border border-white/10 flex items-center justify-center overflow-hidden group/tour shadow-xl">
                                @if ($page->tour_video_thumbnail)
                                    <img src="{{ asset('storage/' . $page->tour_video_thumbnail) }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <i class="ri-image-line text-4xl text-slate-700"></i>
                                @endif
                                <input type="file" name="tour_video_thumbnail" accept="image/*"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10">
                                <div
                                    class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover/tour:opacity-100 flex items-center justify-center transition-opacity pointer-events-none backdrop-blur-sm">
                                    <span
                                        class="text-[10px] text-white font-bold uppercase tracking-widest bg-white/10 px-4 py-2 rounded-full border border-white/20">Replace
                                        Thumbnail</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- ── FAQ SECTION ────────────────────────────── --}}
            <div x-show="activeTab === 'faq'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-8">
                <div class="glass-card rounded-[24px] p-8 relative overflow-hidden transition-all duration-300">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-yellow-500/20 flex items-center justify-center">
                            <i class="ri-questionnaire-line text-yellow-400"></i>
                        </span>
                        Frequently Asked Questions
                    </h3>

                    <div class="space-y-4">
                        <template x-for="(faq, index) in faqs" :key="index">
                            <div
                                class="bg-slate-900/40 border border-slate-700/50 rounded-2xl p-6 group relative transition-all duration-300 hover:border-slate-600">
                                <button type="button" @click="removeFaq(index)"
                                    class="absolute top-4 right-4 text-slate-500 hover:text-red-400 transition-colors">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                                <div class="space-y-4 pr-10">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 mb-2">Question</label>
                                        <input type="text" name="faq_q[]" x-model="faq.q"
                                            class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 mb-2">Answer</label>
                                        <textarea name="faq_a[]" x-model="faq.a" rows="2"
                                            class="w-full bg-slate-800/60 border border-slate-700/50 rounded-xl px-4 py-3 text-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all"></textarea>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <button type="button" @click="addFaq()"
                        class="mt-6 w-full py-4 border border-dashed border-white/10 rounded-2xl text-slate-500 hover:text-white hover:border-yellow-500/30 transition-all flex items-center justify-center gap-2 font-bold text-xs uppercase tracking-widest">
                        <i class="ri-add-line"></i> Add New FAQ
                    </button>
                </div>
            </div>

            {{-- ── SAVE ACTION ──────────────────── --}}
            <div class="fixed bottom-10 right-10 z-50">
                <button type="submit"
                    class="group px-10 py-5 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl transition-all shadow-[0_20px_50px_rgba(79,70,229,0.3)] flex items-center gap-3 active:scale-95">
                    <i class="ri-save-3-line text-xl group-hover:rotate-12 transition-transform"></i>
                    <span class="tracking-wide">Save All Changes</span>
                </button>
            </div>

        </form>
    </div>

    <script>
        function ecommercePageManager() {
            return {
                activeTab: 'hero',
                heroPreview: null,
                workflows: @json($page->workflow_sections ?? []),
                categories: @json($page->categories ?? []),
                serviceLinks: @json($page->service_links ?? []),
                faqs: @json($page->faqs ?? []),

                init() {
                    // Prepare workflows for highlight words display
                    this.workflows = this.workflows.map(wf => ({
                        ...wf,
                        highlight_words: Array.isArray(wf.highlight_words) ? wf.highlight_words.join(', ') : (wf.highlight_words || ''),
                        before_image_preview: null,
                        after_image_preview: null
                    }));
                    // Prepare categories
                    this.categories = this.categories.map(cat => ({
                        ...cat,
                        preview: null
                    }));
                },

                previewHeroImage(event) {
                    const file = event.target.files[0];
                    if (!file) return;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.heroPreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },

                addWorkflow() {
                    this.workflows.push({
                        title: '',
                        highlight_words: '',
                        description: '',
                        before_image: '',
                        after_image: '',
                        before_image_preview: null,
                        after_image_preview: null,
                        cta_label: 'GET QUOTE',
                        cta_route: 'graphics.get-quote',
                        reverse_layout: false
                    });
                },

                removeWorkflow(index) {
                    this.workflows.splice(index, 1);
                },

                previewImage(event, index, type) {
                    const file = event.target.files[0];
                    if (!file) return;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        if (type === 'before') {
                            this.workflows[index].before_image_preview = e.target.result;
                        } else {
                            this.workflows[index].after_image_preview = e.target.result;
                        }
                    };
                    reader.readAsDataURL(file);
                },

                addCategory() {
                    this.categories.push({
                        title: '',
                        description: '',
                        image_path: '',
                        image_url: 'https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=800&q=80',
                        preview: null
                    });
                },

                removeCategory(index) {
                    this.categories.splice(index, 1);
                },

                previewCatImage(event, index) {
                    const file = event.target.files[0];
                    if (!file) return;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.categories[index].preview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },

                addLink() {
                    this.serviceLinks.push({
                        name: '',
                        url: '/graphics-studio/services',
                        image_url: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80'
                    });
                },

                removeLink(index) {
                    this.serviceLinks.splice(index, 1);
                },

                addFaq() {
                    this.faqs.push({
                        q: '',
                        a: ''
                    });
                },

                removeFaq(index) {
                    this.faqs.splice(index, 1);
                }
            }
        }
    </script>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection