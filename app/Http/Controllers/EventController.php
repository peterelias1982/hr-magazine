<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Agenda;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = Request();
        $events_ids = $this->searchWith(requestData: [
            'title' => $request->title,
            'fromDate' => $request->fromDate,
        ]);

        $events = Event::whereIn('id', $events_ids)->get();

        return view('Admin.event.allEvent', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.event.addEvent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $this->prepareData($request->all());

        $event = Event::create($data['eventData']);
        $event->agenda()->saveMany($data['agendaData']);

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, string $slug)
    {
        $event = Event::with('Agenda')->where('slug', $slug)->first();
        return view('Admin.event.eventDetails', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $slug)
    {
        $data = $this->prepareData($request->all());

        //      update event data
        $event = Event::where('slug', $slug)->first();
        $event->update($data['eventData']);

        //      update agenda data
        $event->agenda()->delete();
        $event->agenda()->saveMany($data['agendaData']);

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, string $slug)
    {
        Event::where('slug', $slug)->delete();
        return redirect()->route('admin.events.index');
    }

    private function prepareData(array $data)
    {
        //      Event data
        $eventData = [
            'title' => $data['title'],
            'fromDate' => Carbon::parse($data['fromDate'])->format('Y-m-d'),
            'toDate' => Carbon::parse($data['toDate'])->format('Y-m-d'),
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

        if (isset($data['image'])) {
            $imageName = $this->uploadFile($data['image'], 'admin/images/articles&event');
            $eventData['image'] = $imageName;
        }

        //      Agenda Rows
        $agendaData = [];

        for ($i = 1, $dayCount = count($data['topic']); $i <= $dayCount; $i++) {
            for ($j = 0, $rows = count($data['topic'][$i]); $j < $rows; $j++) {
                $agendaData[] = new Agenda([
                    'dayNumber' => $i,
                    'topic' => $data['topic'][$i][$j],
                    'fromTime' => $data['fromTime'][$i][$j],
                    'toTime' => $data['toTime'][$i][$j],
                    'speaker' => $data['speaker'][$i][$j],
                ]);
            }
        }

        return [
            'eventData' => $eventData,
            'agendaData' => $agendaData,
        ];
    }
    
    private function searchWith(array $requestData)
    {
        $query = DB::table('events');

        if($requestData['title']) {
            $query
                ->where('events.title', 'LIKE', "%{$requestData['title']}%")
                ->select('events.id');
        }
        if($requestData['fromDate']) {
            $query
                ->where('events.fromDate', 'LIKE', "%{$requestData['fromDate']}%")
                ->select('events.id');
        }

        return $query->get()->pluck('id');
    }
}
