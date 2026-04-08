<nav class="w-72 min-h-screen bg-slate-900/50 border-r border-white/5 backdrop-blur-xl flex flex-col p-6 sticky top-0">
    {{-- Header / Logo --}}
    <div class="flex items-center gap-3 mb-10 pl-2">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-indigo-700 flex items-center justify-center text-white shadow-lg shadow-indigo-500/20">
            <i class="ri-fire-fill text-xl"></i>
        </div>
        <span class="text-xl font-black tracking-tight text-white">PixelForge</span>
    </div>

    {{-- Menu Group: General --}}
    <div class="space-y-1 mb-8">
        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-4 pl-2">General</p>
        
        <a href="{{ route('admin.service-selection') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.service-selection') ? 'bg-indigo-500/10 text-indigo-400 font-bold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            <i class="ri-grid-fill"></i>
            <span>Portal Home</span>
        </a>
    </div>

    {{-- Menu Group: Graphics Studio --}}
    <div class="space-y-1 mb-8">
        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-4 pl-2">Graphics Studio</p>
        
        <a href="{{ route('admin.graphics.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.graphics.dashboard') ? 'bg-indigo-500/10 text-indigo-400 font-bold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            <i class="ri-dashboard-line"></i>
            <span>Overview</span>
        </a>

        <a href="{{ route('admin.graphics.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.graphics.services.*') ? 'bg-indigo-500/10 text-indigo-400 font-bold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            <i class="ri-scissors-2-line"></i>
            <span>Services List</span>
        </a>

        <a href="{{ route('admin.graphics.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.graphics.categories.*') || request()->routeIs('admin.graphics.subcategories.*') ? 'bg-indigo-500/10 text-indigo-400 font-bold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            <i class="ri-node-tree"></i>
            <span>Architecture Management</span>
        </a>

        <a href="{{ route('admin.graphics.blog.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.graphics.blog.*') ? 'bg-indigo-500/10 text-indigo-400 font-bold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            <i class="ri-article-line"></i>
            <span>Blog Management</span>
        </a>

        <a href="{{ route('admin.graphics.testimonials.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.graphics.testimonials.*') ? 'bg-indigo-500/10 text-indigo-400 font-bold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            <i class="ri-chat-quote-line"></i>
            <span>Testimonials</span>
        </a>
    </div>

    {{-- Bottom Group: System --}}
    <div class="mt-auto pt-6 border-t border-white/5 space-y-1">
         <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-white transition-all text-sm">
            <i class="ri-home-4-line"></i>
            <span>Client Site</span>
        </a>
        
        <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-rose-400 transition-all text-sm group">
                <i class="ri-logout-circle-r-line transition-transform group-hover:translate-x-1"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</nav>
