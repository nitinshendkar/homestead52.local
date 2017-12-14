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
        return view('banks.index', ['banks' => $banks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBankRequest $request
     * @return Response
     */
    public function store(CreateBankRequest $request)
    {
        Bank::create([
            'bank_name' =>$request->bank_name,
            'branch_name' =>$request->branch_name,
            'ifsc_code' =>$request->ifsc_code,
            'account_no' =>$request->account_no ,
        ]);
        return redirect()->route('banks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Bank $bank)
    {
      return view('banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     */
    public function update(Bank $bank, CreateBankRequest $request)
    {
      
        $bank->bank_name = $request->bank_name;
        $bank->branch_name = $request->branch_name;
        $bank->ifsc_code = $request->ifsc_code;
        $bank->account_no = $request->account_no;
        $bank->save();
        return redirect()->route('banks.index');
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
        return redirect()->route('banks.index');
    }
}
