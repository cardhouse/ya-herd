<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'herd_id',
        'name',
        'breed',
        'sex',
        'date_of_birth',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'herd_id' => 'integer',
        'date_of_birth' => 'date',
    ];

    public static function form(): array
    {
        return [
            Forms\Components\Select::make('herd_id')
                ->relationship('herd', 'name', function (Builder $query) {
                    return $query->where('created_by', auth()->user()->id);
                })
                ->required(),
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('breed'),
            Forms\Components\Select::make('sex')->options([
                'M' => 'Male',
                'F' => 'Female'
            ]),
            Forms\Components\DatePicker::make('date_of_birth'),
        ];
    }

    public function herd(): BelongsTo
    {
        return $this->belongsTo(Herd::class);
    }

    public function medicalRecords(): HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function breedingRecords(): HasMany
    {
        return $this->hasMany(BreedingRecord::class);
    }
}
