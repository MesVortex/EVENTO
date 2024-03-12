<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function explore()
    {
        $events = Event::where('adminValidation', 'accepted')->paginate(6);
        $categories = Category::all();
        return view('client.explore', compact('events', 'categories'));
    }

    public function filter(Request $request)
    {
        if ($request->categoryID == 'all') {
            return $this->explore();
        } else {
            $events = Event::where('categoryID', $request->categoryID)->paginate(6);
            $categories = Category::all();
            return view('client.explore', compact('events', 'categories'));
        }
    }

    public function search(SearchRequest $request)
    {

        $categories = Category::all();
        $query = Event::where('adminValidation', 'accepted');
        if ($search = $request->search) {
            $query->where('title', 'like', '%' . $search . '%');
        }
        $events = $query->paginate(6);
        if ($events->isEmpty()) {
            // return redirect()->back()->with('alert', 'No results found.');
            return view('client.explore', compact('events', 'categories'));
        }

        return view('client.explore', compact('events', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('organizer.eventAddForm', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        Event::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'availablePlaces' => $request->availablePlaces,
            'description' => $request->description,
            'date' => $request->date,
            'validationType' => $request->validationType,
            'categoryID' => $request->category,
            'organizerID' => $request->organizerID,
        ]);

        return redirect('/organizer/dashboard');

        // return redirect()->back()->with('success', 'Event Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        if(Auth::user()->role == 'client'){
            $clientID = Auth::user()->clients->id;
            $reserved = Reservation::where('eventID', $event->id)->where('clientID', $clientID)->first();
            return view('eventPage', compact('event', 'reserved'));
        }else{
            $reserved = false;
            return view('eventPage', compact('event', 'reserved'));    
        }        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('organizer.eventEditForm', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            'title' => $request->title,
            'venue' => $request->venue,
            'availablePlaces' => $request->availablePlaces,
            'description' => $request->description,
            'date' => $request->date,
            'validationType' => $request->validationType,
            'categoryID' => $request->category,
            'organizerID' => $request->organizerID,
        ]);

        return redirect('/organizer/dashboard');

        // return redirect()->back()->with('success', 'Event Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Event Deleted!');
    }

    public function acceptRequest(Event $event)
    {
        $event->update([
            'adminValidation' => 'accepted'
        ]);
        return redirect()->back()->with('success', 'Event accepted!');
    }

    // public function refuseRequest(Event $event)
    // {
    //     $event->update([
    //         'adminValidation' => 'rejected'
    //     ]);
    //     return redirect()->back()->with('success', 'Event refused!');
    // }
}
