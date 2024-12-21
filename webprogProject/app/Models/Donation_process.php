<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation_process extends Model
{
    //
    protected $fillable = ['donation_id', 'status', 'updated_by'];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
