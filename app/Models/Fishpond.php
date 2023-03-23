<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fishpond extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dataIkan()
    {
        return $this->hasMany(Fish::class);
    }
}
