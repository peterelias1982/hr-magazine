<?php

namespace Database\Factories;

use App\Models\Agenda;

class AgendaFactory
{
    public static function createAgenda(): void
    {
        $event = EventHelper::createEvent();
        $agendas = [
            new Agenda([
                'topic' => fake()->title(),
                'fromTime' => fake()->time(),
                'toTime' => fake()->time(),
                'speaker' => fake()->name(),
                'dayNumber' => 1
            ]),
            new Agenda([
                'topic' => fake()->title(),
                'fromTime' => fake()->time(),
                'toTime' => fake()->time(),
                'speaker' => fake()->name(),
                'dayNumber' => 1
            ]),
            new Agenda([
                'topic' => fake()->title(),
                'fromTime' => fake()->time(),
                'toTime' => fake()->time(),
                'speaker' => fake()->name(),
                'dayNumber' => 2
            ]),
            new Agenda([
                'topic' => fake()->title(),
                'fromTime' => fake()->time(),
                'toTime' => fake()->time(),
                'speaker' => fake()->name(),
                'dayNumber' => 3
            ]),
        ];

        $event->agenda()->saveMany($agendas);
    }


}
