<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    use HasFactory;

    protected $fillable = ['swiper_id', 'person_id', 'type'];

    // Fix the relationship - it should be 'person_id' not 'id'
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}