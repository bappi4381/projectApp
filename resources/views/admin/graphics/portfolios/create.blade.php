@extends('layouts.admin')
@section('title', 'Add Portfolio Item | Graphics Studio')

@section('content')
<div class="p-8">
    <div class="mb-10 reveal">
        <a href="{{ route('admin.graphics.portfolios.index') }}" class="text-indigo-400 hover:text-indigo-300 flex items-center gap-2 mb-4 text-sm font-bold transition-all">
            <i class="ri-arrow-left-line"></i> Back to List
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Add Portfolio Item</h1>
        <p class="text-slate-400 font-medium text-sm">Create a new before/after comparison piece for the gallery</p>
    </div>

    <form action="{{ route('admin.graphics.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl space-y-8 reveal reveal-delay-1">
        @csrf
        
        <div class="glass-card rounded-[24px] border-white/5 p-8 shadow-2xl space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1">Title</label>
                    <input type="text" name="title" required placeholder="e.g. Product Retouching" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1">Category</label>
                    <input type="text" name="category" required placeholder="e.g. Photo Retouching" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1">Description</label>
                <textarea name="description" rows="4" placeholder="Briefly describe the editing work performed..." class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500/50 transition-all"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1 text-indigo-400">Before Image</label>
                    <div class="relative group aspect-square rounded-2xl border-2 border-dashed border-white/10 overflow-hidden flex flex-col items-center justify-center bg-slate-800/30 hover:bg-slate-800/50 transition-all">
                        <input type="file" name="before_image" onchange="previewImage(this, 'before_preview')" class="absolute inset-0 opacity-0 cursor-pointer z-10">
                        <img id="before_preview" src="" class="absolute inset-0 w-full h-full object-cover hidden">
                        <div class="text-center group-hover:scale-110 transition-transform p-4">
                            <i class="ri-upload-cloud-2-line text-4xl text-slate-600 block mb-2"></i>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Upload Original</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1 text-emerald-400">After Image</label>
                    <div class="relative group aspect-square rounded-2xl border-2 border-dashed border-white/10 overflow-hidden flex flex-col items-center justify-center bg-slate-800/30 hover:bg-slate-800/50 transition-all">
                        <input type="file" name="after_image" onchange="previewImage(this, 'after_preview')" class="absolute inset-0 opacity-0 cursor-pointer z-10">
                        <img id="after_preview" src="" class="absolute inset-0 w-full h-full object-cover hidden">
                        <div class="text-center group-hover:scale-110 transition-transform p-4">
                            <i class="ri-upload-cloud-2-line text-4xl text-slate-600 block mb-2"></i>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Upload Edited</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1">Sort Order</label>
                    <input type="number" name="order" value="0" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1">Visibility</label>
                    <select name="is_active" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500/50 transition-all appearance-none cursor-pointer">
                        <option value="1">Active (Published)</option>
                        <option value="0">Draft (Hidden)</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1">Show on Home Page?</label>
                    <select name="show_on_home" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500/50 transition-all appearance-none cursor-pointer">
                        <option value="0">No (Default)</option>
                        <option value="1">Yes (Show in Slider)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex justify-end pr-4">
            <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl transition-all shadow-xl shadow-indigo-500/20 flex items-center gap-3 active:scale-95">
                <i class="ri-save-line text-xl"></i> Create Portfolio Item
            </button>
        </div>
    </form>
</div>

<script>
function previewImage(input, targetId) {
    const preview = document.getElementById(targetId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
