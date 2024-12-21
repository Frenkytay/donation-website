<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food_detail extends Model
{
    //
    protected $fillable = ['donation_id', 'name', 'quantity', 'expiration_date'];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
