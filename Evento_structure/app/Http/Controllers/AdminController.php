<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Client;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.dashboard', compact('categories'));
    }

    public function statistics()
    {
        $categories = Category::count();
        $users = User::count();
        $organizers = Organizer::count();
        $clients = Client::count();
        $bannedClients = Client::where('isBanned', '1')->count();
        $bannedOrganizers = Organizer::where('isBanned', '1')->count();        
        $events = Event::count();
        $pendingEvents = Event::where('adminValidation', 'pending')->count();
        return view('admin.statistics', compact('categories', 'users', 'organizers', 'clients', 'events', 'pendingEvents', 'bannedOrganizers', 'bannedClients'));
    }

    public function usersDash()
    {
        $clients = Client::all();
        $organizers = Organizer::all();
        return view('admin.usersDashboard', compact('organizers', 'clients'));
    }

    public function eventRequests()
    {
        $events = Event::with('organizers')->where('adminValidation', 'pending')->get();
        return view('admin.eventRequests', compact('events'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
