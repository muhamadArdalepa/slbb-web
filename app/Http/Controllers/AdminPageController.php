<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    function index()
    {
        return view('admin.home');
    }
}
