<?php

namespace App\Http\Controllers;

use App\User;
use App\Education;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Approval;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getAllChildOfUser($loggedInUser){
        $users = DB::table('user_approval')->where('parent_id','=',$loggedInUser)->first([DB::raw('group_concat(user_id) as user_id')]);
       
        $firstChildUsers = DB::table('user_approval')->whereIn('parent_id',explode(',',$users->user_id))->first([DB::raw('group_concat(user_id) as user_id')]);
        $secondChildUsers = DB::table('user_approval')->whereIn('parent_id',explode(',',$firstChildUsers->user_id))->first([DB::raw('group_concat(user_id) as user_id')]);
        $thirdChildUsers = DB::table('user_approval')->whereIn('parent_id',explode(',',$secondChildUsers->user_id))->first([DB::raw('group_concat(user_id) as user_id')]);
        $finalChildList = $loggedInUser . ',' .$users->user_id.','.$firstChildUsers->user_id.','.$secondChildUsers->user_id.','.$thirdChildUsers->user_id;
        $arrayChildList = explode(',',$finalChildList);
        return $arrayChildList;
    }
    public function index(\Illuminate\Http\Request $request) {
        $loggedInUser = $request->user()->id;
        $arrayChildUsers = $this->getAllChildOfUser($loggedInUser);
        $permittedRoleTypes = session('permittedRoleTypes');
        $users = \App\User::query()->join('role_master', 'role_master.id', '=', 'users.role_type')
                ->whereIn('role_master.role_type', $permittedRoleTypes)
                ->whereIn('users.id',$arrayChildUsers)
                ->select('users.*')
                ->paginate(10);
        return view('users.index', ['users' => $users, 'loggedInUser' => $loggedInUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(User $user) {
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request, Approval $approval) {

        $approvalModuleNames = session('approvalModuleNames');
       
        $objNewUser = User::create([
                    'name' => $request->first_name,
                    'lastname' => $request->last_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'role_type' => $request->role_type,
                    'emp_id' => $request->emp_id,
                    'password' => bcrypt($request->password),
        ]);

        $arrayjsonApprovalModule = [];
        foreach ($approvalModuleNames as $approvalModuleName) {
            $arrayjsonApprovalModule[$approvalModuleName] = false;
        }
        $jsonStringOfApprovalModule = json_encode($arrayjsonApprovalModule);

        $approval->user_id = $objNewUser->id;
        $approval->parent_id = $request->user()->id;
        $approval->aprroval_module = $jsonStringOfApprovalModule;
        $approval->save();

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update(User $user, CreateUserRequest $request) {
        $user->name = $request->first_name;
        $user->lastname = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role_type = $request->role_type;
        $user->emp_id = $request->emp_id;
        $user->save();
        return redirect()->route('users.index');
    }

    public function reset(User $user) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, 6);

        $data['body'] = "Yor Password reseted by user " . $user->name . ' ' . $user->lastname . "Please do login with new password<br>" . $password;
        $mail = Mail::getFacadeRoot();

        $mail->send('emails.reminder', $data, function($message) use($user) {
            $message->to($user->email, $user->name . ' ' . $user->lastname)
                    ->subject('Password Rest for Online Registration');
        });

        $user->password = bcrypt($password);
        $user->save();
        return redirect()->route('users.index')->with('success', 'Paswword Reset for User.' . $password);
    }

    public function createapproval(\Illuminate\Http\Request $request) {
        $loggedInUser = $request->user()->id;
        $permittedRoleTypes = session('permittedRoleTypes');
        $arrayChildUsers = $this->getAllChildOfUser($loggedInUser);
        $users = User::query()
                ->join('role_master', 'role_master.id', '=', 'users.role_type')
                ->whereIn('role_master.role_type', $permittedRoleTypes)
                ->whereIn('users.id',$arrayChildUsers)
                ->select(DB::raw('users.id,concat(users.name,"  ",users.lastname) as name'))
                ->get();
        $arraySelectionUserList = [];
        foreach ($users as $user) {
            $arraySelectionUserList[$user->id] = $user->name;
        }
        $modules = ['educations' => 'educations', 'personal' => 'personal', 'banks' => 'banks', 'address' => 'address', 'proffessional' => 'proffessional'];
        return view('users.approval', compact('modules', 'arraySelectionUserList'));
    }
	
	public function showUserInformation(\Illuminate\Http\Request $request) {
		$user = User::where('id',$request->user_id)->first();
		$educations = Education::where('user_id',$request->user_id)->get();
		$contents = view('users.show', ['user' => $user,'educations'=>$educations])->render();
        return $contents;
    }

    public function storeapproval(Approval $approval, Request $request) {
        $approvalData = $approval->query()->where('user_id', '=', $request->users)->select('aprroval_module')->first();
        $approvalArrayData = json_decode($approvalData->aprroval_module,true);
        $approvalArrayData[$request->modules] = true;
        DB::table('user_approval')
                ->where('user_id', '=', $request->users)
                ->update(['aprroval_module' => json_encode($approvalArrayData)]);
       
        return redirect()->route('users.createapproval');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

}
