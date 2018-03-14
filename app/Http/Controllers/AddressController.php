<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests;
use App\Http\Requests\CreateAddressRequest;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(\Illuminate\Http\Request $request) {
        $permittedRoleTypes = session('permittedRoleTypes');
        $loggedInUser = $request->user()->id;
        $address = Address::query()
                ->join('users','users.id','=','user_address.user_id')
                ->join('state_master','state_master.id','=','user_address.state_id')
                ->join('district_master','district_master.id','=','user_address.district_id')
                ->join('taluka_master','taluka_master.id','=','user_address.taluka_id')
                ->join('role_master', 'role_master.id', '=', 'users.role_type')
                ->whereIn('role_master.role_type', $permittedRoleTypes)
                ->select(['user_address.*','state_master.name as state_name','district_master.name as district_name','taluka_master.name as taluka_name','users.name','users.lastname'])
                ->paginate(10);
        return view('address.index', ['address' => $address, 'loggedInUser' => $loggedInUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $states = DB::table('state_master')->select('id', 'name')->get();
        $arrayReKeystates = [];
        foreach ($states as $state) {
            $arrayReKeystates[$state->id] = $state->name;
        }

        $districts = DB::table('district_master')->select('id', 'name')->get();
        $arrayReKeydistricts = [];
        foreach ($districts as $district) {
            $arrayReKeydistricts[$district->id] = $district->name;
        }
        $talukas = DB::table('taluka_master')->select('id', 'name')->get();
        $arrayReKeytalukas = [];
        foreach ($talukas as $taluka) {
            $arrayReKeytalukas[$taluka->id] = $taluka->name;
        }
        return view('address.create', compact('arrayReKeystates', 'arrayReKeydistricts', 'arrayReKeytalukas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAddressRequest $request
     * @return Response
     */
    public function store(CreateAddressRequest $request) {

        Address::create([
            'state_id' => $request->state_id,
            'user_id' => $request->user()->id,
            'district_id' => $request->district_id,
            'taluka_id' => $request->taluka_id,
            'address_type' => $request->address_type,
            'village' => $request->village,
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('address.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Address $address
     * @return Response
     */
    public function edit(Address $address) {
        $states = DB::table('state_master')->select('id', 'name')->get();
        $arrayReKeystates = [];
        foreach ($states as $state) {
            $arrayReKeystates[$state->id] = $state->name;
        }

        $districts = DB::table('district_master')->select('id', 'name')->get();
        $arrayReKeydistricts = [];
        foreach ($districts as $district) {
            $arrayReKeydistricts[$district->id] = $district->name;
        }
        $talukas = DB::table('taluka_master')->select('id', 'name')->get();
        $arrayReKeytalukas = [];
        foreach ($talukas as $taluka) {
            $arrayReKeytalukas[$taluka->id] = $taluka->name;
        }

        return view('address.edit', compact('address', 'arrayReKeystates', 'arrayReKeydistricts', 'arrayReKeytalukas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Address $address
     * @param CreateAddressRequest $request Request controller
     * @return Response
     *
     */
    public function update(Address $address, CreateAddressRequest $request) {

        $address->state_id = $request->state_id;
        $address->district_id = $request->district_id;
        $address->taluka_id = $request->taluka_id;
        $address->address_type = $request->address_type;
        $address->village = $request->village;
        $address->save();

        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Address $address
     * @return Response
     */
    public function destroy(Address $address) {
        $address->delete();
        return redirect()->route('address.index');
    }

}
