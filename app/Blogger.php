<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    protected $fillable = [
        'name', 'email', 'phone',
    ];
}
