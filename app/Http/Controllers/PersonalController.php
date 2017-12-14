<?php

namespace App\Http\Controllers;


use App\Personal;
use App\Http\Requests;
use App\Http\Requests\CreatePersonalRequest;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
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
        $personals = \App\Personal::paginate(1);
        return view('personal.index', ['personals' => $personals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePersonalRequest $request
     * @return Response
     */
    public function store(CreatePersonalRequest $request)
    {
        $profilePhotoType = null;
        $signaturePhotoType= null;
        $profilePhotoEncode = null;
        $signaturePhotoEncode = null;
        
        if(!empty($request->photo)){
            $profilePhoto = file_get_contents($request->photo->getPathname());
            $profilePhotoType = $request->photo->getClientMimeType();
            $profilePhotoEncode = base64_encode($profilePhoto);
        }
        if(!empty($request->signature)){
            $signaturePhoto = file_get_contents($request->signature->getPathname());
            $signaturePhotoType = $request->signature->getClientMimeType();
            $signaturePhotoEncode = base64_encode($signaturePhoto);
        }
        
        
        
        
        Personal::create([
            'dob' => $request->dob,
            'doj' => $request->doj,
            'photo' => $profilePhotoEncode,
            'photo_type' => $profilePhotoType,
            'signature' => $signaturePhotoEncode,
            'signature_type' => $signaturePhotoType,
            'board' => $request->user()->id,
        ]);
        return redirect()->route('personal.index');
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Personal $personal)
    {
      return view('personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update(Personal $personal, CreatePersonalRequest $request)
    {
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
    public function destroy($id)
    {
        Personal::find($id)->delete();
        return redirect()->route('personal.index');
    }
}
