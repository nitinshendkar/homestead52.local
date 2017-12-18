<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionController extends Controller
{
    public function nopermission()
    {
        return view('permission.nopermission');
    }
    
    public function notapproved()
    {
        return view('permission.notapproved');
    }
    public function createrecord()
    {
        return view('permission.createrecord');
    }
}
