<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedingSchedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'herd_id',
        'goat_id',
        'scheduled_at',
        'details',
        'goat_nullable_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'herd_id' => 'integer',
        'goat_id' => 'integer',
        'scheduled_at' => 'datetime',
        'goat_nullable_id' => 'integer',
    ];

    public function herd(): BelongsTo
    {
        return $this->belongsTo(Herd::class);
    }

    public function goat(): BelongsTo
    {
        return $this->belongsTo(Goat::class);
    }
}
