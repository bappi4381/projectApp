@extends('layouts.admin')
@section('title', 'Refine Story | Graphics Studio')

@push('styles')
    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    {{-- Tom Select CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <style>
        /* Tom Select Dark Mode Fixes */
        .ts-control {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 0.75rem !important;
            color: white !important;
            padding: 0.75rem 1rem !important;
            box-shadow: none !important;
        }
        .ts-dropdown {
            background-color: #1e293b !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 0.75rem !important;
            margin-top: 5px !important;
            color: white !important;
        }
        .ts-dropdown .active {
            background-color: rgba(99, 102, 241, 0.2) !important;
            color: #818cf8 !important;
        }
        .ts-dropdown .option:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }
        .ts-control .item {
            color: white !important;
        }
        .ts-dropdown .create:hover, .ts-dropdown .option:hover {
            background-color: #334155 !important;
        }
        .ts-control input::placeholder {
            color: #64748b !important;
        }
        
        /* Summernote Overrides */
        .note-editor.note-frame {
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            background: rgba(255, 255, 255, 0.02) !important;
            border-radius: 1rem !important;
            overflow: hidden !important;
            max-width: 100% !important;
        }
        .note-editor.note-frame .note-editing-area .note-editable {
            background-color: #0f172a !important; /* slate-900 */
            color: #e2e8f0 !important; /* slate-200 */
            min-height: 450px;
            font-family: inherit;
        }
        .note-editor.note-frame .note-toolbar {
            background-color: #1e293b !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            flex-wrap: wrap !important;
        }
        .note-btn {
            background-color: #334155 !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
            color: #cbd5e1 !important;
        }
        .note-btn:hover {
            background-color: #475569 !important;
            color: #fff !important;
        }

        /* Custom image upload feel */
        .image-upload-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 1.25rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .image-upload-wrapper:hover {
            border-color: #6366f1;
            background: rgba(99, 102, 241, 0.05);
            transform: translateY(-2px);
        }
        .image-preview {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 10;
        }

        /* Prevent X-Overflow */
        .admin-form-container {
            max-width: 100vw;
            overflow-x: hidden;
        }
    </style>
@endpush

@section('content')
<div class="p-4 md:p-8 max-w-7xl mx-auto admin-form-container">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12 reveal">
        <div>
            <h1 class="text-3xl md:text-4xl font-black text-white mb-2 tracking-tight">Refine Story</h1>
            <p class="text-slate-400 font-medium">Updating: <span class="text-indigo-400">"{{ $post->title }}"</span></p>
        </div>
        <div class="flex items-center gap-3">
             <a href="{{ route('graphics.blog.single', $post->slug) }}" target="_blank" class="inline-flex items-center gap-2 py-3 px-6 bg-white/5 border border-white/5 rounded-2xl hover:bg-white/10 transition-all text-sm font-bold text-slate-300">
                <i class="ri-eye-line"></i>
                <span class="hidden md:inline">View Live</span>
            </a>
            <a href="{{ route('admin.graphics.blog.index') }}" class="inline-flex items-center gap-2 py-3 px-6 bg-slate-900 border border-white/5 rounded-2xl hover:bg-slate-800 transition-all text-sm font-bold text-slate-300">
                <i class="ri-close-line"></i>
                <span>Discard</span>
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-10 p-6 bg-rose-500/10 border border-rose-500/20 rounded-3xl">
            <div class="flex items-center gap-3 mb-3 text-rose-500">
                <i class="ri-error-warning-fill text-xl"></i>
                <h4 class="font-bold">Validation Errors</h4>
            </div>
            <ul class="grid md:grid-cols-2 gap-x-6 list-disc list-inside text-rose-400/80 text-sm font-medium">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.graphics.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="blogForm" class="pb-20">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- Form Content (Main Column) --}}
            <div class="lg:col-span-8 space-y-8">
                <div class="glass-card p-1 md:p-8 rounded-[2rem] border-white/5 shadow-2xl overflow-hidden">
                    <div class="p-6 md:p-0 space-y-8">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-4 ml-1">Article Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" required placeholder="e.g. The Future of Visual Identity in 2026" 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-5 text-xl font-bold text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all placeholder:text-slate-700">
                        </div>

                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-4 ml-1">Editorial Excerpt</label>
                            <textarea name="excerpt" rows="3" placeholder="A short, compelling summary to hook your readers..." 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-5 text-slate-300 focus:outline-none focus:border-indigo-500 transition-all placeholder:text-slate-700 resize-none">{{ old('excerpt', $post->excerpt) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-4 ml-1">Story Content</label>
                            @if(is_array($post->content))
                                <div class="mb-4 p-4 bg-amber-500/10 border border-amber-500/20 rounded-xl flex items-center gap-3 text-amber-500 text-xs">
                                    <i class="ri-alert-line text-lg"></i>
                                    <span>Modernizing block-based content to Rich Text Format. Some layout details might shift.</span>
                                </div>
                            @endif
                            <textarea id="summernote" name="content">{{ old('content', is_array($post->content) ? '' : $post->content) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar Column --}}
            <div class="lg:col-span-4 space-y-8 lg:sticky lg:top-8">
                
                {{-- Featured Image --}}
                <div class="glass-card p-6 md:p-8 rounded-[2rem] border-white/5 shadow-2xl">
                    <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 mb-5 ml-1">Featured Cover</label>
                    <div onclick="document.getElementById('featured_image').click()" class="image-upload-wrapper group">
                        @if($post->featured_image)
                            <img id="preview_img" class="image-preview" src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" alt="Preview">
                        @else
                            <img id="preview_img" class="image-preview hidden" src="#" alt="Preview">
                        @endif
                        <div id="upload_placeholder" class="{{ $post->featured_image ? 'hidden' : '' }} text-center p-6 transition-transform duration-500 group-hover:scale-110">
                            <i class="ri-image-add-line text-4xl text-slate-600 mb-3 block"></i>
                            <span class="text-xs text-slate-500 font-bold uppercase tracking-widest">Update Cover</span>
                            <span class="text-[9px] text-slate-700 block mt-2 font-medium">Optimal: 1600x900px (Max 2MB)</span>
                        </div>
                    </div>
                    <input type="file" id="featured_image" name="featured_image" accept="image/*" class="hidden" onchange="previewImage(this)">
                </div>

                {{-- Post Meta & Metadata --}}
                <div class="glass-card p-6 md:p-8 rounded-[2rem] border-white/5 shadow-2xl space-y-8">
                    <h3 class="text-white font-black text-sm uppercase tracking-widest border-b border-white/5 pb-4">Story Parameters</h3>
                    
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1">Assigned Discipline</label>
                        <select id="category-select" name="category" required>
                            <option value="">Select Category...</option>
                            @foreach($services as $service)
                                <option value="{{ $service->name }}" {{ old('category', $post->category) == $service->name ? 'selected' : '' }}>{{ $service->name }}</option>
                            @endforeach
                            <option value="General" {{ old('category', $post->category) == 'General' ? 'selected' : '' }}>Editorial News</option>
                            <option value="Process" {{ old('category', $post->category) == 'Process' ? 'selected' : '' }}>Our Process</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1">Position</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $post->sort_order) }}" 
                                class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-indigo-500 transition-all font-bold">
                        </div>
                        <div class="flex flex-col justify-end">
                             <div class="flex items-center justify-between px-4 py-3 bg-slate-900/50 rounded-xl border border-white/5">
                                <span class="text-[9px] font-black text-slate-500 uppercase">Live</span>
                                <label class="relative inline-flex items-center cursor-pointer scale-90">
                                    <input type="checkbox" name="is_published" class="sr-only peer" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-5 bg-emerald-600 hover:bg-emerald-500 text-white font-black uppercase tracking-[0.2em] text-xs rounded-2xl transition-all shadow-xl shadow-emerald-500/20 active:scale-95">
                        Commit Changes
                    </button>
                    
                    <p class="text-[9px] text-slate-500 text-center font-medium italic">Last updated: {{ $post->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    {{-- jQuery (Required for Summernote) --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- Summernote JS --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    {{-- Tom Select JS --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_img').attr('src', e.target.result).fadeIn(600);
                    $('#preview_img').removeClass('hidden').css('display', 'block');
                    $('#upload_placeholder').fadeOut(300);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function() {
            // Summernote
            $('#summernote').summernote({
                placeholder: 'Refine your visual story here...',
                tabsize: 2,
                height: 450,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-btn').addClass('px-2 py-1.5 transition-all');
                    }
                }
            });

            // Tom Select
            new TomSelect('#category-select', {
                create: true,
                persist: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "Search or define category..."
            });
        });
    </script>
@endpush
@endsection
