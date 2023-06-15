<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplianceRequest;
use App\Models\Appliance;
use Illuminate\Http\JsonResponse;

class ApplianceController extends Controller
{
    /**
     * List appliances json
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        /** @phpstan-ignore-next-line */
        $appliances = Appliance::with(['brand'])->get();

        return response()->json($appliances, 200);
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
     * Show appliance
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $appliance = Appliance::findOrFail($id);

        return response()->json($appliance, 200);
    }

    /**
     * Update appliance
     *
     * @param StoreApplianceRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(StoreApplianceRequest $request, string $id): JsonResponse
    {
        $appliance = Appliance::findOrFail($id);
        $appliance->update($request->all());

        return response()->json($appliance, 200);
    }

    /**
     * Remove appliance
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $appliance = Appliance::findOrFail($id);
        $appliance->delete();

        return response()->json([], 200);
    }
}
