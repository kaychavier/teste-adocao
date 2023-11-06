<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'zipcode',
        'state',
        'city',
        'district',
        'street',
        'number',
        'complement'
    ];

    public function animal(): HasOne
    {
        return $this->hasOne(Animal::class);
    }
}
