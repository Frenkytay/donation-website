<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\Event_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller
{
    //
    public function showEventsForVolunteers()
{
    $events = Event::whereDate('date', '>=', now())->get(); // Show upcoming events
    return view('volunteer.volunteer', compact('events'));
}

public function registerForEvent(Request $request, $eventId)
{
    $user = Auth::user(); // Assuming volunteers are authenticated users
    $event = Event::findOrFail($eventId);

    if ($event->volunteers()->where('volunteer_id', $user->id)->exists()) {
        return redirect()->back()->with('error', 'You are already registered for this event.');
    }

    $event->volunteers()->attach($user->id);

    return redirect()->route('volunteer.events')->with('success', 'You have successfully registered for the event.');
}
public function showEventDetail(){
    // $event = Event::get
    $volunteerId = Auth::id(); // Get the logged-in volunteer's ID

    $registeredEvents = Event_detail::with('event')
    ->where('volunteer_id', $volunteerId)
    ->get();
    // dd($registeredEvents);
    return view('volunteer.volunteerDetail', compact('registeredEvents'));
}

}
