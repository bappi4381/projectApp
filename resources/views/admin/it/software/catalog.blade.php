@extends('layouts.admin')
@section('title', 'Software Catalog | React UI')

@section('content')
<div class="p-8 h-[calc(100vh-2rem)] flex flex-col">
    <div class="mb-6 reveal shrink-0">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Software Catalog</h1>
        <p class="text-slate-400 font-medium text-sm italic">In-memory React application for software management.</p>
    </div>

    <!-- React Root Container -->
    <div id="react-software-app" class="flex-grow flex bg-[#0f172a] border border-white/10 rounded-[32px] overflow-hidden shadow-2xl relative z-10 reveal reveal-delay-1 min-h-0"></div>
</div>

@push('scripts')
    <!-- Load React. Note: we are loading React and Babel via CDN to fulfill the user's explicit request for a React state-based application inside the existing Blade architecture -->
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <script type="text/babel">
        const { useState } = React;

        function App() {
            const [softwareList, setSoftwareList] = useState([]);
            const [selectedId, setSelectedId] = useState(null);
            const [isAdding, setIsAdding] = useState(true);

            // Form State
            const [formData, setFormData] = useState({
                name: '',
                shortDesc: '',
                longDesc: '',
                imageUrl: '',
                category: ''
            });

            const handleInputChange = (e) => {
                const { name, value } = e.target;
                setFormData(prev => ({ ...prev, [name]: value }));
            };

            const handleSubmit = (e) => {
                e.preventDefault();
                const newSoftware = {
                    ...formData,
                    id: Date.now().toString() // Simple unique ID
                };
                setSoftwareList(prev => [...prev, newSoftware]);
                setFormData({ name: '', shortDesc: '', longDesc: '', imageUrl: '', category: '' });
                setSelectedId(newSoftware.id);
                setIsAdding(false);
            };

            const selectedSoftware = softwareList.find(s => s.id === selectedId);

            return (
                <div className="flex w-full h-full">
                    {/* 2. Sidebar / Submenu Navigation */}
                    <div className="w-80 border-r border-white/5 bg-slate-900/50 flex flex-col shrink-0">
                        <div className="p-6 border-b border-white/5">
                            <button 
                                onClick={() => { setIsAdding(true); setSelectedId(null); }}
                                className={`w-full py-4 rounded-xl transition-all shadow-lg text-sm font-bold flex items-center justify-center gap-2 ${isAdding ? 'bg-cyan-600 text-white shadow-cyan-500/20' : 'bg-white/5 text-slate-300 hover:bg-cyan-600 hover:text-white'}`}>
                                <i className="ri-add-line text-lg"></i> Add New Software
                            </button>
                        </div>
                        <div className="flex-1 overflow-y-auto p-4 space-y-2 custom-sidebar-scroll">
                            {softwareList.length === 0 ? (
                                <div className="text-center mt-10">
                                    <div className="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-slate-600 mx-auto mb-3">
                                        <i className="ri-inbox-line text-xl"></i>
                                    </div>
                                    <p className="text-slate-500 text-[11px] uppercase tracking-widest font-black">No entries yet</p>
                                </div>
                            ) : (
                                softwareList.map(sw => (
                                    <button 
                                        key={sw.id}
                                        onClick={() => { setSelectedId(sw.id); setIsAdding(false); }}
                                        className={`w-full text-left p-4 rounded-xl transition-all group ${selectedId === sw.id && !isAdding ? 'bg-cyan-500/10 border border-cyan-500/20 text-cyan-400' : 'bg-transparent border border-transparent text-slate-300 hover:bg-white/5 hover:border-white/10'}`}>
                                        <div className="font-bold truncate text-[13px] group-hover:text-cyan-400 transition-colors">{sw.name}</div>
                                        {sw.category && (
                                            <div className="text-[9px] uppercase tracking-wider text-slate-500 mt-1 truncate">{sw.category}</div>
                                        )}
                                    </button>
                                ))
                            )}
                        </div>
                    </div>

                    {/* Right Content Area */}
                    <div className="flex-1 overflow-y-auto bg-[#0f172a] custom-sidebar-scroll relative">
                        {isAdding ? (
                            /* 1. Database / Entry System Form */
                            <div className="max-w-3xl mx-auto p-12">
                                <div className="flex items-center gap-3 mb-8">
                                    <div className="w-10 h-10 rounded-xl bg-cyan-500/20 flex items-center justify-center text-cyan-400">
                                        <i className="ri-file-add-line text-xl"></i>
                                    </div>
                                    <h2 className="text-2xl font-bold text-white tracking-tight">Software Entry Form</h2>
                                </div>
                                
                                <form onSubmit={handleSubmit} className="space-y-6">
                                    <div className="grid grid-cols-2 gap-6">
                                        <div className="col-span-2 md:col-span-1">
                                            <label className="block text-[10px] uppercase tracking-widest font-black text-slate-500 mb-2 ml-1">Software Name</label>
                                            <input type="text" name="name" value={formData.name} onChange={handleInputChange} required 
                                                className="w-full bg-slate-900 border border-white/10 rounded-xl px-5 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 transition-all shadow-inner" 
                                                placeholder="e.g. Adobe Photoshop" />
                                        </div>
                                        <div className="col-span-2 md:col-span-1">
                                            <label className="block text-[10px] uppercase tracking-widest font-black text-slate-500 mb-2 ml-1">Category (Optional)</label>
                                            <input type="text" name="category" value={formData.category} onChange={handleInputChange} 
                                                className="w-full bg-slate-900 border border-white/10 rounded-xl px-5 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 transition-all shadow-inner" 
                                                placeholder="e.g. Design Tool" />
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label className="block text-[10px] uppercase tracking-widest font-black text-slate-500 mb-2 ml-1">Image URL (Linkable)</label>
                                        <input type="url" name="imageUrl" value={formData.imageUrl} onChange={handleInputChange} required 
                                            className="w-full bg-slate-900 border border-white/10 rounded-xl px-5 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 transition-all shadow-inner" 
                                            placeholder="https://example.com/image.png" />
                                    </div>
                                    
                                    <div>
                                        <label className="block text-[10px] uppercase tracking-widest font-black text-slate-500 mb-2 ml-1">Short Description (1-2 lines)</label>
                                        <input type="text" name="shortDesc" value={formData.shortDesc} onChange={handleInputChange} required 
                                            className="w-full bg-slate-900 border border-white/10 rounded-xl px-5 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 transition-all shadow-inner" 
                                            placeholder="Industry standard raster graphics editor..." />
                                    </div>
                                    
                                    <div>
                                        <label className="block text-[10px] uppercase tracking-widest font-black text-slate-500 mb-2 ml-1">Full Details / Long Description</label>
                                        <textarea name="longDesc" value={formData.longDesc} onChange={handleInputChange} required rows="6" 
                                            className="w-full bg-slate-900 border border-white/10 rounded-xl px-5 py-4 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 transition-all resize-none shadow-inner"
                                            placeholder="Detailed specifications and feature lists..."></textarea>
                                    </div>
                                    
                                    <div className="pt-6 flex justify-end">
                                        <button type="submit" className="px-12 py-4 bg-cyan-600 hover:bg-cyan-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl transition-all shadow-xl shadow-cyan-500/20 active:scale-95 flex items-center gap-2">
                                            <i className="ri-save-line"></i> Save to Memory
                                        </button>
                                    </div>
                                </form>
                            </div>
                        ) : selectedSoftware ? (
                            /* 3 & 4. Software Detail Page / Card */
                            <div className="max-w-4xl mx-auto p-12">
                                <div className="flex flex-col md:flex-row gap-12">
                                    {/* Clickable Image (Card element) */}
                                    <div className="shrink-0 group w-full md:w-72">
                                        <a href={selectedSoftware.imageUrl} target="_blank" rel="noreferrer" className="block relative rounded-3xl overflow-hidden bg-slate-900 border border-white/10 shadow-2xl aspect-square">
                                            <img src={selectedSoftware.imageUrl} alt={selectedSoftware.name} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                                            <div className="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                                                <div className="w-12 h-12 rounded-full bg-cyan-500 flex items-center justify-center shadow-lg shadow-cyan-500/50 text-white">
                                                    <i className="ri-external-link-line text-xl"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <div className="mt-4 text-center">
                                            <span className="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Click image to view original</span>
                                        </div>
                                    </div>

                                    {/* Software Details */}
                                    <div className="flex-1">
                                        {selectedSoftware.category && (
                                            <span className="inline-block px-3 py-1 bg-cyan-500/10 text-cyan-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-lg border border-cyan-500/20 mb-4">
                                                {selectedSoftware.category}
                                            </span>
                                        )}
                                        <h2 className="text-4xl font-black text-white tracking-tight mb-4 leading-tight">{selectedSoftware.name}</h2>
                                        
                                        {/* Short Description */}
                                        <div className="p-5 bg-slate-800/50 rounded-2xl border border-white/5 mb-8">
                                            <p className="text-lg text-cyan-100 font-medium leading-relaxed">{selectedSoftware.shortDesc}</p>
                                        </div>
                                        
                                        {/* Full Details */}
                                        <div>
                                            <h3 className="text-[11px] uppercase tracking-[0.2em] font-black text-slate-500 mb-4 flex items-center gap-2">
                                                <i className="ri-information-line text-cyan-500 text-sm"></i> Full Specifications
                                            </h3>
                                            <div className="prose prose-invert prose-slate max-w-none">
                                                <p className="text-slate-300 leading-relaxed whitespace-pre-wrap font-medium">{selectedSoftware.longDesc}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ) : (
                            <div className="h-full flex items-center justify-center">
                                <div className="text-center p-10 bg-slate-900/50 rounded-3xl border border-white/5 max-w-sm">
                                    <div className="w-20 h-20 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-4xl text-cyan-400 mx-auto mb-6 shadow-inner border border-cyan-500/20">
                                        <i className="ri-mac-line"></i>
                                    </div>
                                    <h3 className="text-xl font-bold text-white mb-2">Welcome to Catalog</h3>
                                    <p className="text-slate-400 font-medium text-sm">Create a new entry or select an existing software from the sidebar to view details.</p>
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            );
        }

        const root = ReactDOM.createRoot(document.getElementById('react-software-app'));
        root.render(<App />);
    </script>
@endpush
