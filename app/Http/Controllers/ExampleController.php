<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KairosSystems\CRUD\CRUDController;

class ExampleController extends CRUDController
{
    protected $class = \App\Models\Example::class;
}
