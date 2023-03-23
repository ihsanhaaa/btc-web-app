<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function fishpond()
    {
        return $this->belongsTo(Fishpond::class);
    }
}
