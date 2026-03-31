{{-- resources/views/graphics/upload.blade.php --}}
@extends('layouts.app')
@section('title', 'File Upload Information | Graphics Studio')

@section('content')

{{-- ── PREMIUM PAGE HEADER ──────────────────────────── --}}
<div class="relative pt-36 pb-28 md:pt-44 md:pb-36 overflow-hidden">
    {{-- Dark Corporate Gradient Background --}}
    <div class="absolute inset-0 bg-gradient-to-br from-[#0e1726] via-[#112a46] to-[#0a4a82]"></div>
    {{-- Subtle overlay image for texture --}}
    <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center mix-blend-overlay"></div>
    {{-- Dot Grid overlay --}}
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-widest mb-6 drop-shadow-lg">File Upload Information</h1>
        <div class="flex justify-center gap-1.5">
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
        </div>
    </div>
</div>

{{-- ── MAIN CONTENT AREA ────────────────────────────── --}}
<div class="bg-slate-50 pb-24 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Floating Content Card --}}
        <div class="bg-white rounded-t-xl rounded-b-xl shadow-2xl shadow-slate-200 border border-slate-100 -mt-20 relative z-20 p-8 md:p-12 mb-12">
            
            {{-- Info Paragraph --}}
            <div class="mb-12 text-justify text-sm leading-loose text-slate-600">
                <span class="float-left bg-[#1072C2] text-white font-bold px-3 py-2 mr-3 rounded-sm text-lg shadow-md">Y</span>
                ou can transfer files to <a href="#" class="text-[#1072C2] font-semibold hover:underline transition-all">Color Experts International, Inc.</a> by using the Hightail upload box or WeTransfer. The <strong class="text-slate-800">file upload</strong> capacity via Hightail is a maximum of <strong class="text-slate-800">500GB</strong>. So, if you have bulk images, upload them through a zip file. An automatic alert will go simultaneously to you as well as the CEI production after uploading is completed. If you need to send more than 500GB or a large number of files, access to our <strong class="text-slate-800">FTP server</strong> is a better choice. Please <a href="#" class="text-[#1072C2] font-semibold hover:underline transition-all">Contact Us</a> or email to: <a href="mailto:info@colorexpertsbd.com" class="text-slate-800 font-semibold hover:text-[#1072C2] transition-colors border-b border-slate-300 hover:border-[#1072C2]">info@colorexpertsbd.com</a> for <strong class="text-slate-800">FTP account</strong> information, User Name, and Password. This information is personalized, highly confidential, and will be shared only between the client and the CEI staff. Thereafter, use <strong class="text-slate-800">FileZilla</strong> or any other FTP client to download files in Windows, or FetchSoftworks if you are using MAC.
            </div>

            {{-- Alert Box --}}
            <div class="bg-[#fefce8] border-l-4 border-yellow-400 p-5 rounded-r-md mb-16 shadow-sm">
                <div class="flex gap-4">
                    <div class="text-yellow-600 mt-1">
                        <i class="ri-error-warning-fill text-xl"></i>
                    </div>
                    <div class="text-[13px] leading-relaxed text-slate-700">
                        <strong class="text-slate-900 block mb-1">PLEASE DO NOT CLOSE THIS PAGE DURING UPLOADING:</strong> 
                        If the following error appears, '<span class="italic font-medium">File upload temporarily unavailable.</span> Please try again later,' the page needs to be refreshed until the error is removed. <br>
                        <span class="text-slate-500 text-xs mt-2 block">* Please fill up the information below, in the Message field.</span>
                    </div>
                </div>
            </div>

            {{-- Upload via Hightail Section --}}
            <div class="text-center mb-8">
                <div class="inline-flex justify-center items-center w-14 h-14 bg-gradient-to-br from-[#0e1726] to-[#1072C2] text-white rounded-full mb-4 shadow-lg">
                    <i class="ri-cloud-line text-2xl"></i>
                </div>
                <h2 class="text-2xl font-black text-[#1a1a1a] uppercase tracking-wide">Upload via Hightail</h2>
            </div>

            {{-- Hightail Mockup UI --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden mb-20 shadow-2xl max-w-3xl mx-auto border border-[#333]">
                {{-- Hightail Top Bar --}}
                <div class="bg-[#111] px-5 py-3 flex justify-between items-center">
                    <div class="text-[#1ebba3] font-black tracking-[0.2em] text-[10px]">HIGHTAIL</div>
                    <div class="flex items-center gap-4">
                        <span class="text-white/50 text-xs hidden sm:inline">Like what you see?</span>
                        <button class="bg-[#1072C2] hover:bg-[#0c5c9e] text-white px-4 py-1.5 rounded text-[10px] uppercase font-bold tracking-widest transition-colors">SIGN UP FOR FREE</button>
                        <button class="border border-white/20 hover:border-white/50 text-white px-4 py-1.5 rounded text-[10px] uppercase tracking-widest transition-colors">SIGN IN</button>
                    </div>
                </div>
                
                {{-- Hightail Body --}}
                <div class="p-10 md:p-14 text-center">
                    <h3 class="text-white text-xl md:text-2xl font-normal mb-8 tracking-wide">Deliver files directly to</h3>
                    
                    <div class="w-20 h-20 bg-[#252525] border border-[#333] rounded-full mx-auto mb-5 flex items-center justify-center shadow-[0_0_30px_rgba(0,0,0,0.5)]">
                        <i class="ri-palette-fill text-3xl text-[#1072C2]"></i>
                    </div>
                    
                    <div class="text-white font-bold text-xl tracking-wide mb-1">Color Experts</div>
                    <div class="text-slate-400 text-xs tracking-widest mb-12">INFO@COLOREXPERTSBD.COM</div>

                    {{-- Drag & Drop Area --}}
                    <div class="border-2 border-dashed border-[#444] rounded-lg p-10 md:p-14 hover:bg-[#252525] hover:border-[#1072C2] transition-all cursor-pointer max-w-lg mx-auto mb-6 relative group">
                        <div class="absolute inset-x-0 -top-3.5 text-center">
                            <span class="bg-[#1e1e1e] px-4 py-1 text-white/70 text-sm font-medium tracking-wide border border-[#333] rounded-full">Drag files anywhere</span>
                        </div>
                        <div class="text-[10px] text-white/40 font-bold uppercase tracking-[0.3em] mb-6">OR ADD FROM</div>
                        <button class="bg-[#e74c3c] hover:bg-[#c0392b] text-white px-8 py-3 rounded-full text-xs font-black uppercase tracking-[0.2em] transition-all shadow-lg shadow-red-500/20 group-hover:scale-105 active:scale-95">
                            MY COMPUTER
                        </button>
                    </div>
                </div>
            </div>

            {{-- Divider --}}
            <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-16"></div>

            {{-- WeTransfer & FTP Section --}}
            <div class="text-center mb-10">
                <div class="inline-flex justify-center items-center w-14 h-14 bg-slate-100 text-[#1072C2] rounded-full mb-4">
                    <i class="ri-upload-cloud-2-line text-2xl"></i>
                </div>
                <h2 class="text-2xl font-black text-[#1a1a1a] uppercase tracking-wide">WeTransfer & FTP Upload</h2>
            </div>

            {{-- 4 Action Buttons --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="#" class="bg-white border-2 border-[#e74c3c] hover:bg-[#e74c3c] text-[#e74c3c] hover:text-white py-3.5 px-4 rounded-md flex flex-col items-center justify-center gap-2 text-[10px] font-black uppercase tracking-widest transition-all shadow-sm group">
                    <i class="ri-share-forward-fill text-xl group-hover:-translate-y-1 transition-transform"></i> WeTransfer
                </a>
                <a href="#" class="bg-white border-2 border-[#1ebba3] hover:bg-[#1ebba3] text-[#1ebba3] hover:text-white py-3.5 px-4 rounded-md flex flex-col items-center justify-center gap-2 text-[10px] font-black uppercase tracking-widest transition-all shadow-sm group">
                    <i class="ri-book-read-fill text-xl group-hover:-translate-y-1 transition-transform"></i> FTP Tutorial
                </a>
                <a href="#" class="bg-white border-2 border-[#2c3e50] hover:bg-[#2c3e50] text-[#2c3e50] hover:text-white py-3.5 px-4 rounded-md flex flex-col items-center justify-center gap-2 text-[10px] font-black uppercase tracking-widest transition-all shadow-sm group">
                    <i class="ri-user-add-fill text-xl group-hover:-translate-y-1 transition-transform"></i> Request Account
                </a>
                <a href="#" class="bg-white border-2 border-[#f1c40f] hover:bg-[#f1c40f] text-slate-800 hover:text-slate-900 py-3.5 px-4 rounded-md flex flex-col items-center justify-center gap-2 text-[10px] font-black uppercase tracking-widest transition-all shadow-sm group">
                    <i class="ri-download-cloud-2-fill text-xl group-hover:-translate-y-1 transition-transform"></i> FTP Software
                </a>
            </div>

        </div>
    </div>
</div>

<style>
    /* Ensure the navbar respects the dark header background before scrolling */
    #main-navbar:not(.nav-scrolled) .studio-nav-link { color: white; }
    #main-navbar:not(.nav-scrolled) .logo-text-primary { color: white; }
    #main-navbar:not(.nav-scrolled) .logo-text-secondary { color: rgba(255,255,255,0.6); }
    
    /* When scrolled, let the javascript toggle text colors naturally */
</style>

@endsection
