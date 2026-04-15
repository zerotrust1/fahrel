<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class GuestbookController extends Controller
{
    /**
     * Public Interface: Display system logs on landing page
     */
    public function index()
    {
        try {
            $guests = Guestbook::orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            Log::error("Real Server - Guestbook Fetch Error: " . $e->getMessage());
            $guests = collect([]);
        }
        
        return view('welcome', compact('guests'));
    }

    /**
     * Admin Interface: High-level System Management
     */
    public function admin()
    {
        try {
            $guests = Guestbook::orderBy('id', 'desc')->get();
        } catch (\Exception $e) {
            Log::error("Real Server - Admin Fetch Error: " . $e->getMessage());
            $guests = collect([]);
        }

        return view('admin.index', compact('guests'));
    }

    /**
     * Store: Commit log entry securely to MariaDB
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
            return redirect()->route('welcome')->with('success', 'Database commit successful.');
        } catch (\Exception $e) {
            Log::critical("MariaDB Write Failure: " . $e->getMessage());
            return back()->withInput()->with('error', 'Critical System Failure. Data not saved.');
        }
    }

    /**
     * Delete: Purge database records permanently
     */
    public function destroy($id)
    {
        try {
            $entry = Guestbook::findOrFail($id);
            $entry->delete();
            return back()->with('success', 'Database record purged successfully.');
        } catch (\Exception $e) {
            Log::error("Purge Error: " . $e->getMessage());
            return back()->with('error', 'Purge failed: Access Denied or Record Missing.');
        }
    }
}
