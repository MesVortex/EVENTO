<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        Reservation::create([
            'placeNumber' => $request->placeNumber,
            'isAcceptedByOrganizer' => $request->validation,
            'clientID' => $request->client,
            'eventID' => $request->event,
        ]);

        if ($request->validation == 1) {
            $event = Event::find($request->event);

            $event->update([
                'availablePlaces' => ($event->availablePlaces - 1),
            ]);
        }

        return redirect()->back()->with('success', 'booked successefully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    public function showEventReservations(Event $event)
    {
        $reservations = Reservation::where('eventID', $event->id)
            ->where('isAcceptedByOrganizer', '0')
            ->get();
        return view('organizer.eventReservations', compact('reservations', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation, Request $request)
    {
        $reservation->delete();

        $event = Event::find($request->event);

        $event->update([
            'availablePlaces' => ($event->availablePlaces + 1),
        ]);

        return redirect()->back()->with('success', 'reservation deleted!');
    }

    public function acceptReservation(Reservation $reservation, Request $request)
    {
        $reservation->update([
            'isAcceptedByOrganizer' => '1'
        ]);

        $event = Event::find($request->event);

        $event->update([
            'availablePlaces' => ($event->availablePlaces - 1),
        ]);

        return redirect()->back()->with('success', 'Reservation accepted!');
    }
}
