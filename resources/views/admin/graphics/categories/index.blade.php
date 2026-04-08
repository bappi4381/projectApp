@extends('layouts.admin')
@section('title', 'Architecture Management | Graphics Studio')

@section('content')
<div class="p-8" x-data="{ activeTab: 'categories' }">
    <div class="flex items-center justify-between mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Architecture Management</h1>
            <p class="text-slate-400 font-medium">Define and organize the hierarchical structure of your design services.</p>
        </div>
        <div class="flex items-center gap-4">
            <template x-if="activeTab === 'categories'">
                <a href="{{ route('admin.graphics.categories.create') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/20 flex items-center gap-2 group">
                    <i class="ri-add-line transition-transform group-hover:rotate-90"></i>
                    <span>Create Primary Category</span>
                </a>
            </template>
            <template x-if="activeTab === 'subcategories'">
                <a href="{{ route('admin.graphics.subcategories.create') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/20 flex items-center gap-2 group">
                    <i class="ri-add-line transition-transform group-hover:rotate-90"></i>
                    <span>Create Sub-Group</span>
                </a>
            </template>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="flex gap-2 mb-8 p-1 bg-white/5 rounded-2xl w-fit">
        <button @click="activeTab = 'categories'" 
            :class="activeTab === 'categories' ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5'"
            class="px-8 py-3 rounded-xl text-sm font-bold transition-all flex items-center gap-2">
            <i class="ri-folder-3-line"></i>
            Primary Categories
        </button>
        <button @click="activeTab = 'subcategories'" 
            :class="activeTab === 'subcategories' ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5'"
            class="px-8 py-3 rounded-xl text-sm font-bold transition-all flex items-center gap-2">
            <i class="ri-folder-reduce-line"></i>
            Navigation Sub-Groups
        </button>
    </div>

    {{-- 1. Primary Categories Section --}}
    <div x-show="activeTab === 'categories'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="reveal">
        <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 border-b border-white/5">
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Category Name</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Slug / Identity</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none text-center">Sub-Groups</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($categories as $category)
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="px-6 py-5">
                                <h4 class="font-bold text-white tracking-tight text-lg">{{ $category->name }}</h4>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-[10px] font-mono font-bold text-indigo-400 uppercase tracking-wider bg-indigo-500/5 px-2 py-1 rounded">
                                    {{ $category->slug }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-500/10 text-indigo-400 border border-indigo-500/10">
                                    {{ $category->subcategories_count }} Groups
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.graphics.categories.edit', $category) }}" class="w-9 h-9 rounded-lg bg-white/5 border border-white/5 text-slate-400 hover:text-white hover:bg-white/10 transition-all flex items-center justify-center">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.graphics.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Deleting a category will delete all its sub-categories. Proceed?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-9 h-9 rounded-lg bg-rose-500/5 border border-rose-500/10 text-rose-500/50 hover:text-rose-400 hover:bg-rose-500/10 transition-all flex items-center justify-center">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                 <div class="flex flex-col items-center gap-4">
                                     <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center text-3xl text-slate-600">
                                         <i class="ri-folder-open-line"></i>
                                     </div>
                                     <p class="text-slate-500 font-medium">No primary categories architecturalized yet.</p>
                                 </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- 2. Sub-Categories Section --}}
    <div x-show="activeTab === 'subcategories'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="reveal" style="display: none;">
        <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 border-b border-white/5">
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Sub-Group Name</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none">Parent Category</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none text-center">Services</th>
                            <th class="px-6 py-5 text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($subCategories as $subCategory)
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="px-6 py-5">
                                <h4 class="font-bold text-white tracking-tight">{{ $subCategory->name }}</h4>
                                <p class="text-[10px] text-slate-500 font-mono italic">{{ $subCategory->slug }}</p>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-bold text-slate-400 bg-slate-800/50 px-3 py-1.5 rounded-lg border border-white/5 uppercase tracking-wide">
                                    {{ $subCategory->category->name ?? 'None' }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/10">
                                    {{ $subCategory->services_count }} Services
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.graphics.subcategories.edit', $subCategory) }}" class="w-9 h-9 rounded-lg bg-white/5 border border-white/5 text-slate-400 hover:text-white hover:bg-white/10 transition-all flex items-center justify-center">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.graphics.subcategories.destroy', $subCategory) }}" method="POST" class="inline-block" onsubmit="return confirm('Confirm deletion of sub-group?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-9 h-9 rounded-lg bg-rose-500/5 border border-rose-500/10 text-rose-500/50 hover:text-rose-400 hover:bg-rose-500/10 transition-all flex items-center justify-center">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                 <div class="flex flex-col items-center gap-4">
                                     <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center text-3xl text-slate-600">
                                         <i class="ri-folder-reduce-line"></i>
                                     </div>
                                     <p class="text-slate-500 font-medium">No architectural sub-groups defined.</p>
                                 </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
