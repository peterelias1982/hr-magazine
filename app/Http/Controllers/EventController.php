<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Agenda;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\Common;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();
        $agendas = Agenda::get();
        return view('Admin.event',compact('events','agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::get();
        $agendas = Agenda::get();
        return view('Admin.event.addEvent',compact('events','agendas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        
        $data = $request;
        $fromDateDB = \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('fromDate')->format('Y-m-d'));
        $toDateDB = \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('toDate')->format('Y-m-d'));
        
        Event::create([
            'title'=>$request->title,
            'fromDate'=>$request->$fromDateDB,
            'toDate'=>$request->$toDateDB,
            'image'=>$request->image,
            'streetNo'=>$request->streetNo,
            'streetName'=>$request->streetName,
            'city'=>$request->city,
            'state'=>$request->state,
            'postalCode'=>$request->postalCode,
            'country'=>$request->country,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'googleMapLink'=>$request->googleMapLink,
            'description'=>$request->description,
            'speakers'=>$request->speakers,
        ]);

        $fileName = $this->uploadFile($request->image, 'admin/images/articles&event');    
        $data['image'] = $fileName;

        Agenda::create([            
            'event_id'=>$request->event_id,
            'topic'=>$request->topic,
            'fromTime'=>$request->fromTime,
            'toTime'=>$request->toTime,
            'speaker'=>$request->speaker,
        ]);
        return redirect ('admin/events/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

}
