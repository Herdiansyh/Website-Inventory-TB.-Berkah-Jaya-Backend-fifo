<?php

namespace App\Services;

use App\Models\Size;
use Illuminate\Support\Facades\Auth;

class SizeService
{
    public function getAllSizes()
    {
        $sizes = Size::orderBy('name', 'asc')->get();
        return $sizes;
    }

    public function create($data)
    {
        return Size::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, array $data)
    {
        $size = Size::findOrFail($id);
        $size->update($data);
        return $size;
    }

    public function delete($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        return $size;
    }
}
