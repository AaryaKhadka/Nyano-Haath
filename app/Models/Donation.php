<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    // Mass assignable fields
    protected $fillable = [
        'campaign_id',
        'user_id',
        'name',
        'email',
        'phone',
        'amount',
        'anonymous',
        'password',
        'purchase_order_id',
        'status',
    ];

    /**
     * The campaign that this donation belongs to
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * The user who owns this donation (nullable)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
