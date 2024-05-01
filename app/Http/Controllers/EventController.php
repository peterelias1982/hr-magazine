<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    
    public function allEvents() {
        $events=Event::query() ->whereDate('fromDate','>=', Carbon::now()->format('Y-m-d'))->orderBy('fromDate', 'asc') ->get();
        return view("publicPages.events.allEvents",compact("events"));
         

    }
    public function eventCalender()  {
        return view("publicPages.events.eventCalender");
        
    }
    public function singleEvent($slug)  {
        $events=DB::table('events')
        ->join('agendas', 'events.id', '=', 'agendas.event_id')
        ->where('events.slug', $slug)->orderBy("dayNumber")->orderBy("fromTime")
        ->get();


        return view("publicPages.events.singleEvent",compact('events'));
        
    }
}