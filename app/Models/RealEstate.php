<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','real_estate_type_id'];
    

    public function files()
    {
        return $this->hasMany(RealEstateFile::class,);
    }

    public function type()
    {
       return $this->belongsTo(RealEstateType::class,'real_estate_type_id');
    }
}
