<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'property_1',
        'property_2',
        'property_3',
        'property_4',
        'property_5',
        'property_6',
        'property_7'
    ];

    public function firstProp()
    {
        return $this->hasMany(FirstPivotToRecord::class);
    }

    public function secondProp()
    {
        return $this->hasMany(SecondPivotToRecord::class);
    }

    public function thirdProp()
    {
        return $this->hasMany(ThirdPivotToRecord::class);
    }
}
