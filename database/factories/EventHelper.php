<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;


class EventHelper
{
    public static function createEvent()
    {
        $map1 = <<<MAP
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13715.228008206717!2d31.4393061992627!3d30.75192228381106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f78d65443c8c09%3A0xc1f61ff25eed8e82!2sDyarb%20Negm%2C%20Dairab%20Negm%2C%20Diyarb%20Negm%2C%20Al-Sharqia%20Governorate!5e0!3m2!1sen!2seg!4v1713910706463!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
MAP;
        $map2 = <<<MAP2
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109916.88333578482!2d32.154523916502974!3d30.580294741374626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f85956191e10b9%3A0x3b0933775b0f5b95!2sIsmailia%2C%20Ismailia%20Governorate!5e0!3m2!1sen!2seg!4v1713910809254!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
MAP2;

        $map3 = <<<MAP3
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220413.62136548402!2d31.54108611703804!3d30.323574978361883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f8075f7c0ecadb%3A0xc54596c9cf9f7c82!2s10th%20of%20Rammadan%20City%2C%20Al-Sharqia%20Governorate!5e0!3m2!1sen!2seg!4v1713910848681!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
MAP3;

        return Event::create([
            'title' => fake()->title(),
            'fromDate' => Carbon::now()->toDateString(),
            'toDate' => Carbon::now()->addDays(2)->toDateString(),
            'image' => 'event.jpeg',
            'streetNo' => fake()->numberBetween(1, 20),
            'streetName' => fake()->streetName(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'postalCode' => fake()->postcode(),
            'country' => fake()->country(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'googleMapLink' => fake()->randomElement([$map1, $map2, $map3]),
            'description' => fake()->text(1500),
            'speakers' => fake()->name() . ', ' . fake()->name() . ', ' . fake()->name(),
        ]);
    }
}
