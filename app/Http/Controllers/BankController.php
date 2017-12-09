<?php

namespace App\Http\Controllers;


use App\User;
use App\Http\Requests;
use App\Http\Requests\CreateBookRequest;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
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
        $users = \App\User::paginate(1);
        return view('users.index', ['users' => $users]);
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
     * @param  CreateBookRequest $request
     * @return Response
     */
    public function store(CreateBookRequest $request)
    {
        
        $profilePhoto = file_get_contents($request->profile_photo->getPathname());
        $profilePhotoType = $request->profile_photo->getClientMimeType();
        $profilePhotoEncode = base64_encode($profilePhoto);
        
        $signaturePhoto = file_get_contents($request->profile_signature->getPathname());
        $signaturePhotoType = $request->profile_signature->getClientMimeType();
        $signaturePhotoEncode = base64_encode($signaturePhoto);
        
        User::create([
            'name' => $request->first_name,
            'lastname' => $request->last_name,
            'office_address' => $request->office_address,
            'home_address' => $request->home_address,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'emp_id' => $request->emp_id,
            'dob' => $request->dob,
            'doj' => $request->doj,
            'photo' => $profilePhotoEncode,
            'photo_type' => $profilePhotoType,
            'signature' => $signaturePhotoEncode,
            'signature_type' => $signaturePhotoType,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function show(Book $book)
    {
        return view('users.show', compact('book'));
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
    public function update($bookId, CreateBookRequest $request)
    {
      
        $user = User::find($bookId);
        $profilePhoto = file_get_contents($request->profile_photo->getPathname());
        $profilePhotoType = $request->profile_photo->getClientMimeType();
        $profilePhotoEncode = base64_encode($profilePhoto);
        
        $signaturePhoto = file_get_contents($request->profile_signature->getPathname());
        $signaturePhotoType = $request->profile_signature->getClientMimeType();
        $signaturePhotoEncode = base64_encode($signaturePhoto);
       
            $user->name = $request->first_name;
            $user->lastname = $request->last_name;
            $user->office_address = $request->office_address;
            $user->home_address = $request->home_address;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->emp_id = $request->emp_id;
            $user->dob = $request->dob;
            $user->doj = $request->doj;
            $user->photo = $profilePhotoEncode;
            $user->photo_type = $profilePhotoType;
            $user->signature = $signaturePhotoEncode;
            $user->signature_type = $signaturePhotoType;
            
        $user->save();
        return redirect()->route('users.index');
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
