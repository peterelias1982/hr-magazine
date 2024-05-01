<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function allEvents() {
        $events=Event::query() ->whereDate('fromDate','>=', Carbon::now()->format('Y-m-d'))->orderBy('fromDate', 'asc') ->get();
        return view("publicPages.events.allEvents",compact("events"));
         
        
    }
    public function eventCalender()  {
        return view("publicPages.events.eventCalender");
        
    }
    public function singleEvent()  {
        return view("publicPages.events.singleEvent");
        
    }
}