<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'deadline',
        'title',
        'is_finished',
        'created_at',
    ];
}
