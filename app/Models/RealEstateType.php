<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RealEstate;

class RealEstateType extends Model
{
    use HasFactory;
    protected $fillable = ['type_name'];

    public function realestates()
    {
        return $this->hasMany(RealEstate::class);
    }
}
