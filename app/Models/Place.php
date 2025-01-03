<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model

{
    use HasFactory;
    protected $guarded = [];

    public function reviews(){
        return $this->hasMany(Review::class);

    }
}
