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
            body { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; }
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
                    <span class="font-bold tracking-tight text-slate-800">HostData IT Support Ops</span>
                </div>
                <div class="hidden sm:flex items-center px-4 py-1.5 rounded-full bg-white border border-slate-200 shadow-sm">
                    <span class="relative flex h-2 w-2 mr-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 italic">Terminal Active</span>
                </div>
            </header>

            <main class="flex-grow space-y-12">
                <!-- Hero Section -->
                <section class="space-y-6 entry-animation" style="animation-delay: 200ms">
                    <div class="space-y-3">
                        <p class="mono text-blue-600 text-sm font-semibold tracking-tighter uppercase">Technical Test HostData</p>
                        <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-slate-900 leading-tight">
                            MOCHAMMAD FAHREL <br/>PUTRA ARDIANSYAH<span class="text-blue-600">.</span>
                        </h1>
                    </div>
                </section>

                <!-- Support Info Grid -->
                <section class="grid grid-cols-1 md:grid-cols-2 gap-px bg-slate-200 border border-slate-200 rounded-3xl overflow-hidden shadow-2xl shadow-slate-200/40 entry-animation" style="animation-delay: 300ms">
                    <!-- Identity -->
                    <div class="bg-white p-10 space-y-8">
                        <div class="space-y-1">
                            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">POSITION</h3>
                            <p class="text-2xl font-bold text-slate-900 tracking-tight">IT Support</p>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Dedicated IT Support professional committed to optimizing system performance, resolving complex technical issues, and ensuring infrastructure reliability for enterprise environments.
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-bold text-slate-600 uppercase">Troubleshooting</span>
                            <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-bold text-slate-600 uppercase">Networking</span>
                            <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-bold text-slate-600 uppercase">Maintenance</span>
                        </div>
                    </div>

                    <!-- Environment & Proficiency -->
                    <div class="bg-slate-50/50 p-10 space-y-8">
                        <div class="space-y-6">
                            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Technical Specs</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">System Kernel</span>
                                    <span class="mono text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded">Laravel {{ Illuminate\Foundation\Application::VERSION }}</span>
                                </div>
                                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Engine Version</span>
                                    <span class="mono text-xs font-bold text-slate-700">PHP {{ PHP_VERSION }}</span>
                                </div>
                                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">OS Stack</span>
                                    <span class="mono text-xs font-bold text-slate-700 uppercase">Win / Linux / macOS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="mt-20 pt-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-6 entry-animation" style="animation-delay: 400ms">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.15em]">
                        System Integrity Validated &bull; {{ date('Y') }}
                    </p>
                </div>
                </p>
            </footer>
        </div>
    </body>
</html>
