<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Agenda;
use App\Models\Event;
use App\Traits\Common;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        try {
            $data = $this->prepareData($request->all());

            $event = Event::create($data['eventData']);
            $event->agenda()->saveMany($data['agendaData']);

            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => json_encode(['success' => ["Event created successfully"]])]);

        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => json_encode(['error' => ['Error creating event: ' . $exception->getMessage()]])]);
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
                ->with(['messages' => json_encode(['error' => ['Error event not found: ' . $exception->getMessage()]])]);
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

            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => json_encode(['success' => ['Event updated successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => json_encode(['error' => ['Error updating event: ' . $exception->getMessage()]])]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, string $slug)
    {
        try {
            $event = Event::where('slug', $slug)->first();

            $this->deleteFile(public_path('assets/images/events/'. $event->image));
            $event->delete();

            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => json_encode(['success' => ['Event deleted successfully']])]);
        }catch (\Throwable $exception) {
            return redirect()
                ->route('admin.events.index')
                ->with(['messages' => json_encode(['error' => ['Error deleting event: ' . $exception->getMessage()]])]);
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
            $imageName = $this->uploadFile($data['image'], 'assets/images/events/');
            $eventData['image'] = $imageName;
            if ($data['oldImage'] ?? false) {
                $this->deleteFile(public_path('assets/images/events/'. $data['oldImage']));
            }
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
                ->where('events.title', 'LIKE', "%{$requestData['title']}%");
        }
        if($requestData['fromDate']) {
            $query
                ->where('events.fromDate', 'LIKE', "%{$requestData['fromDate']}%");
        }

        return $query->select('events.id')->get()->pluck('id');
    }

}
