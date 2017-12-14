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
        $state      = [1=>'Maharashtra',2=>'Gujrat',3=>'Karnataka'];//DB::table('state_master')->select('name')->get();
        $district   = [1=>'Pune',2=>'Nagar',3=>'Nashik'];//DB::table('district_master')->select('name')->get();
        $taluka     = [1=>'Khed',2=>'Maval',3=>'Shrigonda'];//DB::table('taluka_master')->select('name')->get();
        
        return view('address.create', compact('state','district','taluka'));
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
        $state      = [1=>'Maharashtra',2=>'Gujrat',3=>'Karnataka'];//DB::table('state_master')->select('name')->get();
        $district   = [1=>'Pune',2=>'Nagar',3=>'Nashik'];//DB::table('district_master')->select('name')->get();
        $taluka     = [1=>'Khed',2=>'Maval',3=>'Shrigonda'];//DB::table('taluka_master')->select('name')->get();
        
        return view('address.edit', compact('address','state','district','taluka'));
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
