<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Services\BrandService;
use App\Traits\ApiResponse;

class BrandController extends Controller
{
    use ApiResponse;

    protected $brandServices;

    public function __construct(BrandService $brandServices)
    {
        $this->brandServices = $brandServices;
    }

    public function index()
    {
        $brandServices = $this->brandServices->getAllBrands();
        return $this->successResponse($brandServices);
    }
    public function store(StoreBrandRequest $request)
    {
        $brandServices = $this->brandServices->create($request->validated());
        return $this->successResponse($brandServices, 'Brand created successfully', 201);
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $brandServices = $this->brandServices->update($id, $request->validated());
        return $this->successResponse($brandServices, 'Brand updated successfully');
    }

    public function destroy($id)
    {
        $brandServices = $this->brandServices->delete($id);
        return $this->successResponse($brandServices, 'Brand deleted successfully');
    }
}
