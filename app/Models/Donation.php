<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'campaign_id',
        'user_id',
        'name',
        'email',
        'amount',
        'status',
        'product_name',
        'pidx',
        'initiate_response',
        'verified_response',
    ];

    protected $casts = [
        'initiate_response' => 'array',
        'verified_response' => 'array',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
