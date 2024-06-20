<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCreateRequest;
use App\Http\Resources\RequestCollection;
use App\Models\HospitalRequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RequestCollection(HospitalRequestModel::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestCreateRequest $RequestCreateRequest)
    {
        $RequestCreateRequest->Validated($RequestCreateRequest->all());
        $new_request = DB::table('hospital_request_models')->insertGetId($RequestCreateRequest->all());
        $new_request = HospitalRequestModel::findOrFail($new_request);
        return new RequestCollection(collect([$new_request]));
    }

    /**
     * Display the specified resource.
     */
    public function show($RequestId)
    {
        $request = HospitalRequestModel::findOrFail($RequestId);
        return new RequestCollection(collect([$request]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HospitalRequestModel $hospitalRequestModel)
    {
        return response("Update a Request");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalRequestModel $hospitalRequestModel)
    {
        return response("Delete a Request");
    }
}
