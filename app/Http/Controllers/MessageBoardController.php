<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MessageBoard;
use DB;

class MessageBoardController extends Controller
{
    public function index()
    {
        $messageBoard = MessageBoard::paginate(5);
        return view('home', ['messages' => $messageBoard]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $roles = DB::table('role_master')->select('id','role_name')->get();
       $arrayReKeyRoles = [];
       foreach($roles as $role){
           $arrayReKeyRoles[$role->id] = $role->role_name;
       }
       return view('messageboard.create',compact('arrayReKeyRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        
        User::create([
            'name' => $request->first_name,
            'lastname' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role_type' => $request->role_type,
            'emp_id' => $request->emp_id,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('users.index');
    }

    
}
