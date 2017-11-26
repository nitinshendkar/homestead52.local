<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;

class SearchUser extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       return view('search.show');
    }
    
    public function getUser(Request $request)
    {
        $userlist = "";
        $name = $request->name;
        
        if(!empty($name))
        $userlist = User::where('name','like','%'.$name.'%')->orwhere('lastname','like','%'.$name.'%')->get();
        return view('search.show', compact('userlist'));
    }
}
