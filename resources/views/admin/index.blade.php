<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel | HostData Assessment - M. Fahrel</title>

        <!-- Fonts: Inter & JetBrains Mono -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; }
            .mono { font-family: 'JetBrains Mono', monospace; }
            .grid-subtle {
                background-image: radial-gradient(circle, #e2e8f0 1px, transparent 1px);
                background-size: 24px 24px;
            }
        </style>
    </head>
    <body class="bg-[#fcfdfe] text-slate-900 selection:bg-blue-100">
        
        <div class="fixed inset-0 grid-subtle opacity-70 z-[-1]"></div>

        <div class="min-h-screen flex flex-col max-w-6xl mx-auto px-6 py-12 lg:py-20">
            
            <!-- Admin Header -->
            <header class="flex justify-between items-center mb-16">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center shadow-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-extrabold tracking-tight text-slate-900 text-xl leading-none">Admin Terminal</h1>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Management Interface</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('welcome') }}" class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 uppercase tracking-widest hover:bg-slate-50 transition shadow-sm">
                        Public Site
                    </a>
                    <div class="px-4 py-1.5 rounded-full bg-slate-900 text-white shadow-lg shadow-slate-200">
                        <span class="text-[10px] font-bold uppercase tracking-widest italic">Auth: Root Access</span>
                    </div>
                </div>
            </header>

            <main class="space-y-10">
                <!-- Statistics Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Entries</p>
                        <p class="text-4xl font-extrabold text-slate-900 mt-2">{{ optional($guests)->count() ?? 0 }}</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">System Status</p>
                        <p class="text-4xl font-extrabold text-emerald-500 mt-2">Online</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Database Engine</p>
                        <p class="text-4xl font-extrabold text-blue-600 mt-2">MariaDB</p>
                    </div>
                </div>

                <!-- Database Table -->
                <div class="bg-white border border-slate-200 rounded-[2.5rem] shadow-2xl shadow-slate-200/50 overflow-hidden">
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center">
                        <h2 class="text-xl font-bold text-slate-900 tracking-tight leading-none">Guestbook Records</h2>
                        <span class="mono text-[11px] font-bold text-slate-400">SELECT * FROM guestbooks ORDER BY id DESC;</span>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">ID</th>
                                    <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Contributor</th>
                                    <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Message</th>
                                    <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Timestamp</th>
                                    <th class="px-8 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($guests as $guest)
                                    <tr class="hover:bg-slate-50/50 transition duration-150">
                                        <td class="px-8 py-6 mono text-xs font-bold text-slate-400">#{{ $guest->id }}</td>
                                        <td class="px-8 py-6">
                                            <div class="font-bold text-slate-900 text-sm tracking-tight">{{ $guest->name }}</div>
                                            <div class="text-[11px] font-medium text-slate-400">{{ $guest->email }}</div>
                                        </td>
                                        <td class="px-8 py-6 text-sm text-slate-600 italic">"{{ $guest->message }}"</td>
                                        <td class="px-8 py-6 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                                            {{ $guest->created_at->format('d M Y, H:i') }}
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <form action="{{ route('guestbook.destroy', $guest) }}" method="POST" onsubmit="return confirm('WARNING: Are you sure you want to PERMANENTLY delete this record?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="p-2 text-slate-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition duration-200">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-8 py-20 text-center italic text-slate-400 text-sm">
                                            No database records found in the guestbook table.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            <!-- Admin Footer -->
            <footer class="mt-20 pt-8 border-t border-slate-200 flex justify-between items-center">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] leading-none">
                    Admin Session Active &bull; {{ date('Y') }}
                </p>
                <div class="flex items-center space-x-2">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest italic tracking-widest">HostData Security Core</span>
                </div>
            </footer>
        </div>
    </body>
</html>
