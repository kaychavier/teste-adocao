<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'specie_id',
        'breed_id',
        'address',
        'name',
        'genre',
        'age',
        'weight',
        'size',
        'description',
        'is_active',
        'slug'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function specie(): BelongsTo
    {
        return $this->belongsTo(Specie::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(AnimalGallery::class);
    }

    public function adoptions(): HasMany
    {
        return $this->hasMany(Adoption::class);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('name', 'like', '%' . $data['search'] . '%');
        }
        if (isset($data['status'])) {
            $query->where('is_active', $data['status']);
        }
        if (isset($data['start_date'])) {
            $query->where('created_at', '>=', $data['start_date']);
        }
        if (isset($data['end_date'])) {
            $query->where('created_at', '<=', $data['end_date']);
        }
        if (isset($data['specie_id'])) {
            $query->where('specie_id', $data['specie_id']);
        }
        if (isset($data['breed_id'])) {
            $query->where('breed_id', $data['breed_id']);
        }
        if (isset($data['size'])) {
            $query->where('size', $data['size']);
        }
        if (isset($data['genre'])) {
            $query->where('genre', $data['genre']);
        }
        if (isset($data['address'])) {
            $query->where('address', 'like', '%' . $data['address'] . '%');
        }
        return $query;
    }

    public static function boot()
    {
        parent::boot();
        $addSlug = function (Animal $animal) {
            $animal->slug = \Illuminate\Support\Str::slug($animal->name) . $animal->id;
        };
        static::creating($addSlug);
        static::updating($addSlug);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
