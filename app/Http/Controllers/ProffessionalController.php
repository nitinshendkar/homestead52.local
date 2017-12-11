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
    public function index()
    {
        $proffessionals = Proffessional::paginate(1);
        return view('proffessionaldetails.index', ['proffessionals' => $proffessionals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('proffessionaldetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProffessionalRequest $request
     * @return Response
     */
    public function store(CreateProffessionalRequest $request)
    {
        return redirect()->route('proffessionaldetails.index');
    }

    public function show(Proffessional $proffessional)
    {
        return view('proffessionaldetails.show', compact('proffessional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Proffessional $proffessional
     * @return Response
     */
    public function edit(Proffessional $proffessional)
    {
      return view('proffessionaldetails.edit', compact('proffessional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update($proffessionalId, CreateProffessionalRequest $request)
    {
        return redirect()->route('proffessionaldetails.index');
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
        return redirect()->route('proffessionaldetails.index');
    }
}
