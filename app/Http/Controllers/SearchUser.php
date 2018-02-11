<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchUser extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('search.show');
    }

    public function getUser(Request $request) {
        $userlist = "";
        $name = $request->name;

        if (!empty($name)) {
            $userlist = User::join('user_address', 'user_address.user_id', '=', 'users.id')
                    ->join('district_master', 'district_master.id', '=', 'user_address.district_id')
                    ->join('taluka_master', 'taluka_master.district_id', '=', 'user_address.district_id')
                    ->where('users.name', 'like', '%' . $name . '%')
                    ->orwhere('users.lastname', 'like', '%' . $name . '%')
                    ->orwhere('district_master.name', 'like', '%' . $name . '%')
                    ->orwhere('taluka_master.name', 'like', '%' . $name . '%')
                    ->distinct()
                    ->get(['users.lastname', 'users.name', 'users.id', 'users.phone']);
        }
        
        return view('search.show', compact('userlist'));
    }

}
