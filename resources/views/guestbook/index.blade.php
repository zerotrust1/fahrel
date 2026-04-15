<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Guestbook | HostData Assessment - M. Fahrel</title>

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

        <div class="min-h-screen flex flex-col max-w-4xl mx-auto px-6 py-12 lg:py-20">
            
            <!-- Header -->
            <header class="flex justify-between items-center mb-16">
                <div class="flex items-center space-x-3">
                    <a href="/" class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200 transition hover:scale-105">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </a>
                    <span class="font-bold tracking-tight text-slate-800 uppercase text-sm tracking-widest">IT Operations Guestbook</span>
                </div>
                <div class="hidden sm:flex items-center px-4 py-1.5 rounded-full bg-white border border-slate-200 shadow-sm">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 italic">Database Linked</span>
                </div>
            </header>

            <main class="space-y-12">
                <!-- Entry Form -->
                <section class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-xl shadow-slate-200/40 p-10">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 leading-tight">Leave a Message<span class="text-blue-600">.</span></h2>
                            <p class="text-sm text-slate-500">Sign the guestbook to verify system interactivity.</p>
                        </div>

                        @if(session('success'))
                            <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('guestbook.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="space-y-1">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Full Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition outline-none text-sm font-medium">
                                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition outline-none text-sm font-medium">
                                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Message</label>
                                <textarea name="message" rows="4" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition outline-none text-sm font-medium">{{ old('message') }}</textarea>
                                @error('message') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-xl font-bold text-sm uppercase tracking-widest shadow-lg shadow-blue-200 hover:bg-blue-700 transition active:scale-[0.98]">
                                Submit Entry
                            </button>
                        </form>
                    </div>
                </section>

                <!-- Entries List -->
                <section class="space-y-6">
                    <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.25em] ml-2">Recent Logs ({{ $guests->count() }})</h3>
                    
                    <div class="space-y-4">
                        @forelse($guests as $guest)
                            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex justify-between items-start group transition hover:shadow-md">
                                <div class="space-y-2">
                                    <div class="flex items-center space-x-3">
                                        <span class="font-bold text-slate-900 tracking-tight">{{ $guest->name }}</span>
                                        <span class="h-1 w-1 bg-slate-200 rounded-full"></span>
                                        <span class="mono text-[10px] text-slate-400">{{ $guest->email }}</span>
                                    </div>
                                    <p class="text-sm text-slate-600 leading-relaxed italic">"{{ $guest->message }}"</p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $guest->created_at->diffForHumans() }}</p>
                                </div>
                                
                                <form action="{{ route('guestbook.destroy', $guest) }}" method="POST" onsubmit="return confirm('Delete this log entry?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-slate-300 hover:text-red-500 transition p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl p-12 text-center">
                                <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">No entries found in system database.</p>
                            </div>
                        @endforelse
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="mt-20 pt-8 border-t border-slate-200">
                <p class="text-[11px] font-bold text-slate-300 uppercase tracking-widest text-center">
                    HostData System Database &bull; Jakarta Repository
                </p>
            </footer>
        </div>
    </body>
</html>
