<?php

namespace App\Http\Controllers;


use App\Education;
use App\Http\Requests;
use App\Http\Requests\CreateEducationRequest;
use Illuminate\Support\Facades\DB;

class EducationalController extends Controller
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
        $educations = \App\Education::paginate(1);
        return view('educations.index', ['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('educations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBookRequest $request
     * @return Response
     */
    public function store(CreateEducationRequest $request)
    {
        dd($request);
        Personal::create([
            'dob' => $request->dob,
            'doj' => $request->doj,
            'photo' => $profilePhotoEncode,
            'photo_type' => $profilePhotoType,
            'signature' => $signaturePhotoEncode,
            'signature_type' => $signaturePhotoType,
        ]);
        return redirect()->route('educations.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Education $education)
    {
      return view('educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update($prsonalDetailId, CreateEducationalRequest $request)
    {
      
        $education = Education::find($prsonalDetailId);
        $education->save();
        return redirect()->route('educations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Education::find($id)->delete();
        return redirect()->route('educations.index');
    }
}
