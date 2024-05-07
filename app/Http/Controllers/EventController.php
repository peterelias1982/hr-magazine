<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Month;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function allEvents()
    {
        $events = Event::query()
            ->whereDate('fromDate', '>=', Carbon::now()->format('Y-m-d'))
            ->orWhereDate('toDate', '>=', Carbon::now()->format('Y-m-d'))
            ->orderBy('fromDate', 'asc')->get();


        return view("publicPages.events.allEvents", compact("events"));


    }

    public function eventCalender()
    {
        $events_calender = Event::get()->groupBy(function ($even) {
            return (date_format(date_create($even->fromDate), 'Y-m'));
        })->transform(function ($item) {
            return $item->groupBy('fromDate');
        });
        return view("publicPages.events.eventCalender", compact('events_calender'));

    }

    public function singleEvent($slug)
    {
        $events = DB::table('events')
            ->join('agendas', 'events.id', '=', 'agendas.event_id')
            ->where('events.slug', $slug)->orderBy("dayNumber")->orderBy("fromTime")
            ->get();

        $journeyToExcellences = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Journey to Excellence');
            })
            ->latest()
            ->get();

        return view("publicPages.events.singleEvent", compact('events', 'journeyToExcellences'));

    }
}
