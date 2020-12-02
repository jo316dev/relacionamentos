<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name'];


    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
