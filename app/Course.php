<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'ctitle',
        'cdesc',
        'requirements',
        'forWhom',
        'image'
    ];
}
