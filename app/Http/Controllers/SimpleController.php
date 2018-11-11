<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KairosSystems\CRUD\CRUDController;

class SimpleController extends CRUDController
{
    protected $class = \App\Models\Simple::class;

    protected $rulesCreate = [
        'name' => 'required',
        'description' => 'required'
    ];

    protected $rulesUpdate = [
        'name' => 'required'
    ];
}
