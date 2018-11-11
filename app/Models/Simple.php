<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simple extends Model
{
    protected $table = 'simple';

    protected $fillable = ['name', 'description'];
}
