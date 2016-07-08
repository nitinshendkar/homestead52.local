<?php

namespace App\Http\Controllers;

use Request;
use App\Book;
use App\Http\Requests;

class HomeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }
}
