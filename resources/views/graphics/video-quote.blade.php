@extends('layouts.app')
@section('title', 'Get a Video Quote | Graphics Studio')

@section('content')

    {{-- ── SUCCESS MESSAGE OVERLAY ───────────────────────── --}}
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm" 
         x-data="{ 
            show: @json(session()->has('quote_success')),
            data: @json(session('quote_success') ?? ['invoice_id' => '', 'email' => ''])
         }" 
         x-show="show || $root.querySelector('[x-data]').__x.$data.successData"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-cloak>
        
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 text-center relative overflow-hidden" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 to-blue-600"></div>
            
            <div class="mb-6 inline-flex items-center justify-center w-20 h-20 bg-green-50 rounded-full text-green-500 shadow-inner">
                <i class="ri-checkbox-circle-fill text-5xl"></i>
            </div>
            
            <h2 class="text-2xl font-black text-slate-800 mb-2 uppercase tracking-tight">Request Received!</h2>
            <p class="text-slate-500 mb-6 text-sm leading-relaxed">
                Thank you! Your video quote request has been successfully submitted. Our team will review your requirements and get back to you within 30 minutes.
            </p>
            
            <div class="bg-slate-50 rounded-xl p-5 mb-8 border border-slate-100">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Invoice ID</span>
                    <span class="text-sm font-bold text-blue-600">#<span x-text="data.invoice_id || ($root.querySelector('[x-data]').__x.$data.successData?.invoice_id)"></span></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Confirmation Sent To</span>
                    <span class="text-sm font-bold text-slate-700" x-text="data.email || ($root.querySelector('[x-data]').__x.$data.successData?.email)"></span>
                </div>
            </div>
            
            <div class="flex flex-col gap-3">
                <button @click="show = false; $root.querySelector('[x-data]').__x.$data.successData = null" class="w-full py-4 bg-slate-800 hover:bg-slate-900 text-white font-black uppercase tracking-widest text-[11px] rounded-xl transition-all shadow-lg">
                    Got it, Thanks
                </button>
            </div>
        </div>
    </div>

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
            <form action="{{ route('graphics.get-quote.post') }}" method="POST" enctype="multipart/form-data" x-ref="quoteForm"
                class="max-w-3xl mx-auto space-y-8" 
                x-data="{ 
                    dragging: false, 
                    files: [], 
                    loading: false, 
                    uploadProgress: 0,
                    successData: null,
                    submitForm() {
                        this.loading = true;
                        this.uploadProgress = 0;
                        let formData = new FormData(this.$refs.quoteForm);
                        axios.post(this.$refs.quoteForm.action, formData, {
                            onUploadProgress: (progressEvent) => {
                                if (progressEvent.lengthComputable) {
                                    this.uploadProgress = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                                }
                            }
                        })
                        .then(res => {
                            this.successData = res.data;
                            this.loading = false;
                        })
                        .catch(err => {
                            const msg = err.response?.data?.message || 'Upload failed. Please check file sizes or connection.';
                            alert(msg);
                            this.loading = false;
                        });
                    }
                }" 
                @submit.prevent="submitForm()">
                @csrf

                {{-- File Upload Zone --}}
                <div class="border-2 border-dashed border-slate-300 rounded-xl p-12 text-center bg-slate-50/50 relative transition-all duration-300 hover:border-blue-400 hover:bg-blue-50/30"
                    @dragover.prevent="dragging = true"
                    @dragleave.prevent="dragging = false"
                    @drop.prevent="dragging = false; files = [...$event.dataTransfer.files]; $refs.fileInput.files = $event.dataTransfer.files"
                    :class="dragging ? 'border-blue-500 bg-blue-50' : ''">

                    <input type="file" name="files[]" multiple class="hidden" x-ref="fileInput"
                        @change="files = [...$event.target.files]">

                    <div class="mb-6">
                        <p class="text-sm font-bold text-slate-700">
                            Upload Your Assets <span class="font-normal text-slate-500">(Max 500MB/file)</span>
                        </p>
                    </div>

                    <button type="button" @click="$refs.fileInput.click()"
                        class="px-10 py-3.5 rounded-full bg-slate-800 hover:bg-slate-900 text-white text-[12px] font-black transition-all inline-flex items-center gap-3 shadow-xl uppercase tracking-widest active:scale-95">
                        <i class="ri-upload-cloud-2-line text-xl"></i> Select Files
                    </button>

                    <div x-show="files.length > 0" class="mt-6 flex flex-wrap justify-center gap-2" x-cloak>
                        <template x-for="file in files" :key="file.name">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-[10px] font-bold border border-blue-200">
                                <i class="ri-file-video-line mr-1"></i>
                                <span x-text="file.name.substring(0, 20) + (file.name.length > 20 ? '...' : '')"></span>
                            </span>
                        </template>
                    </div>
                </div>

                {{-- Form Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Name --}}
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required placeholder="John Doe"
                               class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3.5 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all shadow-sm">
                    </div>
                    {{-- Email --}}
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required placeholder="john@example.com"
                               class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3.5 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all shadow-sm">
                    </div>
                </div>

                {{-- Instructions --}}
                <div class="space-y-1.5">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Project Instructions & Links <span class="text-red-500">*</span></label>
                    <textarea name="instructions" required rows="5" placeholder="Tell us about your video project. Include links to larger files (Drive/WeTransfer) here."
                              class="w-full bg-white border border-slate-200 rounded-xl px-5 py-4 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all shadow-sm resize-none"></textarea>
                </div>

                {{-- Hidden defaults --}}
                <input type="hidden" name="services[]" value="Video Editing & Motion Graphics">

                {{-- Note text --}}
                <div class="text-center bg-yellow-50/50 border border-yellow-100 rounded-xl p-5">
                    <p class="text-[12px] text-yellow-800 leading-relaxed">
                        <span class="font-black uppercase tracking-tighter mr-1">Note:</span> If you have raw footage and sample video files exceeding 500MB, please provide the download links (Google Drive, WeTransfer, etc.) in the instruction box above.
                    </p>
                </div>

                {{-- Submit Section --}}
                <div class="flex flex-col items-center gap-6 pt-4">
                    {{-- Progress Bar --}}
                    <div x-show="loading && uploadProgress > 0" class="w-full bg-slate-100 rounded-full h-4 overflow-hidden mb-2" x-cloak>
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full transition-all duration-300 flex items-center justify-center"
                             :style="`width: ${uploadProgress}%`"
                             :class="uploadProgress < 10 ? 'min-w-[2rem]' : ''">
                            <span class="text-[9px] font-black text-white" x-text="uploadProgress + '%'"></span>
                        </div>
                    </div>

                    <button type="submit" :disabled="loading"
                        class="w-full md:w-auto min-w-[280px] bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white py-4 px-12 rounded-full font-black uppercase tracking-[0.2em] text-[13px] transition-all shadow-2xl shadow-blue-500/20 active:scale-[0.98] disabled:opacity-70 disabled:cursor-wait flex items-center justify-center gap-3">
                        <template x-if="!loading">
                            <span>Submit Quote Request</span>
                        </template>
                        <template x-if="loading">
                            <div class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span x-text="uploadProgress < 100 ? 'Uploading Assets...' : 'Processing Quote...'"></span>
                            </div>
                        </template>
                    </button>
                    
                    <div class="text-center">
                        <p class="text-[11px] text-slate-400">
                            By submitting this request, you agree to our
                            <a href="#" class="text-blue-600 font-bold hover:underline">Terms & Conditions</a> and
                            <a href="#" class="text-blue-600 font-bold hover:underline">Privacy Policy</a>
                        </p>
                    </div>
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
        [x-cloak] { display: none !important; }
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