<?php

namespace App\Http\Controllers;


use App\Proffessional;
use App\Http\Requests;
use App\Http\Requests\CreateProffessionalRequest;
use Illuminate\Support\Facades\DB;

class ProffessionalController extends Controller
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
        $permittedRoleTypes = session('permittedRoleTypes');
        $loggedInUser = $request->user()->id;
        $proffessionals = Proffessional::query()
                ->join('users','users.id','=','professional_details.user_id')
                ->join('role_master', 'role_master.id', '=', 'users.role_type')
                ->whereIn('role_master.role_type', $permittedRoleTypes)
                ->select('professional_details.*','users.name','users.lastname')
                ->paginate(10);
        return view('proffessional.index', ['proffessionals' => $proffessionals, 'loggedInUser' => $loggedInUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('proffessional.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProffessionalRequest $request
     * @return Response
     */
    public function store(CreateProffessionalRequest $request)
    {
        
        Proffessional::create([
            'designation' => $request->designation,
            'user_id' =>$request->user()->id,
            'organization' => $request->organization,
            'current_working' => $request->current_working,
            'joining_date' => $request->joining_date,
            'year_of_passing' => $request->reveliving_date,
            'board' => $request->user()->id,
        ]);
        return redirect()->route('proffessional.index');
    }

    public function show(Proffessional $proffessional)
    {
        return view('proffessional.show', compact('proffessional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Proffessional $proffessional
     * @return Response
     */
    public function edit(Proffessional $proffessional)
    {
      return view('proffessional.edit', compact('proffessional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * $param Proffessional $proffessional
     * @return Response
     *
     */
    public function update(Proffessional $proffessional, CreateProffessionalRequest $request)
    {
        $proffessional->designation = $request->designation;
        $proffessional->organization = $request->organization;
        $proffessional->current_working = $request->current_working;
        $proffessional->joining_date = $request->joining_date;
        $proffessional->reveliving_date = $request->reveliving_date;
        $proffessional->save();
        return redirect()->route('proffessional.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Proffessional::find($id)->delete();
        return redirect()->route('proffessional.index');
    }
}
