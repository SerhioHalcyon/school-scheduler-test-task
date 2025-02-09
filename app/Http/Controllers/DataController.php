<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DataController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return response('It`s works');
    }
}
