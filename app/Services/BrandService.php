<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class BrandService
{
    public function getAllBrands()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        return $brands;
    }

    public function create($data)
    {
        return Brand::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, array $data)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return $brand;
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return $brand;
    }
}
