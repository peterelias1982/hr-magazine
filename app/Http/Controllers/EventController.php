<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Agenda;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\Common;

class EventController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();
        return view('Admin.event.allEvent', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.event.addEvent');
    }

    private function prepareData(array $data)
    {
//      Event data
        $imageName = $this->uploadFile($data['image'], 'admin/images/articles&event');
        $eventData = [
            'title' => $data['title'],
            'fromDate' => Carbon::parse($data['fromDate'])->format('Y-m-d'),
            'toDate' => Carbon::parse($data['toDate'])->format('Y-m-d'),
            'image' => $imageName,
            'streetNo' => $data['streetNo'],
            'streetName' => $data['streetName'],
            'city' => $data['city'],
            'state' => $data['state'],
            'postalCode' => $data['postalCode'],
            'country' => $data['country'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'googleMapLink' => $data['googleMapLink'],
            'description' => $data['description'],
            'speakers' => $data['speakers'],
        ];
//      Agenda Rows
        $agendaData = [];

        for ($i = 1, $dayCount = count($data['topic']); $i <= $dayCount; $i++) {
            for ($j = 0, $rows = count($data['topic'][$i]); $j < $rows; $j++) {
                $agendaData[] = [
                    'dayNumber' => $i,
                    'topic' => $data['topic'][$i][$j],
                    'fromTime' => $data['fromTime'][$i][$j],
                    'toTime' => $data['toTime'][$i][$j],
                    'speaker' => $data['speaker'][$i][$j],
                ];
            }
        }

        return [
            'eventData' => $eventData,
            'agendaData' => $agendaData,
        ];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $this->prepareData($request->all());
        $event = Event::create($data['eventData']);

        foreach ($data['agendaData'] as $agendaRow) {
            $agendaRow['event_id'] = $event->id;
            Agenda::create($agendaRow);
        }

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, string $slug)
    {
        $event = Event::with('Agenda')->where('slug', $slug)->first();
        // return dd($event);
        return view('Admin.event.eventDetails',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event, string $slug)
    {
        $event = Event::with('Agenda')->where('slug', $slug)->first();
        return view('Admin.event.eventDetails',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $slug)
    {
        $event = Event::with('Agenda')->where('slug', $slug)->first();
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $imageName = $this->uploadFile($request->file('image'), 'admin/images/articles&event');
            $event->image = $imageName;
            // Delete the old image if it exists
            if (!empty($request->oldImage)) {
                unlink(public_path("admin/images/articles&event/" . $request->oldImage));
            }
        }
        $event->update($data);
        // dd($request);
        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, string $slug)
    {
        Event::with('Agenda')->where('slug', $slug)->delete();
        return redirect()->route('admin.events.index');
    }

}
