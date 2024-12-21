<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'donation_id',
        'title',
        'description',
        'date',
        'location',
    ];

    /**
     * Relationship: An Event belongs to an Admin.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function volunteers()
    {
        return $this->belongsToMany(User::class, 'event_details', 'event_id', 'volunteer_id');
    }
    /**
     * Relationship: An Event belongs to a Partner.
     */
    public function partner()
    {
        return $this->belongsTo(User::class, 'partner_id');
    }
    public function donation()
    {
        return $this->belongsTo(Donation::class, 'donation_id');
    }
    public function eventDetails()
{
    return $this->hasMany(Event_detail::class);
}

}
