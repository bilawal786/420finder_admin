<?php

namespace App\Models;

use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement',
        'about',
        'customers',
        'business_id'
    ];
    protected $guarded = [];

    public function business() {

        return $this->belongsTo(Business::class);

    }
}
