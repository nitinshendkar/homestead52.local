<?php

namespace App\Http\Controllers;


use App\Bank;
use App\Http\Requests;
use App\Http\Requests\CreateBankRequest;
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
        $banks = Bank::paginate(1);
        return view('bankdetails.index', ['banks' => $banks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bankdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBankRequest $request
     * @return Response
     */
    public function store(CreateBankRequest $request)
    {
        
        return redirect()->route('bankdetails.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Bank $bank)
    {
      return view('bankdetails.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update($bankId, CreateBankRequest $request)
    {
      
        $bank = Bank::find($bankId);
        $bank->save();
        return redirect()->route('bankdetails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Bank::find($id)->delete();
        return redirect()->route('bankdetails.index');
    }
}
