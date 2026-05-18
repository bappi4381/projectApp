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
                <div className="flex w-full h-full bg-[#020617] relative">
                    {/* Decorative Background Elements */}
                    <div className="absolute top-0 left-0 w-96 h-96 bg-cyan-500/10 blur-[120px] rounded-full pointer-events-none"></div>
                    <div className="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500/10 blur-[120px] rounded-full pointer-events-none"></div>

                    {/* Sidebar / Navigation */}
                    <div className="w-80 border-r border-white/5 bg-slate-900/60 backdrop-blur-xl flex flex-col shrink-0 relative z-10 shadow-[20px_0_50px_rgba(0,0,0,0.3)]">
                        <div className="p-6 border-b border-white/5 relative">
                            <button 
                                onClick={() => { setIsAdding(true); setSelectedId(null); }}
                                className={`relative w-full py-4 rounded-2xl transition-all duration-300 text-[13px] font-black uppercase tracking-widest flex items-center justify-center gap-3 overflow-hidden group ${isAdding ? 'bg-gradient-to-r from-cyan-600 to-cyan-400 text-white shadow-[0_0_20px_rgba(6,182,212,0.4)] border border-cyan-400/50' : 'bg-slate-800/50 text-slate-400 border border-white/5 hover:bg-slate-800 hover:text-white'}`}>
                                {isAdding && <div className="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>}
                                <i className="ri-add-circle-fill text-lg relative z-10"></i> 
                                <span className="relative z-10">Add Software</span>
                            </button>
                        </div>
                        <div className="flex-1 overflow-y-auto p-4 space-y-2 custom-sidebar-scroll">
                            {softwareList.length === 0 ? (
                                <div className="text-center mt-12 px-4">
                                    <div className="w-16 h-16 rounded-2xl bg-slate-800/50 border border-white/5 flex items-center justify-center text-slate-500 mx-auto mb-4 shadow-inner">
                                        <i className="ri-ghost-smile-line text-3xl"></i>
                                    </div>
                                    <p className="text-slate-400 text-xs font-medium leading-relaxed">Your catalog is empty.<br/>Start by adding your first software.</p>
                                </div>
                            ) : (
                                softwareList.map(sw => (
                                    <button 
                                        key={sw.id}
                                        onClick={() => { setSelectedId(sw.id); setIsAdding(false); }}
                                        className={`w-full text-left p-4 rounded-2xl transition-all duration-300 group relative overflow-hidden ${selectedId === sw.id && !isAdding ? 'bg-cyan-500/10 border border-cyan-500/30' : 'bg-transparent border border-transparent hover:bg-white/[0.03] hover:border-white/5'}`}>
                                        
                                        {selectedId === sw.id && !isAdding && (
                                            <div className="absolute left-0 top-0 bottom-0 w-1 bg-cyan-400 shadow-[0_0_10px_rgba(34,211,238,0.8)]"></div>
                                        )}

                                        <div className="flex items-center gap-3">
                                            <div className={`w-10 h-10 rounded-xl flex items-center justify-center shrink-0 transition-all ${selectedId === sw.id && !isAdding ? 'bg-cyan-500/20 text-cyan-400 shadow-inner border border-cyan-500/20' : 'bg-slate-800 text-slate-500 group-hover:text-cyan-400'}`}>
                                                <i className="ri-app-store-fill text-lg"></i>
                                            </div>
                                            <div className="min-w-0">
                                                <div className={`font-bold truncate text-[14px] transition-colors ${selectedId === sw.id && !isAdding ? 'text-white' : 'text-slate-300 group-hover:text-white'}`}>{sw.name}</div>
                                                {sw.category ? (
                                                    <div className="text-[10px] font-black uppercase tracking-widest text-cyan-500/70 mt-0.5 truncate">{sw.category}</div>
                                                ) : (
                                                    <div className="text-[10px] font-black uppercase tracking-widest text-slate-600 mt-0.5 truncate">Uncategorized</div>
                                                )}
                                            </div>
                                        </div>
                                    </button>
                                ))
                            )}
                        </div>
                    </div>

                    {/* Main Content Area */}
                    <div className="flex-1 overflow-y-auto custom-sidebar-scroll relative z-10 bg-gradient-to-br from-slate-900/40 to-slate-950/80 backdrop-blur-sm">
                        {isAdding ? (
                            /* Entry Form */
                            <div className="max-w-4xl mx-auto p-10 lg:p-16">
                                <div className="mb-10 flex items-center justify-between">
                                    <div>
                                        <h2 className="text-3xl font-black text-white tracking-tight mb-2 flex items-center gap-3">
                                            <span className="w-12 h-12 rounded-2xl bg-gradient-to-tr from-cyan-600 to-cyan-400 flex items-center justify-center shadow-[0_0_20px_rgba(6,182,212,0.3)]">
                                                <i className="ri-file-add-fill text-white text-xl"></i>
                                            </span>
                                            Register Software
                                        </h2>
                                        <p className="text-slate-400 text-sm font-medium ml-15">Add a new software product to the central catalog.</p>
                                    </div>
                                </div>
                                
                                <form onSubmit={handleSubmit} className="space-y-8 glass-card bg-white/[0.02] border border-white/5 rounded-[2rem] p-8 lg:p-10 shadow-2xl relative overflow-hidden">
                                    <div className="absolute top-0 right-0 w-64 h-64 bg-cyan-500/5 blur-[80px] rounded-full pointer-events-none"></div>

                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                                        <div className="group">
                                            <label className="block text-[11px] uppercase tracking-[0.2em] font-black text-cyan-500 mb-3 ml-1 group-focus-within:text-cyan-400 transition-colors">Software Name</label>
                                            <input type="text" name="name" value={formData.name} onChange={handleInputChange} required 
                                                className="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/50 transition-all shadow-inner backdrop-blur-sm" 
                                                placeholder="e.g. Adobe Premiere Pro" />
                                        </div>
                                        <div className="group">
                                            <label className="block text-[11px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1 group-focus-within:text-cyan-400 transition-colors">Category</label>
                                            <input type="text" name="category" value={formData.category} onChange={handleInputChange} 
                                                className="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/50 transition-all shadow-inner backdrop-blur-sm" 
                                                placeholder="e.g. Video Editing" />
                                        </div>
                                    </div>
                                    
                                    <div className="group relative z-10">
                                        <label className="block text-[11px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1 group-focus-within:text-cyan-400 transition-colors">Cover Image URL</label>
                                        <div className="relative">
                                            <div className="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                                                <i className="ri-image-circle-line text-slate-500 group-focus-within:text-cyan-400 transition-colors text-lg"></i>
                                            </div>
                                            <input type="url" name="imageUrl" value={formData.imageUrl} onChange={handleInputChange} required 
                                                className="w-full bg-slate-900/50 border border-white/10 rounded-2xl pl-14 pr-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/50 transition-all shadow-inner backdrop-blur-sm" 
                                                placeholder="https://example.com/high-res-cover.png" />
                                        </div>
                                    </div>
                                    
                                    <div className="group relative z-10">
                                        <label className="block text-[11px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1 group-focus-within:text-cyan-400 transition-colors">Short Overview</label>
                                        <input type="text" name="shortDesc" value={formData.shortDesc} onChange={handleInputChange} required 
                                            className="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-cyan-100 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/50 transition-all shadow-inner backdrop-blur-sm" 
                                            placeholder="A brief, compelling description of the software..." />
                                    </div>
                                    
                                    <div className="group relative z-10">
                                        <label className="block text-[11px] uppercase tracking-[0.2em] font-black text-slate-500 mb-3 ml-1 group-focus-within:text-cyan-400 transition-colors">Detailed Specifications</label>
                                        <textarea name="longDesc" value={formData.longDesc} onChange={handleInputChange} required rows="5" 
                                            className="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-5 text-sm font-medium text-slate-300 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/50 transition-all resize-none shadow-inner backdrop-blur-sm leading-relaxed"
                                            placeholder="Provide in-depth features, system requirements, and integration details..."></textarea>
                                    </div>
                                    
                                    <div className="pt-6 flex justify-end relative z-10 border-t border-white/5">
                                        <button type="submit" className="group relative px-10 py-4 bg-white text-slate-900 hover:text-white hover:bg-transparent font-black uppercase tracking-[0.2em] text-[11px] rounded-2xl transition-all duration-300 overflow-hidden shadow-[0_0_20px_rgba(255,255,255,0.2)]">
                                            <div className="absolute inset-0 bg-gradient-to-r from-cyan-600 to-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                                            <div className="flex items-center gap-3">
                                                <i className="ri-save-3-fill text-lg"></i>
                                                <span>Save to Memory</span>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        ) : selectedSoftware ? (
                            /* Detail View */
                            <div className="max-w-5xl mx-auto p-10 lg:p-16">
                                <div className="glass-card bg-slate-900/40 border border-white/5 rounded-[2.5rem] p-8 lg:p-12 shadow-2xl relative overflow-hidden backdrop-blur-xl">
                                    <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-500/10 blur-[100px] rounded-full pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
                                    
                                    <div className="flex flex-col lg:flex-row gap-12 lg:gap-16 relative z-10">
                                        {/* Image Section */}
                                        <div className="shrink-0 w-full lg:w-[320px]">
                                            <div className="group relative rounded-[2rem] overflow-hidden bg-slate-950 border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.5)] aspect-[4/3] lg:aspect-auto lg:h-[400px]">
                                                <img src={selectedSoftware.imageUrl} alt={selectedSoftware.name} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out opacity-90 group-hover:opacity-100" />
                                                <div className="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-60"></div>
                                                
                                                <a href={selectedSoftware.imageUrl} target="_blank" rel="noreferrer" className="absolute inset-0 bg-slate-900/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                                                    <div className="w-14 h-14 rounded-full bg-cyan-500 flex items-center justify-center shadow-[0_0_30px_rgba(6,182,212,0.6)] text-white transform scale-90 group-hover:scale-100 transition-transform duration-300 delay-100">
                                                        <i className="ri-external-link-fill text-2xl"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        {/* Content Section */}
                                        <div className="flex-1 flex flex-col justify-center">
                                            <div className="mb-6 flex flex-wrap items-center gap-3">
                                                {selectedSoftware.category && (
                                                    <span className="inline-flex items-center gap-1.5 px-3 py-1.5 bg-cyan-500/10 text-cyan-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl border border-cyan-500/20">
                                                        <i className="ri-price-tag-3-fill"></i>
                                                        {selectedSoftware.category}
                                                    </span>
                                                )}
                                                <span className="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl border border-emerald-500/20">
                                                    <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                                    Active
                                                </span>
                                            </div>
                                            
                                            <h2 className="text-4xl lg:text-5xl font-black text-white tracking-tight mb-6 leading-[1.1]">{selectedSoftware.name}</h2>
                                            
                                            <div className="p-6 bg-white/[0.03] rounded-2xl border border-white/5 mb-8 border-l-4 border-l-cyan-500 shadow-inner">
                                                <p className="text-lg lg:text-xl text-cyan-50 font-medium leading-relaxed">{selectedSoftware.shortDesc}</p>
                                            </div>
                                            
                                            <div>
                                                <h3 className="text-[12px] uppercase tracking-[0.2em] font-black text-slate-400 mb-4 flex items-center gap-2">
                                                    <i className="ri-file-list-3-fill text-cyan-500"></i> Full Overview
                                                </h3>
                                                <div className="prose prose-invert prose-slate max-w-none">
                                                    <p className="text-slate-300 leading-relaxed whitespace-pre-wrap font-medium text-[15px]">{selectedSoftware.longDesc}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ) : (
                            /* Empty / Welcome State */
                            <div className="h-full flex items-center justify-center p-10">
                                <div className="text-center max-w-md relative z-10">
                                    <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/20 blur-[100px] rounded-full pointer-events-none -z-10"></div>
                                    
                                    <div className="w-24 h-24 rounded-[2rem] bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center text-5xl text-cyan-400 mx-auto mb-8 shadow-[0_20px_50px_rgba(0,0,0,0.4)] border border-white/10 relative group">
                                        <div className="absolute inset-0 rounded-[2rem] bg-cyan-400/20 opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-500"></div>
                                        <i className="ri-macbook-line relative z-10 transform group-hover:scale-110 transition-transform duration-500"></i>
                                    </div>
                                    <h3 className="text-3xl font-black text-white mb-4 tracking-tight">Software Catalog</h3>
                                    <p className="text-slate-400 font-medium text-base leading-relaxed mb-8">
                                        Select an existing software from the sidebar to view its details, or register a new one to expand your catalog.
                                    </p>
                                    <button 
                                        onClick={() => setIsAdding(true)}
                                        className="px-8 py-3.5 rounded-xl bg-white/5 text-white font-bold text-sm border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all shadow-lg flex items-center gap-2 mx-auto">
                                        <i className="ri-add-line text-cyan-400"></i> Get Started
                                    </button>
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
