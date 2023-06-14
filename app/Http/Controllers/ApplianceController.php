<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplianceRequest;
use App\Models\Appliance;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ApplianceController extends Controller
{
    /**
     * List appliances json
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $appliances = DB::table('appliances')
            ->join('brands', 'appliances.brand_id', '=', 'brands.id')
            ->select('appliances.*', 'brands.name as brand')
            ->get();

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

        $appliance = DB::table('appliances')
            ->join('brands', 'appliances.brand_id', '=', 'brands.id')
            ->select('appliances.*', 'brands.name as brand')
            ->where('appliances.id', '=', $appliance->id)
            ->get();

        return response()->json($appliance->first(), 201);
    }

    /**
     * Show appliance
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $appliance = DB::table('appliances')
            ->join('brands', 'appliances.brand_id', '=', 'brands.id')
            ->select('appliances.*', 'brands.name as brand')
            ->where('appliances.id', '=', $id)
            ->get();

        return ($appliance->all()) ?
            response()->json($appliance->first(), 200) :
            response()->json([], 404);
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

        $appliance = DB::table('appliances')
            ->join('brands', 'appliances.brand_id', '=', 'brands.id')
            ->select('appliances.*', 'brands.name as brand')
            ->where('appliances.id', '=', $id)
            ->get();

        return response()->json($appliance->first(), 200);
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
