<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;

class ChangePasswordController extends Controller
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
    public function index(\Illuminate\Http\Request $request)
    {
       
        return view('changepassword.index',['user'=>$request->user()]);
    }

   public function store( \Illuminate\Http\Request $request)
    {
		 $this->validate($request, [
			'change_password'  =>  'required|min:6|confirmed',
            'conform_change_password'  =>  'required|min:6|confirmed',
		]);
		
		 $objNewUser = User::where('id',$request->user()->id)->update([
                    'password' => bcrypt($request->change_password)]);

        
        return redirect()->route('changepassword.index',['user'=>$request->user()]);
    }

   
}
