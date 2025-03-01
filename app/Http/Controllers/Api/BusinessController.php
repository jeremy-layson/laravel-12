<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Business\DestroyRequest;
use App\Http\Requests\Business\IndexRequest;
use App\Http\Requests\Business\ShowRequest;
use App\Http\Requests\Business\StoreRequest;
use App\Http\Requests\Business\UpdateRequest;
use App\Http\Resources\BusinessResource;
use App\Models\Business;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request): AnonymousResourceCollection
    {
        $businesses = Business::all();
        
        return BusinessResource::collection($businesses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): BusinessResource
    {
        $business = Business::create($request->validated());
        
        return new BusinessResource($business);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request, Business $business): BusinessResource
    {
        return new BusinessResource($business);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Business $business): BusinessResource
    {
        $business->update($request->validated());
        
        return new BusinessResource($business);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyRequest $request, Business $business): JsonResponse
    {
        $business->delete();
        
        return response()->json(null, 204);
    }
}
