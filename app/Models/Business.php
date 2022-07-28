<?php

namespace App\Models;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    protected $fillable = [ 'business_type',
        'business_name'   ,
        'email'    ,
        'website'   ,
        'phone_number'   ,
        'business_phone_number',
        'address_line_1'   ,
        'city'   ,
        'state_province'  ,
        'postal_code'   ,
        'profile_picture'   ,
        'closing_time'   ,
        'opening_time'  ,
        'latitude'   ,
        'longitude'   ,
        'instagram',
        'approve',
        'facebook',
        'twitter',
        'reviews_count',
        'rating',
        'z_index'
     ];
    use HasFactory;

    protected $guarded;

    public function brands() {

        return $this->hasMany('App\Models\Brand');

    }

    public function detail() {

        return $this->hasOne(Detail::class);

    }

    public function reviews() {

        return $this->hasMany('App\Models\RetailerReview');

    }

}
