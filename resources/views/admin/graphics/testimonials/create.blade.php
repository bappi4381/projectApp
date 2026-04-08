@extends('layouts.admin')
@section('title', 'Register Quote | Graphics Studio')

@push('styles')
    <style>
        .image-upload-wrapper {
            position: relative;
            width: 140px;
            height: 140px;
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s;
        }
        .image-upload-wrapper:hover {
            border-color: #6366f1;
            background: rgba(99, 102, 241, 0.05);
        }
        .avatar-preview {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }
    </style>
@endpush

@section('content')
<div class="p-4 md:p-8 max-w-5xl mx-auto overflow-x-hidden">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12 reveal">
        <div>
            <h1 class="text-3xl md:text-4xl font-black text-white mb-2 tracking-tight">Register Quote</h1>
            <p class="text-slate-400 font-medium">Record a new client endorsement in the records.</p>
        </div>
        <a href="{{ route('admin.graphics.testimonials.index') }}" class="inline-flex items-center gap-2 py-3 px-6 bg-slate-900 border border-white/5 rounded-2xl hover:bg-slate-800 transition-all text-sm font-bold text-slate-300">
            <i class="ri-arrow-left-line"></i>
            <span>Back to VOX</span>
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-10 p-6 bg-rose-500/10 border border-rose-500/20 rounded-3xl">
            <ul class="list-disc list-inside text-rose-400 font-medium text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.graphics.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="grid lg:grid-cols-12 gap-8">
        @csrf
        
        {{-- Avatar Space --}}
        <div class="lg:col-span-4 lg:sticky lg:top-8">
            <div class="glass-card p-8 rounded-[2.5rem] border-white/5 shadow-2xl flex flex-col items-center text-center">
                <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-6 w-full">Client Avatar</label>
                <div onclick="document.getElementById('avatar').click()" class="image-upload-wrapper group">
                    <img id="preview_img" class="avatar-preview" src="#" alt="Preview">
                    <div id="upload_placeholder" class="text-center p-4">
                        <i class="ri-user-add-line text-3xl text-slate-600 mb-2 block"></i>
                        <span class="text-[9px] text-slate-500 font-bold uppercase tracking-widest">Upload Photo</span>
                    </div>
                </div>
                <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewImage(this)">
                <p class="text-[9px] text-slate-500 mt-6 font-medium italic">Square aspect ratio recommended for optimal rendering.</p>
            </div>
        </div>

        {{-- Details Space --}}
        <div class="lg:col-span-8 space-y-8">
            <div class="glass-card p-8 rounded-[2.5rem] border-white/5 shadow-2xl space-y-8">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1">Client Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Johnathan Smith" 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1">Identity / Designation</label>
                        <input type="text" name="designation" value="{{ old('designation') }}" placeholder="e.g. CEO @ BrandForge" 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1">Testimonial Content</label>
                    <textarea name="content" rows="6" required placeholder="Paste the client testimonial here..." 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-medium text-slate-300 focus:outline-none focus:border-indigo-500 transition-all resize-none">{{ old('content') }}</textarea>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-end">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1">Experience Score (1-5)</label>
                        <select name="rating" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark">
                            <option value="5">5 - Exceptional</option>
                            <option value="4">4 - High Quality</option>
                            <option value="3">3 - Standard</option>
                            <option value="2">2 - Below Expectation</option>
                            <option value="1">1 - Poor</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1">Position (Weight)</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" 
                             class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-900/50 rounded-2xl border border-white/5 mt-6">
                    <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Active Representation</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    </label>
                </div>

                <button type="submit" class="w-full py-5 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-[0.2em] text-xs rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95">
                    Register to VOX
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_img').attr('src', e.target.result).fadeIn(600);
                    $('#preview_img').css('display', 'block');
                    $('#upload_placeholder').fadeOut(300);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
@endsection
