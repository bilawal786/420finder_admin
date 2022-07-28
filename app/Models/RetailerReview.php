<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailerReview extends Model {

    protected $fillable = ['retailer_id', 'description', 'customer_name', 'customer_id', 'rating'];
    use HasFactory;

    public function user() {

        return $this->belongsTo('App\Models\User');

    }

    public function business() {

        return $this->belongsTo('App\Models\Business');

    }

}
