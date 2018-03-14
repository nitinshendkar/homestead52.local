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
    public function index(\Illuminate\Http\Request $request)
    {
        $loggedInUser = $request->user()->id;
        $permittedRoleTypes = session('permittedRoleTypes');
        $educations = Education::query()
                ->join('users','users.id','=','education_details.user_id')
                ->join('role_master', 'role_master.id', '=', 'users.role_type')
                ->whereIn('role_master.role_type', $permittedRoleTypes)
                ->select('education_details.*','users.name','users.lastname')
                ->paginate(10);
        
        return view('educations.index', ['educations' => $educations, 'loggedInUser' => $loggedInUser]);
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
        Education::create([
            'degree' => $request->degree,
            'board' => $request->board,
            'user_id' => $request->user()->id,
            'percentage' => $request->percentage,
            'specialization' => $request->specialization,
            'year_of_passing' => $request->year_of_passing,
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
    public function update($prsonalDetailId, CreateEducationRequest $request)
    {
      
        $education = Education::find($prsonalDetailId);
        $education->degree = $request->degree;
        $education->board = $request->board;
        $education->percentage = $request->percentage;
        $education->specialization = $request->specialization;
        $education->year_of_passing = $request->year_of_passing;
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
