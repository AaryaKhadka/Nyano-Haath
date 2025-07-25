<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
   protected $fillable = ['campaign_id', 'name', 'email', 'amount', 'anonymous', 'phone'];


    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
