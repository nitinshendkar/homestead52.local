<?php

namespace App\Http\Controllers;


use App\Education;
use App\Http\Requests;
use App\Http\Requests\CreateEducationalRequest;
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
        return view('educationdetails.index', ['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('educationdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBookRequest $request
     * @return Response
     */
    public function store(CreateEducationalRequest $request)
    {
        return redirect()->route('educationdetails.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Education $education)
    {
      return view('educationdetails.edit', compact('education'));
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
        return redirect()->route('educationdetails.index');
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
        return redirect()->route('educationdetails.index');
    }
}
