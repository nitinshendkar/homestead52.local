<?php

namespace App\Http\Controllers;


use App\User;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(\Illuminate\Http\Request $request)
    {
        $loggedInUser = $request->user()->id;
        $users = \App\User::paginate(5);
        return view('users.index', ['users' => $users,'loggedInUser'=> $loggedInUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
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
        
//        User::create([
//            'name' => $request->first_name,
//            'lastname' => $request->last_name,
//            'phone' => $request->phone,
//            'email' => $request->email,
//            'role_type' => $request->role_type,
//            'emp_id' => $request->emp_id,
//            'password' => bcrypt($request->password),
//        ]);
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(User $user)
    {
      return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update(User $user, CreateUserRequest $request)
    {
            $user->name = $request->first_name;
            $user->lastname = $request->last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->role_type = $request->role_type;
            $user->emp_id = $request->emp_id;
            $user->save();
        return redirect()->route('users.index');
    }
    
    public function reset(User $user)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, 6 );
        $user->password = bcrypt($password);
        $user->save();
        return redirect()->route('users.index')->with('success','Paswword Reset for User.'.$password);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
