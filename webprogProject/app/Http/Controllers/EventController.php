<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function showEvents()
    {
        // Fetch all events with related donation and admin data
        $events = Event::with(['donation', 'admin'])->get();

        return view('admin.events', compact('events'));
    }
    public function updateEvent(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'location' => 'required|string|max:255',
        ]);

        $event = Event::findOrFail($id);
        // dd($event);
        $event->update($request->only(['title', 'description', 'date', 'location']));

        return redirect()->route('admin.events')->with('success', 'Event updated successfully!');
    }
    public function deleteEvent($id){
            $event = Event::findOrFail($id);
            $event->delete();



        return redirect()->route('admin.events')->with('success', 'Event deleted successfully!');
    }
}
