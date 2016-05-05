<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    protected $fillable = ['name', 'email', 'messagesOfCourse', 'message'];

    // created_at || createdAt === getCreatedAtAttribute
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i:s / d.m.Y');
    }
}
