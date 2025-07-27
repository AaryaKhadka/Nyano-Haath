<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'goal_amount',
        'raised_amount',
        'status',
        'district',
        'category',
        'campaign_image',
        'verification_document',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
