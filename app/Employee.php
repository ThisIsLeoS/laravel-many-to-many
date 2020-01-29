<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = 
    [
        'firstName',
        'lastName'
    ];

    public function tasks() 
    {
        return $this->belongsToMany(Task::class);
    }
}
