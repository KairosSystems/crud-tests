<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KairosSystems\CRUD\BaseController;

class ExampleController extends BaseController
{
    protected $class = \App\Models\Example::class;
}
