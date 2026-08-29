<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\CreateEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SweetAlert2\Laravel\Swal;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('dashboard/events/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        // dd($cities);
        // dd($categories);
        return view('dashboard.events.create', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request)
    {
        // dd($request);
        $eventData = $request->validated();

        if (! $request->hasFile('primary_image') ||  !$request->hasFile('cover_image')) {
            Swal::error([
                'title' => 'Images Missing!',
                'text' => 'Images fields are required to create an event, Please upload both images and try Again !',
            ]);

            return redirect()->back()->withInput();
        }

        // store images first
        try {

            $eventData['primary_image'] = $request->file('primary_image')->store('events', 'public');
            $eventData['cover_image']   = $request->file('cover_image')->store('events', 'public');
            // dd($eventData);
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
                'text' => 'Failed to create event.',
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
        $categories = Category::all();
        $cities     = City::all();
        $event = Event::findOrFail($id);
        return view('dashboard.events.edit', compact(['event', 'categories', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $id)
    {
        try {
            // dd($request);
            $event = Event::findOrFail($id);

            // old images
            $oldPrimaryImage = $event->primary_image;
            $oldCoverImage = $event->cover_image;

            $eventData = $request->validated();

            if ($request->hasFile('primary_image')) {
                $eventData['primary_image'] = $request->file('primary_image')->store('events', 'public');
            }

            if ($request->hasFile('cover_image')) {
                $eventData['cover_image'] = $request->file('cover_image')->store('events', 'public');
            }

            // update validated data in db
            $event->update($eventData);


            if ($request->hasFile('primary_image') &&  $oldPrimaryImage) {
                Storage::disk('public')->delete($oldPrimaryImage);
            }

            if ($request->hasFile('cover_image') &&  $oldCoverImage) {
                Storage::disk('public')->delete($oldCoverImage);
            }

            Swal::success([
                'title' => 'Successfully Updated!',
                'text' => 'Event updated successfully.',
            ]);

            return redirect()->route('admin.events.index');
        } catch (\Exception $ex) {

            report($ex);

            Swal::error([
                'title' => 'Failed Update!',
                // 'text' => $ex->getMessage(),
                'text' => 'Failed to update event.',
            ]);

            return redirect()->back()->withInput();
        }
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

            report($ex);

            Swal::error([
                'title' => 'Deletion Failed!',
                'text'  => 'Failed to delete the event.'
            ]);

            return redirect()->back();
        }
    }
}
