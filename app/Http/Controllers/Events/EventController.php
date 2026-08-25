<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\CreateEventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('dashboard/events/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('dashboard.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request)
    {
        // dd($request);   
        $eventData = $request->validated();

        try {
            Event::create($eventData);

            Swal::success([
                'title' => 'Event Created!',
                'text' => 'The event has been created successfully.',
            ]);

            return redirect()->route('admin.events.index');
        } catch (\Exception $ex) {
            report($ex->getMessage());
            Swal::error([
                'title' => 'Something went wrong!',
                'text' => 'Failed to create event',
            ]);

            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $event = Event::findOrFail($id);

            $event->delete();

            Swal::success([
                'title' => 'Event Deleted!',
                'text'  => 'The event has been deleted successfully.'
            ]);

            return redirect()->back();
        } catch (\Exception $ex) {
            Swal::error([
                'title' => 'Deletion Failed!',
                'text'  => 'Failed to delete the event.'
            ]);

            return redirect()->back();
        }
    }
}
