<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\StoreSizeRequest;
use App\Http\Requests\Size\UpdateSizeRequest;
use App\Services\SizeService;
use App\Traits\ApiResponse;

class SizeController extends Controller
{
    use ApiResponse;

    protected $sizeServices;

    public function __construct(SizeService $sizeServices)
    {
        $this->sizeServices = $sizeServices;
    }

    public function index()
    {
        $sizeServices = $this->sizeServices->getAllSizes();
        return $this->successResponse($sizeServices);
    }

    public function store(StoreSizeRequest $request)
    {
        $sizeServices = $this->sizeServices->create($request->validated());
        return $this->successResponse($sizeServices, 'Size created successfully', 201);
    }

    public function update(UpdateSizeRequest $request, $id)
    {
        $sizeServices = $this->sizeServices->update($id, $request->validated());
        return $this->successResponse($sizeServices, 'Size updated successfully');
    }

    public function destroy($id)
    {
        $sizeServices = $this->sizeServices->delete($id);
        return $this->successResponse($sizeServices, 'Size deleted successfully');
    }
}
