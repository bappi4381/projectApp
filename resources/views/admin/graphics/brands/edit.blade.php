@extends('layouts.admin')
@section('title', 'Edit Brand Logo')

@section('content')
<div class="p-8">
    {{-- Header --}}
    <div class="mb-10 reveal">
        <a href="{{ route('admin.graphics.brands.index') }}" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-2 mb-4">
            <i class="ri-arrow-left-line"></i> Back to Brands
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit Brand Logo</h1>
        <p class="text-slate-400 font-medium text-sm italic">Update information for {{ $brand->name }}.</p>
    </div>

    <div class="max-w-4xl">
        <form action="{{ route('admin.graphics.brands.update', $brand) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf
            @method('PUT')

            <div class="glass-card rounded-[32px] border-white/5 p-10 reveal">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    {{-- Brand Name --}}
                    <div class="space-y-3">
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-1 ml-1">Brand Name</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400 transition-colors">
                                <i class="ri-building-line text-lg"></i>
                            </div>
                            <input type="text" name="name" value="{{ old('name', $brand->name) }}" required
                                   class="w-full pl-14 pr-6 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all text-sm font-bold text-white">
                        </div>
                    </div>

                    {{-- Visit URL --}}
                    <div class="space-y-3">
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-1 ml-1">Website URL (Optional)</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400 transition-colors">
                                <i class="ri-external-link-line text-lg"></i>
                            </div>
                            <input type="url" name="url" value="{{ old('url', $brand->url) }}"
                                   class="w-full pl-14 pr-6 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all text-sm font-bold text-white">
                        </div>
                    </div>

                    {{-- Sort Order --}}
                    <div class="space-y-3">
                        <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-1 ml-1">Display Order</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400 transition-colors">
                                <i class="ri-list-ordered-2 text-lg"></i>
                            </div>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $brand->sort_order) }}"
                                   class="w-full pl-14 pr-6 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all text-sm font-bold text-white">
                        </div>
                    </div>

                    {{-- Is Active Toggle --}}
                    <div class="flex items-center pt-8">
                        <label class="relative inline-flex items-center cursor-pointer group">
                            <input type="checkbox" name="is_active" class="sr-only peer" {{ $brand->is_active ? 'checked' : '' }} value="1">
                            <div class="w-14 h-7 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            <span class="ml-4 text-[11px] font-black uppercase tracking-widest text-slate-500 peer-checked:text-emerald-400 transition-colors">Active & Visible</span>
                        </label>
                    </div>
                </div>

                {{-- Image Upload --}}
                <div class="mt-12 space-y-4">
                    <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-1 ml-1">Update Logo</label>
                    <div class="relative group" x-data="{ preview: '{{ asset('storage/' . $brand->logo) }}' }">
                        <input type="file" name="logo" id="logo_input" accept="image/*" class="sr-only"
                               @change="const file = $event.target.files[0]; if (file) { preview = URL.createObjectURL(file); }">
                        <label for="logo_input" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-white/10 rounded-[2.5rem] cursor-pointer hover:bg-white/[0.02] hover:border-indigo-500/50 transition-all overflow-hidden">
                            <div class="absolute inset-0 p-10 flex items-center justify-center bg-[#020617]">
                                <img :src="preview" class="max-w-full max-h-full object-contain filter invert brightness-200">
                                <div class="absolute inset-0 bg-indigo-600/20 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-sm">
                                    <span class="px-6 py-2 bg-white text-[#020617] text-[10px] font-black uppercase tracking-widest rounded-full">Update Logo File</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-6 pt-4">
                <button type="submit" class="flex-1 px-12 py-5 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-[0.2em] text-[12px] rounded-3xl transition-all shadow-2xl shadow-indigo-600/20 active:scale-95">
                    Update Brand Details
                </button>
                <a href="{{ route('admin.graphics.brands.index') }}" class="px-10 py-5 text-slate-500 hover:text-white font-bold text-sm transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
