<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //
    protected $fillable = ['user_id', 'status', 'total_items','name', 'quantity', 'expiration_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foodItems()
    {
        return $this->hasMany(Food_detail::class);
    }
    public function event()
    {
        return $this->hasOne(Event::class, 'donation_id');
    }
    public function donationProcesses()
    {
        return $this->hasMany(Donation_process::class);
    }
}
