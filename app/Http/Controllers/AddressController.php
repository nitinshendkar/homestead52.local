<?php

namespace App\Http\Controllers;


use App\Address;
use App\Http\Requests;
use App\Http\Requests\CreateAddressRequest;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
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
        $address = Address::paginate(1);
        return view('address.index', ['address' => $address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
       $states = DB::table('state_master')->select('id','name')->get();
       $arrayReKeystates = [];
       foreach($states as $state){
           $arrayReKeystates[$state->id] = $state->name;
       }
       
       $districts = DB::table('district_master')->select('id','name')->get();
       $arrayReKeydistricts = [];
       foreach($districts as $district){
           $arrayReKeydistricts[$district->id] = $district->name;
       }
       $talukas = DB::table('taluka_master')->select('id','name')->get();
       $arrayReKeytalukas = [];
       foreach($talukas as $taluka){
           $arrayReKeytalukas[$taluka->id] = $taluka->name;
       }
    return view('address.create', compact('arrayReKeystates','arrayReKeydistricts','arrayReKeytalukas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAddressRequest $request
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
       
        Address::create([
            'state_id'      =>$request->state_id,
            'district_id'   =>$request->district_id,
            'taluka_id'     =>$request->taluka_id,
            'address_type'  =>$request->address_type ,
            'village'       =>$request->village ,
            'user_id'       =>$request->user()->id ,
        ]);
        return redirect()->route('address.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Address $address
     * @return Response
     */
    public function edit(Address $address)
    {
       $states = DB::table('state_master')->select('id','name')->get();
       $arrayReKeystates = [];
       foreach($states as $state){
           $arrayReKeystates[$state->id] = $state->name;
       }
       
       $districts = DB::table('district_master')->select('id','name')->get();
       $arrayReKeydistricts = [];
       foreach($districts as $district){
           $arrayReKeydistricts[$district->id] = $district->name;
       }
       $talukas = DB::table('taluka_master')->select('id','name')->get();
       $arrayReKeytalukas = [];
       foreach($talukas as $taluka){
           $arrayReKeytalukas[$taluka->id] = $taluka->name;
       }
        
        return view('address.edit', compact('address','arrayReKeystates','arrayReKeydistricts','arrayReKeytalukas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Address $address
     * @param CreateAddressRequest $request Request controller
     * @return Response
     *
     */
    public function update(Address $address, CreateAddressRequest $request)
    {
      
        $address->state_id    = $request->state_id;
        $address->district_id  = $request->district_id;
        $address->taluka_id    = $request->taluka_id;
        $address->address_type  = $request->address_type;
        $address->village    = $request->village;
        $address->save();
        
        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Address $address
     * @return Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index');
    }
}
