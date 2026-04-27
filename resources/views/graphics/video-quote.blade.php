@extends('layouts.app')
@section('title', 'Get a Video Quote | Graphics Studio')

@section('content')

    {{-- Force light theme wrapper --}}
    <div class="bg-white min-h-screen text-[#333] font-sans pt-40 lg:pt-56" style="padding-top: 180px;">

        <div class="container mx-auto px-6 max-w-4xl pb-20">

            {{-- ── PAGE HEADER ─────────────────────────────────────── --}}
            <div class="text-center mb-12">
                <h1 class="text-2xl md:text-3xl font-bold italic text-[#222]">
                    Get the best price for Video Editing & Motion Graphics
                </h1>
            </div>

            {{-- ── QUOTE FORM / UPLOAD SECTION ─────────────────────── --}}
            <form action="{{ route('graphics.get-quote.post') }}" method="POST" enctype="multipart/form-data"
                class="max-w-2xl mx-auto">
                @csrf

                {{-- File Upload Zone --}}
                <div class="border border-dashed border-[#888] rounded-sm p-12 text-center bg-white relative mb-6 transition-all duration-300"
                    x-data="{ dragging: false, files: [] }" @dragover.prevent="dragging = true"
                    @dragleave.prevent="dragging = false"
                    @drop.prevent="dragging = false; files = [...$event.dataTransfer.files]"
                    :class="dragging ? 'border-blue-500 bg-blue-50' : ''">

                    <input type="file" id="file-input" name="files[]" multiple class="hidden"
                        @change="files = [...$event.target.files]">

                    <div class="mb-6">
                        <p class="text-[13px] font-bold text-[#555]">
                            Upload Your Files <span class="font-normal text-slate-500">(max 500mb/file, 6 files only)</span>
                        </p>
                    </div>

                    <button type="button" onclick="document.getElementById('file-input').click()"
                        class="px-8 py-2.5 rounded bg-[#5289b8] hover:bg-[#4577a3] text-white text-[13px] font-bold transition-all inline-flex items-center gap-2 shadow-sm uppercase tracking-wide">
                        <i class="ri-upload-cloud-2-fill text-xl opacity-60"></i> UPLOAD FILES
                    </button>

                    <div x-show="files.length > 0" class="mt-4 text-[#5289b8] font-bold text-sm" x-cloak>
                        <span x-text="files.length + ' file(s) selected'"></span>
                    </div>
                </div>

                {{-- Note text --}}
                <div class="mb-10 text-center text-left md:text-center">
                    <p class="text-[11px] text-[#666] leading-relaxed max-w-[90%] mx-auto">
                        <span class="italic text-slate-500">Note:</span> If you have raw footage and sample video files,
                        send us download link into Instruction box or you can upload them through our Upload Page. Please
                        mention Quote Details in the message.
                    </p>
                </div>

                {{-- Navigation Buttons --}}
                <div class="flex items-center justify-between border border-slate-200 rounded-sm overflow-hidden mb-12">
                    <a href="{{ route('graphics.video-pricing') }}"
                        class="flex-1 text-center py-3.5 text-[10px] font-bold text-[#999] hover:text-[#555] bg-white hover:bg-slate-50 transition-colors uppercase tracking-[0.15em]">
                        &lt; PREVIOUS
                    </a>
                    <div class="w-px bg-slate-200 h-10"></div>
                    <button type="submit"
                        class="flex-1 text-center py-3.5 text-[10px] font-bold text-[#666] hover:text-[#333] bg-white hover:bg-slate-50 transition-colors uppercase tracking-[0.15em]">
                        NEXT &gt;
                    </button>
                </div>

                {{-- Terms --}}
                <div class="text-center mb-16">
                    <p class="text-[12px] text-[#222]">
                        By submitting Quote you are automatically agreeing with our
                        <a href="#" class="text-[#0c5a9e] hover:underline">Terms and Conditions</a> and
                        <a href="#" class="text-[#0c5a9e] hover:underline">Privacy Policy</a>
                    </p>
                </div>

            </form>

            {{-- ── USEFUL INSTRUCTIONS (Accordion) ─────────────────── --}}
            <div class="max-w-3xl mx-auto mt-16 mb-8" x-data="{ activeAccordion: 1 }">
                <div class="text-center mb-10">
                    <span class="inline-block py-1 px-3 rounded-full bg-[#e8f0fe] text-[#0c5a9e] text-xs font-black uppercase tracking-[0.2em] mb-3">Help Center</span>
                    <h3 class="text-2xl md:text-3xl font-black text-[#1e293b]">Useful Instructions</h3>
                </div>

                <div class="space-y-4">
                    {{-- Item 1 --}}
                    <div class="bg-white rounded-2xl border transition-all duration-300 overflow-hidden"
                         :class="activeAccordion === 1 ? 'border-[#0c5a9e]/30 shadow-[0_10px_30px_rgba(12,90,158,0.1)]' : 'border-slate-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-[0_8px_20px_rgba(0,0,0,0.04)]'">
                        <button @click="activeAccordion = activeAccordion === 1 ? null : 1" 
                                class="w-full flex items-center justify-between px-6 py-5 md:px-8 md:py-6 text-left group">
                            <div class="flex items-center gap-5">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 shrink-0"
                                     :class="activeAccordion === 1 ? 'bg-[#0c5a9e] text-white shadow-lg shadow-[#0c5a9e]/30' : 'bg-slate-50 text-slate-400 group-hover:bg-[#e8f0fe] group-hover:text-[#0c5a9e]'">
                                    1
                                </div>
                                <span class="text-base font-bold transition-colors duration-300"
                                      :class="activeAccordion === 1 ? 'text-[#0c5a9e]' : 'text-slate-700 group-hover:text-[#0c5a9e]'">
                                    How many files can be uploaded?
                                </span>
                            </div>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300 shrink-0"
                                 :class="activeAccordion === 1 ? 'bg-[#e8f0fe] text-[#0c5a9e]' : 'text-slate-300 group-hover:text-[#0c5a9e]'">
                                <i class="ri-arrow-down-s-line text-xl transition-transform duration-300" :class="activeAccordion === 1 ? 'rotate-180' : ''"></i>
                            </div>
                        </button>
                        <div x-show="activeAccordion === 1" x-collapse x-cloak>
                            <div class="px-6 pb-6 md:px-8 md:pb-8 pt-0 pl-[4.75rem] md:pl-[6.25rem]">
                                <p class="text-[14px] text-slate-500 leading-relaxed font-medium">
                                    You can upload up to <strong class="text-slate-700">6 files</strong> directly through this form. For more files or larger sizes (exceeding 500MB per file), please securely use a cloud storage link (such as Google Drive, Dropbox, or WeTransfer) and paste the public link in the instructions box.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 2 --}}
                    <div class="bg-white rounded-2xl border transition-all duration-300 overflow-hidden"
                         :class="activeAccordion === 2 ? 'border-[#0c5a9e]/30 shadow-[0_10px_30px_rgba(12,90,158,0.1)]' : 'border-slate-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-[0_8px_20px_rgba(0,0,0,0.04)]'">
                        <button @click="activeAccordion = activeAccordion === 2 ? null : 2" 
                                class="w-full flex items-center justify-between px-6 py-5 md:px-8 md:py-6 text-left group">
                            <div class="flex items-center gap-5">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 shrink-0"
                                     :class="activeAccordion === 2 ? 'bg-[#0c5a9e] text-white shadow-lg shadow-[#0c5a9e]/30' : 'bg-slate-50 text-slate-400 group-hover:bg-[#e8f0fe] group-hover:text-[#0c5a9e]'">
                                    2
                                </div>
                                <span class="text-base font-bold transition-colors duration-300"
                                      :class="activeAccordion === 2 ? 'text-[#0c5a9e]' : 'text-slate-700 group-hover:text-[#0c5a9e]'">
                                    How to upload bulks at a time?
                                </span>
                            </div>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300 shrink-0"
                                 :class="activeAccordion === 2 ? 'bg-[#e8f0fe] text-[#0c5a9e]' : 'text-slate-300 group-hover:text-[#0c5a9e]'">
                                <i class="ri-arrow-down-s-line text-xl transition-transform duration-300" :class="activeAccordion === 2 ? 'rotate-180' : ''"></i>
                            </div>
                        </button>
                        <div x-show="activeAccordion === 2" x-collapse x-cloak>
                            <div class="px-6 pb-6 md:px-8 md:pb-8 pt-0 pl-[4.75rem] md:pl-[6.25rem]">
                                <p class="text-[14px] text-slate-500 leading-relaxed font-medium">
                                    For bulk uploads, we highly recommend compressing all your assets into a single <strong class="text-slate-700">.zip archive</strong>. This ensures all files are kept together and upload speeds are optimized.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 3 --}}
                    <div class="bg-white rounded-2xl border transition-all duration-300 overflow-hidden"
                         :class="activeAccordion === 3 ? 'border-[#0c5a9e]/30 shadow-[0_10px_30px_rgba(12,90,158,0.1)]' : 'border-slate-100 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-[0_8px_20px_rgba(0,0,0,0.04)]'">
                        <button @click="activeAccordion = activeAccordion === 3 ? null : 3" 
                                class="w-full flex items-center justify-between px-6 py-5 md:px-8 md:py-6 text-left group">
                            <div class="flex items-center gap-5">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 shrink-0"
                                     :class="activeAccordion === 3 ? 'bg-[#0c5a9e] text-white shadow-lg shadow-[#0c5a9e]/30' : 'bg-slate-50 text-slate-400 group-hover:bg-[#e8f0fe] group-hover:text-[#0c5a9e]'">
                                    3
                                </div>
                                <span class="text-base font-bold transition-colors duration-300"
                                      :class="activeAccordion === 3 ? 'text-[#0c5a9e]' : 'text-slate-700 group-hover:text-[#0c5a9e]'">
                                    What are the file formats you allow?
                                </span>
                            </div>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300 shrink-0"
                                 :class="activeAccordion === 3 ? 'bg-[#e8f0fe] text-[#0c5a9e]' : 'text-slate-300 group-hover:text-[#0c5a9e]'">
                                <i class="ri-arrow-down-s-line text-xl transition-transform duration-300" :class="activeAccordion === 3 ? 'rotate-180' : ''"></i>
                            </div>
                        </button>
                        <div x-show="activeAccordion === 3" x-collapse x-cloak>
                            <div class="px-6 pb-6 md:px-8 md:pb-8 pt-0 pl-[4.75rem] md:pl-[6.25rem]">
                                <p class="text-[14px] text-slate-500 leading-relaxed font-medium">
                                    We accept all industry-standard formats including <strong class="text-slate-700">MP4, MOV, AVI, raw footage formats, PSD, AI, ZIP,</strong> and other standard video and design files.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        body {
            background: white !important;
            color: #333 !important;
        }

        #main-navbar {
            background: #0f172a !important;
        }

        #main-navbar .studio-nav-link {
            color: white !important;
        }

        #main-navbar .logo-text-primary {
            color: white !important;
        }
    </style>

@endsection