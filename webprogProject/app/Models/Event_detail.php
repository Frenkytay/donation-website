<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_detail extends Model
{
    //
    public function event()
{
    return $this->belongsTo(Event::class);
}

public function volunteer()
{
    return $this->belongsTo(User::class, 'volunteer_id');
}

}
