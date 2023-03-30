<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    /**
     * Show admin list of events
     */
    public function list(){
        $events = Event::all();
        return view('admin.events.list', ["events"=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'image' => 'image|max:2048',
        ]);

        $event = new Event;

        $event->title = $validatedData('title');
        $event->description = $validatedData('description');
        $event->start_time = $validatedData('start_time');
        $event->end_time = $validatedData('end_time');
        $event->location = $validatedData('location');
        $event->max_attendees = 0;
        $event->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/events', $filename);
            $event->image = 'storage/events/' . $filename;
        }

        $event->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);

        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);

        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'image' => 'image|max:2048',
        ]);

        $event = Event::find($id);

        $event->title = $validatedData('title');
        $event->description = $validatedData('description');
        $event->start_time = $validatedData('start_time');
        $event->end_time = $validatedData('end_time');
        $event->location = $validatedData('location');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/events/images', $filename);
            $event->image = 'storage/events/images/' . $filename;
        }

        $event->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
    }
}
