<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Technical Test HostData - MOCHAMMAD FAHREL PUTRA ARDIANSYAH</title>

        <!-- Fonts: Inter & JetBrains Mono -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; scroll-behavior: smooth; }
            .mono { font-family: 'JetBrains Mono', monospace; }
            .entry-animation { animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
            @keyframes slideUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .grid-subtle {
                background-image: radial-gradient(circle, #e2e8f0 1px, transparent 1px);
                background-size: 24px 24px;
            }
        </style>
    </head>
    <body class="bg-[#fcfdfe] text-slate-900 selection:bg-blue-100">
        
        <div class="fixed inset-0 grid-subtle opacity-70 z-[-1]"></div>

        <div class="min-h-screen flex flex-col max-w-4xl mx-auto px-6 py-12 lg:py-20">
            
            <!-- Header -->
            <header class="flex justify-between items-center mb-20 entry-animation" style="animation-delay: 100ms">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <span class="font-bold tracking-tight text-slate-800 uppercase text-xs tracking-widest">IT Ops Assessment</span>
                </div>
                <div class="hidden sm:flex items-center px-4 py-1.5 rounded-full bg-white border border-slate-200 shadow-sm transition hover:shadow-md">
                    <span class="relative flex h-2 w-2 mr-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 italic">Systems Active</span>
                </div>
            </header>

            <main class="space-y-24">
                <!-- Hero Section -->
                <section class="space-y-8 entry-animation" style="animation-delay: 200ms">
                    <div class="space-y-3">
                        <p class="mono text-blue-600 text-sm font-semibold tracking-tighter uppercase">HostData Recruitment Task</p>
                        <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-slate-900 leading-tight">
                            IT <br/>Support<span class="text-blue-600">.</span>
                        </h1>
                    </div>
                    
                    <div class="flex flex-wrap gap-4">
                        <a href="#guestbook" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-blue-200 hover:bg-blue-700 transition hover:scale-[1.02] active:scale-[0.98]">
                            <span>View Guestbook</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 13l-7 7-7-7m14-8l-7 7-7-7"/></svg>
                        </a>
                    </div>
                </section>

                <!-- Support Info Grid -->
                <section class="grid grid-cols-1 md:grid-cols-2 gap-px bg-slate-200 border border-slate-200 rounded-3xl overflow-hidden shadow-2xl shadow-slate-200/40 entry-animation" style="animation-delay: 300ms">
                    <!-- Identity -->
                    <div class="bg-white p-10 space-y-8">
                        <div class="space-y-1">
                            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Primary Candidate</h3>
                            <p class="text-2xl font-bold text-slate-900 tracking-tight">Mochammad Fahrel Putra Ardiansyah</p>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Dedicated IT Support professional committed to infrastructure reliability and system performance optimization.
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span class="px-3 py-1 bg-slate-50 border border-slate-100 rounded-lg text-[10px] font-bold text-slate-600 uppercase">Support</span>
                            <span class="px-3 py-1 bg-slate-50 border border-slate-100 rounded-lg text-[10px] font-bold text-slate-600 uppercase">Network</span>
                            <span class="px-3 py-1 bg-slate-50 border border-slate-100 rounded-lg text-[10px] font-bold text-slate-600 uppercase">Hardware</span>
                        </div>
                    </div>

                    <!-- Tech Specs -->
                    <div class="bg-slate-50/50 p-10 space-y-8">
                        <div class="space-y-6">
                            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Technical Specification</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Laravel Version</span>
                                    <span class="mono text-xs font-bold text-blue-600">{{ app()->version() }}</span>
                                </div>
                                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">PHP Version</span>
                                    <span class="mono text-xs font-bold text-slate-700">{{ PHP_VERSION }}</span>
                                </div>
                                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Architecture</span>
                                    <span class="mono text-xs font-bold text-slate-700 uppercase italic">MVC Integrated</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Integrated Guestbook CRUD -->
                <section id="guestbook" class="space-y-12 entry-animation" style="animation-delay: 400ms">
                    <div class="space-y-3">
                        <h2 class="text-4xl font-extrabold tracking-tight text-slate-900">System Activity Logs<span class="text-blue-600">.</span></h2>
                        <p class="text-sm text-slate-500">Live Database CRUD Integration — Verify backend functionality below.</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                        <!-- Form Column -->
                        <div class="lg:col-span-5 bg-white border border-slate-200 rounded-3xl p-8 shadow-xl shadow-slate-200/30">
                            <form action="{{ route('guestbook.store') }}" method="POST" class="space-y-5">
                                @csrf
                                <div class="space-y-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Identity Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition outline-none text-sm font-medium" placeholder="Ex: Lead Recruiter">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Direct Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition outline-none text-sm font-medium" placeholder="name@company.com">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Technical Notes</label>
                                    <textarea name="message" rows="3" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition outline-none text-sm font-medium" placeholder="Write system observation...">{{ old('message') }}</textarea>
                                </div>
                                <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-xl font-bold text-sm uppercase tracking-widest shadow-lg shadow-blue-100 hover:bg-blue-700 transition active:scale-[0.98]">
                                    Commit Entry
                                </button>
                                
                                @if(session('success'))
                                    <p class="text-xs text-emerald-600 font-bold text-center animate-pulse tracking-wide mt-2">{{ session('success') }}</p>
                                @endif
                                @if(session('error'))
                                    <p class="text-xs text-red-600 font-bold text-center tracking-wide mt-2">{{ session('error') }}</p>
                                @endif
                            </form>
                        </div>

                        <!-- List Column -->
                        <div class="lg:col-span-7 space-y-4">
                            <div class="flex items-center justify-between px-2">
                                <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Active Database Records</h3>
                                <span class="mono text-[10px] font-bold text-slate-400">{{ optional($guests)->count() ?? 0 }} entries</span>
                            </div>

                            <div class="space-y-3 max-h-[500px] overflow-y-auto pr-2 scrollbar-hide">
                                @forelse($guests as $guest)
                                    <div class="bg-white/60 border border-slate-200 rounded-2xl p-5 flex justify-between items-start transition hover:border-blue-200 hover:shadow-sm">
                                        <div class="space-y-1.5">
                                            <div class="flex items-center space-x-2">
                                                <span class="font-bold text-slate-900 text-sm tracking-tight">{{ $guest->name }}</span>
                                                <span class="text-[10px] text-slate-400 uppercase tracking-tighter mono">@ {{ $guest->created_at->format('H:i') }}</span>
                                            </div>
                                            <p class="text-xs text-slate-600 leading-relaxed italic">"{{ $guest->message }}"</p>
                                        </div>
                                        <form action="{{ route('guestbook.destroy', $guest->id) }}" method="POST" onsubmit="return confirm('Purge this record?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-slate-300 hover:text-red-500 transition p-1.5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                @empty
                                    <div class="p-12 border-2 border-dashed border-slate-100 rounded-3xl text-center">
                                        <p class="text-xs font-bold text-slate-300 uppercase tracking-widest italic">No active system logs found.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="mt-24 pt-8 border-t border-slate-200 flex justify-between items-center">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] leading-none">
                    System Integrity Verified &bull; {{ date('Y') }}
                </p>
                <span class="text-[10px] font-bold text-slate-300 uppercase tracking-widest italic">HostData Technical Assessment</span>
            </footer>
        </div>
    </body>
</html>
