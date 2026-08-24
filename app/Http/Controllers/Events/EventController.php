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
        return view('dashboard/events/index');
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
        $validateEventData = $request->validated();

        // renamed because in view i used ---->category
        $validateEventData['category_id'] = $validateEventData['category'];
        unset($validateEventData['category']);

        $evnt = Event::create($validateEventData);

        if (! $evnt) {
            Swal::error([
                'title' => 'Failed!',
                'text' => 'Failed to create an Event.',
            ]);
            return redirect()->back();
        }

        Swal::success([
            'title' => 'Event Created!',
            'text' => 'The event has been created successfully.',
        ]);

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
