<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table = 'example';

    protected $fillable = ['name', 'description', 'file'];
}
