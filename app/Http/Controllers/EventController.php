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
        // $events = Event::get();
        // $data = $request->validate([
        //     'title'=>'required|string|max:100',
        //     'price'=>'required|numeric',
        //     'content'=>'required|string',
        //     'luggage'=>'required|integer',
        //     'doors'=>'required|integer',
        //     'passengers'=>'required|integer',
        //     'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        //     'category_id'=>'required',
        // ], $messages);

        // $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
        // $data['image'] = $fileName;

        // $data['active'] = isset($request->active);
        // Car::create($data);
        // Alert::success('Added Car','Car added successfully!');
        // return redirect ('admin/cars');
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
