<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function breeds(): HasMany
    {
        return $this->hasMany(Breed::class);
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('name', 'like', '%' . $data['search'] . '%');
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
