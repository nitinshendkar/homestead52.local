<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Http\Requests;
use App\Http\Requests\CreatePersonalRequest;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
	public function getAllChildOfUser($loggedInUser){
        $users = DB::table('user_approval')->where('parent_id','=',$loggedInUser)->first([DB::raw('group_concat(user_id) as user_id')]);
       
        $firstChildUsers = DB::table('user_approval')->whereIn('parent_id',explode(',',$users->user_id))->first([DB::raw('group_concat(user_id) as user_id')]);
        $secondChildUsers = DB::table('user_approval')->whereIn('parent_id',explode(',',$firstChildUsers->user_id))->first([DB::raw('group_concat(user_id) as user_id')]);
        $thirdChildUsers = DB::table('user_approval')->whereIn('parent_id',explode(',',$secondChildUsers->user_id))->first([DB::raw('group_concat(user_id) as user_id')]);
        $finalChildList = $loggedInUser . ',' .$users->user_id.','.$firstChildUsers->user_id.','.$secondChildUsers->user_id.','.$thirdChildUsers->user_id;
        $arrayChildList = explode(',',$finalChildList);
        return $arrayChildList;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(\Illuminate\Http\Request $request) {
        $loggedInUser = $request->user()->id;
        $permittedRoleTypes = session('permittedRoleTypes');
		$arrayChildUsers = $this->getAllChildOfUser($loggedInUser);
        $personals = Personal::query()
                ->join('users', 'users.id', '=', 'personal_details.user_id')
                ->join('role_master', 'role_master.id', '=', 'users.role_type')
                ->whereIn('role_master.role_type', $permittedRoleTypes)
				 ->whereIn('users.id',$arrayChildUsers)
                ->select('personal_details.*','users.name','users.lastname')
                ->paginate(10);
        return view('personal.index', ['personals' => $personals, 'loggedInUser' => $loggedInUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePersonalRequest $request
     * @return Response
     */
    public function store(CreatePersonalRequest $request) {
        $profilePhotoType = null;
        $signaturePhotoType = null;
        $profilePhotoEncode = null;
        $signaturePhotoEncode = null;

        if (!empty($request->photo)) {
            $profilePhoto = file_get_contents($request->photo->getPathname());
            $profilePhotoType = $request->photo->getClientMimeType();
            $profilePhotoEncode = base64_encode($profilePhoto);
        }
        if (!empty($request->signature)) {
            $signaturePhoto = file_get_contents($request->signature->getPathname());
            $signaturePhotoType = $request->signature->getClientMimeType();
            $signaturePhotoEncode = base64_encode($signaturePhoto);
        }
        
        Personal::create([
            'dob' => $request->dob,
            'doj' => $request->doj,
            'photo' => $profilePhotoEncode,
            'user_id' => $request->user()->id,
            'photo_type' => $profilePhotoType,
            'signature' => $signaturePhotoEncode,
            'signature_type' => $signaturePhotoType,
        ]);
        return redirect()->route('personal.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Personal $personal) {
        return view('personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update(Personal $personal, CreatePersonalRequest $request) {
        $personal->dob = $request->dob;
        $personal->doj = $request->doj;

        $personal->save();
        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        Personal::find($id)->delete();
        return redirect()->route('personal.index');
    }

}
