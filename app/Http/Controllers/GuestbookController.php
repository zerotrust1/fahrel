<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource on the landing page.
     */
    public function index()
    {
        $guests = Guestbook::latest()->get();
        return view('welcome', compact('guests'));
    }

    /**
     * Display the admin dashboard.
     */
    public function admin()
    {
        $guests = Guestbook::latest()->get();
        return view('admin.index', compact('guests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Guestbook::create($validated);

        return redirect()->route('welcome')
            ->with('success', 'Thank you for your message!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guestbook $guestbook)
    {
        $guestbook->delete();

        return redirect()->route('welcome')
            ->with('success', 'Entry deleted successfully.');
    }
}
