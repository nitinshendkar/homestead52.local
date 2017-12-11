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
        return view('personaldetails.index', ['personals' => $personals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('personaldetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePersonalRequest $request
     * @return Response
     */
    public function store(CreatePersonalRequest $request)
    {
        return redirect()->route('personaldetails.index');
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Personal $personal)
    {
      return view('personaldetails.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update($personalId, CreatePersonalRequest $request)
    {
      
        $personal = Personal::find($personalId);
        $personal->save();
        return redirect()->route('personaldetails.index');
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
        return redirect()->route('personaldetails.index');
    }
}
