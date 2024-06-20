<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCreateRequest;
use App\Http\Requests\RequetsUpdateRequest;
use App\Http\Resources\RequestCollection;
use App\Models\HospitalRequestModel;
use Illuminate\Support\Facades\DB;

class HospitalRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests_data =  new RequestCollection(HospitalRequestModel::all());
        return inertia('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestCreateRequest $request)
    {
        $request->Validated($request->all());
        $new_request = DB::table('hospital_request_models')->insertGetId($request->all());
        return new RequestCollection(collect([HospitalRequestModel::findOrFail($new_request)]));
    }

    /**
     * Display the specified resource.
     */
    public function show(HospitalRequestModel $request)
    {
        return new RequestCollection(collect([$request]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequetsUpdateRequest $request,$id)
    {
        $request->Validated($request);
        DB::table('hospital_request_models')->where('id',$id)->update($request->all());
        $updated_request = HospitalRequestModel::findOrFail($id);
        return new RequestCollection(collect([$updated_request]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalRequestModel $request)
    {
        HospitalRequestModel::destroy($request->id);
        return response('Request Deleted');
    }
}
