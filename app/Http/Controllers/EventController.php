<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Agenda;
use App\Traits\Common;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

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

        $messages = $this->getMessages();

        return view('Admin.event.allEvent', compact('events', 'messages'));
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
        try {
            $data = $this->prepareData($request->all());

            $event = Event::create($data['eventData']);
            $event->agenda()->saveMany($data['agendaData']);

            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => ['success' => ["Event created successfully"]]]);

        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => ['error' => ['Error creating event: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, string $slug)
    {
        try {
            $event = Event::with('Agenda')->where('slug', $slug)->first();

            if (!$event) {
                throw new ResourceNotFoundException('Event is not found');
            }

            return view('Admin.event.eventDetails', compact('event'));
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => ['error' => ['Error event not found: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $slug)
    {
        try {
            $data = $this->prepareData($request->all());

            //      update event data
            $event = Event::where('slug', $slug)->first();
            $event->update($data['eventData']);

            //      update agenda data
            $event->agenda()->delete();
            $event->agenda()->saveMany($data['agendaData']);

            return redirect()->route('admin.events.index');
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => ['error' => ['Error updating event: ' . $exception->getMessage()]]]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, string $slug)
    {
        try {
            Event::where('slug', $slug)->delete();
            return redirect()->route('admin.events.index');
        }catch (\Throwable $exception) {
            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => ['error' => ['Error deleting event: ' . $exception->getMessage()]]]);
        }
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

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }
}
