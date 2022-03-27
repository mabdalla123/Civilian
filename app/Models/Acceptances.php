<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptances extends Model
{
    use HasFactory;
    protected $fillable = ['city_id','university_name','Fees','image_path'];


    public function City()
    {
        return $this->belongsTo(City::class);
    }
}
