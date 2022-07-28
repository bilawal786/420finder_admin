<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispenseryProduct extends Model
{
    use HasFactory;
    
    public function reviews() {

        return $this->hasMany('App\Models\RetailerReview');

    }

}
