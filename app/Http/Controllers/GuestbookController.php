<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GuestbookController extends Controller
{
    /**
     * Public Interface: Display system logs (Guestbook)
     */
    public function index()
    {
        try {
            $guests = Guestbook::latest()->get();
        } catch (\Exception $e) {
            Log::error("Guestbook fetch error: " . $e->getMessage());
            $guests = collect([]);
        }
        
        return view('welcome', compact('guests'));
    }

    /**
     * Admin Interface: System Log Management
     */
    public function admin()
    {
        try {
            $guests = Guestbook::orderBy('id', 'desc')->get();
        } catch (\Exception $e) {
            Log::error("Admin Guestbook fetch error: " . $e->getMessage());
            $guests = collect([]);
        }

        return view('admin.index', compact('guests'));
    }

    /**
     * Action: Commit new log entry
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:1000',
        ]);

        try {
            Guestbook::create($validated);
            return redirect()->route('welcome')->with('success', 'Entry successfully committed to system database.');
        } catch (\Exception $e) {
            Log::error("Guestbook store error: " . $e->getMessage());
            return back()->withInput()->with('error', 'Database write failure. Check system logs.');
        }
    }

    /**
     * Action: Purge log entry
     */
    public function destroy($id)
    {
        try {
            $entry = Guestbook::findOrFail($id);
            $entry->delete();
            return back()->with('success', 'Record purged from database successfully.');
        } catch (\Exception $e) {
            Log::error("Guestbook delete error: " . $e->getMessage());
            return back()->with('error', 'Purge failed: Record not found or database error.');
        }
    }
}
