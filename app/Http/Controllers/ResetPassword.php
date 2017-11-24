<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPassword extends Controller
{
    use ResetsPasswords;
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    /**
     * Display password change screen to user.
     *
     * @return Response
     */
    public function showResetPassword(Request $request)
    {
      return view('auth.password');
    }

}
