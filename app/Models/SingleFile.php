<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SingleFile extends Model
{
    protected $table = 'single_file';

    protected $fillable = ['name', 'filewithpath', 'filecontent', 'filepath'];
}
