<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of messages.
     */
    public function index(Request $request)
    {
        $messages = ContactMessage::query()
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Toggle done status.
     */
    public function toggleDone(ContactMessage $message)
    {
        $message->done = ! $message->done;
        $message->save();

        return back()->with('success', 'Status Updated Successfully');
    }
}
