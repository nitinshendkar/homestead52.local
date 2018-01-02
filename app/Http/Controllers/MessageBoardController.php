<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMessageRequest;
use App\MessageBoard;
use DB;

class MessageBoardController extends Controller
{
    public function index()
    {
        $permittedRoleTypes = session('permittedRoleTypes');
        $messageBoard = MessageBoard::query()
                ->join('role_master','to_user_role','=','role_master.id')
                ->join('users','users.id','=','user_message_board.from_user_id')
                ->whereIn('role_master.role_type', $permittedRoleTypes)
                ->select('user_message_board.id','from_user_id','users.name','mesaage','role_name')
                ->paginate(5);
        //dd($messageBoard);
        return view('messageboard.index', ['messages' => $messageBoard]);
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
    public function store(CreateMessageRequest $request)
    {
        
        MessageBoard::create([
            'from_user_id' => $request->user()->id,
            'to_user_role' => $request->role_type,
            'mesaage' => $request->message,
            'is_deleted' => false,
        ]);
        return redirect()->route('messageboard.index');
    }

    
}
