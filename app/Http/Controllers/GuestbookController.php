<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class GuestbookController extends Controller
{
    public function index()
    {
        try {
            // MariaDB optimized fetching
            $guests = Guestbook::orderBy('id', 'desc')->limit(50)->get();
            return view('welcome', compact('guests'));
        } catch (\Exception $e) {
            Log::error("PROD INDEX ERROR: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine());
            $guests = collect([]);
            return view('welcome', compact('guests'));
        }
    }

    public function admin()
    {
        try {
            $guests = Guestbook::orderBy('id', 'desc')->get();
            return view('admin.index', compact('guests'));
        } catch (\Exception $e) {
            Log::error("PROD ADMIN ERROR: " . $e->getMessage());
            // Fail gracefully
            return response("Admin System Temporarily Unavailable. Check logs.", 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:150',
                'message' => 'required|string|max:1000',
            ]);

            // Direct DB insertion to bypass potential Model issues
            DB::table('guestbooks')->insert([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'message' => $validated['message'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('welcome')->with('success', 'Database synchronization successful.');
        } catch (\Exception $e) {
            Log::critical("PROD WRITE ERROR: " . $e->getMessage());
            return back()->withInput()->with('error', 'Write Operation Failed. System Integrity Protected.');
        }
    }

    public function destroy($id)
    {
        try {
            Guestbook::findOrFail($id)->delete();
            return back()->with('success', 'Record purged.');
        } catch (\Exception $e) {
            Log::error("PROD DELETE ERROR: " . $e->getMessage());
            return back()->with('error', 'Operation denied.');
        }
    }
}
