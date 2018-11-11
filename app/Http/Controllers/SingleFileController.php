<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KairosSystems\CRUD\CRUDController;

class SingleFileController extends CRUDController
{
    protected $class = \App\Models\SingleFile::class;

    protected $rulesCreate = [
        'name' => 'required'
    ];

    protected $singleFiles = [
        'filewithpath' => [
            'type' => 'path', # Optional because default type is path
            'path' => 'categoryFile',# Optional the path to store this files, default is storage
            'rule' => 'required|image'
        ],
        'filecontent' => [
            'type' => 'base64',# Store file in database encoded in base64
            'path' => 'anotherCategory',
            'rule' => 'required|image'# Only 
        ],
        'filestring' => 'required'
    ];
}
