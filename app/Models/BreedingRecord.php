<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BreedingRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'herd_id',
        'female_id',
        'male_id',
        'date',
        'notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'herd_id' => 'integer',
        'female_id' => 'integer',
        'male_id' => 'integer',
        'date' => 'date',
    ];

    public function herd(): BelongsTo
    {
        return $this->belongsTo(Herd::class);
    }

    public function female(): BelongsTo
    {
        return $this->belongsTo(Goat::class);
    }

    public function male(): BelongsTo
    {
        return $this->belongsTo(Goat::class);
    }
}
