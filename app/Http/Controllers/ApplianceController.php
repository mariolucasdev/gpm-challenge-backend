<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplianceRequest;
use App\Models\Appliance;
use Illuminate\Http\{JsonResponse, Request};

class ApplianceController extends Controller
{
    /**
     * List appliances json
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $appliance = Appliance::all();

        return response()->json($appliance, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   /**
    * Store appliance
    *
    * @param StoreApplianceRequest $request
    * @return JsonResponse
    */
    public function store(StoreApplianceRequest $request): JsonResponse
    {
        $appliance = Appliance::create($request->all());

        return response()->json($appliance, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
