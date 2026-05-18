@extends('layouts.admin')
@section('title', 'Add Software | Admin')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="mb-10 reveal">
        <a href="{{ route('admin.it.software.index') }}"
            class="text-sm font-bold text-cyan-400 hover:text-cyan-300 transition-colors flex items-center gap-2 mb-4">
            <i class="ri-arrow-left-line"></i> Back to Software Catalog
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Add New Software</h1>
        <p class="text-slate-400 font-medium text-sm italic">Register a new software product to the catalog.</p>
    </div>

    @if ($errors->any())
        <div class="bg-rose-500/10 border border-rose-500/20 text-rose-400 px-6 py-4 rounded-2xl mb-8 flex items-start gap-3">
            <i class="ri-error-warning-line text-xl mt-0.5"></i>
            <ul class="list-disc pl-4 space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.it.software.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8"
        x-data="{ isSubmitting: false }" @submit="isSubmitting = true">
        @csrf

        {{-- Section 1: Basic Info --}}
        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-1">
            <div class="flex items-center gap-4 mb-8">
                <span class="w-8 h-8 rounded-lg bg-cyan-500/20 flex items-center justify-center text-cyan-400 font-bold text-xs">01</span>
                <h2 class="text-xl font-bold text-white tracking-tight">Basic Information</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Software Name <span class="text-rose-400">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        placeholder="e.g. Microsoft Office 365"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all shadow-inner placeholder-slate-600">
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Category</label>
                    <input type="text" name="category" value="{{ old('category') }}"
                        placeholder="e.g. Productivity, Security, ERP"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all shadow-inner placeholder-slate-600">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div>
                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Software Logo/Image <span class="text-rose-400">*</span></label>
                    <div class="relative w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus-within:border-cyan-500 focus-within:ring-2 focus-within:ring-cyan-500/20 transition-all shadow-inner flex items-center gap-4">
                        <i class="ri-image-add-line text-slate-400 text-lg"></i>
                        <input type="file" name="image" required accept="image/*" class="w-full bg-transparent text-slate-400 focus:outline-none cursor-pointer">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">External Link URL (Optional)</label>
                    <input type="url" name="link_url" value="{{ old('link_url') }}"
                        placeholder="https://example.com/external-site"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all shadow-inner placeholder-slate-600">
                </div>
            </div>
        </div>

        {{-- Section 2: Description --}}
        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-2">
            <div class="flex items-center gap-4 mb-8">
                <span class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xs">02</span>
                <h2 class="text-xl font-bold text-white tracking-tight">Description</h2>
            </div>

            <div class="space-y-8">
                <div>
                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Short Description <span class="text-rose-400">*</span></label>
                    <input type="text" name="short_desc" value="{{ old('short_desc') }}" required
                        placeholder="One-line summary of the software"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all shadow-inner placeholder-slate-600">
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Full Description <span class="text-rose-400">*</span></label>
                    <textarea name="long_desc" rows="6" required
                        placeholder="Detailed description, features, system requirements, licensing info..."
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all resize-none shadow-inner placeholder-slate-600">{{ old('long_desc') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Section 3: Solutions --}}
        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-2" x-data="{
            solutions: {{ json_encode(old('solutions', [['title' => '', 'logoText' => '', 'header' => '', 'desc' => '', 'btnText' => '', 'quote' => '', 'author' => '', 'image' => '', 'link' => '']])) }},
            addSolution() {
                this.solutions.push({ title: '', logoText: '', header: '', desc: '', btnText: '', quote: '', author: '', image: '', link: '' });
            },
            removeSolution(index) {
                this.solutions.splice(index, 1);
            }
        }">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-4">
                    <span class="w-8 h-8 rounded-lg bg-teal-500/20 flex items-center justify-center text-teal-400 font-bold text-xs">03</span>
                    <h2 class="text-xl font-bold text-white tracking-tight">Suite of Solutions</h2>
                </div>
                <button type="button" @click="addSolution()" class="px-4 py-2 bg-white/5 hover:bg-white/10 rounded-xl text-xs font-bold text-teal-400 flex items-center gap-2 transition-all">
                    <i class="ri-add-line"></i> Add Tab
                </button>
            </div>

            <div class="space-y-6">
                <template x-for="(sol, index) in solutions" :key="index">
                    <div class="p-6 bg-slate-900/50 rounded-2xl border border-white/5 relative group">
                        <button type="button" @click="removeSolution(index)" class="absolute top-4 right-4 w-8 h-8 rounded-lg bg-rose-500/10 text-rose-400 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                        <h4 class="text-sm font-bold text-slate-300 mb-4" x-text="'Solution Tab #' + (index + 1)"></h4>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tab Title</label>
                                <input type="text" x-model="sol.title" :name="`solutions[${index}][title]`" required placeholder="e.g. Improve System Attendance" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Logo Text</label>
                                <input type="text" x-model="sol.logoText" :name="`solutions[${index}][logoText]`" required placeholder="e.g. PixelForge Attendance" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Main Header</label>
                                <input type="text" x-model="sol.header" :name="`solutions[${index}][header]`" required placeholder="e.g. Start Tracking Presence" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Button Text</label>
                                <input type="text" x-model="sol.btnText" :name="`solutions[${index}][btnText]`" required placeholder="e.g. Explore System Telemetry" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Description</label>
                                <textarea x-model="sol.desc" :name="`solutions[${index}][desc]`" required rows="2" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"></textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Quote Content</label>
                                <textarea x-model="sol.quote" :name="`solutions[${index}][quote]`" required rows="2" placeholder="Testimonial quote..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"></textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Quote Author</label>
                                <input type="text" x-model="sol.author" :name="`solutions[${index}][author]`" required placeholder="e.g. Elizabeth Lalor, Deputy Director..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Button Link (Optional)</label>
                                <input type="url" x-model="sol.link" :name="`solutions[${index}][link]`" placeholder="e.g. https://example.com/demo" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Image Mockup (Optional)</label>
                                <div class="relative w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-sm font-medium text-slate-300 focus-within:border-cyan-500 focus-within:ring-1 focus-within:ring-cyan-500 transition-all shadow-inner flex items-center gap-3">
                                    <i class="ri-image-add-line text-slate-400"></i>
                                    <input type="file" :name="`solutions[${index}][image_file]`" accept="image/*" class="w-full bg-transparent text-slate-400 focus:outline-none cursor-pointer text-xs">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Section 4: Status --}}
        <div class="glass-card rounded-[32px] border-white/5 shadow-2xl p-10 reveal reveal-delay-3">
            <div class="flex items-center gap-4 mb-8">
                <span class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center text-amber-400 font-bold text-xs">04</span>
                <h2 class="text-xl font-bold text-white tracking-tight">Visibility</h2>
            </div>

            <div class="p-6 bg-emerald-500/5 rounded-3xl border border-emerald-500/10 flex items-center justify-between shadow-sm max-w-sm">
                <div>
                    <h4 class="text-sm font-bold text-white mb-1">Active / Published</h4>
                    <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Visible on frontend</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" class="sr-only peer" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <div class="w-14 h-7 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                </label>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex justify-end gap-4 pt-2">
            <a href="{{ route('admin.it.software.index') }}"
                class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">
                Cancel
            </a>
            <button type="submit" :disabled="isSubmitting"
                class="px-12 py-4 bg-cyan-600 hover:bg-cyan-500 disabled:opacity-60 disabled:cursor-not-allowed text-white font-black uppercase tracking-widest text-[11px] rounded-2xl shadow-xl shadow-cyan-500/20 active:scale-95 flex items-center gap-3 transition-all">
                <template x-if="!isSubmitting"><span>Save Software</span></template>
                <template x-if="isSubmitting">
                    <div class="flex items-center gap-2">
                        <i class="ri-loader-4-line animate-spin text-lg"></i>
                        <span>Saving...</span>
                    </div>
                </template>
            </button>
        </div>
    </form>
</div>
@endsection
