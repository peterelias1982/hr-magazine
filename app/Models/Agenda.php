<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'topic',
        'fromTime',
        'toTime',
        'speaker',
        'dayNumber'
        ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

}
