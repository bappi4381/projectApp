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
        isActive: {{ $category->is_active ? 'true' : 'false' }}
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

                {{-- Toggles: Status & Details --}}
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-6 bg-emerald-500/5 rounded-3xl border border-emerald-500/10 flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-bold text-white mb-1">Is Active?</h4>
                            <p class="text-[10px] text-slate-500 font-medium">Enable/Disable visibility of this vertical across the platform.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" class="sr-only peer" x-model="isActive" value="1">
                            <div class="w-14 h-7 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            <span class="ml-3 text-xs font-black uppercase tracking-widest" :class="isActive ? 'text-emerald-400' : 'text-slate-600'" x-text="isActive ? 'Yes' : 'No'"></span>
                        </label>
                    </div>

                    <div class="p-6 bg-indigo-500/5 rounded-3xl border border-indigo-500/10 flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-bold text-white mb-1">Has Details?</h4>
                            <p class="text-[10px] text-slate-500 font-medium">Toggle for Linkable Detail Page.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="has_details" class="sr-only peer" x-model="hasDetails" value="1">
                            <div class="w-14 h-7 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                            <span class="ml-3 text-xs font-black uppercase tracking-widest" :class="hasDetails ? 'text-indigo-400' : 'text-slate-600'" x-text="hasDetails ? 'Yes' : 'No'"></span>
                        </label>
                    </div>
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
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Hero Heading</label>
                            <input type="text" name="hero_heading" value="{{ old('hero_heading', $category->hero_heading) }}" placeholder="e.g. Professional Image Editing"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-emerald-500 transition-all mb-6">
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Short Description</label>
                            <textarea name="short_description" rows="2" placeholder="Brief summary of the vertical..." class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-medium text-slate-300 focus:outline-none focus:border-emerald-500 transition-all resize-none mb-6">{{ old('short_description', $category->short_description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Video Link (YouTube/Vimeo)</label>
                            <input type="url" name="video_link" value="{{ old('video_link', $category->video_link) }}" placeholder="https://..."
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-emerald-500 transition-all mb-6">
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Full/Landing Page Description</label>
                            <textarea name="full_description" rows="5" placeholder="Detailed description for the landing page..." class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-emerald-500 transition-all resize-none mb-6">{{ old('full_description', $category->full_description) }}</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Old Description (Legacy/Fallback)</label>
                            <textarea name="description" rows="3" class="w-full bg-white/5 border border-white/10 rounded-[2rem] px-8 py-6 text-sm font-medium text-slate-300 focus:outline-none focus:border-emerald-500 transition-all resize-none">{{ old('description', $category->description) }}</textarea>
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
