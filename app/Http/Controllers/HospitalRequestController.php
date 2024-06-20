<?php

namespace App\Http\Controllers;

use App\Enums\Priority;
use App\Enums\Status;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response("Create Request View");
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
    public function show(HospitalRequestModel $hospitalRequestModel)
    {
        return response("Get a Request");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalRequestModel $hospitalRequestModel)
    {
        return response("View for update a Request");
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
