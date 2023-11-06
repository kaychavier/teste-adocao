<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adoption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'animal_id',
        'name',
        'document',
        'email',
        'phone',
        'birth_date'
    ];

    protected $casts = [
        'birth_date' => 'datetime'
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
    
    public function scopeSearch($query, $data)
    {
        if (isset($data['name'])) {
            $query->where('name', 'like', '%' . $data['name'] . '%');
        }
        if (isset($data['animal'])) {
            $query->whereHas('animal', fn($q) =>  $q->where('name', 'like', '%' . $data['animal'] . '%'));
        }
        if (isset($data['start_date'])) {
            $query->where('created_at', '>=', $data['start_date']);
        }
        if (isset($data['end_date'])) {
            $query->where('created_at', '<=', $data['end_date']);
        }
        return $query;
    }
}
