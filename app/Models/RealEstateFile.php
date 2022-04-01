<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateFile extends Model
{
    use HasFactory;
    protected $fillable = ['real_estate_id','file_path','file_name'];

    

    public function realestate()
    {
        return $this->belongsTo(RealEstate::class);
    }
}
