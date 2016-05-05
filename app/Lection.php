<?php

namespace app;

use illuminate\Database\Eloquent\Model;

class lection extends model
{
    protected $fillable = [
        'idcourse',
        'ltitle',
        'ldesc'
    ];
}
