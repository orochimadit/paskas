<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Paskas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'place_of_birth',
        'date_of_birth',
        'marital_status',
        'number_of_children',
        'blood_group',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'address',
        'phone_number',
        'profession',
    ];

     /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/paskas/' . $value),
        );
    }
}

